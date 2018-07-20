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
									<i class="fa fa-user"></i><a href="usuarioVisualizar.php">Usuarios</a>
								</li>
								<li class="active">
									<i class="fa fa-edit"></i> Novo
								</li>
							</ol>
						</section>
					</section>
					
					<section class="row">
						<section class="col-lg-12">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Dados do Usuário</h3>
								</section>
								<section class="panel-body">
									<form id="userForm" action="usuarioCadastrando.php" method="POST" class="form-horizontal">
										<section class="form-group col-sm-6">
											<label for="nome">Nome</label>
											<input type="text" name="nome" maxlength="50" id="nome" class="form-control">
										</section>

										<section class="form-group col-sm-6">
											<label for="email">Email</label>
											<input type="text" name="email" size="50" id="email" class="form-control">
										</section>											
										
										<section class="form-group col-sm-3">
											<label for="tipo_pessoa">Tipo de Pessoa</label>			
											<select name="tipo_pessoa" id="tipo_pessoa" class="form-control">
												<option value="valorPadrao">Selecione...</option>
												<option value="F">Pessoa Física</option>
												<option value="J">Pessoa Jurídica</option>
											</select>
										</section>
										
										<section class="form-group col-sm-3">
											<label for="registro">CPF/CNPJ</label>
											<input type="text" name="registro" id="registro" maxlength="20" class="form-control">
										</section>
										
										<section class="form-group col-sm-3">
											<label for="adesao">Adesão</label>
											<input type="text" name="adesao" id="adesao" class="form-control">
										</section>
										
										<section class="form-group col-sm-3">
											<label for="mensalidade">Mensalidade</label>
											<input type="text" name="mensalidade" id="mensalidade" class="form-control">
										</section>
										
										<section class="form-group col-sm-2">
											<label for="cep">CEP</label>
											<input type="text" name="cep" id="cep" maxlength="9" class="form-control">
										</section>
										
										<section class="form-group col-sm-4">
											<label for="endereco">Endereço</label>
											<input type="text" name="endereco" id="endereco" maxlength="50" class="form-control">
										</section>
										
										<section class="form-group col-sm-2">
											<label for="bairro">Bairro</label>
											<input type="text" name="bairro" id="bairro" class="form-control">
										</section>
										
										<section class="form-group col-sm-2">
											<label for="cidade">Cidade</label>
											<input type="text" name="cidade" id="cidade" class="form-control">
										</section>
										
										<section class="form-group col-sm-2">
											<label for="estado">UF</label>
											<input type="text" name="estado" id="estado" maxlength="2" class="form-control">
										</section>
										
										<section class="form-group col-sm-3">
											<label for="celular">Celular</label>
											<input type="tel" name="celular" id="celular" maxlength="12" class="form-control">
										</section>
										
										<section class="form-group col-sm-3">
											<label for="telefone">Telefone</label>
											<input type="tel" name="telefone" id="telefone" maxlength="12" class="form-control">
										</section>
										
										<section class="form-group col-sm-2">
											<label for="vencimento">Vencimento</label>
											<select name="vencimento" id="venc" class="form-control">
												<option value="valorPadrao">Selecione...</option>
												<option value="01">01</option>
												<option value="10">10</option>
												<option value="20">20</option>
											</select>  
										</section>
										
										<section class="form-group col-sm-2">
											<label for="login">Login</label>
											<input type="text" name="login" id="login" maxlength="30" class="form-control">
										</section>

										<section class="form-group col-sm-2">
											<label for="senha">Senha</label>
											<input type="password" name="senha" id="senha" class="form-control">
										</section>

										<button type="submit" class="btn btn-primary" style="float: right; clear: both; margin-right: 15px; margin-bottom: 20px;"><i class="fa fa-save"></i> Cadastrar</button>
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