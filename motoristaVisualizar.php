<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
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
								<small>Motoristas</small>
							</h1>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-cog"></i>  <a href="adm.php">Configurações</a>
								</li>
								<li>
									<i class="fa fa-male"></i> <a href="motoristaVisualizar.php">Motoristas</a>
								</li>
								<li class="active">
									<i class="fa fa-eye"></i> Visualizar
								</li>
							</ol>
						</section>
					</section>
					<!-- /.row -->

					<section class="row">
						<section class="col-lg-12">
							<section class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-info-circle"></i>  Para maiores detalhes, clique sobre a linha do motorista.
							</section>
						</section>
					</section>
					<!-- /.row -->
					
					<br />

					<section class="row">
						<section class="col-lg-12">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-link fa-male"></i> Motoristas Ativos</h3>
								</section>
								<section class="panel-body">
									<table class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th width="33%">Nome</th>
												<th width="33%">E-mail</th>
												<th width="33%">CPF</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$getMotoristas = mysqli_query($conexao, "SELECT * FROM motoristas WHERE cliente = '$_SESSION[id]' AND ativo = '1' ORDER BY nome ASC");
												$qtdMotoristas = mysqli_num_rows($getMotoristas);
												
												if($qtdMotoristas > 0){
													while($coluna = mysqli_fetch_assoc($getMotoristas)){
														$motoristaID = $coluna['id_motorista'];
														$nome = $coluna['nome'];
														$email = $coluna['email'];
														$cpf = $coluna['cpf'];
														
														echo 	
															"<tr onclick=\"window.location='motoristaDetalhe.php?motorista=" . $motoristaID . "';\"  style=\"cursor:pointer;\">
																<td>$nome</td>
																<td>$email</td>
																<td>$cpf</td>
															</tr>";
													}
												}
												else{
													echo "<tr><td colspan='3'><i><center>Não existem Motoristas cadastrados.</center></i></td></tr>";
												}
											?>
										</tbody>
									</table>
								</section>
							</section>
						</section>
						
						<section class="col-lg-12">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-link fa-male"></i> Motoristas Inativos</h3>
								</section>
								<section class="panel-body">
									<table class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th width="33%">Nome</th>
												<th width="33%">E-mail</th>
												<th width="33%">CPF</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$getMotoristas = mysqli_query($conexao, "SELECT * FROM motoristas WHERE cliente = '$_SESSION[id]' AND ativo = '0' ORDER BY nome ASC");
												$qtdMotoristas = mysqli_num_rows($getMotoristas);
												
												if($qtdMotoristas > 0){
													while($coluna = mysqli_fetch_assoc($getMotoristas)){
														$motoristaID = $coluna['id_motorista'];
														$nome = $coluna['nome'];
														$email = $coluna['email'];
														$cpf = $coluna['cpf'];
														
														echo 	
															"<tr onclick=\"window.location='motoristaDetalhe.php?motorista=" . $motoristaID . "';\"  style=\"cursor:pointer;\">
																<td>$nome</td>
																<td>$email</td>
																<td>$cpf</td>
															</tr>";
													}
												}
												else{
													echo "<tr><td colspan='3'><i><center>Não existem Motoristas inativos.</center></i></td></tr>";
												}
											?>
										</tbody>
									</table>
								</section>
							</section>
						</section>
					</section>
				</section>
			</section>
		</section>
		<script src="javascript/jquery-2.2.2.min.js"></script>
		<script src="javascript/bootstrap.min.js"></script>
	</body>
</html>