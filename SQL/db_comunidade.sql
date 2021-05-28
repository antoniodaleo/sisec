-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Fev-2021 às 00:07
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_comunidade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nome` varchar(45) NOT NULL,
  `categoria_ativa` tinyint(1) DEFAULT NULL,
  `categoria_meta_link` varchar(100) DEFAULT NULL,
  `categoria_data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_nome`, `categoria_ativa`, `categoria_meta_link`, `categoria_data_criacao`, `categoria_data_alteracao`) VALUES
(1, 'kabalah', 1, 'kabalah', '2021-02-10 08:04:46', '2021-02-10 08:04:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `conta_pagar_id` int(11) NOT NULL,
  `conta_pagar_fornecedor_id` int(11) DEFAULT NULL,
  `conta_pagar_data_vencimento` date DEFAULT NULL,
  `conta_pagar_data_pagamento` datetime DEFAULT NULL,
  `conta_pagar_valor` varchar(15) DEFAULT NULL,
  `conta_pagar_status` tinyint(1) DEFAULT NULL,
  `conta_pagar_obs` tinytext DEFAULT NULL,
  `conta_pagar_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='		';

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`conta_pagar_id`, `conta_pagar_fornecedor_id`, `conta_pagar_data_vencimento`, `conta_pagar_data_pagamento`, `conta_pagar_valor`, `conta_pagar_status`, `conta_pagar_obs`, `conta_pagar_data_alteracao`) VALUES
(1, 1, '2021-01-29', NULL, '250.00', 0, ' caixa de sucos', '2021-01-01 11:26:02'),
(2, 1, '2021-01-14', '2021-01-01 11:02:42', '1,100.00', 1, 'Caixa de vinho ', '2021-01-01 14:02:42'),
(3, 1, '2020-12-31', NULL, '1,500.00', 0, ' ', '2021-01-01 14:38:47'),
(4, 1, '2020-12-31', NULL, '2,100.00', 0, ' ', '2021-01-01 14:39:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `conta_receber_id` int(11) NOT NULL,
  `conta_receber_membro_id` int(11) NOT NULL,
  `conta_receber_data_vencimento` date DEFAULT NULL,
  `conta_receber_data_pagamento` datetime DEFAULT NULL,
  `conta_receber_valor` varchar(20) DEFAULT NULL,
  `conta_receber_status` tinyint(1) NOT NULL,
  `conta_receber_obs` tinytext NOT NULL,
  `conta_receber_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`conta_receber_id`, `conta_receber_membro_id`, `conta_receber_data_vencimento`, `conta_receber_data_pagamento`, `conta_receber_valor`, `conta_receber_status`, `conta_receber_obs`, `conta_receber_data_alteracao`) VALUES
(2, 5, '2021-01-05', NULL, '100.00', 0, ' quota', '2021-01-01 11:27:20'),
(3, 5, '2021-01-21', NULL, '1,200.00', 0, ' ', '2021-01-01 14:19:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `curso_id` int(11) NOT NULL,
  `curso_nome` varchar(250) NOT NULL,
  `curso_preco` varchar(15) NOT NULL,
  `curso_ativo` tinyint(1) NOT NULL,
  `curso_obs` text DEFAULT NULL,
  `curso_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`curso_id`, `curso_nome`, `curso_preco`, `curso_ativo`, `curso_obs`, `curso_data_alteracao`) VALUES
