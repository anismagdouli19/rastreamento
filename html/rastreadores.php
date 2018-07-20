<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';
	
	$qtdAlertas = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM alertas WHERE viewed_adm = 'N'"));
	$qtdVeiculos = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM bem"));
	$qtdAtivos = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM bem WHERE (status_sinal = 'S' OR status_sinal = 'R')"));
	
	$qtdInativos = $qtdVeiculos - $qtdAtivos;

	$busca = "";
	$inicio = 0;
	@$query = $_GET['query'];
	@$pagina = $_GET['pagina'];

	if(!empty($query)) $busca = "WHERE b.name LIKE '%$query%' OR b.imei LIKE '%$query%'";
	
	if(!empty($pagina))	$inicio = ($pagina - 1) * 20;
	else $pagina = 1;
	
	$count = $qtdVeiculos / 20;
	
	if(strpos($count, '.') > -1){
		$arCount = explode('.', $count);
		$count = $arCount[0] + 1;
	}
	
	function imagemVeiculo($sinal, $tipo){
		if($tipo == 'sinal'){
			switch($sinal){
				case "R": $imgSinal = "imagens/status_rastreando.png"; break;
				case "S": $imgSinal = "imagens/status_sem_sinal.png"; break;
				case "D": $imgSinal = "imagens/status_desligado.png"; break;
			}
			return $imgSinal;
		}
		else{
			switch($sinal){
                case "R": $iconeMapa = "imagens/marker_".$tipo."_ativo.png"; break;
				case "S": $iconeMapa = "imagens/marker_".$tipo."_bloqueado.png"; break;
				case "D": $iconeMapa = "imagens/marker_".$tipo."_inativo.png"; break;
			}
			return $iconeMapa;
		}
	}
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
		<script src="javascript/jquery-2.2.2.min.js"></script>
		<script src="javascript/bootstrap.min.js"></script>
		<script src="javascript/jquery.validate.min.js"></script>
		<script src="javascript/latlong.js"></script>
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
						<li><a href="teste/index.php"><i class="fa fa-bar-chart"></i> Estatisticas</a></li>
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
								<small>Rastreadores</small>
							</h1>
							<ol class="breadcrumb">
								<li class="active">
									<i class="fa fa-globe"></i> Rastreadores
								</li>
							</ol>
						</section>
					</section>

					<section class="row">
						<section class="col-lg-5">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-map-marker fa-fw"></i> Mapa</h3>
								</section>
								<section class="panel-body">
									<section id="mapa" style="width: 100%; height: 600px;"></section><br />
								</section>
							</section>
							
							<section class="panel panel-default">
							
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-bell fa-fw"></i> Alertas <span class="badge"></span></h3>
								</section>
								<section class="panel-body">
									<ul class="alertaRastreadores">
									<div id="exibeAlertas"></div>
									</ul>
									<br />
								</section>
							</section>
						</section>
						<section class="col-lg-7">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-globe fa-fw"></i> Rastreadores</h3>
								</section>
								<section class="panel-body">
									<?php echo "<center><span class='label label-primary'>Veículos: $qtdVeiculos</span> <span class='label label-success'>Online: $qtdAtivos</span> <span class='label label-default'>Offline: $qtdInativos</span></center><br />"; ?>
									
									<section style="float: left;">
										<form class="form-inline" role="form" onsubmit="javascript:return(false);">
											<label class="sr-only" for="pesquisa">Pesquisar</label>
											<input type="text" class="pesquisa-control" id="pesquisa" name="pesquisa" placeholder="Pesquisar placa ou IMEI">
											<a href="javascript:pesquisa();" class="btn btn-primary">Pesquisar</a>
											
											<?php
												if(!empty($query))
													echo "<button type='button' class='btn btn-default' onclick='javascript:removePesquisa();'>Mostrar Todos</button>";
											?>
										</form>
									</section>
									
									<section style="float: right;">
										<a href="javascript:paginacao(<?= $pagina > 1 ? $pagina - 1 : $pagina ?>)"><button type='button' class='btn btn-default dropdown-toggle cerca'><i class="fa fa-arrow-left"></i> Anterior</button></a>
										<a href="javascript:paginacao(<?= $pagina < $count ? $pagina + 1 : $pagina ?>)"><button type='button' class='btn btn-default dropdown-toggle cerca'>Próxima <i class="fa fa-arrow-right"></i></button></a>
									</section>
									
									<br /><br /><br />
									
									<table class="table table-bordered table-hover table-striped" style="text-align: center;">
										<thead>
											<tr>
												<th><center>Mapa</center></th>											
												<th><center>Placa</center></th>
												<th><center>IMEI</center></th>												
												<th><center>Número</center></th>
												<th><center>Modelo</center></th>
												<th><center>Sinal</center></th>
												<th><center>Comandos</center></th>
											</tr>
										</thead>
										<tbody>
											<?php											
												$getEquipamentos = mysqli_query($conexao, "SELECT b.*, la.* FROM bem b LEFT JOIN loc_atual la ON b.imei = la.imei $busca ORDER BY name ASC LIMIT $inicio, 20");
												
												if(mysqli_num_rows($getEquipamentos) > 0){
													while($coluna = mysqli_fetch_assoc($getEquipamentos)){											
														//$iconeMapa = imagemVeiculo($coluna['status_sinal'], "icone"); // <-
                                                        
                                                        $iconeMapa = imagemVeiculo($coluna['status_sinal'], $coluna["tipo"]);
														
														if($coluna['converte'] == 1){
															strlen($coluna['latitudeDecimalDegrees']) == 9 && $coluna['latitudeDecimalDegrees'] = '0' . $coluna['latitudeDecimalDegrees'];
															$g = substr($coluna['latitudeDecimalDegrees'], 0, 3);
															$d = substr($coluna['latitudeDecimalDegrees'], 3);
															$latitudeDecimalDegrees = -1 * abs($g + ($d / 60));
														
															strlen($coluna['longitudeDecimalDegrees']) == 9 && $coluna['longitudeDecimalDegrees'] = '0' . $coluna['longitudeDecimalDegrees'];
															$g = substr($coluna['longitudeDecimalDegrees'], 0, 3);
															$d = substr($coluna['longitudeDecimalDegrees'], 3);
															$longitudeDecimalDegrees = -1 * abs($g + ($d / 60));
														}
														else{
															$latitudeDecimalDegrees = $coluna['latitudeDecimalDegrees'];
															$longitudeDecimalDegrees = $coluna['longitudeDecimalDegrees'];
														}
														
														echo 
															"<tr>
																<td style='line-height: 40px;'><input type='radio' name='mapa' onchange='javascript:addMarker(" . $latitudeDecimalDegrees . ", " . $longitudeDecimalDegrees . ", \"" . $iconeMapa . "\", \"" . $coluna['name'] . "\");'/></td>
																<td style='line-height: 40px;'>" . $coluna['name'] . "</td>
																<td style='line-height: 40px;'>" . $coluna['imei'] . "</td>														
																<td style='line-height: 40px;'>" . $coluna['identificacao'] . "</td>
																<td style='line-height: 40px;'>" . $coluna['modelo_rastreador'] . "</td>
																<td style='line-height: 40px;'><img src='" . imagemVeiculo($coluna['status_sinal'], "sinal") . "'></td>
																<td style='line-height: 40px;'>
																	<section class='btn-group'>
																		<button type='button' class='btn btn-default dropdown-toggle cerca' data-toggle='dropdown'>Comandos <span class='caret'></span></button>
																		<ul class='dropdown-menu' role='menu'>
																			
																			<li class='divider'></li>
																			<li><a href=\"javascript:comando(" . $coluna['imei']  .",',H,060');\">Velocidade Limite</a></li>
																			<li><a href=\"javascript:comando(" . $coluna['imei'] . ",',C,30s');\">Rastrear a Cada</a></li>
																			<li><a href=\"javascript:comando(" . $coluna['imei'] . ",',J');\">Bloquear Veículo</a></li>
																			<li><a href=\"javascript:comando(" . $coluna['imei'] . ",',K');\">Liberar Veículo</a></li>
																		</ul>
																	</section>		
																</td>
															</tr>";
													}
												}
												else{
													echo "<tr><td colspan='7'><i>Sua pesquisa não retornou resultados...</i></td></tr>";
												}
											?>										
										</tbody>
									</table>
								</section>
							</section>
						</section>
					</section>
				</section>
			</section>
			
			<section class="modal fade" id="modal-comando">
				<section class="modal-dialog-alertas">
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Comandos</h3>
						</section>
						<section class="modal-body"> 
							Comando enviado com sucesso...
						</section>
						<section class="modal-footer"> 
							<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
						</section>
					</section>
				</section>
			</section>
			
			<section class="modal fade" id="modal-comando-erro">
				<section class="modal-dialog-alertas">
					<section class="modal-content"> 
						<section class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title">Comandos</h3>
						</section>
						<section class="modal-body"> 
							Não foi possível executar corretamente o comando...
						</section>
						<section class="modal-footer"> 
							<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
						</section>
					</section>
				</section>
			</section>			
			
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
								
								<button type="button" class="btn btn-default" onclick="acertaHistorico(4);">Últimas 4 horas</button>
								<button type="button" class="btn btn-default" onclick="acertaHistorico(12);">Últimas 12 horas</button>
								<button type="button" class="btn btn-default" onclick="acertaHistorico(24);">Últimas 24 horas</button>
								<button type="button" class="btn btn-default" onclick="acertaHistorico(48);">Últimas 48 horas</button>
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
		<script>
			var map;
			function initMap(){
				var var_location = new google.maps.LatLng(-14.198263, -56.638331);
				map = new google.maps.Map(document.getElementById('mapa'),{
					center: var_location,
					zoom: 4
				});
			}
			
			function addMarker(lat, lng, iconeMapa, infoWindowContent){
				if(typeof marker != 'undefined')
					marker.setMap(null);
				
				var myLatLng = new google.maps.LatLng(lat, lng);
				
				marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					icon: iconeMapa,
					animation: google.maps.Animation.DROP
				});
				
				marker.info = new google.maps.InfoWindow({
					content: '<b>' + infoWindowContent + '</b>'
				});
				
				google.maps.event.addListener(marker, 'click', function(){
					marker.info.open(map, marker);
				});
				
				map.setCenter(myLatLng);
				map.setZoom(15);
			}
			
			function paginacao(pagina){
				setTimeout("window.location='rastreadores.php?pagina=" + pagina + "'", 0);
			}
			
			function pesquisa(){
				var busca = $('#pesquisa').val();
				setTimeout("window.location='rastreadores.php?query=" + busca + "'", 0);
			}
			
			function removePesquisa(){	
				setTimeout("window.location='rastreadores.php'", 0);
			}
			
			function modalHistorico(imei, name){	
				$("#nrImeiConsulta").val(imei);
				$("#nomeVeiculo").val(name);
				$('#modal-historico').modal({show:true});	
			}
			
			function comando(imei, comando){
				if(comando == ",J"){
					if(confirm("Deseja bloquear este veículo? O bloqueio do veículo em movimento pode causar danos aos ocupantes e a terceiros, confirma?")) {
						$.ajax({
							type: "GET",
							url: "comandosAdmin.php",
							data: {acao: comando, imei: imei},
							dataType: "JSON",
							success: function (data){
								if(data) $('#modal-comando').modal({show:true});
								else $('#modal-comando-erro').modal({show:true});
							}
						});
					}
				}
				
				if(comando == ",K"){
					if(confirm("Deseja desbloquear este veículo?")) {
						$.ajax({
							type: "GET",
							url: "comandosAdmin.php",
							data: {acao: comando, imei: imei},
							dataType: "JSON",
							success: function (data){
								if(data) $('#modal-comando').modal({show:true});
								else $('#modal-comando-erro').modal({show:true});
							}
						});
					}
				}

				if(comando == ",H,060"){
					var veloc = prompt("Digite o limite de velocidade em Km/h: ", 120);
					if(veloc != null) {
						$.ajax({
							type: "GET",
							url: "comandosAdmin.php",
							data: {acao: comando, imei: imei, velocidade: veloc},
							dataType: "JSON",
							success: function (data){
								if(data) $('#modal-comando').modal({show:true});
								else $('#modal-comando-erro').modal({show:true});	
							}
						});
					}
				}
				
				if(comando == ",C,30s"){
					var tempo = prompt("Informe o intervalo de tempo. Valores aceitos:\n(30s, 01m, 05m, 10m, 1h, 5h, 10h)", '30s');
					if(tempo != null){
						$.ajax({
							type: "GET",
							url: "comandosAdmin.php",
							data: {acao: comando, imei: imei, tempo: tempo},
							dataType: "JSON",
							success: function (data){
								if(data) $('#modal-comando').modal({show:true});
								else $('#modal-comando-erro').modal({show:true});
							}
						});
					}
				}
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
					
					if(dia < 0 || dia === 0){
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
			
			var posicoes = [];
			$("#consultarHistorico").validate({
				submitHandler: function (form) {
					$("#consultarHistorico button[type=submit]").prop('disabled', true);
					$("#consultarHistorico button[type=submit] i").removeClass('fa-book').addClass('fa-refresh fa-spin');
					$("#nrImeiConsulta").val();
					$("#nomeVeiculo").val();
					
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
	
			alertas();
			
			function alertas(){
				$.ajax({
					url: "alertasAdmin.php",
					type: "GET",
					dataType: "JSON",
					
					success: function(alertas){
						$(".alertaRastreadores").html(alertas.lista);
						$(".badge").html(alertas.count);
					}
				});
			}

			function fecharAlerta(id_alerta){
				$.ajax({
					url: "alertasAdmin.php",
					type: "GET",
					data: {idAlerta: id_alerta},
					
					success: function(){
						alertas();
					}
				});
			}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjMfGUKYd1fIrIN5LXwC_8FofXuCOkxWU&callback=initMap" async defer></script>
	</body>
</html>