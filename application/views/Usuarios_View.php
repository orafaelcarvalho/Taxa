<div id="bg-text-home" class="p-4">
	<h1 class="mt-4">Comunidade Cultural de ****</h1>
	<hr>
	<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adicionarusuario">
		<i class="fa fa-plus"></i>
	</button>
	<!-- Modal -->
	<div class="modal fade" id="adicionarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Adicionar usuário</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      	<?php 
				$atributos = array('id' => 'formulario_inscricao','class' => 'formulario_inscricao', 'autocomplete' => "off"); 
				echo form_open('Gerenciador/CadastrarUsuario', $atributos); 
			?>	
		      <div class="modal-body">
		        <div class="form-group">
	            	<label for="txtCPF"><h4>CPF</h4></label>
	            	<input type="text" class="form-control" id="txtCPF" name="txtCPF" value="<?php echo set_value('txtCPF'); ?>">
	          	</div>
	          	<div class="form-group">
	            	<label for="txtNome"><h4>Nome</h4></label>
	            	<input type="text" class="form-control" id="txtNome" name="txtNome" value="<?php echo set_value('txtNome'); ?>">
	          	</div>
	          	<div class="form-group">
				    <label for="selectTipo">Tipo</label>
				    <select class="form-control" id="selectTipo" name="selectTipo">
				    	<option value="">Escolha o tipo</option>
				      	<option value="1" <?php echo set_select('selectTipo', '1'); ?>>Administrador</option>
				      	<option value="2" <?php echo set_select('selectTipo', '2'); ?>>Comum</option>
				    </select>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
		        <button type="submit" class="btn btn-success">Salvar</button>
		      </div>
		    <?php
		    	echo form_close();
		    ?>
	    </div>
	  </div>
	</div>
	<hr>
	<table id="myTable" class="table">
		<thead>
			<tr>
				<th>Nome</th>
				<th>CPF</th>
				<th>Tipo</th>
				<th>Detalhes</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if((isset($usuarios)) AND ($usuarios <> false))
				{
					foreach ($usuarios as $key) {
						$nome			= $key->nome;
						$cpf  			= $key->cpf;
						$tipo			= $key->tipo;

						if($tipo == 1)
						{
							$tipoaux = "Administrador";
						}
						else
						{
							$tipoaux = "Comum";
						}
			?>

			<tr>				
				<td><?php echo $nome; ?></td>
				<td><?php echo $cpf; ?></td>				
				<td><?php echo $tipoaux; ?></td>
				<td>
					<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="<?php echo "#editarusuario_".$cpf ?>">Detalhes</button>
					<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="<?php echo "#zerarsenha_".$cpf ?>">Zerar Senha</button>
					<div class="modal fade" id="<?php echo "editarusuario_".$cpf ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Alterar usuário</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      	<?php 
								$atributos = array('id' => 'formulario_alterarusuario_'.$cpf,'class' => 'formulario_alterarusuario_'.$cpf, 'autocomplete' => "off"); 
								echo form_open('Gerenciador/AlterarUsuario', $atributos); 
							?>	
						      <div class="modal-body">
						        <div class="form-group">
					            	<label for="txtCPF"><h4>CPF</h4></label>
					            	<input disabled="disabled" type="text" class="form-control" value="<?php echo $cpf?>">
					            	<input type="hidden" class="form-control" id="txtCPF" name="txtCPF" value="<?php echo $cpf?>">
					          	</div>
					          	<div class="form-group">
					            	<label for="txtNome"><h4>Nome</h4></label>
					            	<input type="text" class="form-control" id="txtNome" name="txtNome" value="<?php echo $nome; ?>">
					          	</div>
					          	<div class="form-group">
								    <label for="selectTipo">Tipo</label>
								    <select class="form-control" id="selectTipo" name="selectTipo">
								    	<option value="">Escolha o tipo</option>
								      	<option value="1" <?php if($tipo == 1){echo "selected";} ?>>Administrador</option>
								      	<option value="2" <?php if($tipo == 2){echo "selected";} ?>>Comum</option>
								    </select>
								</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
						        <button type="submit" class="btn btn-success" form="<?php echo "formulario_alterarusuario_".$cpf ?>">Salvar</button>
						      </div>
						    <?php
						    	echo form_close();
						    ?>
					    </div>
					  </div>
					</div>
					<div class="modal fade" id="<?php echo "zerarsenha_".$cpf ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Zerar senha de usuário</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      	<?php 
								$atributos = array('id' => 'formulario_zerarsenha_'.$cpf,'class' => 'formulario_zerarsenha_'.$cpf, 'autocomplete' => "off"); 
								echo form_open('Gerenciador/ZerarSenha', $atributos); 
							?>	
						      <div class="modal-body">
						        <div class="form-group">
					            	<label for="txtCPF"><h4>CPF</h4></label>
					            	<input disabled="disabled" type="text" class="form-control" value="<?php echo $cpf?>">
					            	<input type="hidden" class="form-control" id="txtCPF" name="txtCPF" value="<?php echo $cpf?>">
					          	</div>
					          	<div class="form-group">
					            	<label for="txtNome"><h4>Nome</h4></label>
					            	<input disabled="disabled" type="text" class="form-control" id="txtNome" name="txtNome" value="<?php echo $nome; ?>">
					          	</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
						        <button type="submit" class="btn btn-success" form="<?php echo "formulario_zerarsenha_".$cpf ?>">Confirmar</button>
						      </div>
						    <?php
						    	echo form_close();
						    ?>
					    </div>
					  </div>
					</div>
				</td>
			</tr>

			<?php
					}
				}
				else
				{
			?>

			<tr class="text-center">
				<td colspan="5">
					Nenhum registro disponível.
				</td>
			</tr>

			<?php
				}
			?>
		</tbody>
	</table>
</div>

<script>
	$(document).ready( function () {
	    $('#myTable').DataTable({
	    	"order": [[ 0, "asc" ]],
		    "language": {
	            "lengthMenu": "Mostrando _MENU_ registros por página",
	            "zeroRecords": "Nenhum registro disponível",
	            "info": "Página _PAGE_ de _PAGES_",
	            "infoEmpty": "Nenhum registro disponível",
	            "infoFiltered": "(Total de _MAX_ registros)",
	            "search":         "Buscar:",
			    "paginate": {
			        "first":      "Primeira",
			        "last":       "Última",
			        "next":       "Próxima",
			        "previous":   "Anterior"
			    }
	        },
	        responsive: true,
	        "lengthChange": false,
	        dom: 'Bfrtip',
	        buttons: [
	            {
	            	extend: "copy",
	                text: 'Copiar',
	                className: 'btn btn-secondary btn-sm'
	            },
	            {
	            	extend: "csv",
	                text: 'CSV',
	                className: 'btn btn-secondary btn-sm'
	            },
	            {
	            	extend: "excel",
	                text: 'XLS',
	                className: 'btn btn-secondary btn-sm'
	            },
	            /*{
	            	extend: "pdf",
	                text: 'PDF',
	                orientation: 'landscape',
	                className: 'btn btn-danger btn-sm'
	            }*/
	        ]
	    });
	} );
</script>