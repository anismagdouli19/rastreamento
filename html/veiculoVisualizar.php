<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';
	
	@$userID = $_GET['userid'];
	$getDados = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = '$userID'");
	$dados = mysqli_fetch_assoc($getDados);
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
						<li><a href="rastreadores.php"><i class="fa fa-fw fa-globe"></i> Rastreadores</a></li>
						<li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a></li>
					</ul>
				</section>
			</nav>

			<section id="page-wrapper">
				<section class="container-fluid">
					<section class="row">
						<section class="col-lg-12">
							<h1 class="page-header">
								<small>Usuários</small>
							</h1>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-user"></i>  <a href="usuarioVisualizar.php">Usuários</a>
								</li>
								<li>
									<i class="fa fa-user"></i>  <?php echo "<a href='usuarioDetalhe.php?userid=" . $dados['id_usuario'] . "'>" . $dados['nome'] . "</a>"; ?>
								</li>
								<li class="active">
									<i class="fa fa-eye"></i> Veículos
								</li>
							</ol>
						</section>
					</section>

					<section class="row">
						<section class="col-lg-12">
							<section class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-info-circle"></i> Para maiores detalhes, clique sobre a linha do veículo.
							</section>
						</section>
					</section>
					
					<br />

					<section class="row">
						<section class="col-lg-12">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-link fa-car"></i> Veículos</h3>
								</section>
								<section class="panel-body">
									<table class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th width="25%">Placa</th>
												<th width="25%">IMEI</th>
												<th width="25%">Número</th>
												<th width="25%">Veículo</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$getVeiculos = mysqli_query($conexao, "SELECT id, imei, name, marca, modelo, identificacao FROM bem WHERE cliente = '$userID' ORDER BY name ASC");
												$qtdVeiculos = mysqli_num_rows($getVeiculos);
												
												if($qtdVeiculos > 0){
													while($coluna = mysqli_fetch_assoc($getVeiculos)){
														echo 	
															"<tr onclick=\"window.location='veiculoDetalhe.php?userid=" . $dados['id_usuario'] . "&idVeiculo=" . $coluna['id'] . "';\"  style=\"cursor:pointer;\">
																<td>" . $coluna['name'] . "</td>
																<td>" . $coluna['imei'] . "</td>
																<td>" . $coluna['identificacao'] . "</td>
																<td>" . $coluna['marca'] . " " . $coluna['modelo'] . "</td>
															</tr>";
													}
												}
												else{
													echo "<tr><td colspan='4'><i><center>Não existem veículos cadastrados.</center></i></td></tr>";
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