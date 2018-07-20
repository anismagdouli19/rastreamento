<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';
	
	@$userID = $_GET['userid'];
	$getDados = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = '$userID'");
	$dados = mysqli_fetch_assoc($getDados);
	
	$idVeiculo = $_GET['idVeiculo'];
	$getInfo = mysqli_query($conexao, "SELECT * FROM bem WHERE id = '$idVeiculo'");
	$conteudo = mysqli_fetch_assoc($getInfo);
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
									<i class="fa fa-edit"></i> Editar Veículo
								</li>
							</ol>
						</section>
					</section>
					
					<section class="row">
						<section class="col-lg-12">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-car fa-fw"></i> Dados do Veículo <?php echo $conteudo['name'] ?></h3>
								</section>
								<section class="panel-body">
									<form id="userForm" action="veiculoEditando.php?userid=<?php echo $dados['id_usuario'] . "&idVeiculo=" . $conteudo['id']; ?>" method="POST" class="form-horizontal">
										<section class="form-group col-sm-6">
											<label for="imei">IMEI</label>
											<input type="text" name="imei" maxlength="50" id="imei" class="form-control" value="<?php echo $conteudo['imei']; ?>">
										</section>

										<section class="form-group col-sm-6">
											<label for="placa">Placa</label>
											<input type="text" name="placa" size="50" id="placa" class="form-control" value="<?php echo $conteudo['name']; ?>">
										</section>									

										<section class="form-group col-sm-3">
											<label for="telefone">Número CHIP</label>
											<input type="text" name="telefone" id="telefone" maxlength="20" class="form-control" value="<?php echo $conteudo['identificacao']; ?>">
										</section>										
										
										<section class="form-group col-sm-3">
											<label for="tipoVeiculo">Tipo Veículo</label>			
											<select name="tipoVeiculo" id="tipoVeiculo" class="form-control">
												<option value="<?php echo $conteudo['tipo']; ?>"><?php echo $conteudo['tipo']; ?></option>
												<option value="caminhao">Caminhão</option>
												<option value="nibus">Ônibus</option>
												<option value="jetski">JetSki</option>
												<option value="trator">Trator</option>
												<option value="carro">Carro</option>
												<option value="moto">Moto</option>
											</select>
										</section>
										
										<section class="form-group col-sm-3">
											<label for="modeloRastreador">Rastreador</label>			
											<select name="modeloRastreador" id="modeloRastreador" class="form-control">
												<option value="<?php echo $conteudo['modelo_rastreador']; ?>"><?php echo $conteudo['modelo_rastreador'] ?></option>
												<option value="ST300">ST300</option>
												<option value="SA200">SA200</option>
												<option value="CRX1">CRX1</option>
												<option value="GT06">GT06</option>
												<option value="ACCURATE">ACCURATE</option>
												<option value="TK303">TK303</option>
												<option value="TK103">TK103</option>
												<option value="TK103B">TKK103B</option>
												<option value="TK104">TK104</option>
												<option value="TK106">TK106</option>
												<option value="TLT1C">TLT1C</option>
												<option value="TLT2N">TLT2N</option>
												<option value="TLT2H">TLT2H</option>
												<option value="XT009">XT009</option>
												<option value="H08">H08</option>
												<option value="H02">H02</option>
												<option value="H09">H09</option>
											</select>
										</section>
										
										<section class="form-group col-sm-3">
											<label for="hodometro">Hodômetro</label>
											<input type="text" name="hodometro" id="hodometro" class="form-control" value="<?php echo $conteudo['hodometro']; ?>">
										</section>
										
										<section class="form-group col-sm-3">
											<label for="marca">Marca</label>
											<input type="text" name="marca" id="marca" maxlength="9" class="form-control" value="<?php echo $conteudo['marca']; ?>">
										</section>
										
										<section class="form-group col-sm-3">
											<label for="modelo">Modelo</label>
											<input type="text" name="modelo" id="modelo" maxlength="50" class="form-control" value="<?php echo $conteudo['modelo']; ?>">
										</section>
										
										<section class="form-group col-sm-3">
											<label for="ano">Ano</label>
											<input type="text" name="ano" id="ano" class="form-control" value="<?php echo $conteudo['ano']; ?>">
										</section>
										
										<section class="form-group col-sm-3">
											<label for="cor">Cor</label>
											<input type="text" name="cor" id="cor" class="form-control" value="<?php echo $conteudo['cor']; ?>">
										</section>

										<button type="submit" class="btn btn-primary" style="float: right; clear: both; margin-right: 15px; margin-bottom: 20px;"><i class="fa fa-save"></i> Editar</button>
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
