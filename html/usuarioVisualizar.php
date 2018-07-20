<?php
	require_once 'acesso.php';
	require_once 'config.php';

	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';
?>

<!DOCTYPE html>
<html>
	<head>	
		<meta charset="utf-8">	
		<meta name="viewport" content="initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Server Horus GPS</title>
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
						<li><a href="estatisticas.php"><i class="fa fa-bar-chart"></i> estatisticas</a></li>
						<li><a href="baixasManuais.php"><i class="fa fa-fw fa-money"></i> Financeiro</a></li>
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
								<li class="active">
									<i class="fa fa-user"></i> Usuários
								</li>
							</ol>
						</section>
					</section>

					<section class="row">
						<section class="col-lg-12">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-star"></i> Administrador</h3>
								</section>
								<section class="panel-body">
									<table class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th width="33%">Administrador</th>
												<th width="33%">Nome</th>
												<th width="33%">E-mail</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$getAdmin = mysqli_query($conexao, "SELECT nome, apelido, email FROM usuarios WHERE admin = 'S'");
												
												while($dados = mysqli_fetch_assoc($getAdmin)){
													echo 	
														"<tr onclick=\"window.location='adminEditar.php';\"  style=\"cursor:pointer;\">
															<td>" . $dados['apelido'] . "</td>
															<td>" . $dados['nome'] . "</td>
															<td>" . $dados['email'] . "</td>
														</tr>";													
												}											
											?>
										</tbody>
									</table>
								</section>
							</section>
						</section>
					</section>
					
					<br />
					
					<section class="row">
						<section class="col-lg-12">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user"></i> Usuários</h3>
								</section>
								<section class="panel-body">
									<table class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th width="20%">Usuário</th>
												<th>Nome</th>
												<th>E-mail</th>
												<th>Frota</th>
												<th>Situação</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$getUsuarios = mysqli_query($conexao, "SELECT id_usuario, nome, apelido, email, ativo, (SELECT COUNT(b.cliente) FROM bem b WHERE b.cliente = usuarios.id_usuario) as frota FROM usuarios WHERE id_usuario != 1 ORDER BY apelido ASC");
												
												if(mysqli_num_rows($getUsuarios) > 0){
													while($dados = mysqli_fetch_assoc($getUsuarios)){
														$dados['ativo'] = ($dados['ativo'] == "S") ? "Ativo" : "Inativo";

														echo 	
															"<tr onclick=\"window.location='usuarioDetalhe.php?userid=" . $dados['id_usuario'] . "';\"  style=\"cursor:pointer;\">
																<td>" . $dados['apelido'] . "</td>
																<td>" . $dados['nome'] . "</td>
																<td>" . $dados['email'] . "</td>
																<td>" . $dados['frota'] . " Veículos</td>
																<td>" . $dados['ativo'] . "</td>																
															</tr>";													
													}
												}
												else{
													echo "<tr><td colspan='5'><i><center>Não existem Usuários cadastrados.</center></i></td></tr>";
												}
											?>
										</tbody>
									</table>
								</section>
							</section>
						</section>
					</section>
					<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-money"></i> PagSeguro</h3>
								</section>
								<section class="panel-body">
									<table class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th width="20%">Email</th>
												<th>Token</th>
											</tr>
										</thead>
										<tbody>
											<tr onclick="window.location='pagseguroEditar.php'" style="cursor:pointer;">
											<td><?php echo $dados['email_pagseguro']; ?></td>
											<td><?php echo $dados['token_pagseguro']; ?></td>
															</tr>										</tbody>
									</table>
								</section>
							</section>
				</section>
			</section>
		</section>
		<script src="javascript/jquery-2.2.2.min.js"></script>
		<script src="javascript/bootstrap.min.js"></script>
		<div id="exibeAlertas"></div>
	</body>
</html>