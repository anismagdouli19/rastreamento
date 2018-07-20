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
								<small>Veículos</small>
							</h1>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-user"></i>  <?php echo "<a href='usuarioDetalhe.php?userid=" . $dados['id_usuario'] . "'>" . $dados['nome'] . "</a>"; ?>
								</li>
								<li class="active">
									<i class="fa fa-eye"></i>  <?php echo $conteudo['name']; ?>
								</li>
							</ol>
						</section>
					</section>
					
					<br />

					<section class="row">
						<section class="col-lg-6">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-link fa-car"></i> Detalhes <?php echo $conteudo['name']; ?></h3>
								</section>
								<section class="panel-body">
									<section class="form-group">
										<table class="table table-bordered table-hover table-striped">
											<tbody>
												<?php
													echo 
														"<tr>
															<td>Placa</td>
															<td>" . $conteudo['name'] . "</td>
														</tr>
														<tr>
															<td>IMEI</td>
															<td>" . $conteudo['imei'] . "</td>
														</tr>
														<tr>
															<td>Telefone</td>
															<td>" . $conteudo['identificacao'] . "</td>
														</tr>
														<tr>
															<td>Modo</td>
															<td>" . $conteudo['modo_operacao'] . "</td>
														</tr>
														<tr>
															<td>Tipo</td>
															<td>" . $conteudo['tipo'] . "</td>
														</tr>
														<tr>
															<td>Hodômetro</td>
															<td>" . $conteudo['hodometro'] . " Km</td>
														</tr>
														<tr>
															<td>Identificação</td>
															<td>" . $conteudo['marca'] . " " . $conteudo['modelo'] . "</td>
														</tr>														
														<tr>
															<td>Motorista</td>
															<td>" . $conteudo['apelido'] . "</td>
														</tr>
														<tr>
															<td>Rastreador</td>
															<td>" . $conteudo['modelo_rastreador'] . "</td>
														</tr>";
												?>
											</tbody>
										</table>
										
										<?php echo "<a href='veiculoExcluir.php?userid=" . $dados['id_usuario'] . "&idVeiculo=" . $conteudo['id'] . "'><button type='button' id='excluiVeiculo' class='btn btn-danger' style='float: right;' onclick='return veiculoConfirmaExcluir(\"" . $conteudo['name'] . "\")'><i class='fa fa-trash'></i> Remover</button></a>"; ?>
										<a href="veiculoEditar.php?userid=<?php echo $dados['id_usuario']; ?>&idVeiculo=<?php echo $conteudo['id']; ?>"><button type="button" id="editarVeiculo" class="btn btn-primary" style="float: right; margin-right: 5px; margin-bottom: 25px;"><i class="fa fa-pencil"></i> Editar</button></a>
									</section>
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