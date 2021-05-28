<?php 

defined('BASEPATH') or exit('Ação não permitida');


class Ajax extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }


    public function index(){

        $this->form_validation->set_rules('cep', 'cep destino', 'trim|required|exact_length[9]');
        $this->form_validation->set_rules('produto_id', 'Produto Id', 'trim|required');

        $retorno = array(); 

        if($this->form_validation->run()){

            $produto_id = (int) $this->input->post('produto_id');

            if(!$produto = $this->core_model->get_by_id('produtos', array('produto_id' => $produto_id)) ){
                $retorno['erro'] = 3; 
                $retorno['retorno_endereco'] = 'Não encontramos o produto em nossa base de dados';
                echo json_encode($retorno); 
                exit();  
            }else{
                //Inicio da consulta ao web service Via Cep


                //Sucesso produto existe .... continua processamento

                $cep_destino = str_replace('-', '', $this->input->post('cep'));

                $url_endereco = 'https://viacep.com.br/ws/' ; 
                $url_endereco .=$cep_destino; 
                $url_endereco .='/json/';


                //80510000/json/

                $curl = curl_init(); 
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
                curl_setopt($curl, CURLOPT_URL, $url_endereco); 

                $resultado = curl_exec($curl); 

                $resultado = json_decode($resultado);

                if(isset($resultado->erro)){
                    $retorno['erro'] = 3; 
                    $retorno['mensagem'] = 'Não encontramos o CEP na nossa base de dados';
                    $retorno['retorno_endereco'] = 'Não encontramos o CEP na nossa base de dados';


                }else{

                    $retorno['erro'] = 0;
                    $retorno['mensagem'] = 'Sucesso';
                    
                    //$retorno['url_endereco'] = $url_endereco;
                    $retorno['retorno_endereco'] = 'Rua: '.$resultado->lograduro.', Bairro: '.$resultado->bairro ;
                }

                //Final da consulta ao web service via CEP

                /*
                    inicio da consulta ao web service ao correios
                */
                //Montando a url para os correios exibir o valor do frete

                /*
                    http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=08082650&sDsSenha=564321&sCepOrigem=70002900
                    &sCepDestino=04547000&nVlPeso=1
                    &nCdFormato=1&nVlComprimento=20&nVlAltura=20&nVlLargura=20&sCdMaoPropria=n&nVlValorDeclarado=0
                    &sCdAvisoRecebimento=n&nCdServico=04510&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3
                
                */


                //informacoes dos correios no banco de dados
                $config_correios = $this->core_model->get_by_id('config_correios', array('config_id' => 1));
                
                //para onde sera enviado o produto
                $cep_destino = $this->input->post('cep');

                $url_correios =  'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?' ; 
                $url_correios .=  'nCdEmpresa=08082650'; 
                $url_correios .=  '&sDsSenha=564321'; 
                $url_correios .=  '&sCepOrigem='.str_replace('-','' ,$config_correios->config_cep_origem);
                $url_correios .=  '&sCepDestino='.str_replace('-','' ,$cep_destino);
                $url_correios .= '&nVlPeso='.$produto->produto_peso;
                $url_correios .= '&nCdFormato=1';
                $url_correios .= '&nVlComprimento='.$produto->produto_comprimento;
                $url_correios .= '&nVlAltura='.$produto->produto_altura;
                $url_correios .= '&nVlLargura='.$produto->produto_largura;
                $url_correios .= '&sCdMaoPropria=n';
                $url_correios .= '&nVlValorDeclarado='.$config_correios->config_valor_declarado;
                
                $url_correios .= '&sCdAvisoRecebimento=n';
                $url_correios .= '&nCdServico='.$config_correios->config_codigo_sedex;
                $url_correios .= '&nVlDiametro=0';
                $url_correios .= '&StrRetorno=xml';
                $url_correios .= '&nIndicaCalculo=3';
                

                //echo json_encode($url_correios); 
                //exit(); 

                //Transformando o doc xml em um objeto
                $xml = simplexml_load_file($url_correios); 
                $xml = json_encode($xml);
                $consulta = json_decode($xml); 
                
                //Garantindo que ouve sucesso na consulta ao web service dos correios
                if($consulta->cServico[0]->Valor == '0,00'){
                    //Faca alguma coisa
                    $retorno['erro'] = 3; 
                    $retorno['retorno_endereco'] = 'Não foi possivel calcular o frete. Por favor entre em contato com o nosso suporte';
                    exit(); 

                }else{
                    //Sucesso... valor e prazo gerados
                    foreach($consulta->cServico as $dados){

                        $frete_calculado = '<p>'.$dados->valor.', Código servico:'.$dados->Codigo.'</p>';

                    }
                
                }
                $retorno['erro'] = 0;
                $retorno['retorno_endereco'] = $frete_calculado;

            }
            
        }else{
            //Erro de validação

            $retorno['erro'] = 5;
            $retorno['retorno_endereco'] = validation_errors();
        }

        echo json_encode($retorno);

    }
    

}