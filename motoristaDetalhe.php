<?php
	require_once 'acesso.php';
	require_once 'config.php';
	require_once 'permissao.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';
	
	$motoristaID = $_GET['motorista'];
	$getDetalhes = mysqli_query($conexao, "SELECT * FROM motoristas WHERE id_motorista = '$motoristaID' AND cliente = '$_SESSION[id]'");
	
	$coluna = mysqli_fetch_array($getDetalhes);
		$nome = $coluna['nome'];
		$email = $coluna['email'];
		$cpf = $coluna['cpf'];
		$endereco = $coluna['endereco'];
		$horarioServico = $coluna['horario_servico'];
		$cnh = $coluna['cnh'];
		$categoriaCNH = $coluna['categoria_cnh'];
		$clienteMotorista = $coluna['cliente'];
		$situacao = ($coluna['ativo'] == '1') ? 'Ativo' : 'Inativo';
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
									<i class="fa fa-user fa-fw"></i> <?php echo $nome ?>
								</li>
							</ol>
						</section>
					</section>

					<section class="row">
						<section class="col-lg-6">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Dados Pessoais</h3>
								</section>
								<section class="panel-body">
									<section class="form-group">
										<table class="table table-bordered table-hover table-striped">
											<tbody>
											<?php
												echo 
													"<tr>
														<td>Nome</td>
														<td>$nome</td>
													</tr>
													<tr>
														<td>E-mail</td>
														<td>$email</td>
													</tr>
													<tr>
														<td>CPF</td>
														<td>$cpf</td>
													</tr>
													<tr>
														<td>CNH</td>
														<td>$cnh</td>
													</tr>
													<tr>
														<td>Categoria CNH</td>
														<td>$categoriaCNH</td>
													</tr>
													<tr>
														<td>Endereço</td>
														<td>$endereco</td>
													</tr>
													<tr>
														<td>Horário de Serviço</td>
														<td>$horarioServico</td>
													</tr>
													<tr>
														<td>Situação</td>
														<td>$situacao</td>
													</tr>";
											?>
											</tbody>
										</table>
										
										<?php 
											if($situacao == 'Ativo'){
												$disabled = "";
												
												$getVinculo = mysqli_query($conexao, "SELECT * FROM vinculos v INNER JOIN bem b ON v.id_bem = b.id WHERE v.cliente = '$_SESSION[id]' AND v.id_motorista = '$motoristaID'");
												$coluna = mysqli_fetch_assoc($getVinculo);{
													$idBem = $coluna['id'];
												}
												
												echo "<a href='motoristaControle.php?comando=Inativar&motorista=$motoristaID&idBem=$idBem'><button type='button' id='inativaMotorista' class='btn btn-danger' style='float: right;' onclick='return motoristaConfirmaInativar(\"$nome\")'><i class='fa fa-trash'></i> Inativar</button></a>";
											}
											else{
												$disabled = "disabled";
												echo 
													"<a href='motoristaControle.php?comando=Ativar&motorista=$motoristaID'><button type='button' id='ativaMotorista' class='btn btn-success' style='float: right;'><i class='fa fa-plus-circle'></i> Reativar</button></a>
													<a href='motoristaControle.php?comando=Excluir&motorista=$motoristaID'><button type='button' id='excluiMotorista' class='btn btn-danger' style='float: right;  margin-right: 5px;' onclick='return motoristaConfirmaExcluir(\"$nome\")'><i class='fa fa-trash'></i> Remover</button></a>";
											}
										?>
										
										<a href="motoristaEditar.php?motorista=<?php echo $motoristaID; ?>"><button type="button" id="editarMotorista" class="btn btn-primary" style="float: right; margin-right: 5px; margin-bottom: 25px;"><i class="fa fa-pencil"></i> Editar</button></a>
									</section>
								</section>
							</section>
						</section>
						
						<section class="col-lg-6">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user fa-link"></i> Vínculos</h3>
								</section>
								<section class="panel-body">
									<section class="form-group">
										<?php
											$getVinculo = mysqli_query($conexao, "SELECT * FROM vinculos v INNER JOIN bem b ON v.id_bem = b.id WHERE v.cliente = '$_SESSION[id]' AND v.id_motorista = '$motoristaID'");
											$numeroVinculos = mysqli_num_rows($getVinculo);
										
											if($numeroVinculos < 1){
												echo 
												"No momento este motorista não está vinculado a nenhum veículo.
												<br />
												<br />
												<a href='vinculoCriar.php'><button $disabled type='button' id='vincularMotorista' class='btn btn-success' style='float: left; margin-bottom: 25px;'><i class='fa fa-plus-circle'></i> Vincular</button></a>";
											}
											else{
												$coluna = mysqli_fetch_assoc($getVinculo);{
													$idVinculo = $coluna['id_vinculo'];
													$idBem = $coluna['id'];
													$dataVinculo = date("d/m/Y", $coluna['dataVinculo']);
													$imei = $coluna['imei'];
													$placa = $coluna['name'];
													$identificacao = $coluna['identificacao'];
													$tipo = ($coluna['tipo'] == 'Caminhao') ? 'Caminhão' : $coluna['tipo'];
													$hodometro = $coluna['hodometro'];
													$veiculo = $coluna['marca'] . " " . $coluna['modelo'] . " " . $coluna['cor'] . " - " . $coluna['ano'];
													$rastreador = $coluna['modelo_rastreador'];
												}
												
												echo 
													"<table class='table table-bordered table-hover table-striped'>
														<tbody>
															<tr>
																<td>Veículo</td>
																<td>$veiculo</td>
															</tr>
															<tr>
																<td>Placa</td>
																<td>$placa</td>
															</tr>
															<tr>
																<td>Tipo</td>
																<td>$tipo</td>
															</tr>
															<tr>
																<td>Data do Vínculo</td>
																<td>$dataVinculo</td>
															</tr>
															<tr>
																<td>Hodômetro</td>
																<td>$hodometro Km</td>
															</tr>
															<tr>
																<td>IMEI</td>
																<td>$imei</td>
															</tr>
															<tr>
																<td>Número</td>
																<td>$identificacao</td>
															</tr>
															<tr>
																<td>Rastreador</td>
																<td>$rastreador</td>
															</tr>
														</tbody>
													</table>
													
													<a href='vinculoExcluindo.php?vinculo=$idVinculo&idBem=$idBem&motorista=$motoristaID'><button type='button' id='excluirVinculo' class='btn btn-danger' style='float: right; margin-bottom: 25px;' onclick='return vinculoConfirmaExcluir()'><i class='fa fa-chain-broken'></i> Desvincular</button></a>";
											}				
										?>
									</section>
								</section>
							</section>
						</section>
						
						<section class="col-lg-12">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-list"></i> Histórico de <?php echo $nome ?></h3>
								</section>
								<section class="panel-body">

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