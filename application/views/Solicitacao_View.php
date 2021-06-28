
<div class="row">
	<div class="col-lg-6">
		<div id="bg-text-home" class="p-4">
			<h1 class="mt-4">Formulário de solicitação da segregação da taxa</h1>
			<hr>
			<h5>Os campos marcados com <span class="text-danger">*</span> são obrigatórios.</h5>
			<h5>Em caso de dúvidas posicione o mouse sobre o ícone <i class="fas fa-question-circle" data-toggle="tooltip" title="Este ícone pode ajudá-lo no preenchimento de determinados campos."></i></h5>
			<?php 
				$atributos = array('id' => 'formulario_inscricao','class' => 'formulario_inscricao', 'autocomplete' => "off");
				echo form_open_multipart('Home/Cadastrar', $atributos);
			?>				
			<div class="form-group">
				<label for="txtNome"><h4><span class="text-danger">*</span>1 - Nome Completo</h4></label>
				<input type="text" class="form-control" id="txtNome" name="txtNome" value="<?php echo set_value('txtNome'); ?>">
			</div>
			<div class="form-group">
				<label for="txtEmail"><h4><span class="text-danger">*</span>2 - E-Mail</h4></label>
				<input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?php echo set_value('txtEmail'); ?>">
			</div>
			<div class="form-group">
				<label for="txtConfirmarEmail"><h4><span class="text-danger">*</span>3 - Confirmar E-Mail</h4></label>
				<div class="alert alert-danger">
					<i class="fas fa-exclamation-triangle"></i> Atenção!
				    <hr>
				    Você deve digitar seu e-mail novamente. Não copiar e colar.
				</div>
				<input type="text" class="form-control" id="txtConfirmarEmail" name="txtConfirmarEmail" value="<?php echo set_value('txtConfirmarEmail'); ?>">
			</div>
			<div class="form-group">
				<label for="txtTelefone"><h4><span class="text-danger">*</span>4 - Telefone</h4></label>
				<input type="text" class="form-control" id="txtTelefone" name="txtTelefone" value="<?php echo set_value('txtTelefone'); ?>">
			</div>
			<div class="form-group">
				<label for="txtRG"><h4><span class="text-danger">*</span>5 - RG</h4></label>
				<input type="text" class="form-control" id="txtRG" name="txtRG" value="<?php echo set_value('txtRG'); ?>">
			</div>
			<div class="form-group">
				<label for="txtCPF"><h4><span class="text-danger">*</span>6 - CPF</h4></label>
				<input type="text" class="form-control" id="txtCPF" name="txtCPF" value="<?php echo set_value('txtCPF'); ?>">
			</div>
			<div class="form-group">
				<label for="txtCEP"><h4><span class="text-danger">*</span>7 - CEP <i class="fas fa-question-circle" data-toggle="tooltip" title="Ao digitar o CEP, os campos Rua, Bairro, Cidade e Estado serão automaticamente preenchidos. Caso isso não ocorra você poderá digitar normalmente."></i></h4></label>
				<input type="text" class="form-control" id="txtCEP" name="txtCEP" value="<?php echo set_value('txtCEP'); ?>">
			</div>
			<div class="form-group">
				<label for="txtEndereco"><h4><span class="text-danger">*</span>8 - Rua</h4></label>
				<input type="text" class="form-control" id="txtEndereco" name="txtEndereco" value="<?php echo set_value('txtEndereco'); ?>">
			</div>
			<div class="form-group">
				<label for="txtNumero"><h4><span class="text-danger">*</span>9 - Número</h4></label>
				<input type="text" class="form-control" id="txtNumero" name="txtNumero" value="<?php echo set_value('txtNumero'); ?>">
			</div>
			<div class="form-group">
				<label for="txtComplemento"><h4>10 - Complemento</h4></label>
				<input type="text" class="form-control" id="txtComplemento" name="txtComplemento" value="<?php echo set_value('txtComplemento'); ?>">
			</div>
			<div class="form-group">
				<label for="txtBairro"><h4><span class="text-danger">*</span>11 - Bairro</h4></label>
				<input type="text" class="form-control" id="txtBairro" name="txtBairro" value="<?php echo set_value('txtBairro'); ?>">
			</div>
			<div class="form-group">
				<label for="txtCidade"><h4><span class="text-danger">*</span>12 - Cidade</h4></label>
				<input type="text" class="form-control" id="txtCidade" name="txtCidade" value="<?php echo set_value('txtCidade'); ?>">
			</div>
			<div class="form-group">
				<label for="selectEstado"><h4><span class="text-danger">*</span>13 - Estado</h4></label>
				<select name="selectEstado" id="selectEstado" class="form-control">
					<option value="">Escolha o Estado (UF)</option>
					<option value="AC"             <?php echo set_select('selectEstado', 'AC'); ?>>Acre</option>
					<option value="AL"          <?php echo set_select('selectEstado', 'AL'); ?>>Alagoas</option>
					<option value="AP"   		 <?php echo set_select('selectEstado', 'AP'); ?>>Amapá</option>
					<option value="AM" 		 <?php echo set_select('selectEstado', 'AM'); ?>>Amazonas</option>
					<option value="BA"   		 <?php echo set_select('selectEstado', 'BA'); ?>>Bahia</option>
					<option value="CE"   		 <?php echo set_select('selectEstado', 'CE'); ?>>Ceará</option>
					<option value="DF" <?php echo set_select('selectEstado', 'DF'); ?>>Distrito Federal</option>
					<option value="ES"   <?php echo set_select('selectEstado', 'ES'); ?>>Espírito Santo</option>
					<option value="GO"            <?php echo set_select('selectEstado', 'GO'); ?>>Goiás</option>
					<option value="MA"         <?php echo set_select('selectEstado', 'MA'); ?>>Maranhão</option>
					<option value="MT"      <?php echo set_select('selectEstado', 'MT'); ?>>Mato Grosso</option>
					<option value="MS" <?php echo set_select('selectEstado', 'MS'); ?>>Mato Grosso do Sul</option>
					<option value="MG"       <?php echo set_select('selectEstado', 'MG'); ?>>Minas Gerais</option>
					<option value="PA"               <?php echo set_select('selectEstado', 'PA'); ?>>Pará</option>
					<option value="PB"            <?php echo set_select('selectEstado', 'PB'); ?>>Paraíba</option>
					<option value="PR"			   <?php echo set_select('selectEstado', 'PR'); ?>>Paraná</option>
					<option value="PE"         <?php echo set_select('selectEstado', 'PE'); ?>>Pernambuco</option>
					<option value="PI"              <?php echo set_select('selectEstado', 'PI'); ?>>Piauí</option>
					<option value="RJ"     <?php echo set_select('selectEstado', 'RJ'); ?>>Rio de Janeiro</option>
					<option value="RS"  <?php echo set_select('selectEstado', 'RS'); ?>>Rio Grande do Sul</option>
					<option value="RN"<?php echo set_select('selectEstado', 'RN'); ?>>Rio Grande do Norte</option>
					<option value="RO"		   <?php echo set_select('selectEstado', 'RO'); ?>>Rondônia</option>
					<option value="RR"            <?php echo set_select('selectEstado', 'RR'); ?>>Roraima</option>
					<option value="SC"     <?php echo set_select('selectEstado', 'SC'); ?>>Santa Catarina</option>
					<option value="SP"          <?php echo set_select('selectEstado', 'SP'); ?>>São Paulo</option>
					<option value="SE"            <?php echo set_select('selectEstado', 'SE'); ?>>Sergipe</option>
					<option value="TO"          <?php echo set_select('selectEstado', 'TO'); ?>>Tocantins</option>
				</select>
			</div>
			<div class="form-group">
				<label for="txtCDC"><h4><span class="text-danger">*</span>14 - CDC</h4></label>
				<input type="text" class="form-control" id="txtCDC" name="txtCDC" value="<?php echo set_value('txtCDC'); ?>">
			</div>
			<div class="form-group">
				<label for="selectPagamento"><h4><span class="text-danger">*</span>15 - Forma de pagamento</h4></label>
				<select name="selectPagamento" id="selectPagamento" class="form-control">
					<option value="">Escolha uma opção</option>
					<option value="PAGAMENTO UNICO" <?php echo set_select('selectPagamento', 'PAGAMENTO UNICO'); ?>>    Pagamento em parcela única anual</option>
					<option value="PARCELADO" 		<?php echo set_select('selectPagamento', 'PARCELADO'); ?>>Pagamento em parcelas mensais</option>
				</select>
			</div>
			<div class="form-group">
				<label for="fileRG"><h4><span class="text-danger">*</span>16 - Cópia do RG</h4></label>
				<div class="file-drop-area">
					<span class="fake-btn shadow">Escolha a imagem</span>
					<span class="file-msg">ou arraste e solte aqui</span>
					<input class="file-input" type="file" id="fileRG" name="fileRG">
				</div>
				<h6><small class="text p-1" id="fileRG">Formatos permitidos: jpg, jpeg e png. Tamanho máximo: 2MB</small></h6>
			</div>
			<div class="form-group">
				<label for="fileCPF"><h4><span class="text-danger">*</span>17 - Cópia do CPF</h4></label>
				<div class="file-drop-area">
					<span class="fake-btn shadow">Escolha a imagem</span>
					<span class="file-msg">ou arraste e solte aqui</span>
					<input class="file-input" type="file" id="fileCPF" name="fileCPF">
				</div>
				<h6><small class="text p-1" id="fileCPF">Formatos permitidos: jpg, jpeg e png. Tamanho máximo: 2MB</small></h6>
			</div>
			<div class="form-group">
				<label for="fileContaAgua"><h4><span class="text-danger">*</span>18 - Cópia da conta de água em nome do requerente</h4></label>
				<div class="file-drop-area">
					<span class="fake-btn shadow">Escolha a imagem</span>
					<span class="file-msg">ou arraste e solte aqui</span>
					<input class="file-input" type="file" id="fileContaAgua" name="fileContaAgua">
				</div>
				<h6><small class="text p-1" id="fileContaAgua">Formatos permitidos: jpg, jpeg e png. Tamanho máximo: 2MB</small></h6>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success mb-2">Inscrever-se</button>
			</div>
			<?php 
				echo form_close();
			?>			
		</div>
	</div>	
