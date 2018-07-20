<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';	
	
	if(version_compare(phpversion(), '5.5.0', '<')){
		require_once "server/lib/password.php";
	}

	function verificaPost(){
		foreach(func_get_args() as $arg){
			if(strlen($arg) < 1){
				return false;
			}
		}
		return true;
	}
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
									<i class="fa fa-user"></i><a href="usuarioVisualizar.php"> Usuários</a>
								</li>
								<li class="active">
									<i class="fa fa-star"></i> Administrador
								</li>
							</ol>
						</section>
					</section>

					<section class="row">
						<section class="centralizaInfo" style="width: 400px; margin: auto;">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-star fa-fw"></i> Administrador</h3>
								</section>
								<section class="panel-body">
									<?php
										$nome = $_POST['nome'];
										$login = $_POST['login'];
										$senhaAtual = $_POST['senhaAtual'];
										$novaSenha = $_POST['novaSenha'];
										$repetirSenha = $_POST['repetirSenha'];
									
										if(!verificaPost($nome, $login, $senhaAtual, $novaSenha, $repetirSenha)){
											echo 
												"<center><img src='imagens/imgFalha.png' alt='Falha' /><br /><br />
												Um ou mais campos foram deixados em branco.<br />
												Por favor, avalie possíveis erros e tente novamente.<br /><br /></center>
												<script>adminCadastroIncompleto()</script>";
										}
										else{
											$getHash = mysqli_query($conexao, "SELECT senha FROM usuarios WHERE admin = 'S'");
											$dados = mysqli_fetch_assoc($getHash);
											$hash = $dados['senha'];
											
											if(!password_verify($senhaAtual, $hash)){
												echo 
													"<center><img src='imagens/imgFalha.png' alt='Falha' /><br /><br />
													A senha atual não coincide com a digitada.<br />
													Por favor, avalie possíveis erros e tente novamente.<br /><br /></center>
													<script>adminCadastroIncompleto()</script>";
											}
											else{
												if($novaSenha != $repetirSenha){
													echo 
														"<center><img src='imagens/imgFalha.png' alt='Falha' /><br /><br />
														As senhas digitadas não coincidem.<br />
														Por favor, avalie possíveis erros e tente novamente.<br /><br /></center>
														<script>adminCadastroIncompleto()</script>";											
												}
												else{
													$hash = password_hash($novaSenha, PASSWORD_DEFAULT);
													mysqli_query($conexao, "UPDATE usuarios SET nome = '$nome', apelido = '$login', senha = '$hash' WHERE admin = 'S'");
													
													echo 
														"<center><img src='imagens/imgSucesso.png' alt='Sucesso' /><br /><br />
														Sucesso!<br />
														Os dados do Admin foram alterados.<br /><br /></center>
														<script>adminCadastroCompleto()</script>";
												}
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