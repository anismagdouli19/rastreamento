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
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<title>Sua Empresa</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/sb-admin.css" rel="stylesheet">
		<link href="fonts/css/font-awesome.css" rel="stylesheet">
		<link href="imagens/favicon.ico" rel="shortcut icon">
		<link href="imagens/favicon.ico" type="image/x-icon" rel="icon">
		<link href="imagens/apple-touch-icon.png" rel="apple-touch-icon">
		<script type="text/javascript" src="javascript/listagemAjax.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpL4b9xyYD1f3byVS-mqFSOuDRB3FvTkM" type="text/javascript"></script>
		<style>
			body{
				overflow: hidden;
			}
		</style>
	
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
						<!-- Veículos -->
						<li class="dropdown veiculos-dropdown">
							<a href="#" id="dropdownVeiculos" class="dropdown-toggle" data-toggle="dropdown" style="height: 54px;"><i class="fa fa-car"></i> Veículos <b class="caret"></b></a>
							<ul class="dropdown-menu text-center">
								<form action="" method="POST" class="form-inline" role="form">
									<li>
										<?php require_once 'veiculos.php'; ?>
									</li>
								</form>
							</ul>
						</li>
						
						<!-- Gerenciar -->
						<li class="dropdown user-dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 54px;"><i class="fa fa-wrench"></i> Gerenciar <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#modal-cerca" data-toggle="modal"><i class="fa fa-bullseye"></i> Cerca Virtual</a></li>
								<li><a href="#modal-hodometro" data-toggle="modal"><i class="fa fa-dashboard"></i> Hodômetro</a></li>
								<li><a href="#modal-comandos" data-toggle="modal" class="libera-comandos"><i class="fa fa-tasks"></i> Comandos</a></li>	
								<li><a href="#modal-regras" data-toggle="modal"><i class="fa fa-fw fa-flag"></i> Regras</a></li>
								<li><a href="#modal-grupos" data-toggle="modal"><i class="fa fa-group"></i> Grupos</a></li>
								<li><a href="#modal-rotas" data-toggle="modal"><i class="fa fa-location-arrow"></i> Rotas</a></li>												
								<li><a href="#modal-alertas" data-toggle="modal"><i class="fa fa-bell"></i> Alertas <span class="badge">0</span></a></li>
								
								<li class="divider"></li>

								<li><a href="adm.php"><i class="fa fa-fw fa-cog"></i> Configurações</a></li>
							</ul>
						</li>
						
						<!-- Usuário -->
						<li class="dropdown user-dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 54px;"><i class="fa fa-user"></i> <?php echo $_SESSION['usuario']; ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#modal-dados" data-toggle="modal"><i class="fa fa-user"></i> Cadastro</a></li>
								<li><a href="contrato.php?userid=<?php echo $_SESSION['id'] ?>" target="_blank"><i class="fa fa-file-text-o"></i> Contrato</a></li>
								<li><a href="#modal-senha" data-toggle="modal" onClick="limparReveal('#alterar-senha')"><i class="fa fa-key"></i> Senha</a></li>
								
								<li class="divider"></li>
								
								<li><a href="logout.php"><i class="fa fa-power-off fa-lg"></i> Sair</a></li>
							</ul>
						</li>
					</ul>
				</section>
			</nav>
			
			<!-- Google Maps -->
			<section id="map-canvas"></section>
			
			<section id="page-wrapper">
				<section class="row">
					<section id="slide-panel" class="hide">
						<button id="opener" class="btn btn-primary" title="Visualizar Itinerário da Rota"><i class="fa fa-list-alt fa-2x"> </i></button>
						<section class="row">
							<section class="col-xs-12" id="directionsPanel"></section>
						</section>
					</section>
					<button id="close-street" type="button" class="btn btn-lg btn-danger hide">&times;</button>

					<section id="historico" class="navbar-inverse text-center col-xs-12 col-sm-10 hide">
						<section class="clear-trace hide">
							<button title="Limpar rota de histórico" type="button" class="btn btn-success" id="erase-trace"><i class="fa fa-eraser"></i></button>
						</section>
						
						<section class="header navbar-inverse" style="z-index: 200;">
							<i class="fa fa-angle-double-up fa-lg"></i> Histórico
						</section>
					  
						<section class="content">
							<section class="table-responsive">
								<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center">Data</th>
										<th class="text-center">Hora</th>
										<th class="text-center">Latitude</th>
										<th class="text-center">Longitude</th>
										<th class="text-center">Velocidade</th>
										<th class="text-center">Endereço</th>
										<th class="text-center">
											<a class="btn btn-primary" title="Consultar histórico por período" data-toggle="modal" href='#modal-historico'><i class="fa fa-calendar"></i></a>
											<button type="button" title="Clique para limpar os marcadores" class="btn btn-danger" onClick="limparMapaHist();"><i class="fa fa-eye-slash"></i></button>
										</th>
									</tr>
								</thead>
								<tbody></tbody>
								</table>
							</section>
						</section>
					</section>
				</section>
			</section>
		
			<!-- Modal Hodometro -->
			<section class="modal fade" id="modal-hodometro"> 
				<section class="modal-dialog-hodometro"> 
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Hodômetro</h3>
						</section>
						<section class="modal-conteudo">
							<form action="" method="POST" class="form-inline" role="form">
								<li rel="tooltip" title="Quilometragem do veículo."><input type="text" class="form-control" id="hod_atual" name="hodometro" placeholder="Quilometragem" disabled></li>
								<li class="divider"></li>
								<li rel="tooltip" title="Avisar quando este valor for atingido."><input type="text" class="form-control" id="alerta_hodometro" name="alerta_hodometro" placeholder="Avisar a Cada" disabled></li>
								<li class="divider"></li>
								<center>
									<li>
										<button type="button" class="btn btn-default" onClick="habilitarHodometro()" title="Clique para habilitar a edição dos campos"><i class="fa fa-edit"></i> </button>
										<button type="button" class="btn btn-primary" onClick="alterarHodometro()" title="Clique para salvar as alterações realizadas" id="enviaHodometro" disabled><i class="fa fa-save"></i> </button>
									</li>
								</center>
							</form>
						</section>
					</section>
				</section>
			</section>
		
			<!-- Modal Comandos -->
			<section class="modal fade" id="modal-comandos"> 
				<section class="modal-dialog-comandos"> 
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Comandos</h3>
						</section>
						<section class="modal-conteudo">
							<form id="comandos" class="form-inline" role="form">
								<li rel="tooltip" title="Aplica o comando ao veículo selecionado.">
									<select name="command" id="command" class="form-control" required>
										<option value=",B">Rastrear Uma Vez</option>
										<option value=",C,30s">Rastrear a Cada</option>
										<option value=",H,060">Velocidade Limite</option>
										<option value=",G">Alertar Movimento</option>
										<option value=",E">Cancelar Alerta</option>
                                        <option value=",J">Bloquear Veículo</option>
                                        <option value=",K">Desbloquear Veículo</option>
									</select>
								</li>
								<li class="tempo divider hide"></li>
								<li class="hide">
									<select name="commandTime" id="commandTime" class="form-control-select" required>
										<option value=",C,30s">30 segundos</option>
										<option value=",C,01m">1 minuto</option>
										<option value=",C,02m">2 minutos</option>
										<option value=",C,10m">10 minutos</option>
										<option value=",C,30m">30 minutos</option>
										<option value=",C,01h">1 hora</option>
										<option value=",C,02h">2 horas</option>
										<option value=",C,10h">10 horas</option>
									</select>
								</li>
								<li class="parametro divider hide"></li>
								<li class="hide" rel="tooltip" title="Velocidade em Km/h"><input type="text" name="commandSpeedLimit" id="commandSpeedLimit" class="form-control-select" maxlength="3" placeholder="60"></li>
								<li class="divider"></li>
								<center><button type="button" id="enviarcomando" class="btn btn-primary" disabled><i class="fa fa-upload"></i> Enviar</button></center>
							</form>
						</section>
					</section>
				</section>
			</section>
		
			<!-- Modal Cerca -->
			<section class="modal fade" id="modal-cerca"> 
				<section class="modal-dialog-cerca"> 
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Cerca Virtual</h3>
						</section>
						<section class="modal-conteudo">
							<form class="form-inline" role="form">
								<center>
									<button title="Cria uma cerca virtual para o veículo escolhido." type="button" class="btn btn-primary" onClick="modalCerca();"><i class="fa fa-plus-circle"></i> Nova Cerca</button>
									<hr>
									<?php
										$listaCercas = mysqli_query($conexao, "SELECT a.name, b.id, b.imei, b.nome, a.identificacao FROM bem a INNER JOIN geo_fence b ON (a.imei = b.imei) WHERE b.disp = 'S' AND a.cliente = '$_SESSION[id]' ORDER BY id DESC");
										
										while($cerca = mysqli_fetch_assoc($listaCercas)){
											echo "<li id='". (int)$cerca['id'] ."'><span rel='tooltip' title='Clique para editar' onclick='editaCerca(".(int)$cerca['id'].",".$cerca['imei'].");'><a href='#'>" . $cerca['nome'] . "</a></span> <a href='javascript:void(0);' rel='tooltip' title='Clique para excluir' class='delcerca' onclick='removeCerca(". (int)$cerca['id'] .");'><i class='fa fa-trash-o fa-lg'></i></a></li>";
										}
									?>
								</center>
							</form>
						</section>
					</section>
				</section>
			</section>
		
			<!-- Modal Rotas -->
			<section class="modal fade" id="modal-rotas"> 
				<section class="modal-dialog-rotas"> 
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Rotas</h3>
						</section>
						<section class="modal-conteudo">
							<form class="form-inline" role="form">
								<li><input type="text" class="form-control" id="inicio_rota" placeholder="De: Origem" required></li>
								<li class="divider"></li>
								<li><input type="text" class="form-control" id="destino_rota" placeholder="Para: Destino" required></li>
								<li class="divider"></li>
								<center><li><button type="submit" id="calculaRota" class="btn btn-primary"><i class="fa fa-road"></i> Traçar Rota</button></li></center>
							</form>
						</section>
					</section>
				</section>
			</section>
		
			<!-- Modal Alertas -->
			<section class="modal fade" id="modal-alertas"> 
				<section class="modal-dialog-alertas"> 
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Alertas</h3>
						</section>
						<section class="modal-conteudo">
							<section class="modal-alerts">
								<ul>

								</ul>
							</section>
						</section>
					</section>
				</section>
			</section>
		
			<!-- Modal Dados Cadastrais -->
			<section class="modal fade" id="modal-dados">
				<section class="modal-dialog"> 
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Dados Cadastrais</h3>
						</section>
						<section class="modal-body"> 
							<section class="alert alert-info"> 
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								As informações abaixo são <strong>apenas para fins de consulta.</strong><br />
								Caso deseje alterá-las solicite ao seu Administrador. 
							</section>
							
							<br />
							
							<section class="row"> 
								<?php
									$query = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario = '$_SESSION[id]'");
									$dadosCadastrais = mysqli_fetch_assoc($query);
								?>
								<form role="form">
									<section class="form-group col-sm-6">
										<label for="nome">Nome</label>
										<input type="text" class="form-control" id="nome" disabled value="<?php echo $dadosCadastrais['nome']; ?>">
									</section>
										
									<section class="form-group col-sm-6">
										<label for="email">E-mail</label>
										<input type="text" class="form-control" id="email" disabled value="<?php echo $dadosCadastrais['email']; ?>">
									</section>
									
									<section class="form-group col-sm-6">
										<label for="telefone">Telefone</label>
										<input type="text" class="form-control" id="telefone" disabled value="<?php echo $dadosCadastrais['telefone']; ?>">
									</section>
									
									<section class="form-group col-sm-6">
										<label for="celular">Celular</label>
										<input type="text" class="form-control" id="celular" disabled value="<?php echo $dadosCadastrais['celular']; ?>">
									</section>
									
									<section class="form-group col-sm-12">
										<label for="endereco">Endereço</label>
										<input type="text" class="form-control" id="endereco" disabled value="<?php echo $dadosCadastrais['endereco']; ?>">
									</section>
								</form>
							</section>
						</section>
						<section class="modal-footer"> 
							<button type="button" class="btn btn-default" data-dismiss="modal">Concluir</button>
						</section>
					</section>
				</section>
			</section>
		
			<!-- Modal Senha -->
			<section class="modal fade" id="modal-senha">
				<section class="modal-dialog"> 
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Alterar Senha</h3>
						</section>
						<form method="GET" id="alterar-senha" class="form-horizontal" role="form">
							<section class="modal-body"> 
								<section class="form-group"> 
									<section class="col-lg-4"> 
										<label class="control-label" for="senha_atual">Senha Atual</label>
										<input type="password" name="senha_atual" id="senha_atual" class="form-control">
									</section>
									<section class="col-lg-4"> 
										<label class="control-label" for="nova_senha">Nova Senha</label>
										<input type="password" name="nova_senha" id="nova_senha" class="form-control">
									</section>
									<section class="col-lg-4"> 
										<label class="control-label" for="repita_senha">Repita a Senha</label>
										<input type="password" name="repita_senha" id="repita_senha" class="form-control">
									</section>
								</section>
								<section id='message' class='row'></section>
							</section>
							<section class="modal-footer"> 
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 
								Salvar Alterações</button>
							</section>
						</form>
					</section>
				</section>
			</section>
		
			<!-- Modal Grupos -->
			<section class="modal fade" id="modal-grupos">
				<section class="modal-dialog"> 
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Gerenciar Grupos</h3>
						</section>
						<section class="modal-body">  
							<section class="table-responsive"> 
								<table class="table table-hover table-striped">
									<thead>
										<tr> 
											<th>Nome</th>
											<th width="17.2%">Ações</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$resGrupos = mysqli_query($conexao, "SELECT id, nome FROM grupo WHERE cliente = '$_SESSION[id]'");
											
											if(mysqli_num_rows($resGrupos) > 0){
												while($dadosGrupo = mysqli_fetch_assoc($resGrupos)){
													echo 
													"<tr>
														<td>" . $dadosGrupo['nome'] . "</td>
														<td>
															<a href='#submodal-grupos' onclick='obterDados(". $dadosGrupo['id'] .", \"". $dadosGrupo['nome'] ."\");' data-toggle='modal' rel='tooltip' title='Editar' class='btn btn-sm btn-primary'><i class='fa fa-pencil fa-fw'></i></a>
															<a href='javascript:void(0);' remover='". $dadosGrupo['id'] ."' rel='tooltip' title='Excluir' class='del-group btn btn-sm btn-danger'><i class='fa fa-trash-o fa-fw'></i></a>
														</td>
													</tr>";
												}
											}
											else{
												echo 
													"<tr>
														<td colspan='2'><center><i>Não existem Grupos cadastrados.</i></center></td>
													</tr>";
											}
										?>
									</tbody>
								</table>
							</section>
						</section>
						<section class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Concluir</button>
							<a href="#submodal-grupos" onClick="obterDados(0);" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-circle"></i> Novo Grupo</a>
						</section>
					</section>
				</section>
			</section>
			
			<!-- Modal Regras -->
			<section class="modal fade" id="modal-regras">
				<section class="modal-dialog"> 
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Gerenciar Regras</h3>
						</section>
						<section class="modal-body">  
							<section class="table-responsive"> 
								<table class="table table-hover table-striped">
									<thead>
										<tr> 
											<th>Nome</th>
											<th width="17.2%">Ações</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$resRegras = mysqli_query($conexao, "SELECT id_regra, titulo FROM regras WHERE cliente = '$_SESSION[id]'");
											
											if(mysqli_num_rows($resRegras) > 0){
												while($dadosRegras = mysqli_fetch_assoc($resRegras)){
													echo 
														"<tr>
															<td>" . $dadosRegras['titulo'] . "</td>
															<td>
																<a href='#submodal-regras' onclick='obterDadosRegras(". $dadosRegras['id_regra'] .", \"". $dadosRegras['titulo'] ."\");' data-toggle='modal' rel='tooltip' title='Editar' class='btn btn-sm btn-primary'><i class='fa fa-pencil fa-fw'></i></a>
																<a href='javascript:void(0);' remover='". $dadosRegras['id_regra'] ."' rel='tooltip' title='Excluir' class='del-regra btn btn-sm btn-danger'><i class='fa fa-trash-o fa-fw'></i></a>
															</td>
														</tr>";
												}
											}
											else{
												echo 
													"<tr>
														<td colspan='2'><center><i>Não existem Regras cadastradas.</i></center></td>
													</tr>";
											}
										?>
									</tbody>
								</table>
							</section>
						</section>
						<section class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Concluir</button>
							<a href="#submodal-regras" onClick="obterDadosRegras(0);" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-circle"></i> Nova Regra</a>
						</section>
					</section>
				</section>
			</section>
		
			<!-- Submodal Grupos -->
			<section class="modal fade" id="submodal-grupos">
				<section class="modal-dialog"> 
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Editar Grupo</h4>
						</section>
						<form id="enviarGrupos" class="form-horizontal" role="form">
							<section class="modal-body-grupos">
								<input type="hidden" name="id_grupo" id="id_grupo">
								<section class="form-group"> 
									<label for="nome_grupo" class="col-sm-2 control-label">Nome:</label>
									<section class="col-sm-9"> 
										<input type="text" name="nome_grupo" id="nome_grupo" class="grupos-control" required>
									</section>
								</section>
								<section class="form-group"> 
									<label for="veiculos_grupo" class="col-sm-2 control-label">Veículos:</label>
									<section class="col-sm-9"> 
										<select multiple name="veiculos_grupo[]" id="veiculos_grupo" class="grupos-control-multiple" rel="tooltip" title="Segure CTRL para selecionar vários" required>
											<option value=""></option>
										</select>
									</section>
								</section>
								<section id='message-grupos' class='row'></section>
							</section>
							<section class="modal-footer"> 
								<button type="button" class="btn btn-default" data-dismiss="modal"> Concluir</button>
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar Grupo</button>
							</section>
						</form>
					</section>
				</section>
			</section>
			
			<!-- Submodal Regras -->
			<section class="modal fade" id="submodal-regras">
				<section class="modal-dialog-regras"> 
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Nova Regra</h3>
						</section>
						<form id="enviarRegras" class="form-horizontal" role="form">
							<section class="modal-conteudo">
								<input type="hidden" name="id_regra" id="id_regra">
								
								<h4>Dados Gerais</h4><br />
							
								Título: <input type="text" name="nome_regra" id="nome_regra" class="form-control"><br />							
								
								<hr /><h4>Cercas</h4><br />
								
								<select multiple name="cercas" id="cercas" class="grupos-control-multiple" rel="tooltip" title="Segure CTRL para selecionar vários">
									<option value=""></option>
								</select>
								
								<hr /><h4>Veículos</h4><br />
								
								<select multiple name="veiculos" id="veiculos" class="grupos-control-multiple" rel="tooltip" title="Segure CTRL para selecionar vários">
									<option value=""></option>
								</select>
								
								<hr /><h4>E-mail</h4><br />
								
								<input type="text" name="email" id="email" class="form-control" placeholder="Insira novos e-mails separados por vírgula. Ex: adm@Sua Empresa.com.br, contato@Sua Empresa.com.br"><br />

								<section id='message-regras' class='row'></section>
							</section>
							<section class="modal-footer"> 
								<button type="button" class="btn btn-default" data-dismiss="modal"> Concluir</button>
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar Regra</button>
							</section>
						</form>
					</section>
				</section>
			</section>
		
			<!-- Modal Cerca Virtual -->
			<section class="modal fade" id="modal-cerca-expand">
				<section class="modal-dialog modal-lg">
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Cerca Virtual</h3>
						</section>
						<section class="modal-body"> 
							<section class="row"> 
								<section class="col-sm-6"> 
									<form id="form-cerca" class="form-inline" role="form">
										<section class="form-group"> 
											<label class="sr-only" for="">label</label>
											<input type="text" id="nomeCerca" name="nomeCerca" class="form-control" placeholder="Nome da cerca">
										</section>
										<button type="button" id="apagarPontos" class="btn btn-default"><i class="fa fa-eraser"></i> Apagar Pontos</button>
									</form>
									<section id="instrucoes" class="alert alert-info hide"> 
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>Instruções:</strong> 
										<ol>
											<li>Clique e arraste os círculos arredondados nas bordas da cerca para alterá-la.</li>
											<br />
											<li>Clique em qualquer local dentro da área da cerca para confirmar as modificações.</li>
										</ol>
									</section>
								</section>
								<section class="col-sm-6"> 
									<section id="message-cerca"></section>
								</section>
							</section>
							<section id="loader-cerca"><img src="imagens/loader.gif" class="img-responsive" alt="Carregando..."></section>
							<section id="mapa-cerca"></section>
						</section>
						<section class="modal-footer"> 
							<button type="button" class="btn btn-default" data-dismiss="modal"> Concluir</button>
							<button type="button" id="salvarCerca" class="btn btn-primary"><i class="fa fa-save"></i> Salvar Cerca</button>
						</section>
					</section>
				</section>
			</section>
			
			<!-- Modal Histórico -->
			<section class="modal fade" id="modal-historico">
				<section class="modal-dialog-historico">
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Histórico</h3>
						</section>
						<section class="modal-body"> 
							<form method="POST" action="historico.php" class="form-inline" role="form" id="consultarHistorico">
								<input type="hidden" name="nrImeiConsulta" id="nrImeiConsulta">
								<input type="hidden" name="nomeVeiculo" id="nomeVeiculo">
								<input type="hidden" name="mnDataInicio" value="00">
								<input type="hidden" name="mnDataFinal" value="00">
								<section class="row">
									<section id="historicoInicio">
										<strong>Início:</strong>
										<input type="date" id="commandDateIni" name="txtDataInicio" value="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d") ?>" class="data-control">
										<select name="hrDataInicio" id="commandHourTimeIni" class="hora-control">
											<option value="0">00h</option>
											<option value="1">01h</option>
											<option value="2">02h</option>
											<option value="3">03h</option>
											<option value="4">04h</option>
											<option value="5">05h</option>
											<option value="6">06h</option>
											<option value="7">07h</option>
											<option value="8">08h</option>
											<option value="9">09h</option>
											<option value="10">10h</option>
											<option value="11">11h</option>
											<option value="12">12h</option>
											<option value="13">13h</option>
											<option value="14">14h</option>
											<option value="15">15h</option>
											<option value="16">16h</option>
											<option value="17">17h</option>
											<option value="18">18h</option>
											<option value="19">19h</option>
											<option value="20">20h</option>
											<option value="21">21h</option>
											<option value="22">22h</option>
											<option value="23">23h</option>
										</select>
									</section>
									<section id="historicoFim">
										<span style="float: right;">
											<strong>Fim:</strong>
											<input type="date" id="commandDateFim" name="txtDataFinal" value="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d") ?>" class="data-control">
											<select name="hrDataFinal" id="commandHourTimeFim" class="hora-control">
												<option value="0">00h</option>
												<option value="1">01h</option>
												<option value="2">02h</option>
												<option value="3">03h</option>
												<option value="4">04h</option>
												<option value="5">05h</option>
												<option value="6">06h</option>
												<option value="7">07h</option>
												<option value="8">08h</option>
												<option value="9">09h</option>
												<option value="10">10h</option>
												<option value="11">11h</option>
												<option value="12">12h</option>
												<option value="13">13h</option>
												<option value="14">14h</option>
												<option value="15">15h</option>
												<option value="16">16h</option>
												<option value="17">17h</option>
												<option value="18">18h</option>
												<option value="19">19h</option>
												<option value="20">20h</option>
												<option value="21">21h</option>
												<option value="22">22h</option>
												<option value="23">23h</option>
											</select>
										</span>
									</section>
								</section>
								
								<br>
								
								<button type="button" class="btn btn-default" onClick="acertaHistorico(4);">Últimas 4 horas</button>
								<button type="button" class="btn btn-default" onClick="acertaHistorico(12);">Últimas 12 horas</button>
								<button type="button" class="btn btn-default" onClick="acertaHistorico(24);">Últimas 24 horas</button>
								<button type="button" class="btn btn-default" onClick="acertaHistorico(48);">Últimas 48 horas</button>
								<button style="float: right;" type="submit" class="btn btn-primary"><i class="fa fa-book"></i> Consultar</button>
							</form>
							<hr>
							<section id="relatorio"></section>
						</section>
						<section class="modal-footer"> 
							<button type="button" class="btn btn-default" data-dismiss="modal">Concluir</button>
						</section>
					</section>
				</section>
			</section>
		</section>
	  
		<!-- JavaScript -->
		<script src="javascript/jquery-2.2.2.min.js"></script>
		<script src="javascript/bootstrap.min.js"></script>
		<script src="javascript/jquery.validate.min.js"></script>
		<script src="javascript/bootstrap-waitingfor.js"></script>
		<script src="javascript/polygon.min.js"></script>
		<script src="javascript/latlong.js"></script>
		<script src="javascript/geo.js"></script>
		
		<script type="text/javascript">
			var intervalTraceRoute;
			var counterTrace = 0;
			var markers;
			var path;
			var poly;
			var lat_lng = [];
			var latlngbounds = new google.maps.LatLngBounds();

			$(document).ready(function(){
				verificarAlertas();

				$("#alterar-senha").validate({
					rules:{
						senha_atual: {required: true},
						nova_senha: {required: true, minlength: 3},
						repita_senha: {required: true, minlength: 3, equalTo: 'input#nova_senha'}
					},
					
					messages:{
						senha_atual: {required: "Informe a senha atual"},
						nova_senha: {required: "Informe uma nova senha", minlength: "Mínimo de {0} caracteres"},
						repita_senha: {required: "Confirme a senha", minlength: "Mínimo de {0} caracteres", equalTo: "A nova senha não coincide"}
					},
					
					submitHandler: function(form){
						$.ajax({
							type: "GET",
							url: 'senha.php',
							data: $(form).serialize(),
							
							success: function(status){
							$('#message').html("<p class='text-center'><img src='imagens/loader.gif' alt='Carregando..'></p>")
								.hide()
								.fadeIn(1500, function(){
									$('#message').append(status);
									$('#message p').remove();
									$('#alterar-senha').each(function (){this.reset();});
								});
							}
						});          
						return false;
					}
				});
				
				$("#enviarRegras").validate({
					rules:{
						nome_regra: {minlength: 3, required: true},
						cercas: {required: true},
						veiculos: {required: true}
					},
					
					messages:{
						nome_regra:{ 
							required: "Informe um título para a Regra.",
							minlength: "Mínimo de {0} caracteres." 
						},
						cercas: {required: "Selecione ao menos uma Cerca."},
						veiculos: {required: "Selecione ao menos um Veículo."}
					},
					
					submitHandler: function(form){
						$.ajax({
							url: "regras.php",
							type: "GET",
							data: $(form).serialize(),
							
							success: function(resposta){
								$('#message-regras').html("<p class='text-center'><img src='imagens/loader.gif' alt='Carregando..'></p>")
								.hide()
								.fadeIn(1500, function(){
									$('#message-regras').append(resposta);
									$('#message-regras p').remove();
									
									if(resposta == "<section class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Sucesso!</strong> A regra foi cadastrada com êxito.</section>") {
										var nome = $('#nome_regra').val();
										$.get('regras.php',{'id_inserido': nome}, function (id_retornado) {
											$('#modal-regras .modal-body table tbody').append("<tr><td>" + nome + "</td> <td> <a href='#submodal-regras' onclick=\"obterDadosRegras(" + id_retornado + ", '" + nome + "');\" data-toggle='modal' rel='tooltip' title='Editar' class='btn btn-sm btn-primary'><i class='fa fa-pencil fa-fw'></i></a> <a href='javascript:void(0);' remover='" + id_retornado + "' rel='tooltip' title='Excluir' class='del-regra btn btn-sm btn-danger' disabled><i class='fa fa-trash-o fa-fw'></i></a> </td> </tr>");
										});
									}
								});
							}
						});
						return false;
					}
				});
				
				$("#enviarGrupos").validate({
					rules:{
						nome_grupo: { minlength: 3, required: true },
						veiculos_grupo: { required: true }
					},
					
					messages:{
						nome_grupo:{
							required: "Informe um nome para o grupo",
							minlength: "Mínimo de {0} caracteres"
						},
						veiculos_grupo: {required: "Selecione ao menos um veículo"}
					},
					
					submitHandler: function(form){
						$.ajax({
							url: "grupos.php",
							type: "GET",
							data: $(form).serialize(),
							
							success: function (resposta){
								$('#message-grupos').html("<p class='text-center'><img src='imagens/loader.gif' alt='Carregando..'></p>")
								.hide()
								.fadeIn(1500, function(){
									$('#message-grupos').append(resposta);
									$('#message-grupos p').remove();
									
									if(resposta == "<section class='alert alert-success'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Sucesso! </strong>O grupo foi cadastrado com êxito.</section>") {
										var nome = $('#nome_grupo').val();
										$.get('grupos.php',{'id_inserido': nome}, function (id_retornado) {
											$('#modal-grupos .modal-body table tbody').append("<tr><td>" + nome + "</td> <td> <a href='#submodal-grupos' onclick=\"obterDados(" + id_retornado + ", '" + nome + "');\" data-toggle='modal' rel='tooltip' title='Editar' class='btn btn-sm btn-primary'><i class='fa fa-pencil fa-fw'></i></a> <a href='javascript:void(0);' remover='" + id_retornado + "' rel='tooltip' title='Excluir' class='del-group btn btn-sm btn-danger' disabled><i class='fa fa-trash-o fa-fw'></i></a> </td> </tr>");
										});
									}
								});
							}
						});
						return false;
					}
				});

				$("#consultarHistorico").validate({
					submitHandler: function (form) {
						$("#consultarHistorico button[type=submit]").prop('disabled', true);
						$("#consultarHistorico button[type=submit] i").removeClass('fa-book').addClass('fa-refresh fa-spin');
						$("#nrImeiConsulta").val($('#bens').val());
						$("#nomeVeiculo").val($("#bens").find(":selected").text());
						
						$.ajax({
							url: "historico.php",
							type: "POST",
							data: $(form).serialize(),
							
							success: function (lista){
								$("#relatorio").html(lista);
								$("#consultarHistorico button[type=submit]").prop('disabled', false);
								$("#consultarHistorico button[type=submit] i").removeClass('fa-refresh fa-spin').addClass('fa-book');
								var hora = 0;
								var velocidade = 0;
								var ligado = 0;
								var latAnt = 0;
								var latAtu = 0;
								var lonAtu = 0;
								var lonAnt = 0;
								var distance = 0.00;
								var tabRel = $('#relatorio table').find('tbody').find('tr');
								var hora = $(tabRel[0]).find('td:eq(0)').html();
								var latAtu = $(tabRel[0]).find('td:eq(1)').html();
								var lonAtu = $(tabRel[0]).find('td:eq(2)').html();
								var velocidade = $(tabRel[0]).find('td:eq(3)').html();
								var ligado = $(tabRel[0]).find('td:eq(4)').html();

								if(tabRel.length > 2){
									while(posicoes.length > 0) {
										posicoes.pop();
									}

									for(var i = 1; i < tabRel.length - 1; i++){
										posicoes.push({
											'lat': latAtu,
											'lng': lonAtu,
											'horario': hora,
											'velocidade': velocidade,
											'ligado': ligado
										});
										
										var hora = $(tabRel[i]).find('td:eq(0)').html();
										var latAnt = $(tabRel[i]).find('td:eq(1)').html();
										var lonAnt = $(tabRel[i]).find('td:eq(2)').html();
										var velocidade = $(tabRel[i]).find('td:eq(3)').html();
										var ligado = $(tabRel[i]).find('td:eq(4)').html();
										
										var p1 = new LatLon(latAtu, lonAtu);
										var p2 = new LatLon(latAnt, lonAnt);

										distance += parseFloat(p1.distanceTo(p2));

										latAtu = latAnt;
										lonAtu = lonAnt;
									}

									$('#km-rodado').html(parseInt(distance) + ' Km rodados');
									$('#tracar').removeClass('hide');
								}
								else{
									console.log('Apenas um registro na tabela');
									$('#tracar').addClass('hide');
								}
							},
							
							error: function (XMLHttpRequest, textStatus, errorThrown){
								console.log(XMLHttpRequest);
								console.log(textStatus);
								console.log(errorThrown);
								$("#consultarHistorico button[type=submit]").prop('disabled', false);
								$("#consultarHistorico button[type=submit] i").removeClass('fa-refresh fa-spin').addClass('fa-book');
							}
						});
						return false;
					}
				});
			
				$("#calculaRota").click(function(e){
					e.preventDefault();
					calcRoute();
					$("#slide-panel").removeClass('hide');
				});

				$('#opener').on('click', function(){   
					var panel = $('#slide-panel');
					if (panel.hasClass("visible")) {
						panel.removeClass('visible').animate({'margin-right':'-300px'});
					} 
					else{
						panel.addClass('visible').animate({'margin-right':'0px'});
					} 
					return false; 
				});

				$('#command').change(function (){
					var valor = $(this).val();
					if (valor == ',C,30s') {
						$('li.tempo').removeClass('hide');
						$('#commandTime').parent('li').removeClass('hide');
					}
					else {
						$('li.tempo').addClass('hide');
						$('#commandTime').parent('li').addClass('hide');
					}

					if (valor == ',H,060') {
						$('li.parametro').removeClass('hide');
						$('#commandSpeedLimit').parent('li').removeClass('hide');
					}
					else {
						$('li.parametro').addClass('hide');
						$('#commandSpeedLimit').parent('li').addClass('hide');
					}
				});

				// Altera a disponibilidade do envio de comandos
				$('.libera-comandos').click(function(){
					if ($('#bens').val()) $('#enviarcomando').prop('disabled', false);
					else{
						$('#enviarcomando').prop('disabled', true);
						alert("Para realizar esta ação selecione um veículo.");
					}
				});

				// Envia o comando para o rastreador
				$('#enviarcomando').click(function (e){
					e.preventDefault();
					$('#enviarcomando i').removeClass('fa-upload').addClass('fa-refresh fa-spin');
					
					var imei               = $('#bens').val();
					var nomeBem            = $('#bens option:selected').text();
					var comandoSelecionado = $('#command').val();
					var intervaloComando   = $('#commandTime').val();
					var velocidadeLimite   = $('#commandSpeedLimit').val();

					$.ajax({
						url: "comandos.php",
						type: "POST",
						data: {'imei': imei, 'command': comandoSelecionado, 'commandTime': intervaloComando, 'commandSpeedLimit': velocidadeLimite},
						
						success: function (resultComandos){
							if(resultComandos == "OKOK"){
								$('#enviarcomando').addClass('btn-success');
								$('#enviarcomando > i').removeClass('fa-refresh fa-spin').addClass('fa-check');
								
								setTimeout(function(){
									$('#enviarcomando').removeClass('btn-success');
									$('#enviarcomando > i').removeClass('fa-check').addClass('fa-upload');
								}, 3000);
							}
							else{
								$('#enviarcomando').addClass('btn-success');
								$('#enviarcomando > i').removeClass('fa-refresh fa-spin').addClass('fa-check');
								
								setTimeout(function(){
									$('#enviarcomando').removeClass('btn-success');
									$('#enviarcomando > i').removeClass('fa-check').addClass('fa-upload');
								}, 3000);
							}
						}
					});
				});

				// Deleta o grupo escolhido
				$('.del-group').click(function(){
					var botao = $(this);
					var id = botao.attr('remover');
					botao.children('i').removeClass('fa-trash-o').addClass('fa-refresh fa-spin');
					botao.attr('disabled', true);

					$.ajax({
						url: "grupos.php",
						type: "GET",
						data: {id_grupo: id, acao: 'remover'},
					  
						success: function(resposta){
							if(resposta == "OK") {
								botao.children('i').removeClass('fa-refresh fa-spin').addClass('fa-check');
								setTimeout(function () {
									botao.parent().parent('tr').remove();
								}, 2000);
							}
							else{
								botao.children('i').removeClass('fa-refresh fa-spin').addClass('fa-trash-o');
								botao.attr('disabled', false);
								alert(resposta);
							}
						}
					});
				});
				
				// Deleta a regra escolhida
				$('.del-regra').click(function(){
					var botao = $(this);
					var id = botao.attr('remover');
					botao.children('i').removeClass('fa-trash-o').addClass('fa-refresh fa-spin');
					botao.attr('disabled', true);

					$.ajax({
						url: "regras.php",
						type: "GET",
						data: {id_regra: id, acao: 'remover'},
					  
						success: function(resposta){
							if(resposta == "OK") {
								botao.children('i').removeClass('fa-refresh fa-spin').addClass('fa-check');
								setTimeout(function(){
									botao.parent().parent('tr').remove();
								}, 2000);
							}
							else{
								botao.children('i').removeClass('fa-refresh fa-spin').addClass('fa-trash-o');
								botao.attr('disabled', false);
								alert(resposta);
							}
						}
					});
				});
				
				// Adiciona os balões de ajuda
				$("li[rel=tooltip], select[rel=tooltip], .delcerca").tooltip({placement: 'right'});
				$("span[rel=tooltip]").tooltip({placement: 'left'});
			});

			$(window).resize(function(){
				posicionaHistorico();
			});
			
			var posicoes = [];

			function posicionaHistorico(){
				if($("#bens").val()){
					$("#historico").removeClass('hide');
					
					var altura = ($("#historico").height() - $("#historico .header").height()) * -0.95;
					$("#historico").css({ 'bottom': altura });

					$("#historico .header").click(function(){
						var posicao = parseInt($("#historico").css('bottom'));
						
						if(posicao < 0){
							novaAltura = 0;
							$("#historico .header i").removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
						}
						else{
							novaAltura = altura;
							$("#historico .header i").removeClass('fa-angle-double-down').addClass('fa-angle-double-up');
						}
						$("#historico").animate({bottom: novaAltura});
					});
				}
				else 
					$("#historico").addClass('hide');
			}

			function acertaHistorico(horas){
				horaIni = $('#commandHourTimeIni');
				horaFim = $('#commandHourTimeFim');
				dataIni = $('#commandDateIni');

				horaAtual = new Date();
				horaFim.val(horaAtual.getHours());

				if(horaAtual.getHours() - horas < 0){
					horaIni.val(24 - (horas - horaAtual.getHours()));
					dia = horaAtual.getDate() - 1;
					mes = horaAtual.getMonth() + 1;
					
					if (dia < 0 || dia === 0){
						dia = 1;
						mes = mes - 1;
					}
					
					dataIni.val(horaAtual.getFullYear() + '-' + ('0' + mes).slice(-2) + '-' + ('0' + dia).slice(-2));
				
					if(horas == 48){
						dataIni.val(horaAtual.getFullYear() + '-' + ('0' + mes).slice(-2) + '-' + ('0' + (dia - 1)).slice(-2));
						horaIni.val(horaAtual.getHours());
					}
				} 
				else{
					dataIni.val(horaAtual.getFullYear() + '-' + ('0' + (horaAtual.getMonth() + 1)).slice(-2) + '-' + ('0' + horaAtual.getDate()).slice(-2));
					horaIni.val(horaAtual.getHours() - horas);
				}
			}

			function exibirListagemHistorico(imei){
				$.ajax({
					url: "historicoListagem.php",
					type: "GET",
					data: {'imei': imei},
					
					success: function(result){
						$("#historico .content table tbody").html(result);
						posicionaHistorico();
					}
				});
			}

			function imprimirHistorico(){
				var data = $('#areaImpressa').html();
				var mywindow = window.open('', 'Histórico de Localização', 'left=200, width=950, height=500, scrollbars=1');
			  
				mywindow.document.write('<html><head><title>Histórico de Localização</title>');
				mywindow.document.write('<link rel="stylesheet" href="css/bootstrap.css" type="text/css">');
				mywindow.document.write('</head><body>');
				mywindow.document.write(data);
				mywindow.document.write('</body></html>');

				mywindow.addEventListener('load', function(){
					mywindow.print();
				}, true);
			}

			function limparReveal(idReveal){
				$('#message').html("");
				$(idReveal).each(function(){this.reset();});
				$(idReveal).find('input').removeClass('valid error');
				$(idReveal).find('label.error').remove();
			}

			function verificarAlertas(){
				$.ajax({
					url: "alertas.php",
					type: "GET",
					dataType: "JSON",
					
					success: function(alertas){
						$(".modal-alerts ul").html(alertas.lista);
						$(".badge").html(alertas.count);
					}
				});
			}

			function fecharAlerta(id_alerta){
				$.ajax({
					url: "alertas.php",
					type: "GET",
					data: {idAlerta: id_alerta},
					
					success: function(){
						verificarAlertas();
					}
				});
			}

			function habilitarHodometro(){
				try{
					if($('#bens').val() == ""){
						$('#hod_atual').val("").prop('disabled', true);
						$('#alerta_hodometro').val("").prop('disabled', true);
						$('#enviaHodometro').prop('disabled', true);
						alert('Para realizar esta ação selecione um veículo.');
					}
					else{
						$('#hod_atual').prop('disabled', false);
						$('#alerta_hodometro').prop('disabled', false);
						$('#enviaHodometro').prop('disabled', false);
					}
				}
				catch(error){
					alert('Selecione um veículo! ' + error);
				}
			}

			function alterarHodometro(){
				try{
					$('#enviaHodometro > i').removeClass('fa-save').addClass('fa-refresh fa-spin');

					var hodometro = $('#hod_atual').val();
					var alerta_hodometro = $('#alerta_hodometro').val();
					var numImei = $('#bens').val();

					$.ajax({
						url: "hodometro.php",
						type: "GET",
						data: {imei: numImei, acao: 'salvar_hodometro', hodometro: hodometro, alerta_hodometro: alerta_hodometro},
						success: function (dataHodometro){
							console.log(dataHodometro);
							
							if(dataHodometro == "OK"){
								$('#enviaHodometro').addClass('btn-success');
								$('#enviaHodometro > i').removeClass('fa-refresh fa-spin').addClass('fa-check');
								$('#hod_atual').prop('disabled', true);
								$('#alerta_hodometro').prop('disabled', true);
								$('#enviaHodometro').prop('disabled', true);
								
								setTimeout(function () {
									$('#enviaHodometro').removeClass('btn-success');
									$('#enviaHodometro > i').removeClass('fa-check').addClass('fa-save');
								}, 3000);
							}
							else{
								$('#enviaHodometro').addClass('btn-danger');
								$('#enviaHodometro > i').removeClass('fa-refresh fa-spin').addClass('fa-times');
								alert(dataHodometro);
								
								setTimeout(function () {
									$('#enviaHodometro').removeClass('btn-danger');
									$('#enviaHodometro > i').removeClass('fa-times').addClass('fa-save');
								}, 3000);
							}
						}
					});
				}
				catch(error){
					alert('Ops! Algo deu errado: '+ error);
				}
			}

			function obterDados(id, nome){
				if(!id) 
					$('#submodal-grupos h4').html("Cadastrar Grupo");
				else 
					$('#submodal-grupos h4').html("Editar Grupo");

				$('#message-grupos').html("");
			  
				$.ajax({
					url: "grupos.php",
					type: "GET",
					data: { id_grupo: id, acao: 'dados' },
					dataType: "JSON",
					
					success: function(grupo){
						$('#id_grupo').val(id);
						$('#nome_grupo').val(nome);
						$('#veiculos_grupo').html(grupo);
					}
				})
			}
			
			function obterDadosRegras(id, nome){
				if(!id) 
					$('#submodal-regras h3').html("Nova Regra");
				else 
					$('#submodal-regras h3').html("Editar Regra");
	
				$('#message-regras').html("");
			  
				$.ajax({
					url: "regras.php",
					type: "GET",
					data: {id_regra: id, acao: 'dados'},
					dataType: "JSON",
					
					success: function(grupo){			
						$('#id_regra').val(id);	
						$('#nome_regra').val(nome);
						$('#veiculos').html(grupo);
					}
				})
			}

			function modalCerca(){
				$('#modal-cerca-expand').modal({show:true});
				$('#form-cerca').removeClass('hide');
				$('#instrucoes').addClass('hide');
				$('#salvarCerca').prop('disabled', false);
				
				//alert($('#bens').val());
				var imei = $('#bens').val();//$('#veiculoCerca').val();
				//var imei = 359710049050884;

				if(imei){
					$('#nomeCerca').val('');
					$('#message-cerca').html('');
					$('#mapa-cerca').fadeTo('fast', 1);

					var saopaulo = new google.maps.LatLng(-23.548900,-46.638800);
					var opcoesCerca = {
						zoom: 11,
						center: saopaulo,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					}
					
					map = new google.maps.Map(document.getElementById('mapa-cerca'), opcoesCerca);

					google.maps.event.addDomListener(window, "resize", function(){
						var center = map.getCenter();
						google.maps.event.trigger(map, "resize");
						map.setCenter(center); 
					});

					google.maps.event.addListenerOnce(map, 'idle', function(){
						var center = map.getCenter();
						google.maps.event.trigger(map, 'resize');
						map.setCenter(center);
					});

					var creator = new PolygonCreator(map);

					// Apagar pontos
					$('#apagarPontos').click(function(){
						creator.destroy();
						creator = null;
						creator = new PolygonCreator(map);
					});

					// Enviar cerca
					$('#salvarCerca').click(function(){
						var nome = $('#nomeCerca').val();
						
						if (nome == "" || nome == null){
							window.alert("Informe um nome para a Cerca.");
						}
						else{
							if(creator.showData() == null) {
								window.alert("Você deve fechar o polígono.");
							} 
							else{
								$('#mapa-cerca').fadeTo('fast', 0.4);
								var pontos = creator.showData();
							  
								$.ajax({
									url: "cercaIncluir.php",
									type: "GET",
									data: { 'imei': imei, 'NomeCerca': nome, 'cerca': pontos },
									success: function (resCerca) {
										if(resCerca == 'OK'){
											$('#nomeCerca').val('');
											$('#apagarPontos').click();
										
											setTimeout(function () {
												$('#mapa-cerca').fadeTo('fast', 1);
												$('#message-cerca').html("<section class='alert alert-success'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Sucesso!</strong> A cerca foi criada com êxito. </section> </section>");
											}, 1500);
										}
										else{
											$('#mapa-cerca').fadeTo('fast', 1);
											$('#message-cerca').html("<section class='alert alert-danger'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Erro: </strong> Ops! Algo deu errado... </section> </section>");
											console.log(resCerca);
										}
									}
								});
							}
						}
					});

					$('#form-cerca').submit(function(e){
						e.preventDefault();
					});

					$('#modal-cerca-expand').modal({show:true});
				}
				else{
					$('.cerca-dropdown button').addClass('btn-warning');
					$('.cerca-dropdown button i').removeClass('fa-plus-circle').addClass('fa-warning');
					
					setTimeout(function(){
						$('.cerca-dropdown button').removeClass('btn-warning');
						$('.cerca-dropdown button i').removeClass('fa-warning').addClass('fa-plus-circle');
					}, 1500);
				} 
			}

			function editaCerca(id, imei){
				$.ajax({
					url: "cercaEditar.php",
					type: "GET",
					data: {"imei": imei, 'id': id},
					dataType: "JSON",
					
					success: function(result){
						$('#form-cerca').addClass('hide');
						$('#instrucoes').removeClass('hide');
						$('#salvarCerca').prop('disabled', true);

						var triangleCoords = [
							new google.maps.LatLng(result.latCoord[0],result.lngCoord[0]),
							new google.maps.LatLng(result.latCoord[1],result.lngCoord[1]),
							new google.maps.LatLng(result.latCoord[2],result.lngCoord[2]),
							new google.maps.LatLng(result.latCoord[3],result.lngCoord[3])
						];
		
						var geoFenceInitialPoint = new google.maps.LatLng(result.latCoord[0],result.lngCoord[0]);
				  
						var opcoesCerca = {
							zoom: 15,
							center: geoFenceInitialPoint,
							mapTypeId: google.maps.MapTypeId.ROADMAP
						}
						
						map = new google.maps.Map(document.getElementById('mapa-cerca'), opcoesCerca);

						var bermudaTriangle = new google.maps.Polygon({
							paths: triangleCoords,
							strokeColor: "#FF0000",
							strokeOpacity: 0.8,
							strokeWeight: 3,
							fillColor: "#FF0000",
							fillOpacity: 0.35,
							editable: true
						});
				  
						bermudaTriangle.setMap(map);

						google.maps.event.addDomListener(window, "resize", function(){
							var center = map.getCenter();
							google.maps.event.trigger(map, "resize");
							map.setCenter(center); 
						});

						google.maps.event.addListenerOnce(map, 'idle', function(){
							var center = map.getCenter();
							google.maps.event.trigger(map, 'resize');
							map.setCenter(center);
						});

						google.maps.event.addListener(bermudaTriangle, 'click', showArrays);
						var infowindow = new google.maps.InfoWindow();

						function showArrays(event){
							var imei = result.imei;
							var id = result.id;
							var latitude = result.latitude;
							var longitude = result.longitude;
							var vertices = this.getPath();
							var contentString = "latitude="+ latitude + "&longitude=" + longitude + "&imei=" + imei + "&id=" + id + "&coordenadas=";

							for(var i = 0; i < vertices.length; i++){
								var xy = vertices.getAt(i);
								if (i+1 == vertices.length){
									contentString += xy.lat() +"," + xy.lng();
								}
								else{
									contentString += ''+ xy.lat() +"," + xy.lng() +'|';
								}
							}

							decisao = confirm("Deseja gravar o perímetro?");
							
							if(decisao){
								$('#mapa-cerca').fadeTo('fast', 0.4);
								
								$.ajax({
									url: "cercaAlterar.php?" + contentString,
									type: "GET",
									
									success: function(retorno){
										console.log(retorno);
										if (retorno == "OK"){
											setTimeout(function () {
												$('#mapa-cerca').fadeTo('fast', 1);
												$('#message-cerca').html("<section class='alert alert-success'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Sucesso!</strong> A cerca foi alterada com êxito.</section></section>");
												setTimeout(function () {
													$('#message-cerca').html("");
												}, 3000);
											}, 1500);
										}
									}
								});
							} 
							else{
								alert('Clique no botão concluir para sair.');
							}
							infowindow.open(map);
						}
						$('#modal-cerca-expand').modal({show:true});
					}
				});
			}
			
			function removeCerca(idCerca){
				if (confirm("Realmente deseja excluir esta cerca? Esta ação não poderá ser desfeita.")){
					$.ajax({
						url: "cercaExcluir.php",
						type: "GET",
						data: {'codCerca': idCerca},
						
						success: function (result){
							if (result == "OK") {
								$('#'+idCerca).remove();
							}
							else{
								alert(result);
								console.log(result);
							}
						}
					});
				}
			}
			
			// Google Maps API //
			var directionsDisplay;
			var markerArray = [];
			var markerArrayHist = [];
			var marcadores = [];
			
			// Inicia o serviço de rotas
			var directionsService = new google.maps.DirectionsService();

			var icons = {
				start: new google.maps.MarkerImage(
					'imagens/historico_inicio.png',
					new google.maps.Size(48, 48),
					new google.maps.Point(0, 0),
					new google.maps.Point(22, 32)
				),
				end: new google.maps.MarkerImage(
					'imagens/historico_fim.png',
					new google.maps.Size(40, 40),
					new google.maps.Point(0, 0),
					new google.maps.Point(22, 32)
				)
			}
			
			// Centralização do mapa. Atualmente é brasil.
			var var_location = new google.maps.LatLng(-14.198263, -56.638331);

			var var_mapoptions = {
				center: var_location,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				zoom: 4,
	 mapTypeControl: true,
      mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.TOP_LEFT
      },
      zoomControl: true,
      zoomControlOptions: {
        position: google.maps.ControlPosition.TOP_LEFT,
        style: google.maps.ZoomControlStyle.LARGE
      },
      scaleControl: false,
      streetViewControl: true,
      streetViewControlOptions: {
        position: google.maps.ControlPosition.LEFT_TOP
      }
    };
			
			var var_map = new google.maps.Map(document.getElementById("map-canvas"),var_mapoptions);

			function init_map(){
				
				directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});
				directionsDisplay.setMap(var_map);
				directionsDisplay.setPanel(document.getElementById("directionsPanel"));

				var closeButton = document.querySelector('#close-street'), controlPosition = google.maps.ControlPosition.RIGHT_TOP;
				var streetView = var_map.getStreetView();
				
				streetView.setOptions({enableCloseButton: false});
				streetView.controls[ controlPosition ].push( closeButton );
				

				google.maps.event.addDomListener(closeButton, 'click', function(){
					streetView.setVisible(false);
				});
			}
			
			
			google.maps.event.addDomListener(window, 'load', init_map);

			var thePanorama = var_map.getStreetView();
			
			google.maps.event.addListener(thePanorama, 'visible_changed', function(){
				if (thePanorama.getVisible()) {
					$('#close-street').removeClass('hide');
				} 
				else{
					$('#close-street').addClass('hide');
				}
			});

			function calcRoute(){
				$('#calculaRota i').removeClass('fa-road').addClass('fa-refresh fa-spin');
			  
				var start = document.getElementById('inicio_rota').value;
				var end = document.getElementById('destino_rota').value;
				var request = {
					origin: start,
					destination: end,
					travelMode: google.maps.TravelMode.DRIVING
				};

				limparMapa();

				directionsService.route(request, function(response, status){
					if(status == google.maps.DirectionsStatus.OK){
						directionsDisplay.setDirections(response);
						var leg = response.routes[0].legs[0];
						
						makeMarker( leg.start_location, icons.start, "Ponto de Saída" );
						makeMarker( leg.end_location, icons.end, 'Ponto de Chegada' );
						
						$('#calculaRota').addClass('btn-success');
						$('#calculaRota > i').removeClass('fa-refresh fa-spin').addClass('fa-check');
						
						setTimeout(function () {
							$('#calculaRota').removeClass('btn-success');
							$('#calculaRota > i').removeClass('fa-check').addClass('fa-road');
						}, 3000);
					}
					else{
						$('#calculaRota').addClass('btn-danger');
						$('#calculaRota > i').removeClass('fa-refresh fa-spin').addClass('fa-times');
					  
						setTimeout(function () {
							$('#calculaRota').removeClass('btn-danger');
							$('#calculaRota > i').removeClass('fa-times').addClass('fa-road');
						}, 3000);
					  
						alert('Não foi possível calcular a rota: ' + status);
						$('#inicio_rota').focus();
					}
				});
			}

			// Plota no mapa as coordenadas obtidas do histórico
			function tracarHistorico(){
				limparMapaHist();
				
				markers = posicoes;
				path = new google.maps.MVCArray();
				
				poly = new google.maps.Polyline({
					map: var_map,
					strokeColor: '#4986E7'
				});
			
				waitingDialog.show('Traçando Mapa. Por favor aguarde.');
				intervalTraceRoute = setInterval(function(){drawNewAnimatedMap();}, 5)
				
				$('#modal-historico').modal('toggle');
				$("#historico .header").click();
				$('#erase-trace').parent('.clear-trace').removeClass('hide');
				
				$('#erase-trace').click(function(){
					for (var i = 0; i < lat_lng.length; i++){  
						lat_lng.splice(i, 1);
					}
					
					poly.setMap(null);
					limparMapaHist();
					console.log(markerArrayHist.length);
					path.clear();
					$('#erase-trace').parent('.clear-trace').addClass('hide');
				});		
			}

			function makeMarker(position, icon, title, retorna){
				var marker = new google.maps.Marker({
					position: position,
					map: var_map,
					icon: icon,
					title: title,
					animation: google.maps.Animation.DROP
				});
				markerArray.push(marker);
				if(retorna)
					return marker;
			}


			function verNoMapa(lat, lon) {
				var image = 'imagens/coordenada.png';
				var posHist = new google.maps.LatLng(lat, lon);
				
				var pointMarker = new google.maps.Marker({
					position: posHist,
					map: var_map,
					icon: image,
					animation: google.maps.Animation.DROP
				});

				markerArrayHist.push(pointMarker);
				pointMarker.setMap(var_map);
				var_map.setZoom(16);
				var_map.panTo(posHist);
			}

			function limparMapa(){
				var j = 0;
				
				while(j < 10){
					for(var i = 0; i < markerArray.length; i++){
						markerArray[i].setMap(null);
						marcadores.splice(i, 1);
						markerArray.splice(i, 1);
					}

					for(var h = 0; h < markerArrayHist.length; h++){
						markerArrayHist[i].setMap(null);
						markerArrayHist.splice(i, 1);
					} 
					j++;
				}
			  
				poly.setMap(null);
				markerArray = [];
				markerArrayHist = [];
				marcadores = [];
				directionsDisplay.setDirections({routes: []});

				$("#slide-panel").addClass('hide');
				$("#inicio_rota").val("");
				$("#destino_rota").val("");
			}

			function limparMapaHist(){
				var j = 0;
				var i = 0;
				
				while(j < 10){
					for (i = 0; i < markerArrayHist.length; i++){
						markerArrayHist[i].setMap(null);
						markerArrayHist.splice(i, 1);
					} 
					j++;
				}
				markerArrayHist = [];
			}

			var posVeiculoCerca;
			
			function alterarComboVeiculo(imei){
				$('#dropdownVeiculos').dropdown('toggle');
				$('#relatorio').empty();
				
				limparMapa();

				if(imei){
					$.ajax({
						url: "veiculoDados.php",
						type: "GET",
						data: {filtro: imei},
						
						success: function(aDados){ 
							var infowindow = new google.maps.InfoWindow();
							var marker, i;
							var markers = new Array();  
							var enderecos = new Array();
							var endereco;
							var datas = new Array();
							var velocidades = new Array();
							
							var aDados = eval('('+aDados+')');
							
							for(var i = 0; i < aDados.length; i++){
								var dados = aDados[i];

								if(dados.sinal == 'D'){
									var imgTipo = '_inativo.png';
								}
								else{
									if(dados.block == 'S') 
										var imgTipo = '_bloqueado.png';
									else 
										var imgTipo = '_ativo.png';
								}
							  
								switch (dados.tipo){     
									case 'moto':
										var image = 'imagens/marker_moto' + imgTipo;
										break;
									
									case 'carro':
										var image = 'imagens/marker_carro' + imgTipo;
										break;
									
									case 'jetski':
										var image = 'imagens/marker_jet' + imgTipo;
										break;
										
									case 'trator':
										var image = 'imagens/marker_trator' + imgTipo;
										break;
									
									case 'caminhao':
										var image = 'imagens/marker_caminhao' + imgTipo;
										break;
									
									case 'onibus':
										var image = 'imagens/marker_onibus' + imgTipo;
										break;
									
									default:
										var image = 'imagens/marker_carro' + imgTipo;
										break;
								}
							  
								var myLatLng = new google.maps.LatLng(dados.latitude, dados.longitude);
								var pointMarker = makeMarker(myLatLng, image, dados.name, true);
							  
								posVeiculoCerca = new google.maps.LatLng(-23.548900, -46.638800);
								geocoder = new google.maps.Geocoder();
								
								geocoder.geocode({'latLng': myLatLng}, function(results, status){
									if(status == google.maps.GeocoderStatus.OK){
										dados.endereco = results[0].formatted_address;
									}
									else{
										dados.endereco = status;
									}
								});
							  
								google.maps.event.addListener(pointMarker, 'click', (function(pointMarker, i){
									return function(){
										infowindow.setContent(
											"<section id='bodyContent' style='overflow: hidden; text-align:left; width:200px; height:150px;'><p><b>Identificação: </b>" + aDados[i]["apelido"] +
											"<br /><b>Veículo:</b> " + aDados[i]["marca"] + " " + aDados[i]["modelo"] +
											"<br /><b>Placa:</b> " + aDados[i]["name"] +
											"<br /><b>IMEI:</b> " + aDados[i]["imei"] +
											"<br /><b>Chip: </b>" + aDados[i]["identificacao"] +
											"<br /><b>Rastreador: </b>" + aDados[i]["modelo_rastreador"] +
											"<br /><b>Data: </b> " + aDados[i] ["data"] + 
											"<br /><b>Velocidade:</b>" +aDados[i]["velocidade"]+' Km/h'+
											"</p></section>"
										);
										infowindow.open(var_map, pointMarker);
									}
								})(pointMarker, i));
								marcadores.push(dados);
								
								google.maps.event.addListener(var_map, "click", function(){
									infowindow.close();
								});
							}
							
							var_map.panTo(myLatLng);
							
							if(aDados.length > 1)
								var_map.setZoom(10);
							else{
								var_map.setZoom(16);
								exibirListagemHistorico(imei);
							  
								$.ajax({
									url: "hodometro.php",
									type: "GET",
									data: {acao: 'hodometro_atual', imei: imei},
									dataType: "JSON",
	
									success: function (infoHodometro){
										$('#hod_atual').val(infoHodometro.hodometro);
										$('#alerta_hodometro').val(infoHodometro.alerta_hodometro);
									}
								});
							}
						}
					});
				}
				else 
					posicionaHistorico();
			}

			function autoReload(){
				if(markerArray.length > 0){
					for (var i = 0; i < markerArray.length; i++){
						$.ajax({
							url: "historicoListagem.php",
							type: "GET",
							data: {'imei': marcadores[i].imei},
							
							success: function (result){
							  $("#historico .content table tbody").html(result);
							}
						});
				  
						$.ajax({
							url: "veiculoDados.php",
							data: {posicao: marcadores[i].imei},
							
							success: function (coordenadas){
								var coordenadas = eval('('+coordenadas+')');
								for(var i = 0; i < coordenadas.length; i++){
									var novaPos = new google.maps.LatLng(coordenadas[i].latitude, coordenadas[i].longitude);
									markerArray[i].setPosition(novaPos);
						
									var dados = coordenadas[i];
						
									if(dados.sinal == 'S' || dados.sinal == 'D'){
										var imgTipo = '_inativo.png';
									}
									else{
										if (dados.block == 'S') 
											var imgTipo = '_bloqueado.png';
										else 
											var imgTipo = '_ativo.png';
									}
									
									switch (dados.tipo) {     
										case 'moto':
											var image = 'imagens/marker_moto' + imgTipo;
											break;
									  
										case 'carro':
											var image = 'imagens/marker_carro' + imgTipo;
											break;
									  
										case 'jetski':
											var image = 'imagens/marker_jet' + imgTipo;
											break;
									  
										case 'caminhao':
											var image = 'imagens/marker_caminhao' + imgTipo;
											break;
									  
										case 'van':
											var image = 'imagens/marker_van' + imgTipo;
											break;
									  
										case 'Pick-up':
											var image = 'imagens/marker_pickup' + imgTipo;
											break;
									  
										case 'onibus':
											var image = 'imagens/marker_onibus' + imgTipo;
											break;
									  
										default:
											var image = 'imagens/marker_carro' + imgTipo;
											break;
									}
									
									if(markerArray[i].getIcon() != image){
										markerArray[i].setIcon(image);
									}		
								}
							}
						});
					}
				}
			}
			setInterval(autoReload, 2000);

			var poly;
			var polyOptions = {
				strokeColor: '#000000',
				strokeOpacity: 1.0,
				strokeWeight: 3,
				map: var_map
			}
			poly = new google.maps.Polyline(polyOptions);
			
			function drawNewAnimatedMap(){		
				i = counterTrace;
				var lat_lng = [];
				
				var data = markers[i];

				if(i == 0){
					var iconeImg = icons.start;
				}
				else{
					if(i == (markers.length -1)){
						var iconeImg = icons.end;
					}
					else{
						if(data.ligado != 'Sim'){
							var iconeImg = 'imagens/historico_dot_vermelho.png';
						}
						else{
							var iconeImg = 'imagens/historico_dot_azul.png';
						}
					}
				}
				
				var myLatlng = new google.maps.LatLng(data.lat, data.lng);
				lat_lng.push(myLatlng);

				var path = poly.getPath();
				path.push(myLatlng);
				
				var marker = new google.maps.Marker({
					position: myLatlng,
					icon: iconeImg,
					map: var_map,
					clickable: true
				});
				
				marker.info = new google.maps.InfoWindow({
					content: '<b>Data: </b> ' + data.horario + '<br /><b>Velocidade:</b> ' + data.velocidade
				});
				
				google.maps.event.addListener(marker, 'mouseover', function(){
					marker.info.open(var_map, marker);
				});
				
				google.maps.event.addListener(marker, 'mouseout', function(){
					marker.info.close();
				});
				
				var_map.panTo(myLatlng);
				var_map.setZoom(17);
				
				latlngbounds.extend(marker.position);
				markerArrayHist.push(marker);

				if(i == markers.length-1){
					clearInterval(intervalTraceRoute);
					var_map.setCenter(latlngbounds.getCenter());
					var_map.fitBounds(latlngbounds);
					waitingDialog.hide();
				}
				counterTrace++;
			}
			
			var myApp;
			myApp = myApp || (function(){
				var pleaseWaitDiv = $('<section class="modal hide" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false"><section class="modal-header"><h1>Processando...</h1></section><section class="modal-body"><section class="progress progress-striped active"><section class="bar" style="width: 100%;"></section></section></section></section>');
				return{
					showPleaseWait: function() {
						pleaseWaitDiv.modal();
					},
					hidePleaseWait: function () {
						pleaseWaitDiv.modal('hide');
					},
				};
			})();
			
			var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
			var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
			h = h - 51 + "px";
			w = w + "px";
	
			document.getElementById("map-canvas").style.height = h;
			document.getElementById("map-canvas").style.width = w;
			
			$(window).resize(function(){
				var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
				var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
				h = h - 51 + "px";
				w = w + "px";
		
				document.getElementById("map-canvas").style.height = h;
				document.getElementById("map-canvas").style.width = w;
			});
		</script>
	</body>
</html>