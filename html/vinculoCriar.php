<?php
	require_once 'acesso.php';
	require_once 'config.php';
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
								<small>Vínculos</small>
							</h1>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-cog"></i>  <a href="adm.php">Configurações</a>
								</li>
								<li>
									<i class="fa fa-link"></i> <a href="vinculoCriar.php">Vínculos</a>
								</li>
								<li class="active">
									<i class="fa fa-plus-circle"></i> Novo
								</li>
							</ol>
						</section>
					</section>
					<!-- /.row -->

					<section class="row">
						<section style="width: 60%; margin: auto;">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-link fa-fw"></i> Vínculo</h3>
								</section>
								<section class="panel-body">
							
								<section class="row">
									<section class="col-lg-12">
										<section class="alert alert-info alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<i class="fa fa-info-circle"></i>  Associe um veículo a um motorista para criar um vínculo.
										</section>
									</section>
								</section>
								
								<br />
								
									<?php
										echo 
											"<form method='POST' action='vinculoCadastrando.php'> 
											<strong>Motorista:</strong><br />
											<select class='form-control' name='idMotorista'>
											<option value='valorPadrao'>Por favor, selecione...</option>";
											
										$getMotoristas = mysqli_query($conexao, "SELECT id_motorista, nome FROM motoristas WHERE id_motorista NOT IN (SELECT id_motorista FROM vinculos) AND cliente = '$_SESSION[id]' AND ativo = '1' ORDER BY nome ASC");
										$qtdMotoristas = mysqli_num_rows($getMotoristas);
										
										if($qtdMotoristas > 0){
											while($coluna = mysqli_fetch_assoc($getMotoristas)){
												$motoristaID = $coluna['id_motorista'];
												$nome = $coluna['nome'];
												
												echo "<option value='$motoristaID-$nome'>$nome</option>";
											}
										}
										else{
											echo "<option>Não existem Motoristas disponíveis para vincular.</option>";
										}
										
										echo 
											"</select><br />
									
											<strong>Veículo:</strong><br />
											<select class='form-control' name='idBem'>
											<option value='valorPadrao'>Por favor, selecione...</option>";
									
										$getVeiculos = mysqli_query($conexao, "SELECT id, name FROM bem WHERE cliente = '$_SESSION[id]' AND apelido = 'Desvinculado' ORDER BY name ASC");
										$qtdVeiculos = mysqli_num_rows($getVeiculos);

										if($qtdVeiculos > 0){
											while($coluna = mysqli_fetch_assoc($getVeiculos)){
												$id = $coluna['id'];
												$placa = $coluna['name'];
												
												echo "<option value='$id'>$placa</option>";
											}
										}
										else{
											echo "<option>Não existem Veículos disponíveis para vincular.</option>";
										}
										
										echo 
											"</select><br />";
											
										if($qtdMotoristas > 0 && $qtdVeiculos > 0)
											echo "<button type='submit' class='btn btn-primary' style='float: right;'><i class='fa fa-save'></i> Salvar Vínculo</button>";
									?>
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