<?php
	require_once 'acesso.php';
	require_once 'config.php';
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
		<script src="javascript/validacoes.js"></script>
	</head>
	
	<body>
		<section id="wrapper">
			<!-- Navigation -->
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
								<small>Vínculos</small>
							</h1>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-cog"></i>  <a href="adm.php">Configurações</a>
								</li>
								<li>
									<i class="fa fa-link"></i> <a href="vinculoCriar.php">Vínculos</a>
								</li>
								<li class="active">
									<i class="fa fa-plus-circle"></i> Novo
								</li>
							</ol>
						</section>
					</section>
					<!-- /.row -->

					<section class="row">
						<section class="centralizaInfo" style="width: 400px; margin: auto;">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Motorista</h3>
								</section>
								<section class="panel-body">
									<?php
										$arrayMotorista = $_POST['idMotorista'];
										$idBem = $_POST['idBem'];

										if($arrayMotorista == "valorPadrao" || $idBem == "valorPadrao"){
											echo 
												"<center><img src='imagens/imgFalha.png' alt='Falha' /><br /><br />
												Um ou mais campos foram deixados em branco.<br />
												Por favor, avalie possíveis erros e tente novamente.</center>
												<script>finalizaVinculo()</script>";
										}
										else{
											$getVeiculo = mysqli_query($conexao, "SELECT id_bem FROM vinculos WHERE id_bem = '$idBem'");
											$qtdRegistros = mysqli_num_rows($getVeiculo);
											
											if($qtdRegistros > 0){
												echo 
													"<center><img src='imagens/imgFalha.png' alt='Falha' /><br /><br />
													Já existe um vínculo para o veículo selecionado.<br />
													Por favor, avalie possíveis erros e tente novamente.</center>
													<script>finalizaVinculo()</script>";
											}
											else{
												$arrayMotorista = explode("-", $arrayMotorista);
												$motoristaID = $arrayMotorista[0];
												$nomeMotorista = $arrayMotorista[1];
												
												mysqli_query($conexao, "INSERT INTO vinculos (id_motorista, id_bem, cliente, dataVinculo) VALUES ('$motoristaID', '$idBem', '$_SESSION[id]', UNIX_TIMESTAMP())");
												mysqli_query($conexao, "UPDATE bem SET apelido = '$nomeMotorista' WHERE id = '$idBem' AND cliente = '$_SESSION[id]'");
												
												echo 
													"<center><img src='imagens/imgSucesso.png' alt='Sucesso' /><br /><br />
													Sucesso!<br />
													O vínculo foi criado.</center>
													<script>finalizaVinculo()</script>";
											}
										}
									?>
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