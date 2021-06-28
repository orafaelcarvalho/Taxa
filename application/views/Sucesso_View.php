<div class="row">
	<div class="col-lg-6">
		<div id="bg-text-home" class="p-4">
			<h1 class="mt-4">Solicitação efetuada com sucesso!</h1>
			<?php 
				$codsol = $requerente['codsol'];
				$datsol = $requerente['datsol'];
				$nomsol = $requerente['nomsol'];
				$nrgsol = $requerente['nrgsol'];
				$cpfsol = $requerente['cpfsol'];
				$cdcsol = $requerente['cdcsol'];
				$numcad = $requerente['numcad'];
				$status = $requerente['status'];
				$class  = $requerente['class'];
			?>
			<hr>
			<p class="h5">
				<span class="bg-primary text-white"><?php echo $nomsol; ?></span>, 
				portador do RG: <span><?php echo $nrgsol; ?></span> e CPF: <span><?php echo $cpfsol; ?></span>
				sua solicitação para segregação da taxa do lixo referente ao CDC nº <?php echo $cdcsol; ?> foi realizada com sucesso.
			</p>
			<p class="h5">Para consultar o andamento da solicitação você poderá retornar a essa página clicando em "Consultar".</p>
			<hr>
			<div class="row">
				<div class="col-12 text-center">
					<h4>Nº da solicitação: <?php echo $codsol; ?></h4>
				</div>
				<div class="col-12 text-center">
					<h3><span class="badge badge-pill <?php echo $class; ?>"><?php echo $status; ?></span></h3>
				</div>
			</div>
			<?php
			
			if($status=='Atendida'){

			?>
			<p class="h5">
				Sua solicitação foi atendida com sucesso, para emissão dos boletos para pagamento da taxa clique
				no botão abaixo e utilize o número de cadastro: <span class="font-weight-bold text-danger"><?php echo $numcad; ?></span>.</p>
			<button class="btn btn-success btn-block disabled">Emitir boletos</button>
			<?php
			
			}
			
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