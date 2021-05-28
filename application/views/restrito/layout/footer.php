  <?php if($this->router->fetch_class() != 'login' ):  ?>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
    </footer>

  <?php endif;  ?>

    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url('assets/js/app.min.js') ?>"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>


  <script src="<?php echo base_url('assets/js/util.js') ?>"></script>

  
  <!-- Scripts che mando attraverso del Controller -->
  <?php if(isset($scripts)) : ?>
      <?php foreach($scripts as $script): ?>
        
          <script src="<?php echo base_url('assets/'.$script) ?>"></script>

      <?php endforeach; ?>
  <?php endif; ?>


  <!-- Custom JS File -->
  <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>


  <script>
      $('.delete').on("click", function(event){
        event.preventDefault(); 

        var choice = confirm($(this).attr('data-confirm')); 

        if(choice){
          window.location.href = $(this).attr('href'); 
        }
      });

  </script>
  <!-- Script para colocar o editor de testo no post -->
  <script src="<?php echo base_url('assets/ckeditor/build/ckeditor.js') ?>"></script>
  <script>
     ClassicEditor
			.create( document.querySelector( '#post_body' ), {
				
				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'link',
						'bulletedList',
						'numberedList',
						'|',
						'indent',
						'outdent',
						'|',
						'blockQuote',
						'insertTable',
						'undo',
						'redo'
					]
				},
				language: 'pt-br',
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells'
					]
				},
				licenseKey: '',
				
			} )
			.then( editor => {
				window.editor = editor;
					
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 3qxixuj0jjak-qrolc6ajm7ow' );
				console.error( error );
			} );
  </script>


</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
</html>