</div>	        

	<script>
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip();

		    //Funções para popular campos à partir do CEP
			  function limpa_formulário_cep() {
					// Limpa valores do formulário de cep.
					$("#txtEndereco").val("");
					$("#txtBairro").val("");
					$("#txtCidade").val("");
					$("#txtEstado").val("");
			  }
			  
			  //Quando o campo cep perde o foco.
			  $("#txtCEP").blur(function() {

					//Nova variável "cep" somente com dígitos.
					var cep = $(this).val().replace(/\D/g, '');

					//Verifica se campo cep possui valor informado.
					if (cep != "") {

						 //Expressão regular para validar o CEP.
						 var validacep = /^[0-9]{8}$/;

						 //Valida o formato do CEP.
						 if(validacep.test(cep)) {

							  //Preenche os campos com "..." enquanto consulta webservice.
							  $("#txtEndereco").val("");
							  $("#txtBairro").val("");
							  $("#txtCidade").val("");
							  $("#selectEstado").val("");

							  //Consulta o webservice viacep.com.br/
							  $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

									if (!("erro" in dados)) {
										 //Atualiza os campos com os valores da consulta.
										 $("#txtEndereco").val(dados.logradouro);
										 $("#txtBairro").val(dados.bairro);
										 $("#txtCidade").val(dados.localidade);
										 $("#selectEstado").val(dados.uf);
									} //end if.
									else {
										 //CEP pesquisado não foi encontrado.
										 limpa_formulário_cep();
										 //alert("CEP não encontrado.");
										 //$('#myModal').modal();
									}
							  });
						 } //end if.
						 else {
							  //CEP é inválido.
							  limpa_formulário_cep();
							  //$('#myModal').modal();
						 }
					} //end if.
					else {
						 //CEP sem valor, limpa formulário.
						 limpa_formulário_cep();
					}
			});
		});
	</script>