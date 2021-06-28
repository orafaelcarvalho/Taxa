<div id="bg-text-home" class="p-4">
	<h1 class="mt-4">Solicitações</h1>
	<hr>
	<div class="row">
		<div class="col text-right">
			<h6><span class="badge badge-pill badge-success">Atendida</span></h6>
			<h6><span class="badge badge-pill badge-danger">Pendente</span></h6>
		</div>
	</div>
	<div id="no-more-tables">
		<table id="myTable" class="table table-hover table-sm">
			<?php 
				if((isset($solicitacoes)) AND ($solicitacoes <> false))
				{
			?>
			<thead>
				<tr>
					<th>Data</th>
					<th>Nome</th>
					<th>CPF</th>
					<th>CDC</th>
					<th>Endereço</th>
					<th>Bairro</th>
					<th>Pagamento</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//var_dump($solicitacoes);
					foreach ($solicitacoes as $key) {
						$datsol			= $key->datsol;
						$datsol			= strftime('%d/%m/%Y', strtotime($datsol));
						$nomsol			= $key->nomsol;
						$cpfsol			= $key->cpfsol;
						$cdcsol			= $key->cdcsol;
						$endsol			= $key->endsol;
						$nensol			= $key->nensol;
						$baisol			= $key->baisol;
						$pgtsol 		= $key->pgtsol;
						$status 		= $key->status;

						if($status==1){
							$class = "table-success";
						}
						else{
							$class = "table-danger";
						}
				?>

				<tr class="<?php echo $class; ?>">
					<td data-title="Data" class="align-middle"><?php echo $datsol; ?></td>
					<td data-title="Nome" class="align-middle"><?php echo $nomsol; ?></td>
					<td data-title="CPF" class="align-middle"><?php echo $cpfsol; ?></td>
					<td data-title="CDC" class="align-middle"><?php echo $cdcsol; ?></td>
					<td data-title="Endereço" class="align-middle"><?php echo $endsol.", ".$nensol; ?></td>
					<td data-title="Bairro" class="align-middle"><?php echo $baisol; ?></td>
					<td data-title="Pagamento" class="align-middle"><?php echo $pgtsol; ?></td>
					<td data-title="Opções" class="align-middle">
						<form action="">
							<a class="btn btn-info btn-sm btn-block" type="submit" href="<?php echo base_url().'Gerenciador/Detalhes/'.$cdcsol;?>">Detalhes</a>
						</form>
					</td>
					<!--<td>
						<button class="btn btn-warning btn-sm">Detalhes</button>
					</td>-->
				</tr>

				<?php
						}
					}
					else
					{
				?>

				<thead>
					<tr>
						<th>Nome</th>
						<th>E-Mail</th>
						<th>Telefone</th>
						<th>RG</th>
					</tr>
				</thead>
				<tr class="text-center">
					<td colspan="4">
						Nenhum registro disponível.
					</td>
				</tr>

				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<script>
	$(document).ready( function () {
	    $('#myTable').DataTable({
	    	"order": [[ 0, "desc" ]],
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
	        ],

			"language": {
                "url": "<?php echo $app['app-layout'].'/assets/js/datatable-pt-br.js' ?>",
                buttons: {
                    copyTitle: 'Dados copiados',
                    copyKeys: 'Use your keyboard or menu to select the copy command',
                    copySuccess: {
                        1: "Uma linha copiada para a área de transferência",
                        _: "%d linhas copiadas para a área de transferência"
                    }
                }
            }

	    });
	} );
</script>