(2, 'Curso de Kabalah', '200,00', 1, NULL, '2021-01-01 12:54:56'),
(3, 'Curso de Judaismo', '100,00', 1, '', '2020-12-31 18:38:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_pagamentos`
--

CREATE TABLE `formas_pagamentos` (
  `forma_pagamento_id` int(11) NOT NULL,
  `forma_pagamento_nome` varchar(45) DEFAULT NULL,
  `forma_pagamento_aceita_parc` tinyint(1) DEFAULT NULL,
  `forma_pagamento_ativa` tinyint(1) DEFAULT NULL,
  `forma_pagamento_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formas_pagamentos`
--

INSERT INTO `formas_pagamentos` (`forma_pagamento_id`, `forma_pagamento_nome`, `forma_pagamento_aceita_parc`, `forma_pagamento_ativa`, `forma_pagamento_data_alteracao`) VALUES
(1, 'Cartão de crédito', 0, 1, '2020-02-14 23:46:46'),
(2, 'Dinheiro', 0, 1, '2020-01-29 21:43:54'),
(3, 'Boleto bancário', 1, 0, '2020-01-29 21:44:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `fornecedor_id` int(11) NOT NULL,
  `fornecedor_razao` varchar(200) DEFAULT NULL,
  `fornecedor_nome_fantasia` varchar(145) DEFAULT NULL,
  `fornecedor_cnpj` varchar(20) DEFAULT NULL,
  `fornecedor_ie` varchar(20) DEFAULT NULL,
  `fornecedor_telefone` varchar(20) DEFAULT NULL,
  `fornecedor_celular` varchar(20) DEFAULT NULL,
  `fornecedor_email` varchar(100) DEFAULT NULL,
  `fornecedor_contato` varchar(45) DEFAULT NULL,
  `fornecedor_cep` varchar(10) DEFAULT NULL,
  `fornecedor_endereco` varchar(145) DEFAULT NULL,
  `fornecedor_numero_endereco` varchar(20) DEFAULT NULL,
  `fornecedor_bairro` varchar(45) DEFAULT NULL,
  `fornecedor_complemento` varchar(45) DEFAULT NULL,
  `fornecedor_cidade` varchar(45) DEFAULT NULL,
  `fornecedor_estado` varchar(2) DEFAULT NULL,
  `fornecedor_ativo` tinyint(1) DEFAULT NULL,
  `fornecedor_obs` tinytext DEFAULT NULL,
  `fornecedor_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`fornecedor_id`, `fornecedor_razao`, `fornecedor_nome_fantasia`, `fornecedor_cnpj`, `fornecedor_ie`, `fornecedor_telefone`, `fornecedor_celular`, `fornecedor_email`, `fornecedor_contato`, `fornecedor_cep`, `fornecedor_endereco`, `fornecedor_numero_endereco`, `fornecedor_bairro`, `fornecedor_complemento`, `fornecedor_cidade`, `fornecedor_estado`, `fornecedor_ativo`, `fornecedor_obs`, `fornecedor_data_alteracao`) VALUES
(1, 'Casa Madeira', 'Casa Madeira', '25.851.957/0001-50', '123,58745-25', '(85) 9855-6986', '(29) 89865-6323', 'casamadeira@outlook.com', NULL, '89855-499', 'rua sao paolo', '25', 'messejana', 'casa', 'fortaleza', 'CE', 1, '', '2021-01-01 11:25:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `membro_id` int(11) NOT NULL,
  `membro_nome` varchar(250) NOT NULL,
  `membro_sobrenome` varchar(250) NOT NULL,
  `membro_email` varchar(250) NOT NULL,
  `membro_cpf_cnpj` varchar(20) DEFAULT NULL,
  `membro_tipo` tinyint(1) DEFAULT NULL,
  `membro_data_nascimento` date NOT NULL,
  `membro_celular` varchar(20) NOT NULL,
  `membro_ativo` tinyint(1) NOT NULL,
  `membro_obs` text NOT NULL,
  `membro_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`membro_id`, `membro_nome`, `membro_sobrenome`, `membro_email`, `membro_cpf_cnpj`, `membro_tipo`, `membro_data_nascimento`, `membro_celular`, `membro_ativo`, `membro_obs`, `membro_data_alteracao`) VALUES
(4, 'antonio', 'daleo', 'antoniodaleo@outlook.com', '618.263.273-98', 1, '2020-11-30', '(85) 65949-8461', 1, '', '2020-12-31 16:13:41'),
(5, 'francesco', 'rossi', 'francescorossi@outlook.com', '', 1, '2020-12-04', '(85) 98654-7896', 1, '', '2020-12-31 20:29:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_tem_servicos`
--

CREATE TABLE `ordem_tem_servicos` (
  `ordem_ts_id` int(11) NOT NULL,
  `ordem_ts_id_curso` int(11) DEFAULT NULL,
  `ordem_ts_id_ordem_servico` int(11) DEFAULT NULL,
  `ordem_ts_quantidade` int(11) DEFAULT NULL,
  `ordem_ts_valor_unitario` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_desconto` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_total` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela de relacionamento entre as tabelas servicos e ordem_servico';

--
-- Extraindo dados da tabela `ordem_tem_servicos`
--

INSERT INTO `ordem_tem_servicos` (`ordem_ts_id`, `ordem_ts_id_curso`, `ordem_ts_id_ordem_servico`, `ordem_ts_quantidade`, `ordem_ts_valor_unitario`, `ordem_ts_valor_desconto`, `ordem_ts_valor_total`) VALUES
(7, 3, 3, 1, ' 100.00', '10 ', ' 90.00'),
(8, 2, 3, 1, ' 200.00', '0 ', ' 200.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_servicos`
--

CREATE TABLE `ordens_servicos` (
  `ordem_servico_id` int(11) NOT NULL,
  `ordem_servico_forma_pagamento_id` int(11) DEFAULT NULL,
  `ordem_servico_membro_id` int(11) DEFAULT NULL,
  `ordem_servico_data_emissao` timestamp NULL DEFAULT current_timestamp(),
  `ordem_servico_data_conclusao` varchar(100) DEFAULT NULL,
  `ordem_servico_valor_desconto` varchar(25) DEFAULT NULL,
  `ordem_servico_valor_total` varchar(25) DEFAULT NULL,
  `ordem_servico_status` tinyint(1) DEFAULT NULL,
  `ordem_servico_obs` tinytext DEFAULT NULL,
  `ordem_servico_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ordens_servicos`
--

INSERT INTO `ordens_servicos` (`ordem_servico_id`, `ordem_servico_forma_pagamento_id`, `ordem_servico_membro_id`, `ordem_servico_data_emissao`, `ordem_servico_data_conclusao`, `ordem_servico_valor_desconto`, `ordem_servico_valor_total`, `ordem_servico_status`, `ordem_servico_obs`, `ordem_servico_data_alteracao`) VALUES
(3, 2, 5, '2021-01-01 12:22:31', NULL, 'R$ 10.00', '290.00', 0, 'Tuuto ok', '2021-01-01 12:44:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_categoria_id` int(11) NOT NULL,
  `post_meta_link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `post_data` date DEFAULT NULL,
  `post_descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `post_body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_legenda` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_frame` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_ativo` tinyint(1) NOT NULL,
  `post_destaque` tinyint(1) DEFAULT NULL,
  `post_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`post_id`, `post_categoria_id`, `post_meta_link`, `post_titulo`, `post_data`, `post_descricao`, `post_body`, `post_legenda`, `post_frame`, `post_ativo`, `post_destaque`, `post_data_alteracao`) VALUES
(1, 1, 'aula-de-cabala', 'Aula de Cabala', '2021-02-20', 'Aula de Cabala Aula de Cabala Aula de Cabala', 'Aula de CabalaAula de CabalaAula de Cabala Aula de CabalaAula de Cabala\r\nAula de CabalaAula de CabalaAula de CabalaAula de CabalaAula de Cabala\r\nAula de CabalaAula de CabalaAula de CabalaAula de CabalaAula de CabalaAula de Cabala\r\nAula de CabalaAula de CabalaAula de CabalaAula de CabalaAula de Cabala', 'aula de cabala', 'Aula de CabalaAula de CabalaAula de Cabala', 1, 1, '2021-02-20 11:52:31'),
(2, 1, 'aula-de-cabala', 'Aula de Cabala', '2021-02-20', 'Aula de Cabala Aula de Cabala Aula de Cabala', 'Aula de CabalaAula de CabalaAula de Cabala Aula de CabalaAula de Cabala\r\nAula de CabalaAula de CabalaAula de CabalaAula de CabalaAula de Cabala\r\nAula de CabalaAula de CabalaAula de CabalaAula de CabalaAula de CabalaAula de Cabala\r\nAula de CabalaAula de CabalaAula de CabalaAula de CabalaAula de Cabala', 'aula de cabala', 'Aula de CabalaAula de CabalaAula de Cabala', 1, 1, '2021-02-20 11:52:43'),
(3, 1, 'aula-de-torah', 'aula de torah', '2021-02-20', 'aula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torah', 'aula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torah', 'aula de torah', 'aula de torahaula de torahaula de torah', 1, 1, '2021-02-20 12:58:40'),
(4, 1, 'aula de torah', 'aula de torah', '2021-02-20', 'aula de torahaula de torahaula de torahaula de torah', 'aula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torah', 'aula de torah', 'aula de torahaula de torah', 1, 1, '2021-02-20 12:59:11'),
(5, 1, 'aula de torah', 'aula de torah', '2021-02-20', 'aula de torahaula de torahaula de torahaula de torahaula de torahaula de torah', 'aula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torahaula de torah', 'aula de torah', 'aula de torah', 1, 1, '2021-02-20 12:59:56'),
(6, 1, 'aula-due', 'aula-dueaula-dueaula', '2021-02-20', 'aula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-due', 'aula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-dueaula-due', 'aula-due', 'aula-dueaula-dueaula-dueaula-due', 1, 1, '2021-02-20 13:10:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_fotos`
--

CREATE TABLE `produtos_fotos` (
  `foto_id` int(11) NOT NULL,
  `foto_produto_id` int(11) DEFAULT NULL,
  `foto_caminho` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos_fotos`
--

INSERT INTO `produtos_fotos` (`foto_id`, `foto_produto_id`, `foto_caminho`) VALUES
(1, 1, 'foto1.jpg'),
(2, 2, 'foto2.jpg'),
(3, 3, 'foto1.jpg'),
(4, 4, 'foto2.jpg'),
(5, 5, 'foto1.jpg'),
(6, 6, 'foto6.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `professor_id` int(11) NOT NULL,
  `professor_nome_completo` varchar(250) NOT NULL,
  `professor_celular` varchar(20) NOT NULL,
  `professor_email` varchar(250) NOT NULL,
  `professor_ativo` tinyint(1) NOT NULL,
  `professor_obs` text NOT NULL,
  `professor_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`professor_id`, `professor_nome_completo`, `professor_celular`, `professor_email`, `professor_ativo`, `professor_obs`, `professor_data_alteracao`) VALUES
(2, 'Uriel Barzilay', '(74) 58855-5555', 'uriel@outlook.com', 1, '', '2020-12-31 16:44:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `sistema_id` int(11) NOT NULL,
  `sistema_razao_social` varchar(145) DEFAULT NULL,
  `sistema_nome_fantasia` varchar(145) DEFAULT NULL,
  `sistema_cnpj` varchar(25) DEFAULT NULL,
  `sistema_ie` varchar(25) DEFAULT NULL,
  `sistema_telefone_fixo` varchar(25) DEFAULT NULL,
  `sistema_telefone_movel` varchar(25) NOT NULL,
  `sistema_email` varchar(100) DEFAULT NULL,
  `sistema_site_url` varchar(100) DEFAULT NULL,
  `sistema_cep` varchar(25) DEFAULT NULL,
  `sistema_endereco` varchar(145) DEFAULT NULL,
  `sistema_numero` varchar(25) DEFAULT NULL,
  `sistema_cidade` varchar(45) DEFAULT NULL,
  `sistema_estado` varchar(2) DEFAULT NULL,
  `sistema_txt_ordem_servico` tinytext DEFAULT NULL,
  `sistema_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`sistema_id`, `sistema_razao_social`, `sistema_nome_fantasia`, `sistema_cnpj`, `sistema_ie`, `sistema_telefone_fixo`, `sistema_telefone_movel`, `sistema_email`, `sistema_site_url`, `sistema_cep`, `sistema_endereco`, `sistema_numero`, `sistema_cidade`, `sistema_estado`, `sistema_txt_ordem_servico`, `sistema_data_alteracao`) VALUES
(1, 'SISEC - Sociedade ', 'Joao Vendedor', '51.651.120/3202-30', '1.619.6216513', '(85) 9886-0128', '(85) 98860-1287', 'sisec@gmail.com', 'www.sisec.com', '89855-499', 'rua sao paolo', '200A', 'fortaleza', 'ce', 'stewesdfa', '2021-01-01 13:40:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_categorias`
--

CREATE TABLE `sub_categorias` (
  `sub_categoria_id` int(11) NOT NULL,
  `categoria_sub_categoria_id` int(11) NOT NULL,
  `sub_categoria_nome` varchar(45) DEFAULT NULL,
  `sub_categoria_ativa` int(11) DEFAULT NULL,
  `sub_categoria_data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `sub_catagoria_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$N4imie5rRwui1zjNmom8A.3Gy.QCLtjNEvy.UztlCG1kRedIMZ6Ey', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1613948292, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'antonio.daleo', '$2y$12$mC240j.GEjF2165GP0aCTOxtZg6pwKmbQDzpx/5NgM2pbRQrA6vD6', 'antoniodaleo@outlook.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1609229725, 1609834684, 1, 'antonio', 'daleo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`conta_pagar_id`),
  ADD KEY `fk_conta_pagar_id_fornecedor` (`conta_pagar_fornecedor_id`);

--
-- Índices para tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`conta_receber_id`),
  ADD KEY `conta_receber_membro_id` (`conta_receber_membro_id`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`curso_id`);

--
-- Índices para tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  ADD PRIMARY KEY (`forma_pagamento_id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`fornecedor_id`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`membro_id`);

--
-- Índices para tabela `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  ADD PRIMARY KEY (`ordem_ts_id`),
  ADD KEY `fk_ordem_ts_id_servico` (`ordem_ts_id_curso`),
  ADD KEY `fk_ordem_ts_id_ordem_servico` (`ordem_ts_id_ordem_servico`);

--
-- Índices para tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  ADD PRIMARY KEY (`ordem_servico_id`),
  ADD KEY `fk_ordem_servico_id_cliente` (`ordem_servico_membro_id`),
  ADD KEY `fk_ordem_servico_id_forma_pagto` (`ordem_servico_forma_pagamento_id`);

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_post_categoria_id` (`post_categoria_id`);

--
-- Índices para tabela `produtos_fotos`
--
ALTER TABLE `produtos_fotos`
  ADD PRIMARY KEY (`foto_id`),
  ADD KEY `fk_foto_produto_id` (`foto_produto_id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`professor_id`);

--
-- Índices para tabela `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`sistema_id`);

--
-- Índices para tabela `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD PRIMARY KEY (`sub_categoria_id`),
  ADD KEY `fk_cat_sub_id` (`categoria_sub_categoria_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Índices para tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `conta_pagar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `conta_receber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `formas_pagamentos`
--
ALTER TABLE `formas_pagamentos`
  MODIFY `forma_pagamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `fornecedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `membro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  MODIFY `ordem_ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  MODIFY `ordem_servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produtos_fotos`
--
ALTER TABLE `produtos_fotos`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `professor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sistema`
--
ALTER TABLE `sistema`
  MODIFY `sistema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sub_categorias`
--
ALTER TABLE `sub_categorias`
  MODIFY `sub_categoria_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD CONSTRAINT `fk_conta_pagar_id_fornecedor` FOREIGN KEY (`conta_pagar_fornecedor_id`) REFERENCES `fornecedores` (`fornecedor_id`);

--
-- Limitadores para a tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD CONSTRAINT `conta_receber_membro_id` FOREIGN KEY (`conta_receber_membro_id`) REFERENCES `membros` (`membro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ordens_servicos`
--
ALTER TABLE `ordens_servicos`
  ADD CONSTRAINT `ordens_servicos_ibfk_1` FOREIGN KEY (`ordem_servico_membro_id`) REFERENCES `membros` (`membro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_categoria_id` FOREIGN KEY (`post_categoria_id`) REFERENCES `categorias` (`categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sub_categorias`
--
ALTER TABLE `sub_categorias`
  ADD CONSTRAINT `fk_cat_sub_id` FOREIGN KEY (`categoria_sub_categoria_id`) REFERENCES `categorias` (`categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
