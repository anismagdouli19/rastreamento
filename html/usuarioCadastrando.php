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
									<i class="fa fa-user"></i><a href="usuarioVisualizar.php">Usuarios</a>
								</li>
								<li class="active">
									<i class="fa fa-edit"></i> Novo
								</li>
							</ol>
						</section>
					</section>

					<section class="row">
						<section class="centralizaInfo" style="width: 400px; margin: auto;">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Usuário</h3>
								</section>
								<section class="panel-body">
									<?php
										$nome = $_POST['nome'];
										$email = $_POST['email'];
										$tipoPessoa = $_POST['tipo_pessoa'];
										$registro = $_POST['registro'];
										$adesao = $_POST['adesao'];
										$mensalidade = $_POST['mensalidade'];
										$cep = $_POST['cep'];
										$endereco = $_POST['endereco']; 
										$bairro = $_POST['bairro'];
										$cidade = $_POST['cidade'];
										$estado = $_POST['estado'];
										$celular = $_POST['celular'];
										$telefone = $_POST['telefone'];
										$vencimento = $_POST['vencimento'];
										$apelido = $_POST['login'];
										$senha = $_POST['senha'];

										if(!verificaPost($nome, $email, $registro, $adesao, $mensalidade, $cep, $endereco, $bairro, $cidade, $estado, $celular, $telefone, $apelido, $senha) || $vencimento == "valorPadrao" || $tipoPessoa == "valorPadrao"){
											echo 
												"<center><img src='imagens/imgFalha.png' alt='Falha' /><br /><br />
												Um ou mais campos foram deixados em branco.<br />
												Por favor, avalie possíveis erros e tente novamente.<br /><br /></center>
												<script>usuarioCadastroIncompleto()</script>";
										}
										else{
											$verificaLoginUsuario = mysqli_query($conexao, "SELECT id_usuario FROM usuarios WHERE apelido = '$apelido'");
											if(mysqli_num_rows($verificaLoginUsuario) > 0){
												echo 
													"<center><img src='imagens/imgFalha.png' alt='Falha' /><br /><br />
													Já existe um usuário com o Login cadastrado.<br />
													Por favor, insira um valor de Login diferente.<br /><br /></center>
													<script>usuarioCadastroIncompleto()</script>";
											}
											else{
												$endereco = $_POST['endereco'] . "-" .  $_POST['bairro'] . "-" . $_POST['cidade'] . "-" . $_POST['estado'];
												$hash = password_hash($senha, PASSWORD_DEFAULT);
												
												mysqli_query($conexao, "INSERT INTO usuarios (nome, apelido, senha, email, endereco, telefone, celular, tipo_pessoa, cpf_cnpj, adesao, mensalidade, data_contrato, data_vencimento, data_renovacao) VALUES ('$nome', '$apelido', '$hash', '$email', '$endereco', '$telefone', '$celular', '$tipoPessoa', '$registro', '$adesao', '$mensalidade', UNIX_TIMESTAMP(), '$vencimento', UNIX_TIMESTAMP())");
												
												echo 
													"<center><img src='imagens/imgSucesso.png' alt='Sucesso' /><br /><br />
													Sucesso!<br />
													Os dados do usuário foram cadastrados.<br /><br /></center>
													<script>usuarioCadastroCompleto()</script>";
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