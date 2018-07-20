<?php
	require_once 'acesso.php';
	require_once 'config.php';

	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';
?>

<!DOCTYPE html>
<html>
	<head>	
		<meta charset="utf-8">	
		<meta name="viewport" content="initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Sua Empresa</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/sb-admin.css" rel="stylesheet">
		<link href="fonts/css/font-awesome.css" rel="stylesheet" type="text/css">
		<link href="imagens/favicon.ico" rel="shortcut icon">
		<link href="imagens/favicon.ico" rel="icon" type="image/x-icon">
		<link href="imagens/apple-touch-icon.png" rel="apple-touch-icon">
	</head>

	<body>
		<section id="wrapper">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<section class="navbar-header" style="height: 54px;">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span> MENU</span>
											</button>
					<section id="logoEmpresa"></section>
				</section>
				
				<section class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right navbar-user">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 54px;"><i class="fa fa-fw fa-male"></i>Usuários <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="usuarioVisualizar.php"><i class="fa fa-fw fa-eye"></i> Visualizar Usuários</a>
								</li>
								<li>
									<a href="usuarioCriar.php"><i class="fa fa-fw fa-plus"></i> Cadastrar Usuário</a>
								</li>
							</ul>
						</li>
						<li><a href="baixasManuais.php"><i class="fa fa-fw fa-money"></i> Financeiro</a></li>
                        <li><a href="rastreadores.php"><i class="fa fa-fw fa-money"></i> Rastreadores</a></li>
						<li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a></li>
					</ul>
				</section>
			</nav>

			<section id="page-wrapper">
				<section class="container-fluid">
					<section class="row">
					</section>

					<section class="row">
						<iframe width="100%" height="800px" frameborder="0" scrolling="auto" src="teste/index.php"> </iframe>
					</section>
					
					<br />
			</section>
		</section>
		<script src="javascript/jquery-2.2.2.min.js"></script>
		<script src="javascript/bootstrap.min.js"></script>
	</body>
</html>