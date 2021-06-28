					</div>
	    		<div class="col-lg-6"></div>
	    	</div>
	    </div>
	</section>

	<?php //if(!$validBrowser){ ?>

	<!-- Modal -->
	<!-- <div class="modal fade" id="modalBrowser" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Alerta!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <h6>Verificamos que você não está usando um navegador recomendado. Para efetuar sua inscrição utilize um dos navegadores abaixo.</h6>
	        <div class="row">
	        	<div class="col-lg-12">
	        		<a target="_blank" href="https://www.google.com/intl/pt-BR/chrome/" class="btn btn-outline-primary btn-block mb-1 btn-sm" role="button"><i class="fab fa-chrome"></i> Google Chrome</a>
	        	</div>
	        	<div class="col-lg-12">
	        		<a target="_blank" href="https://www.mozilla.org/pt-BR/firefox/new/" class="btn btn-outline-primary btn-block mb-1 btn-sm" role="button"><i class="fab fa-firefox"></i> Mozilla Firefox</a>
	        	</div>
	        	<div class="col-lg-12">
	        		<a target="_blank" href="https://www.opera.com/pt-br" class="btn btn-outline-primary btn-block mb-1 btn-sm" role="button"><i class="fab fa-opera"></i> Opera</a>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
	      </div>
	    </div>
	  </div>
	</div> -->

	<script>
		// $('#modalBrowser').modal();
	</script>

	<?php //} ?>

	<script>
		var options = {
		    onKeyPress: function (phone, e, field, options) {
		        var masks = ['(00) 0000-00000', '(00) 00000-0000'];
		        var mask = (phone.length > 14) ? masks[1] : masks[0];
		        $('#txtTelefone').mask(mask, options);
		    }
		};

		$('#txtTelefone').mask('(00) 0000-00000', options);
		$('#txtData').mask('00/00/0000');
		$('#txtCPF').mask('00000000000');
		$('#txtRG').mask('AAAAAAAAA');
		$('#txtCEP').mask('00000000');
	</script>

	<script>
		var $fileInput = $('.file-input');
		var $droparea = $('.file-drop-area');

		$fileInput.on('dragenter focus click', function() {
		$droparea.addClass('is-active');
		});

		$fileInput.on('dragleave blur drop', function() {
		$droparea.removeClass('is-active');
		});

		$fileInput.on('change', function() {
		var filesCount = $(this)[0].files.length;
		var $textContainer = $(this).prev();

		if (filesCount === 1) {
			var fileName = $(this).val().split('\\').pop();
			$textContainer.text(fileName);
		} else {
			$textContainer.text(filesCount + ' arquivos selecionados.');
		}
		});
	</script>

	<?php if(isset($errors)){ ?>

	<!-- Modal -->
	<div class="modal fade" id="modalErrors" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Alerta!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">	      	
	        <?php
				print_r($errors);
				print_r($errorsupload);
			?>	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script>
		$('#modalErrors').modal();
	</script>

	<?php } ?>

	<div id="modal-alerta" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Alerta!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>
	        	<?php if($this->session->flashdata('Alerta')){ ?>
				<?php echo $this->session->flashdata('Alerta'); ?>
				<?php } ?>	        	
	        </p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<?php if($this->session->flashdata('Alerta')){ ?>
	<script>
		$('#modal-alerta').modal({backdrop: 'static', keyboard: false});		
	</script>	
	<?php } ?>

</body>

</html>