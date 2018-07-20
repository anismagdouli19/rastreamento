<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
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
		<script>
			function formatar(mascara, documento){
				var i = documento.value.length;
				var saida = mascara.substring(0, 1);
				var texto = mascara.substring(i)

				if(texto.substring(0,1) != saida){
					documento.value += texto.substring(0,1);
				}
			}
		</script>
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
									<i class="fa fa-edit"></i> Novo
								</li>
							</ol>
						</section>
					</section>
					<!-- /.row -->

					<section class="row">
						<section class="col-lg-12">
							<section class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-info-circle"></i>  Preencha o formulário para adicionar um novo motorista.
							</section>
						</section>
					</section>
					<!-- /.row -->

					<br />
					
					<section class="row">
						<section class="col-lg-6">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Dados Pessoais</h3>
								</section>
								<section class="panel-body">
									<section class="form-group">
										<form name="cadastrarNovaMotorista" method="post" onsubmit="return motoristaValida(this);" action="motoristaCadastrando.php">
											<label>Nome</label>
											<input type="text" class="form-control" name="nome">
											
											<br />
											
											<label>E-mail</label>
											<input type="text" class="form-control" name="email">
											
											<br />
											
											<label>CPF</label>
											<input type="text" class="form-control" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
											
											<br />
											
											<label>Endereço</label>
											<input type="text" class="form-control" name="endereco">
											
											<br />
											
											<label>CNH</label>
											<input type="text" class="form-control" name="cnh">
											
											<br />
										
											<label>Categoria CNH</label>
											<select class="form-control" name="categoriaCnh">
												<option value="valorPadrao">Por favor, selecione...</option>
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="C">C</option>
												<option value="D">D</option>
												<option value="E">E</option>
											</select>
									</section>
									<br />
								</section>
							</section>
						</section>
							
							<section class="col-lg-6">
								<section class="panel panel-default">
									<section class="panel-heading">
										<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Horário de Serviço</h3>
									</section>
									<section class="panel-body">
										<section id="diasFormLeft">
											<label>Dia da Semana:</label>
											<section class="checkbox">
												<label>
													<input type="checkbox" name="dia[]" value="segunda">Segunda-feira
												</label>
											</section>
											<section class="checkbox">
												<label>
													<input type="checkbox" name="dia[]" value="terça">Terça-feira
												</label>
											</section>
											<section class="checkbox">
												<label>
													<input type="checkbox" name="dia[]" value="quarta">Quarta-feira
												</label>
											</section>
											<section class="checkbox">
												<label>
													<input type="checkbox" name="dia[]" value="quinta">Quinta-feira
												</label>
											</section>
											<section class="checkbox">
												<label>
													<input type="checkbox" name="dia[]" value="sexta">Sexta-feira
												</label>
											</section>
											<section class="checkbox">
												<label>
													<input type="checkbox" name="dia[]" value="sabado">Sábado
												</label>
											</section>
											<section class="checkbox">
												<label>
													<input type="checkbox" name="dia[]" value="domingo">Domingo
												</label>
											</section>
										</section>	
										
										<section id="horarioFormRight">
											<label>Horário:</label>
											<br />
											<select class="select-control" name="segundaInicio">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											ás
											
											<select class="select-control" name="segundaFim">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											<br /><br />
											
											<select class="select-control" name="tercaInicio">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											ás
											
											<select class="select-control" name="tercaFim">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											<br /><br />
											
											<select class="select-control" name="quartaInicio">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											ás
											
											<select class="select-control" name="quartaFim">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											<br /><br />
											
											<select class="select-control" name="quintaInicio">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											ás
											
											<select class="select-control" name="quintaFim">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											<br /><br />
											
											<select class="select-control" name="sextaInicio">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											ás
											
											<select class="select-control" name="sextaFim">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											<br /><br />
											
											<select class="select-control" name="sabadoInicio">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											ás
											
											<select class="select-control" name="sabadoFim">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											<br /><br />
											
											<select class="select-control" name="domingoInicio">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
											
											ás
											
											<select class="select-control" name="domingoFim">
												<option value="0000">00:00</option>
												<option value="0030">00:30</option>
												<option value="0100">01:00</option>
												<option value="0130">01:30</option>
												<option value="0200">02:00</option>
												<option value="0230">02:30</option>
												<option value="0300">03:00</option>
												<option value="0330">03:30</option>
												<option value="0400">04:00</option>
												<option value="0430">04:30</option>
												<option value="0500">05:00</option>
												<option value="0530">05:30</option>
												<option value="0600">06:00</option>
												<option value="0630">06:30</option>
												<option value="0700">07:00</option>
												<option value="0730">07:30</option>
												<option value="0800">08:00</option>
												<option value="0830">08:30</option>
												<option value="0900">09:00</option>
												<option value="0930">09:30</option>
												<option value="1000">10:00</option>
												<option value="1030">10:30</option>
												<option value="1100">11:00</option>
												<option value="1130">11:30</option>
												<option value="1200">12:00</option>
												<option value="1230">12:30</option>
												<option value="1300">13:00</option>
												<option value="1330">13:30</option>
												<option value="1400">14:00</option>
												<option value="1430">14:30</option>
												<option value="1500">15:00</option>
												<option value="1530">15:30</option>
												<option value="1600">16:00</option>
												<option value="1630">16:30</option>
												<option value="1700">17:00</option>
												<option value="1730">17:30</option>
												<option value="1800">18:00</option>
												<option value="1830">18:30</option>
												<option value="1900">19:00</option>
												<option value="1930">19:30</option>
												<option value="2000">20:00</option>
												<option value="2030">20:30</option>
												<option value="2100">21:00</option>
												<option value="2130">21:30</option>
												<option value="2200">22:00</option>
												<option value="2230">22:30</option>
												<option value="2300">23:00</option>
												<option value="2330">23:30</option>
											</select>
										</section>
										<button type="submit" class="btn btn-primary" style="float: right; clear: both; margin-right: 10px; margin-bottom: 36px;"><i class="fa fa-save"></i> Cadastrar</button>
									</section>
								</form>
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