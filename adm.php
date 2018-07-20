<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';	

	$quantidadeCarros = mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM bem WHERE cliente = '$_SESSION[id]'"));
	$quantidadeMotoristas = mysqli_num_rows(mysqli_query($conexao, "SELECT id_motorista FROM motoristas WHERE cliente = '$_SESSION[id]' AND ativo = '1'"));
	$quantidadeVinculos = mysqli_num_rows(mysqli_query($conexao, "SELECT id_vinculo FROM vinculos WHERE cliente = '$_SESSION[id]'"));
	$quantidadeCercas = mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM geo_fence WHERE cliente = '$_SESSION[id]'"));
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
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<section id="logoEmpresa"></section>
				</section>
				
				<section class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right navbar-user">
						<li><a href="default.php"  style="height: 54px;"><i class="fa fa-fw fa-map-marker"></i>Mapa</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 54px;"><i class="fa fa-fw fa-male"></i>Motoristas <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="motoristaVisualizar.php"><i class="fa fa-fw fa-eye"></i> Visualizar Motoristas</a>
								</li>
								<li>
									<a href="motoristaCriar.php"><i class="fa fa-fw fa-plus"></i> Cadastrar Motorista</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 54px;"><i class="fa fa-fw fa-link"></i>Vínculos <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="vinculoCriar.php"><i class="fa fa-fw fa-plus"></i> Criar Vínculo</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 54px;"><i class="fa fa-user"></i> <?php echo $_SESSION['usuario'] ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a>
								</li>
							</ul>
						</li>
					</ul>
				</section>
			</nav>

			<section id="page-wrapper">

				<section class="container-fluid">

					<!-- Page Heading -->
					<section class="row">
						<section class="col-lg-12">
							<h1 class="page-header">
								<small>Configurações</small>
							</h1>
							<ol class="breadcrumb">
								<li class="active">
									<i class="fa fa-cog"></i>  Configurações
								</li>
							</ol>
						</section>
					</section>
					<!-- /.row -->

					<section class="row">
						<section class="col-lg-3 col-md-6">
							<section class="panel panel-primary">
								<section class="panel-heading">
									<section class="row">
										<section class="col-xs-3">
											<i class="fa fa-male fa-5x"></i>
										</section>
										<section class="col-xs-9 text-right">
											<section class="huge"><?php echo $quantidadeMotoristas ?></section>
											<section>Motoristas</section>
										</section>
									</section>
								</section>
								<a href="motoristaVisualizar.php">
									<section class="panel-footer">
										<span class="pull-left">Detalhes</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
										<section class="clearfix"></section>
									</section>
								</a>
							</section>
						</section>
						<section class="col-lg-3 col-md-6">
							<section class="panel panel-green">
								<section class="panel-heading">
									<section class="row">
										<section class="col-xs-3">
											<i class="fa fa-link fa-5x"></i>
										</section>
										<section class="col-xs-9 text-right">
											<section class="huge"><?php echo $quantidadeVinculos ?></section>
											<section>Vínculos</section>
										</section>
									</section>
								</section>
								<section class="panel-footer">
									<span class="pull-left"> </span>
									<span class="pull-right"></span>
									<section class="clearfix"></section>
								</section>
							</section>
						</section>
						<section class="col-lg-3 col-md-6">
							<section class="panel panel-yellow">
								<section class="panel-heading">
									<section class="row">
										<section class="col-xs-3">
											<i class="fa fa-car fa-5x"></i>
										</section>
										<section class="col-xs-9 text-right">
											<section class="huge"><?php echo $quantidadeCarros ?></section>
											<section>Veículos</section>
										</section>
									</section>
								</section>
								<section class="panel-footer">
									<span class="pull-left"> </span>
									<span class="pull-right"></span>
									<section class="clearfix"></section>
								</section>
							</section>
						</section>
						<section class="col-lg-3 col-md-6">
							<section class="panel panel-red">
								<section class="panel-heading">
									<section class="row">
										<section class="col-xs-3">
											<i class="fa fa-bullseye fa-5x"></i>
										</section>
										<section class="col-xs-9 text-right">
											<section class="huge"><?php echo $quantidadeCercas ?></section>
											<section>Cercas Virtuais</section>
										</section>
									</section>
								</section>
								<section class="panel-footer">
									<span class="pull-left"> </span>
									<span class="pull-right"></span>
									<section class="clearfix"></section>
								</section>
							</section>
						</section>
					</section>
					<!-- /.row -->

					<section class="row">
						<section class="col-lg-12">

						</section>
					</section>
					<!-- /.row -->

					<section class="row">
						<section class="col-lg-4">

						</section>
						<section class="col-lg-4">
							
						</section>
						<section class="col-lg-4">
							
						</section>
					</section>
					<!-- /.row -->

				</section>
				<!-- /.container-fluid -->

			</section>
			<!-- /#page-wrapper -->
		</section>
		<!-- jQuery -->
		<script src="javascript/jquery-2.2.2.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="javascript/bootstrap.min.js"></script>

	</body>
</html>
