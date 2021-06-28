<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8" content="pt-br">

	<meta name="author" content="Rafael Souza de Carvalho">

	<title>Prefeitura Municipal</title>

	<!-- CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.4.1/lux/bootstrap.min.css" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo base_url() ?>public/css/style.css">

	<!-- JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.js" integrity="sha256-Z1t+wxZ7Eh5T1sK6aePWMhEQOghR4jZVLwjwrUZAReE=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>

	<!-- Bootstrap Datatable -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

	<!-- hc46g5 -->

	<style>
		body {
		  	background: url('<?php echo base_url().'public/img/background.jpg' ?>') no-repeat center center fixed;
		  	-webkit-background-size: cover;
		  	-moz-background-size: cover;
		  	background-size: cover;
		  	-o-background-size: cover;
		}

		a {
			font-size: 1.1rem;
		}

		#bg-text-home {
			background-color: #FFFFFFDA;
		}

		input[type='text'],
		input[type='number'],
		input[type='password'],
		input[type='email'],
		input[type='date'],
		input[type='time'],
		select.form-control,
		textarea.form-control {
			padding-left: 0.5rem; 
			background-color: #CCC; 
			text-transform: uppercase;
		}

		// Medium devices (tablets, 768px and up)
		@media (min-width: 992px) 
		{
			body {
			  	background: url('<?php echo base_url().'public/img/background.jpg' ?>') no-repeat center center scroll;
			  	-webkit-background-size: cover;
			  	-moz-background-size: cover;
			  	background-size: cover;
			  	-o-background-size: cover;
			}
		}
	</style>
</head>
<body>
	<!-- Page Content -->
	<section class="mt-5">
	    <div class="container-fluid">
	    	<div class="row">
	        	<div class="col-lg-12">
	        		<div class="row">
	        			<div class="col-lg-6">
	        				<div class="row">
	        					<div class="col-lg-3">
			          				<a href="<?php echo base_url().'Home/' ?>" class="btn btn-primary btn-block mb-1">Início</a>
			          			</div>
			          			<div class="col-lg-3">
			          				<a href="<?php echo base_url().'Home/Solicitacao/' ?>" class="btn btn-primary btn-block mb-1">Solicitar</a>
			          			</div>
			          			<div class="col-lg-3">
			          				<a href="<?php echo base_url().'Home/Consultar/' ?>" class="btn btn-primary btn-block mb-1">Consultar</a>
			          			</div>
			          			<div class="col-lg-3">
			          				<?php 
				          				if(isset($_SESSION['usuario']))
				          				{
				          			?>
											<div class="dropdown">
											  <button class="btn btn-info btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											  	Gerenciar
											  </button>
											  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											    <a class="dropdown-item" href="<?php echo base_url().'Gerenciador/' ?>">Solicitações</a>
											    <a class="dropdown-item" href="<?php echo base_url().'Gerenciador/Usuarios/' ?>">Usuários</a>
											    <a class="dropdown-item" href="<?php echo base_url().'Gerenciador/Perfil/' ?>">Perfil</a>
											    <a class="dropdown-item" href="<?php echo base_url().'Login/Sair' ?>">Sair</a>
											  </div>
											</div>
				          			<?php
				          				}
				          				else
				          				{
				          			?>
											<a href="<?php echo base_url().'Login/' ?>" class="btn btn-primary btn-block mb-1">Login</a>
				          			<?php
				          				} 
			          				?>
			          			</div>
	        				</div>
	        			</div>
	          		</div>