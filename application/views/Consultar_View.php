<div class="row">
	<div class="col-lg-6">
		<div id="bg-text-home" class="p-4">
			<h1 class="mt-4">Consultar solicitação de segregação da taxa de coleta, remoção, transporte, destinação e disposição final ambientalmente adequada de resíduos sólidos urbanos</h1>
			<hr>
		    <div class="row">
		      	<div class="col-lg-12">
		      		<?php 
						$atributos = array('id' => 'formulario_consultar','class' => 'formulario_consultar', 'autocomplete' => "off"); 
			  			echo form_open('Home/Buscar', $atributos); 
					?>
		      		<div class="form-group">
		      			<label for="txtCDC"><h4>CDC</h4></label>
		      			<input type="text" class="form-control" id="txtCDC" name="txtCDC">
		      		</div>
		      		<div class="form-group">
						<button type="submit" class="btn btn-success mb-2">Consultar</button>
					</div>
					<?php 
						echo form_close();
					?>
					<hr>
                        <div class="row">
                            <div class="col-lg-12 text-center justify-content-center">
                                <br>
                                <h6>Prefeitura do Município de *****</h6>
                                <span>Av. Endereço, 1234 - Bairro</span>
                                <br>
                                <span>Cidade - Estado</span>
                            </div>
                        </div>
                    <hr>
		      	</div>
		    </div>    		
		</div>		
	</div>
</div>          