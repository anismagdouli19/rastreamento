<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';
	
	$motoristaID = $_GET['motorista'];
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
		<script src="javascript/validacoes.js"></script>
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
									<i class="fa fa-edit"></i> Editar
								</li>
							</ol>
						</section>
					</section>
					<!-- /.row -->

					<section class="row">
						<section style="width: 400px; margin: auto;">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Motorista</h3>
								</section>
								<section class="panel-body">
									<?php
										$nome = $_POST['nome'];
										$email = $_POST['email'];
										$cpf = $_POST['cpf'];
										$endereco = $_POST['endereco'];
										$cnh = $_POST['cnh'];
										$categoriaCNH = $_POST['categoriaCnh'];
										$horarioServico = "NULL";

										if(isset($_POST['dia'])) $dia = $_POST['dia'];
										else $dia = "ValorPadrao";
										
										if(strlen($usuario) < 1 || strlen($email) < 1 || strlen($cpf) < 1 || strlen($endereco) < 1 || strlen($cnh) < 1 || $categoriaCnh == "ValorPadrao"){
											echo 
												"<center><img src='imagens/imgFalha.png' alt='Falha' /><br /><br />
												Um ou mais campos foram deixados em branco.<br />
												Por favor, avalie possíveis erros e tente novamente.</center>
												<script>motoristaEditaIncompleto(" . $motoristaID . ")</script>";
										}
										else{
											mysqli_query($conexao, "UPDATE motoristas SET nome = '$nome', email = '$email', cpf = '$cpf', endereco = '$endereco', horario_servico = '$horarioServico', cnh = '$cnh', categoria_cnh = '$categoriaCNH' WHERE id_motorista = '$motoristaID' AND cliente = '$_SESSION[id]'");
											
											echo 
												"<center><img src='imagens/imgSucesso.png' alt='Sucesso' /><br /><br />
												Sucesso!<br />
												Os dados do motorista foram alterados.</center>
												<script>motoristaEditaCompleto(" . $motoristaID . ")</script>";
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