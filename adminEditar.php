<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';	
	
	$getDadosAdmin = mysqli_query($conexao, "SELECT * FROM usuarios WHERE admin = 'S'");
	$dados = mysqli_fetch_assoc($getDadosAdmin);
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
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 54px;"><i class="fa fa-fw fa-male"></i>Usuários <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="motoristaVisualizar.php"><i class="fa fa-fw fa-eye"></i> Visualizar Usuários</a>
								</li>
								<li>
									<a href="motoristaCriar.php"><i class="fa fa-fw fa-plus"></i> Cadastrar Usuário</a>
								</li>
							</ul>
						</li>
						<li><a href="#"><i class="fa fa-fw fa-globe"></i> Rastreadores</a></li>
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
								<li class="active">
									<i class="fa fa-star"></i> Administrador
								</li>
							</ol>
						</section>
					</section>

					<section class="row">
						<section class="col-lg-12">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-star"></i> Editar Administrador</h3>
								</section>
								<section class="panel-body">
									<form id="userForm" action="adminEditando.php" method="POST" class="form-horizontal">
										<section class="form-group col-sm-6">
											<label for="nome">Nome</label>
											<input type="text" name="nome" id="nome" maxlength="50" value="<?php echo $dados['nome']; ?>" class="form-control">
										</section>
										
										<section class="form-group col-sm-6">
											<label for="login">Login</label>
											<input type="text" name="login" id="login" maxlength="50" value="<?php echo $dados['apelido']; ?>" class="form-control">
										</section>
										
										<section class="form-group col-sm-4">
											<label for="senhaAtual">Senha Atual</label>
											<input type="password" name="senhaAtual" id="senhaAtual" maxlength="50" class="form-control">
										</section>
										
										<section class="form-group col-sm-4">
											<label for="novaSenha">Nova Senha</label>
											<input type="password" name="novaSenha" id="novaSenha" maxlength="50" class="form-control">
										</section>
										
										<section class="form-group col-sm-4">
											<label for="repetirSenha">Repetir Senha</label>
											<input type="password" name="repetirSenha" id="repetirSenha" maxlength="50" class="form-control">
										</section>
										
										<button type="submit" class="btn btn-primary" style="float: right; clear: both; margin-right: 15px; margin-bottom: 20px;"><i class="fa fa-pencil"></i> Editar</button>
									</form>
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