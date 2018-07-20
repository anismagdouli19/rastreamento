<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';
	
	@$userID = $_GET['userid'];
	$getDados = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = '$userID'");
	$dados = mysqli_fetch_assoc($getDados);	

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
									<i class="fa fa-user"></i>  <a href="usuarioVisualizar.php">Usuários</a>
								</li>
								<li>
									<i class="fa fa-user"></i>  <?php echo "<a href='usuarioDetalhe.php?userid=" . $dados['id_usuario'] . "'>" . $dados['nome'] . "</a>"; ?>
								</li>
								<li class="active">
									<i class="fa fa-edit"></i> Editar Veículo
								</li>
							</ol>
						</section>
					</section>

					<section class="row">
						<section class="centralizaInfo" style="width: 400px; margin: auto;">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-car"></i> Veículo</h3>
								</section>
								<section class="panel-body">
									<?php
										$idVeiculo = $_GET['idVeiculo'];
									
										$imei = $_POST['imei'];
										$placa = $_POST['placa'];
										$telefone = $_POST['telefone'];
										$tipoVeiculo = $_POST['tipoVeiculo'];
										$modeloRastreador = $_POST['modeloRastreador'];
										$hodometro = $_POST['hodometro'];
										$marca = $_POST['marca'];
										$modelo = $_POST['modelo'];
										$ano = $_POST['ano'];
										$cor = $_POST['cor'];

										if(!verificaPost($imei, $placa, $telefone, $hodometro, $marca, $modelo, $ano, $cor) || $tipoVeiculo == "valorPadrao" || $modeloRastreador == "valorPadrao"){
											echo 
												"<center><img src='imagens/imgFalha.png' alt='Falha' /><br /><br />
												Um ou mais campos foram deixados em branco.<br />
												Por favor, avalie possíveis erros e tente novamente.<br /><br /></center>
												<script>veiculoEditaIncompleto(" . $dados['id_usuario'] . ", " . $idVeiculo . ")</script>";
										}
										else{
											mysqli_query($conexao, "UPDATE bem SET imei = '$imei', name = '$placa', identificacao = '$telefone', tipo = '$tipoVeiculo', modelo_rastreador = '$modeloRastreador', hodometro = '$hodometro', marca = '$marca', modelo = '$modelo', ano = '$ano', cor = '$cor' WHERE id = '$idVeiculo' AND cliente = '$userID'");
											
											echo 
												"<center><img src='imagens/imgSucesso.png' alt='Sucesso' /><br /><br />
												Sucesso!<br />
												Os dados do veículo foram alterados.<br /><br /></center>
												<script>veiculoEditaCompleto(" . $dados['id_usuario'] . ", " . $idVeiculo . ")</script>";
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