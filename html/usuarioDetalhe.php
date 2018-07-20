<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';
	
	$userID = $_GET['userid'];
	$getDetalhes = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = '$userID'");
	$coluna = mysqli_fetch_array($getDetalhes);
	
	$tipoPessoa = ($coluna['cpf_cnpj'] == 'F') ? "CPF" : "CNPJ";
	$pessoa = ($coluna['tipo_pessoa'] == 'F') ? "Física" : "Jurídica";
	
	$qtdVeiculos = mysqli_num_rows(mysqli_query($conexao, "SELECT cliente FROM bem WHERE cliente = '$userID'"));
	$qtdMotoristas = mysqli_num_rows(mysqli_query($conexao, "SELECT id_motorista FROM motoristas WHERE cliente = '$userID'"));
	$qtdMotoristasInativos = mysqli_num_rows(mysqli_query($conexao, "SELECT id_motorista FROM motoristas WHERE cliente = '$userID' AND ativo = '0'"));
	$qtdAlertas = mysqli_num_rows(mysqli_query($conexao, "SELECT a.imei FROM alertas a INNER JOIN bem b ON a.imei = b.imei WHERE viewed_adm = 'N' AND cliente = '$userID'"));
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
								<li class="active">
									<i class="fa fa-user fa-fw"></i> <?php echo $coluna['nome']; ?>
								</li>
							</ol>
						</section>
					</section>

					<section class="row">
						<section class="col-lg-6">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Dados do Usuário</h3>
								</section>
								<section class="panel-body">
									<section class="form-group">
										<table class="table table-bordered table-hover table-striped">
											<tbody>
												<?php
													echo 
														"<tr>
															<td>Nome</td>
															<td>" . $coluna['nome'] . "</td>
														</tr>
														<tr>
															<td>E-mail</td>
															<td>" . $coluna['email'] . "</td>
														</tr>
														<tr>
															<td>Endereço</td>
															<td>" . $coluna['endereco'] . "</td>
														</tr>
														<tr>
															<td>Pessoa</td>
															<td>$pessoa</td>
														</tr>
														<tr>
															<td>$tipoPessoa</td>
															<td>" . $coluna['cpf_cnpj'] . "</td>
														</tr>
														<tr>
															<td>Telefone</td>
															<td>" . $coluna['telefone'] . "</td>
														</tr>
														<tr>
															<td>Mensalidade</td>
															<td>R$ " . number_format($coluna['mensalidade'], 2, ",", ".") . "</td>
														</tr>
														<tr>
															<td>Data do Contrato</td>
															<td>" . date("d/m/Y", $coluna['data_contrato']) . "</td>
														</tr>";
												?>
											</tbody>
										</table>

										<section class='btn-group'>
											<button type='button' class='btn btn-default dropdown-toggle cerca' data-toggle='dropdown'>Ações <span class='caret'></span></button>
											<ul class='dropdown-menu'>
												<li><a href='contrato.php?userid=<?php echo $coluna['id_usuario']; ?>' target='_blank'><i class='fa fa-file-text-o'></i> Contrato</a></li>
											</ul>
										</section>
										
										<?php										
											if($coluna['ativo'] == 'S'){
												echo "<a href='usuarioControle.php?comando=Inativar&userid=" . $coluna['id_usuario'] . "'><button type='button' id='inativaUsuario' class='btn btn-danger' style='float: right;' onclick='return usuarioConfirmaInativar(\"" . $coluna['nome'] . "\")'><i class='fa fa-trash'></i> Inativar</button></a>";
											}
											else{
												echo 
													"<a href='usuarioControle.php?comando=Ativar&userid=" . $coluna['id_usuario'] . "'><button type='button' id='ativaUsuario' class='btn btn-success' style='float: right;'><i class='fa fa-plus-circle'></i> Reativar</button></a>
													<a href='usuarioControle.php?comando=Excluir&userid=" . $coluna['id_usuario'] . "'><button type='button' id='excluiUsuario' class='btn btn-danger' style='float: right;  margin-right: 5px;' onclick='return usuarioConfirmaExcluir(\"" . $coluna['nome'] . "\")'><i class='fa fa-trash'></i> Remover</button></a>";
											}
										?>
										
										<a href="usuarioEditar.php?userid=<?php echo $coluna['id_usuario']; ?>"><button type="button" id="editarUsuario" class="btn btn-primary" style="float: right; margin-right: 5px; margin-bottom: 25px;"><i class="fa fa-pencil"></i> Editar</button></a>
									</section>
								</section>
							</section>
						</section>
						
						<section class="col-lg-6">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user fa-car"></i> Frota</h3>
								</section>
								<section class="panel-body">
									<section class="form-group">
										<table class="table table-bordered table-hover table-striped">
											<tbody>
												<?php
													echo 
														"<tr>
															<td width='50%'>Veículos</td>
															<td>$qtdVeiculos veículos</td>
														</tr>
														<tr>
															<td>Motoristas</td>
															<td>$qtdMotoristas motoristas ($qtdMotoristasInativos inativos)</td>
														</tr>
														<tr>
															<td>Alertas</td>
															<td>$qtdAlertas alertas</td>
														</tr>";
												?>
											</tbody>									
										</table>
										<a href="veiculoCriar.php?userid=<?php echo $coluna['id_usuario']; ?>"><button type="button" id="editarUsuario" class="btn btn-success" style="float: right; margin-bottom: 25px;"><i class="fa fa-plus-circle"></i> Novo Veículo</button></a>
										<a href="veiculoVisualizar.php?userid=<?php echo $coluna['id_usuario']; ?>"><button type="button" id="editarUsuario" class="btn btn-primary" style="float: right; margin-right: 5px;"><i class="fa fa-list"></i> Listar Veículos</button></a>
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