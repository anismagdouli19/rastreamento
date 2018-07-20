#!/usr/bin/php -q
<?php
	$tipoLog = "arquivo";
	$fh = null;
	$remip = null;
	$remport = null;
	$imei = '';

	function abrirArquivoLog($imeiLog){
		GLOBAL $fh;

		$fn = "./var/www/html/server/logs/TK_" . trim($imeiLog) . ".log";
		$fn = trim($fn);
		$fh = fopen($fn, 'a') or die("Can not create file");
		$tempstr = "".chr(13).chr(10);
		
		fwrite($fh, $tempstr);	
	}

	function fecharArquivoLog(){
		GLOBAL $fh;
		
		if($fh != null)
			fclose($fh);
	}

	function printLog($fh, $mensagem){
		GLOBAL $tipoLog;
		GLOBAL $fh;
		
		if($tipoLog == "arquivo"){
			if($fh != null)
				fwrite($fh, $mensagem.chr(13).chr(10));
		}
		else{
			echo $mensagem . "<br />";
		}
	}

	$ip = '206.189.166.40';
	$port = '7094';

	$command_path = "./var/www/html/server/comandos";
	$from_email = 'rastreamento@Sua Empresa.com.br';

	$__server_listening = true;

	error_reporting(E_ALL);
	set_time_limit(0);
	ob_implicit_flush();
	declare(ticks = 1);
	ini_set('sendmail_from', $from_email);

	become_daemon();

	pcntl_signal(SIGTERM, 'sig_handler');
	pcntl_signal(SIGINT, 'sig_handler');
	pcntl_signal(SIGCHLD, 'sig_handler');

	server_loop($ip, $port);

	function change_identity($uid, $gid){
		if(!posix_setgid($gid)){
			print "Unable to setgid to " . $gid . "!\n";
			exit;
		}

		if(!posix_setuid($uid)){
			print "Unable to setuid to " . $uid . "!\n";
			exit;
		}
	}

	function server_loop($address, $port){
		GLOBAL $fh;
		GLOBAL $__server_listening;
		
		printLog($fh, "server_looping...");

		if(($sock = socket_create(AF_INET, SOCK_STREAM, 0)) < 0){
			printLog($fh, "failed to create socket: " . socket_strerror($sock));
			exit();
		}

		if(($ret = socket_bind($sock, $address, $port)) < 0){
			printLog($fh, "failed to bind socket: " . socket_strerror($ret));
			exit();
		}

		if(( $ret = socket_listen( $sock, 0 ) ) < 0 ){
			printLog($fh, "failed to listen to socket: " . socket_strerror($ret));
			exit();
		}

		socket_set_nonblock($sock);
		printLog($fh, "Esperando a conexão de clientes...");

		while($__server_listening){
			$connection = @socket_accept($sock);
			
			if($connection === false){
				usleep(100);
			} 
			elseif($connection > 0){
				handle_client($sock, $connection);
			} 
			else{
				printLog($fh, "error: " . socket_strerror($connection));
				die;
			}
		}
	}

	function sig_handler($sig){
		switch($sig){
			case SIGTERM:
			case SIGINT:
				break;
				
			case SIGCHLD:
				pcntl_waitpid(-1, $status);
				break;
		}
	}

	$firstInteraction = false;

	function handle_client($ssock, $csock){
		GLOBAL $__server_listening;
		GLOBAL $fh;
		GLOBAL $firstInteraction;
		GLOBAL $remip;
		GLOBAL $remport;

		$pid = pcntl_fork();

		if($pid == -1){
			die;
		} 
		elseif($pid == 0){
			$__server_listening = false;
			socket_getpeername($csock, $remip, $remport);

			$firstInteraction = true;
			
			interact($csock);
			socket_close($ssock);
			socket_close($csock);
			
			printLog($fh, date("d/m/Y H:i:s") . " Conexão com $remip:$remport finalizada.");
			fecharArquivoLog();		
		} 
		else{
			socket_close($csock);
		}
	}

	function interact($socket){
		$conexao = mysqli_connect("localhost", "root", "horus4321", "tracker");
		mysqli_select_db($conexao, "tracker");
		
		GLOBAL $fh;
		GLOBAL $command_path;
		GLOBAL $firstInteraction;
		GLOBAL $remip;
		GLOBAL $remport;	

		$loopcount = 0;
		$conn_imei = "";
		$rec = "";
		$tipoComando = "arquivo";

		$isGIMEI = false;
		$isGPRMC = false;
		
		$send_cmd = "";

		while(@socket_recv($socket, $rec, 2048, 0x40) !== 0){
			if($conn_imei != ""){
				if($tipoComando == "arquivo" and file_exists("$command_path/$conn_imei")){
					$send_cmd = file_get_contents("$command_path/$conn_imei");
					
					socket_send($socket, $send_cmd, strlen($send_cmd), 0);
					unlink("$command_path/$conn_imei");
					
					printLog($fh, "Arquivo de comandos apagado: " . $send_cmd . " imei: " . $conn_imei);
				}
				else{
					if($tipoComando == "banco" and file_exists("$command_path/$conn_imei")){
						$res = mysqli_query($conexao, "SELECT c.command FROM command c WHERE c.imei = '$conn_imei' ORDER BY date DESC LIMIT 1");
						
						while($data = mysqli_fetch_assoc($res)){
							$send_cmd = $data['command'];
							echo 'acessou o comando';
						}
						
						socket_send($socket, $send_cmd, strlen($send_cmd), 0);
						unlink("$command_path/$conn_imei");
						printLog($fh, "Comandos do arquivo apagados: " . $send_cmd . " imei: " . $conn_imei);
					} 
					else{
						if($firstInteraction == true){
							sleep (1);
							$send_cmd = "**,imei:". $conn_imei .",C,02m";

							$res = mysqli_query($conexao, "SELECT c.command FROM command c WHERE c.command like '**,imei:". $conn_imei .",C,%' and c.imei = $conn_imei ORDER BY date DESC LIMIT 1");
							
							while($data = mysqli_fetch_assoc($res)){
								$send_cmd = $data['command'];
							}
							
							socket_send($socket, $send_cmd, strlen($send_cmd), 0);
							printLog($fh, date("d/m/Y H:i:s") . " Comando de start: " . $send_cmd . " imei: " . $conn_imei);
							$firstInteraction = false;
						}
					}
				}
			}

			sleep(1);
			$loopcount++;
			if($loopcount > 120) 
				return;

			if($rec != ""){
				$rec = trim($rec);
				
				if(strpos($rec, "GPRMC") === false){
					$isGIMEI = true;
					$loopcount = 0;
					
					if($fh != null)	printLog($fh, date("d/m/Y H:i:s") . " Recebido: $rec");
					$parts = explode(',', $rec);
					
					if(strpos($parts[0], "#") === false){
						if(count($parts) > 1){
							$imei               = substr($parts[0],5);
							$infotext 			= mysqli_real_escape_string($conexao, $parts[1]);
							$trackerdate 		= mysqli_real_escape_string($conexao, $parts[2]);
							$gpsSignalIndicator = mysqli_real_escape_string($conexao, $parts[4]);
							$speed = 0;

							if($gpsSignalIndicator != 'L'){
								$phone                   = mysqli_real_escape_string($conexao, $parts[3]);
								$satelliteFixStatus      = mysqli_real_escape_string($conexao, $parts[6]);					  
								$latitudeDecimalDegrees  = mysqli_real_escape_string($conexao, $parts[7]);
								$latitudeHemisphere      = mysqli_real_escape_string($conexao, $parts[8]);
								$longitudeDecimalDegrees = mysqli_real_escape_string($conexao, $parts[9]);
								$longitudeHemisphere     = mysqli_real_escape_string($conexao, $parts[10]);
								$speed                   = mysqli_real_escape_string($conexao, $parts[11]);
							}
						  
							$texto_sms_localiza = "";
							$texto_sms_alerta_hodometro = "";
							$texto_sms_alerta = "";
							
							$result = mysqli_query($conexao, "SELECT * FROM preferencias");
							
							while($dataPref = mysqli_fetch_assoc($result)){
								if($dataPref['nome'] == 'texto_sms_localiza')
									$texto_sms_localiza = $dataPref['valor'];
									
								if($dataPref['nome'] == 'texto_sms_alerta_hodometro')
									$texto_sms_alerta_hodometro = $dataPref['valor'];
									
								if($dataPref['nome'] == 'texto_sms_alerta')
									$texto_sms_alerta = $dataPref['valor'];
							}
							 
							if($imei != ""){
								$consulta = mysqli_query($conexao, "SELECT * FROM geo_fence WHERE imei = '$imei'");
								
								while($data = mysqli_fetch_assoc($consulta)){		
									$idCerca = $data['id'];
									$imeiCerca = $data['imei'];
									$nomeCerca = $data['nome'];
									$coordenadasCerca = $data['coordenadas'];
									$resultCerca = $data['tipo'];
									$tipoEnvio = $data['tipoEnvio'];
									
									strlen($latitudeDecimalDegrees) == 9 && $latitudeDecimalDegrees = '0' . $latitudeDecimalDegrees;
									$g = substr($latitudeDecimalDegrees, 0, 3);
									$d = substr($latitudeDecimalDegrees, 3);
									$strLatitudeDecimalDegrees = $g + ($d / 60);
									$latitudeHemisphere == "S" && $strLatitudeDecimalDegrees = $strLatitudeDecimalDegrees * - 1;
		
									strlen($longitudeDecimalDegrees) == 9 && $longitudeDecimalDegrees = '0' . $longitudeDecimalDegrees;
									$g = substr($longitudeDecimalDegrees, 0, 3);
									$d = substr($longitudeDecimalDegrees, 3);
									$strLongitudeDecimalDegrees = $g + ($d / 60);
									$longitudeHemisphere == "S" && $strLongitudeDecimalDegrees = $strLongitudeDecimalDegrees * - 1;
		
									$strLongitudeDecimalDegrees = $strLongitudeDecimalDegrees * - 1;
		
									$lat_point = $strLatitudeDecimalDegrees;
									$lng_point = $strLongitudeDecimalDegrees;
		
									$exp = explode("|", $coordenadasCerca);
		
									if((count($exp)) < 5){
										$strExp = explode(",", $exp[0]);
										$strExp1 = explode(",", $exp[2]);
									} 
									else{
										$int = (count($exp)) / 2;
										$strExp = explode(",", $exp[0]);
										$strExp1 = explode(",", $exp[$int]);
									}
		
									$lat_vertice_1 = $strExp[0];
									$lng_vertice_1 = $strExp[1];
									$lat_vertice_2 = $strExp1[0];
									$lng_vertice_2 = $strExp1[1];
		
									if($lat_vertice_1 < $lat_point || $lat_point < $lat_vertice_2 && $lng_point < $lng_vertice_1 || $lng_vertice_2 < $lng_point){
										$situacao = 'Saiu';
									}
									else{
										$situacao = 'Entrou';
									}
		
									if(round($speed * 1.852, 0) > 0){
										$getCondicaoCerca = mysqli_query($conexao, "SELECT mensagem FROM alertas WHERE imei = '$imei' AND mensagem LIKE '%violada%' ORDER BY data DESC");

										$dados = mysqli_fetch_assoc($getCondicaoCerca);
										$condicaoCerca = explode(" - ", $dados['mensagem']);

										if(@$condicaoCerca[1] != $situacao){
											mysqli_query($conexao, "INSERT INTO alertas (imei, mensagem, data) VALUES ('$imei', 'Cerca $nomeCerca violada - $situacao', UNIX_TIMESTAMP())");
										}
										
										if($tipoEnvio == 0){
											$tempstr = "http://maps.google.com/maps/geo?q=$lat_point,$lng_point&oe=utf-8&output=csv"; //output = csv, xml, kml, json
											
											$rev_geo_str = file_get_contents($tempstr);
											$rev_geo_str = preg_replace("/\"/","", $rev_geo_str);
											
											$rev_geo = explode(',', $rev_geo_str);
											$logradouro = $rev_geo[2] . ", " . $rev_geo[3];
	
											require "lib/class.phpmailer.php";
	
											$consulta1 = mysqli_query($conexao, "SELECT a.*, b.* FROM cliente a INNER JOIN bem b ON a.id = b.cliente WHERE b.imei = '$imei'");
											
											while($data = mysqli_fetch_assoc($consulta1)) {	
												//$emailDestino = $data['email'];
												$emailDestino = 'phcferrari@hotmail.com';
												$nameBem = $data['name'];
												
												$mensagem = new PHPMailer();
												$mensagem->Mailer = "smtp";
												$mensagem->IsHTML(true);
												$mensagem->CharSet = "utf-8";
												$mensagem->SMTPSecure = "tls";
												$mensagem->Host = "smtp.gmail.com";
												$mensagem->Port = "587";
												$mensagem->SMTPAuth = "true";
												$mensagem->Username = "paulophcferrari@gmail.com";
												$mensagem->Password = "bbKopp76";
												$mensagem->From = "paulophcferrari@gmail.com";
												$mensagem->FromName = "System Tracker";
												$mensagem->AddAddress($emailDestino);
												$mensagem->AddReplyTo($mensagem->From, $mensagem->FromName);
												$mensagem->Subject = "Sua Empresa - Violação de Perímetro";
	
												$mensagem->Body = 
													"<!DOCTYPE html>
													<html>
														<head>
															<meta charset='utf-8'>
															<title>Sua Empresa - Violação de Perímetro</title>
														</head>
														
														<body style='background-color: #FFF;'>
															<p>
																<b>Alerta de Violação de Perímetro</b><br /><br />
																
																O veículo $nameBem está $situacao do perímetro $nomeCerca às " . date("H:i:s") . " do dia " . date("d/m/Y") . ", no local $logradouro e trafegando a " . round($speed * 1.852, 0) . "km/h.<br /><br />
																
																Sua Empresa<br />
																(11) 12345-6789<br />
																<a href=\"http://www.Sua Empresa.com.br\">www.Sua Empresa.com.br</a>
															</p>
															
														</body>
													</html>";
													
												$mensagem->Send();
											}
										}
									}
								}
							}
							
							$dataBem = null;
							$dataCliente = null;
							$resBem = mysqli_query($conexao, "SELECT id, cliente, envia_sms, name, alerta_hodometro, alerta_hodometro_saldo FROM bem WHERE imei = '$imei'");
							$dataBem = mysqli_fetch_assoc($resBem);
							
							$resCliente = mysqli_query($conexao, "SELECT id, celular, dt_ultm_sms, envia_sms, sms_acada, hour(timediff(now(), dt_ultm_sms)) horas, minute(timediff(now(), dt_ultm_sms)) minutos, nome FROM cliente WHERE id = $dataBem[cliente]");
							$dataCliente = mysqli_fetch_assoc($resCliente);

							if($gpsSignalIndicator != 'L'){
								$movimento = '';
								
								if($speed > 0)
									$movimento = 'S';
								else
									$movimento = 'N';
									
								$gpsLat = gprsToGps($latitudeDecimalDegrees, $latitudeHemisphere);
								$gpsLon = gprsToGps($longitudeDecimalDegrees, $longitudeHemisphere);
								$gpsLatAnt = 0;
								$gpsLatHemAnt = '';
								$gpsLonAnt = 0;
								$gpsLonHemAnt = '';
								$alertaACadaSaldo = 0;
								
								$resLocAtual = mysqli_query($conexao, "SELECT id, latitudeDecimalDegrees, latitudeHemisphere, longitudeDecimalDegrees, longitudeHemisphere FROM loc_atual WHERE imei = '$imei' limit 1");
								$numRows = mysqli_num_rows($resLocAtual);
								
								/**
								* BUSCAR ENDEREÇO POR CHAVES DINAMICAS DO GMAPS
								*/
								$con = mysqli_connect("localhost", "root", "horus4321", "tracker");
								mysqli_select_db($conexao, "tracker");
		
								$res = mysqli_query($conexao,"select count(id) as numrows from chaves_gmaps ");
								$data = mysqli_fetch_assoc($res);
								$num_chaves = $data['numrows'];
							
								$res = mysqli_query($conexao,"select id, chave from chaves_gmaps where ativa = 'S' ");
								$data = mysqli_fetch_assoc($res);							
								$idchave = $data['id'];
								$chave      = $data['chave'];
							
								if ($idchave==''){
									$idchave = 1;
								}
							
								mysqli_query($conexao,"update chaves_gmaps set ativa = 'N' where id = ".$idchave);
							
								if( $idchave == $num_chaves){
									$idchave = 1;
								}
								else {
									$idchave++;
								}
								mysqli_query($conexao,"update chaves_gmaps set ativa = 'S', quantidade_uso = quantidade_uso + 1 where id = ".$idchave);
												
								$json = json_decode(file_get_contents("https://maps.google.com/maps/api/geocode/json?latlng=$gpsLat,$gpsLon&key=".$chave));
								sleep(2);
								if ( isset( $json->status ) && $json->status == 'OK' && isset($json->results[0]->formatted_address)) {
									$address = $json->results[0]->formatted_address;
									$address = utf8_decode($address);
									//printLog($fh,$address);
								} 
								else{
									printLog($fh,$json->results[0]);
								}							
								/************************************/
								
								if($numRows == 0){
									mysqli_query($conexao, "INSERT INTO loc_atual (date, imei, phone, satelliteFixStatus, latitudeDecimalDegrees, latitudeHemisphere, longitudeDecimalDegrees, longitudeHemisphere, speed, infotext, gpsSignalIndicator, converte, address) VALUES (now(), '$imei', '$phone', '$satelliteFixStatus', '$latitudeDecimalDegrees', '$latitudeHemisphere', '$longitudeDecimalDegrees', '$longitudeHemisphere', '$speed', '$infotext', '$gpsSignalIndicator', 1, '$address')");
								} 
								else{
									mysqli_query($conexao, "UPDATE loc_atual SET date = now(), phone = '$phone', satelliteFixStatus = '$satelliteFixStatus', latitudeDecimalDegrees = '$latitudeDecimalDegrees', latitudeHemisphere = '$latitudeHemisphere', longitudeDecimalDegrees = '$longitudeDecimalDegrees', longitudeHemisphere = '$longitudeHemisphere', speed = '$speed', infotext = '$infotext', gpsSignalIndicator = '$gpsSignalIndicator', address='$address' WHERE imei = '$imei'");
								}
								
								$distance = 0;
								
								try{
									$bemId = $dataBem['id'];
									$countGeoDistance = mysqli_query($conexao, "SELECT bem FROM geo_distance WHERE bem = $bemId");
									
									if($countGeoDistance === false || mysqli_num_rows($countGeoDistance) == 0){
										mysqli_query($conexao, "INSERT into geo_distance (bem, tipo) values($bemId, 'I')");
										mysqli_query($conexao, "INSERT into geo_distance (bem, tipo) values($bemId, 'F')");
									}

									if($dataCliente['envia_sms'] == 'S' && $dataBem['envia_sms'] == 'S' && !empty($dataCliente['celular']) && !empty($dataCliente['sms_acada'])){
										if(empty($dataCliente['dt_ultm_sms'])){
											$idCliente = $dataCliente['id'];
											mysqli_query($conexao, "UPDATE cliente SET dt_ultm_sms = now() WHERE id = '$idCliente'");
										} 
										else{
											$horas = $dataCliente['horas'];
											$minutos = $dataCliente['minutos'];
											
											if(!empty($horas)) 
												$horas = $horas * 60;
					
											$tempoTotal = $horas + $minutos;
											
											if($tempoTotal > $dataCliente['sms_acada']){
												$json = json_decode(file_get_contents("http://maps.google.com/maps/api/geocode/json?latlng=$gpsLat,$gpsLon&language=es-ES"));
												
												if(isset($json->status) && $json->status == 'OK' && isset($json->results[0]->formatted_address)){
													$address = $json->results[0]->formatted_address;
													$address = utf8_decode($address);
													
													$aDataCliente = split(' ', $dataCliente['nome']);
													
													$msg = $texto_sms_localiza;
													$msg = str_replace("#CLIENTE", $aDataCliente[0], $msg);
													$msg = str_replace("#VEICULO", $dataBem['name'], $msg);
													$msg = str_replace("#LOCALIZACAO", $address, $msg);
													$msg = str_replace(' ', '+', $msg);
													
													sendSMS($dataCliente['celular'], $msg, '', $conexao);
													
													if($retorno >= 0){
														$idCliente = $dataCliente['id'];
														mysqli_query($conexao, "UPDATE cliente SET dt_ultm_sms = now() WHERE id = '$idCliente'");
													}
												}
											}
										}
									}
									
									if($movimento == 'S'){
										$resGeoDistance = mysqli_query($conexao, "SELECT parou FROM geo_distance WHERE bem = $bemId and tipo = 'I'");
										$dataGeoDistance = mysqli_fetch_assoc($resGeoDistance);
										
										if($dataGeoDistance['parou'] == 'S' || empty($dataGeoDistance['parou'])){
											mysqli_query($conexao, "UPDATE geo_distance SET latitudeDecimalDegrees = '$latitudeDecimalDegrees', latitudeHemisphere = '$latitudeHemisphere', longitudeDecimalDegrees = '$longitudeDecimalDegrees', longitudeHemisphere = '$longitudeHemisphere', parou = 'N' WHERE bem =  $bemId and tipo = 'I'");
										}
									} 
									else{
										$resGeoDistance = mysqli_query($conexao, "SELECT latitudeDecimalDegrees, latitudeHemisphere, longitudeDecimalDegrees, longitudeHemisphere FROM geo_distance WHERE bem = $bemId and tipo = 'I'");
										
										if(mysqli_num_rows($resGeoDistance) > 0){
											$update = mysqli_query($conexao, "UPDATE geo_distance SET latitudeDecimalDegrees = '$latitudeDecimalDegrees', latitudeHemisphere = '$latitudeHemisphere', longitudeDecimalDegrees = '$longitudeDecimalDegrees', longitudeHemisphere = '$longitudeHemisphere', parou = 'S' WHERE bem =  $bemId and tipo = 'I'");
											$dataGeoDistance = mysqli_fetch_assoc($resGeoDistance);
											
											$gpsLatAnt = gprsToGps($dataGeoDistance["latitudeDecimalDegrees"], $dataGeoDistance[latitudeHemisphere]);
											$gpsLonAnt = gprsToGps($dataGeoDistance["longitudeDecimalDegrees"], $dataGeoDistance[longitudeHemisphere]);
											
											if($gpsLatAnt != $gpsLat){
												if($gpsLatAnt != 0 && $gpsLonAnt != 0){

													$geoDistance = distance($gpsLatAnt, $gpsLonAnt, $gpsLat, $gpsLon);
													$distance = (float)($geoDistance);
													
													$alertaACada = $dataBem['alerta_hodometro'];
													$alertaACadaSaldo = $dataBem['alerta_hodometro_saldo'];
													$alertaACadaSaldo = ($alertaACadaSaldo * 1000) - $distance;
													
													if($alertaACadaSaldo <= 0 && $alertaACada > 0){
														$msg = $texto_sms_alerta_hodometro;
														$msg = str_replace("#CLIENTE", $aDataCliente[0], $msg);
														$msg = str_replace("#VEICULO", $dataBem['name'], $msg);
														$msg = str_replace("#HODOMETRO", $alertaACada, $msg);
														$msg = str_replace(' ', '+', $msg);
														$alertaACadaSaldo = $alertaACada;
													}
													$alertaACadaSaldo = (int)$alertaACadaSaldo/1000;
												}
											}
										}
										
									}
								}catch(Exception $e){
									unset($e);
								}
								
								/**
								* BUSCAR ENDEREÇO POR CHAVES DINAMICAS DO GMAPS
								*/
								$res = mysqli_query($conexao, "select count(id) as numrows from chaves_gmaps ");
								$data = mysqli_fetch_assoc($res);
								$num_chaves = $data['numrows'];
							
								$res = mysqli_query($conexao, "select id, chave from chaves_gmaps where ativa = 'S' ");
								$data = mysqli_fetch_assoc($res);							
								$idchave = $data['id'];
								$chave      = $data['chave'];
							
								if ($idchave==''){
									$idchave = 1;
								}
							
								mysqli_query($conexao, "update chaves_gmaps set ativa = 'N' where id = ".$idchave);
							
								if( $idchave == $num_chaves){
									$idchave = 1;
								}
								else {
									$idchave++;
								}
								mysqli_query($conexao, "update chaves_gmaps set ativa = 'S', quantidade_uso = quantidade_uso + 1 where id = ".$idchave);
												
								$json = json_decode(file_get_contents("https://maps.google.com/maps/api/geocode/json?latlng=$gpsLat,$gpsLon&key=".$chave));
								sleep(2);
								if ( isset( $json->status ) && $json->status == 'OK' && isset($json->results[0]->formatted_address)) {
									$address = $json->results[0]->formatted_address;
									$address = utf8_decode($address);
									//printLog($fh,$address);
								} 
								else{
									printLog($fh,$json->results[0]);
								}							
								/************************************/
								
								mysqli_query($conexao, "INSERT INTO gprmc (date, imei, phone, satelliteFixStatus, latitudeDecimalDegrees, latitudeHemisphere, longitudeDecimalDegrees, longitudeHemisphere, speed, infotext, gpsSignalIndicator, km_rodado, address, converte) VALUES (now(), '$imei', '$phone', '$satelliteFixStatus', '$latitudeDecimalDegrees', '$latitudeHemisphere', '$longitudeDecimalDegrees', '$longitudeHemisphere', '$speed', '$infotext', '$gpsSignalIndicator', $distance, '$address', 1)");

								if($alertaACadaSaldo == 0){
									mysqli_query($conexao, "UPDATE bem SET date = now(), status_sinal = 'R', movimento = '$movimento', hodometro = hodometro+$distance WHERE imei = '$imei'");
								} 
								else{
									mysqli_query($conexao, "UPDATE bem SET date = now(), status_sinal = 'R', movimento = '$movimento', hodometro = hodometro+$distance, alerta_hodometro_saldo = $alertaACadaSaldo WHERE imei = '$imei'");
								}
							} 
							else{
								mysqli_query($conexao, "UPDATE bem SET date = now(), status_sinal = 'S' WHERE imei = '$imei'");
							}

							if($infotext != "tracker"){
								$msg = $texto_sms_alerta;
								$msg = str_replace("#CLIENTE", $aDataCliente[0], $msg);
								$msg = str_replace("#VEICULO", $dataBem['name'], $msg);
								
								$res = mysqli_query($conexao, "SELECT responsible FROM bem WHERE imei = '$imei'");
								
								while($data = mysqli_fetch_assoc($res)){
									switch($infotext){
										case "dt":
											$body = "Disable Track OK";
											$msg = str_replace("#TIPOALERTA", "Rastreador Desabilitado", $msg);
											break;
										
										case "et":
											$body = "Stop Alarm OK";
											$msg = str_replace("#TIPOALERTA", "Alarme parado", $msg);
											break;
										
										case "gt";
											$body = "Move Alarm set OK";
											$msg = str_replace("#TIPOALERTA", "Alarme de Movimento ativado", $msg);
											break;
										
										case "help me":											
											$body = "Help!";
											$msg = str_replace("#TIPOALERTA", "SOS", $msg);
											$send_cmd = "**,imei:". $conn_imei .",E";
											socket_send($socket, $send_cmd, strlen($send_cmd), 0);
											verificaAlerta("SOS!", $imei, $conexao);
											break;
										
										case "ht":
											$body = "Speed alarm set OK";
											$msg = str_replace("#TIPOALERTA", "Alarme de velocidade ativado", $msg);
											break;
										
										case "it":
											$body = "Timezone set OK";
											break;
										
										case "low battery":
											$body = "Low battery!\nYou have about 2 minutes...";
											$msg = str_replace("#TIPOALERTA", "Bateria fraca, voce tem 2 minutos", $msg);
											$send_cmd = "**,imei:". $conn_imei .",E";
											socket_send($socket, $send_cmd, strlen($send_cmd), 0);
											verificaAlerta("Bateria Fraca", $imei, $conexao);											
											break;
										
										case "move":
											$body = "Move Alarm!";
											$msg = str_replace("#TIPOALERTA", "Seu veiculo esta em movimento", $msg);
											$send_cmd = "**,imei:". $conn_imei .",E";
											socket_send($socket, $send_cmd, strlen($send_cmd), 0);		
											verificaAlerta("Movimento", $imei, $conexao);	
											break;
										  
										case "nt":
											$body = "Returned to SMS mode OK";
											break;
										
										case "speed":
											$body = "Speed alarm!";
											$msg = str_replace("#TIPOALERTA", "Seu veiculo ultrapassou o limite de velocidade", $msg);
											$send_cmd = "**,imei:". $conn_imei .",E";
											socket_send($socket, $send_cmd, strlen($send_cmd), 0);
											verificaAlerta("Velocidade", $imei, $conexao);	
											break;
										 
										case "stockade":
											$body = "Geofence Violation!";
											$msg = str_replace("#TIPOALERTA", "Seu veiculo saiu da cerca virtual", $msg);
											$send_cmd = "**,imei:". $conn_imei .",E";
											socket_send($socket, $send_cmd, strlen($send_cmd), 0);
											verificaAlerta("Cerca", $imei, $conexao);
											break;
										
										case "door alarm":
											$body = "Open door!";
											$send_cmd = "**,imei:". $conn_imei .",E";
											socket_send($socket, $send_cmd, strlen($send_cmd), 0);
											verificaAlerta("Porta", $imei, $conexao);	
											break;
										
										case "acc alarm":
											$body = "ACC alarm!";
											$msg = str_replace("#TIPOALERTA", "Seu veiculo esta com a chave ligada", $msg);
											$send_cmd = "**,imei:". $conn_imei .",E";
											socket_send($socket, $send_cmd, strlen($send_cmd), 0);
											verificaAlerta("Ignição", $imei, $conexao);	
											break;
										
										case "acc off":
											$body = "Ignicao Desligada!";
											$msg = str_replace("#TIPOALERTA", "Seu veiculo esta com a chave desligada", $msg);
											mysqli_query($conexao, "UPDATE bem SET ligado = 'N' WHERE imei = '$imei'");
											$send_cmd = "**,imei:". $conn_imei .",E";
											socket_send($socket, $send_cmd, strlen($send_cmd), 0);
											break;
										
										case "acc on":
											$body = "Ignicao Ligada!";
											$msg = str_replace("#TIPOALERTA", "Seu veiculo esta com a chave ligada", $msg);
											mysqli_query($conexao, "UPDATE bem SET ligado = 'S' WHERE imei = '$imei'");
											$send_cmd = "**,imei:". $conn_imei .",E";
											socket_send($socket, $send_cmd, strlen($send_cmd), 0);
											break;
									}

									$msg = str_replace(' ', '+', $msg);
									$headers = "From: $email_from" . "\r\n" . "Reply-To: $email_from" . "\r\n";
									$responsible = $data['responsible'];
									//$rv = mail($responsible, "Tracker - $imei", $body, $headers);
								}
							}
						} 
						else{
							@socket_send($socket, "ON", 2, 0);
							printLog($fh, date("d/m/Y H:i:s") . " Enviado: ON");
						}
					} 
					else{
						$init = $parts[0];
						$conn_imei = substr($parts[1], 5);
						$cmd = $parts[2];
						
						if($cmd = "A"){
							@socket_send($socket, "LOAD", 4, 0);

							abrirArquivoLog($conn_imei);
							printLog($fh, date("d/m/Y H:i:s") . " Conexão: $remip:$remport");
							printLog($fh, date("d/m/Y H:i:s") . " Recebido: $rec");
							printLog($fh, date("d/m/Y H:i:s") . " Enviado: LOAD");
						}
					}	
				}
				else{
					if(strpos($rec, "GPRMC") > -1)
						$isGPRMC = true;	
						
					$loopcount = 0;				
					$parts = explode(',',$rec);
				
					if(count($parts) > 1){
						$trackerdate 		     = mysqli_real_escape_string($conexao, $parts[0]);
						$phone 		    		 = mysqli_real_escape_string($conexao, $parts[1]);
						$gprmc 		    		 = mysqli_real_escape_string($conexao, $parts[2]);
						$satelliteDerivedTime    = mysqli_real_escape_string($conexao, $parts[3]);
						$satelliteFixStatus 	 = mysqli_real_escape_string($conexao, $parts[4]);
						$latitudeDecimalDegrees  = mysqli_real_escape_string($conexao, $parts[5]);
						$latitudeHemisphere 	 = mysqli_real_escape_string($conexao, $parts[6]);
						$longitudeDecimalDegrees = mysqli_real_escape_string($conexao, $parts[7]);
						$longitudeHemisphere 	 = mysqli_real_escape_string($conexao, $parts[8]);
						$speed 		    	  	 = mysqli_real_escape_string($conexao, $parts[9]);
						$bearing 		     	 = mysqli_real_escape_string($conexao, $parts[10]);
						$utcDate 		     	 = mysqli_real_escape_string($conexao, $parts[11]);
						$checksum 		    	 = mysqli_real_escape_string($conexao, $parts[14]);
						$gpsSignalIndicator 	 = mysqli_real_escape_string($conexao, $parts[15]);
						
						if(preg_match("/imei/", $parts[16])){
							$infotext   		 = "gprmc";
							$imei 			 	 = mysqli_real_escape_string($conexao, $parts[16]);
							$other 				 = mysqli_real_escape_string($conexao, $parts[17]);
						} 
						else{
							$infotext			 = mysqli_real_escape_string($conexao, $parts[16]);
							$imei 				 = mysqli_real_escape_string($conexao, $parts[17]);
							$other 				 = mysqli_real_escape_string($conexao, $parts[18] . ' ' . $parts[19]);
						}
						
						if($infotext == "")	$infotext = "gprmc";							

						if(preg_match("/:/", substr($imei, 5)))
							$imei = substr($imei, 6);
						else
							$imei = substr($imei, 5);

						$conn_imei = $imei;

						abrirArquivoLog($conn_imei);
						printLog($fh, date("d/m/Y H:i:s") . " Conexão com $remip:$remport");
						printLog($fh, date("d/m/Y H:i:s") . " Recebido: $rec");
						
						if($imei != ""){							  
							$consulta = mysqli_query($conexao, "SELECT * FROM geo_fence WHERE imei = '$imei'");
							
							while($data = mysqli_fetch_assoc($consulta)){
								$idCerca = $data['id'];
								$imeiCerca = $data['imei'];
								$nomeCerca = $data['nome'];
								$coordenadasCerca = $data['coordenadas'];
								$resultCerca = $data['tipo'];
								$tipoEnvio = $data['tipoEnvio'];
								
								strlen($latitudeDecimalDegrees) == 9 && $latitudeDecimalDegrees = '0'.$latitudeDecimalDegrees;
								$g = substr($latitudeDecimalDegrees, 0, 3);
								$d = substr($latitudeDecimalDegrees, 3);
								$strLatitudeDecimalDegrees = $g + ($d / 60);
								$latitudeHemisphere == "S" && $strLatitudeDecimalDegrees = $strLatitudeDecimalDegrees * - 1;
		
								strlen($longitudeDecimalDegrees) == 9 && $longitudeDecimalDegrees = '0'.$longitudeDecimalDegrees;
								$g = substr($longitudeDecimalDegrees, 0, 3);
								$d = substr($longitudeDecimalDegrees, 3);
								$strLongitudeDecimalDegrees = $g + ($d / 60);
								$longitudeHemisphere == "S" && $strLongitudeDecimalDegrees = $strLongitudeDecimalDegrees * - 1;
								$strLongitudeDecimalDegrees = $strLongitudeDecimalDegrees * - 1;
		
								$lat_point = $strLatitudeDecimalDegrees;
								$lng_point = $strLongitudeDecimalDegrees;
		
								$exp = explode("|", $coordenadasCerca);
		
								if((count($exp)) < 5){
									$strExp = explode(",", $exp[0]);
									$strExp1 = explode(",", $exp[2]);
								} 
								else{
									$int = (count($exp)) / 2;
									$strExp = explode(",", $exp[0]);
									$strExp1 = explode(",", $exp[$int]);
								}
		
								$lat_vertice_1 = $strExp[0];
								$lng_vertice_1 = $strExp[1];
								$lat_vertice_2 = $strExp1[0];
								$lng_vertice_2 = $strExp1[1];
		
								if($lat_vertice_1 < $lat_point || $lat_point < $lat_vertice_2 && $lng_point < $lng_vertice_1 || $lng_vertice_2 < $lng_point){
									$situacao = 'Saiu';
								} 
								else{
									$situacao = 'Entrou';
								}
		
								if(round($speed * 1.852, 0) > 0){
									$getCondicaoCerca = mysqli_query($conexao, "SELECT mensagem FROM alertas WHERE imei = '$imei' AND mensagem LIKE '%violada%' ORDER BY data DESC");

									$dados = mysqli_fetch_assoc($getCondicaoCerca);
									$condicaoCerca = explode(" - ", $dados['mensagem']);

									if(@$condicaoCerca[1] != $situacao){
										mysqli_query($conexao, "INSERT INTO alertas (imei, mensagem, data) VALUES ('$imei', 'Cerca $nomeCerca violada - $situacao', UNIX_TIMESTAMP())");
									}
	
									if($tipoEnvio == 0){
										$tempstr = "http://maps.google.com/maps/geo?q=$lat_point,$lng_point&oe=utf-8&output=csv"; //output = csv, xml, kml, json
										
										$rev_geo_str = file_get_contents($tempstr);
										$rev_geo_str = preg_replace("/\"/","", $rev_geo_str);
										
										$rev_geo = explode(',', $rev_geo_str);
										$logradouro = $rev_geo[2] . ", " . $rev_geo[3];
	
										require "lib/class.phpmailer.php";
										
										$consulta1 = mysqli_query($conexao, "SELECT a.*, b.* FROM cliente a INNER JOIN bem b ON a.id = b.cliente WHERE b.imei = '$imei'");
										
										while($data = mysqli_fetch_assoc($consulta1)) {
											//$emailDestino = $data['email'];
											$emailDestino = 'phcferrari@hotmail.com';
											$nameBem = $data['name'];
										
											$mensagem = new PHPMailer();
											$mensagem->Mailer = "smtp";
											$mensagem->IsHTML(true);
											$mensagem->CharSet = "utf-8";
											$mensagem->SMTPSecure = "tls";
											$mensagem->Host = "smtp.gmail.com";
											$mensagem->Port = "587";
											$mensagem->SMTPAuth = "true";
											$mensagem->Username = "paulophcferrari@gmail.com";
											$mensagem->Password = "bbKopp76";
											$mensagem->From = "paulophcferrari@gmail.com";
											$mensagem->FromName = "System Tracker";
											$mensagem->AddAddress($emailDestino);
											$mensagem->AddReplyTo($mensagem->From, $mensagem->FromName);
											$mensagem->Subject = "Sua Empresa - Violação de Perímetro";
	
											$mensagem->Body = 
												"<!DOCTYPE html>
												<html>
													<head>
														<meta charset='utf-8'>
														<title>Sua Empresa - Violação de Perímetro</title>
													</head>
													
													<body style='background-color: #FFF;'>
														<p>
															<b>Alerta de Violação de Perímetro</b><br /><br />
															
															O veículo $nameBem está $situacao do perímetro $nomeCerca às " . date("H:i:s") . " do dia " . date("d/m/Y") . ", no local $logradouro e trafegando a " . round($speed * 1.852, 0) . "km/h.<br /><br />
															
															Sua Empresa<br />
															(11) 12345-6789<br />
															<a href=\"http://www.Sua Empresa.com.br\">www.Sua Empresa.com.br</a>
														</p>
														
													</body>
												</html>";
												
											$mensagem->Send();
										}
									}
								}
							}
						}
		
						if($gpsSignalIndicator != 'L'){
							$movimento = '';
							
							if($speed > 0)
								$movimento = 'S';
   						    else
								$movimento = 'N';
								
							$gpsLat = gprsToGps($latitudeDecimalDegrees, $latitudeHemisphere);
							$gpsLon = gprsToGps($longitudeDecimalDegrees, $longitudeHemisphere);
							
							$gpsLatAnt = 0;
							$gpsLatHemAnt = '';
							
							$gpsLonAnt = 0;
							$gpsLonHemAnt = '';

							$resLocAtual = mysqli_query($conexao, "SELECT id FROM loc_atual WHERE imei = '$imei' limit 1");
							$numRows = mysqli_num_rows($resLocAtual);
							
							/**
							* BUSCAR ENDEREÇO POR CHAVES DINAMICAS DO GMAPS
							*/
							$res = mysqli_query($conexao, "select count(id) as numrows from chaves_gmaps ");
							$data = mysqli_fetch_assoc($res);
							$num_chaves = $data['numrows'];
						
							$res = mysqli_query($conexao, "select id, chave from chaves_gmaps where ativa = 'S' ");
							$data = mysqli_fetch_assoc($res);							
							$idchave = $data['id'];
							$chave      = $data['chave'];
						
							if ($idchave==''){
								$idchave = 1;
							}
						
							mysqli_query($conexao, "update chaves_gmaps set ativa = 'N' where id = ".$idchave);
						
							if( $idchave == $num_chaves){
								$idchave = 1;
							}
							else {
								$idchave++;
							}
							mysqli_query($conexao, "update chaves_gmaps set ativa = 'S', quantidade_uso = quantidade_uso + 1 where id = ".$idchave);
											
							$json = json_decode(file_get_contents("https://maps.google.com/maps/api/geocode/json?latlng=$gpsLat,$gpsLon&key=".$chave));
							sleep(2);
							if ( isset( $json->status ) && $json->status == 'OK' && isset($json->results[0]->formatted_address)) {
								$address = $json->results[0]->formatted_address;
								$address = utf8_decode($address);
								//printLog($fh,$address);
							} 
							else{
								printLog($fh,$json->results[0]);
							}
						
							/************************************/
							if($numRows == 0){
								mysqli_query($conexao, "INSERT INTO loc_atual (date, imei, phone, satelliteFixStatus, latitudeDecimalDegrees, latitudeHemisphere, longitudeDecimalDegrees, longitudeHemisphere, speed, infotext, gpsSignalIndicator, converte, address) VALUES (now(), '$imei', '$phone', '$satelliteFixStatus', '$latitudeDecimalDegrees', '$latitudeHemisphere', '$longitudeDecimalDegrees', '$longitudeHemisphere', '$speed', '$infotext', '$gpsSignalIndicator', 1, '$address')");
							}
							else{
								$dataLocAtual = mysqli_fetch_assoc($resLocAtual);
								
								$gpsLatAnt = $dataLocAtual[latitudeDecimalDegrees];
								$gpsLatHemAnt = $dataLocAtual[latitudeHemisphere];
								
								$gpsLonAnt = $dataLocAtual[longitudeDecimalDegrees];
								$gpsLonHemAnt = $dataLocAtual[longitudeHemisphere];
								
								mysqli_query($conexao, "UPDATE loc_atual SET date = now(), phone = '$phone', satelliteFixStatus = '$satelliteFixStatus', latitudeDecimalDegrees = '$latitudeDecimalDegrees', latitudeHemisphere = '$latitudeHemisphere', longitudeDecimalDegrees = '$longitudeDecimalDegrees', longitudeHemisphere = '$longitudeHemisphere', speed = '$speed', infotext = '$infotext', gpsSignalIndicator = '$gpsSignalIndicator', address = '$address' WHERE imei = '$imei'");
							}
							
							$distance = 0;
							
							try{
								$bemId = $dataBem[id];
								$countGeoDistance = mysqli_query($conexao, "SELECT bem FROM geo_distance WHERE bem = $bemId");
								
								if($countGeoDistance === false || mysqli_num_rows($countGeoDistance) == 0) {
									mysqli_query($conexao, "INSERT into geo_distance (bem, tipo) values($bemId, 'I')");
									mysqli_query($conexao, "INSERT into geo_distance (bem, tipo) values($bemId, 'F')");
								}
								
								if($dataCliente['envia_sms'] == 'S' && $dataBem['envia_sms'] == 'S' && !empty($dataCliente['celular']) && !empty($dataCliente['sms_acada'])){
									if(empty($dataCliente['dt_ultm_sms'])){
										$idCliente = $dataCliente['id'];
										mysqli_query($conexao, "UPDATE cliente SET dt_ultm_sms = now() WHERE id = '$idCliente'");
									} 
									else{
										$horas = $dataCliente['horas'];
										$minutos = $dataCliente['minutos'];
										
										if(!empty($horas)) $horas = $horas * 60;
										
										$tempoTotal = $horas + $minutos;
										
										if($tempoTotal > $dataCliente['sms_acada']){
											$json = json_decode(file_get_contents("http://maps.google.com/maps/api/geocode/json?latlng=$gpsLat,$gpsLon&language=es-ES"));
											
											if(isset($json->status ) && $json->status == 'OK' && isset($json->results[0]->formatted_address)){
												$address = $json->results[0]->formatted_address;
												$address = utf8_decode($address);
												
												$aDataCliente = split(' ', $dataCliente['nome']);
												
												$msg = $texto_sms_localiza;
												$msg = str_replace("#CLIENTE", $aDataCliente[0], $msg);
												$msg = str_replace("#VEICULO", $dataBem['name'], $msg);
												$msg = str_replace("#LOCALIZACAO", $address, $msg);
												$msg = str_replace(' ', '+', $msg);
												
												sendSMS($dataCliente['celular'], $msg, '', $conexao);
												
												if($retorno >= 0){
													$idCliente = $dataCliente['id'];
													mysqli_query($conexao, "UPDATE cliente SET dt_ultm_sms = now() WHERE id = '$idCliente'");
												}
											}
										}
									}
								}
							
								if($movimento == 'S'){
									$resGeoDistance = mysqli_query($conexao, "SELECT parou FROM geo_distance WHERE bem = $bemId and tipo = 'I'");
									$dataGeoDistance = mysqli_fetch_assoc($resGeoDistance);
									
									if($dataGeoDistance[parou] == 'S' || empty($dataGeoDistance[parou])){
										mysqli_query($conexao, "UPDATE geo_distance SET latitudeDecimalDegrees = '$latitudeDecimalDegrees', latitudeHemisphere = '$latitudeHemisphere', longitudeDecimalDegrees = '$longitudeDecimalDegrees', longitudeHemisphere = '$longitudeHemisphere', parou = 'N' WHERE bem =  $bemId and tipo = 'I'");
									}
								} 
								else{
									$resGeoDistance = mysqli_query($conexao, "SELECT latitudeDecimalDegrees, latitudeHemisphere, longitudeDecimalDegrees, longitudeHemisphere FROM geo_distance WHERE bem = $bemId and tipo = 'I'");
									
									if(mysqli_num_rows($resGeoDistance) > 0){
										$update = mysqli_query($conexao, "UPDATE geo_distance SET latitudeDecimalDegrees = '$latitudeDecimalDegrees', latitudeHemisphere = '$latitudeHemisphere', longitudeDecimalDegrees = '$longitudeDecimalDegrees', longitudeHemisphere = '$longitudeHemisphere', parou = 'S' WHERE bem =  $bemId and tipo = 'I'");
										$dataGeoDistance = mysqli_fetch_assoc($resGeoDistance);
										
										$gpsLatAnt = gprsToGps($dataGeoDistance[latitudeDecimalDegrees], $dataGeoDistance[latitudeHemisphere]);
										$gpsLonAnt = gprsToGps($dataGeoDistance[longitudeDecimalDegrees], $dataGeoDistance[longitudeHemisphere]);
										
										if($gpsLatAnt != $gpsLat){
											if($gpsLatAnt != 0 && $gpsLonAnt != 0){
												$geoDistance = distance($gpsLatAnt, $gpsLonAnt, $gpsLat, $gpsLon,'K');
												$distance = (int)($geoDistance*1000);
												
												$alertaACada = $dataBem['alerta_hodometro'];
												$alertaACadaSaldo = $dataBem['alerta_hodometro_saldo'];
												$alertaACadaSaldo = ($alertaACadaSaldo*1000) - $distance;
												
												if($alertaACadaSaldo <= 0 && $alertaACada > 0){
													$msg = $texto_sms_alerta_hodometro;
													$msg = str_replace("#CLIENTE", $aDataCliente[0], $msg);
													$msg = str_replace("#VEICULO", $dataBem['name'], $msg);
													$msg = str_replace("#HODOMETRO", $alertaACada, $msg);
													$msg = str_replace(' ', '+', $msg);
													$alertaACadaSaldo = $alertaACada;
												}

												$alertaACadaSaldo = (int)$alertaACadaSaldo/1000;
											}
										}
									}
								}
							}catch(Exception $e){
								unset($e);
							}
							
							/**
							* BUSCAR ENDEREÇO POR CHAVES DINAMICAS DO GMAPS
							*/
							$res = mysqli_query($conexao, "select count(id) as numrows from chaves_gmaps ");
							$data = mysqli_fetch_assoc($res);
							$num_chaves = $data['numrows'];
						
							$res = mysqli_query($conexao, "select id, chave from chaves_gmaps where ativa = 'S' ");
							$data = mysqli_fetch_assoc($res);							
							$idchave = $data['id'];
							$chave      = $data['chave'];
						
							if ($idchave==''){
								$idchave = 1;
							}
						
							mysqli_query($conexao, "update chaves_gmaps set ativa = 'N' where id = ".$idchave);
						
							if( $idchave == $num_chaves){
								$idchave = 1;
							}
							else {
								$idchave++;
							}
							mysqli_query($conexao, "update chaves_gmaps set ativa = 'S', quantidade_uso = quantidade_uso + 1 where id = ".$idchave);
											
							$json = json_decode(file_get_contents("https://maps.google.com/maps/api/geocode/json?latlng=$gpsLat,$gpsLon&key=".$chave));
							sleep(2);
							if ( isset( $json->status ) && $json->status == 'OK' && isset($json->results[0]->formatted_address)) {
								$address = $json->results[0]->formatted_address;
								$address = utf8_decode($address);
								//printLog($fh,$address);
							} 
							else{
								printLog($fh,$json->results[0]);
							}
						
							/************************************/
							mysqli_query($conexao, "UPDATE bem SET date = date, status_sinal = 'R', movimento = '$movimento', hodometro=hodometro+$distance WHERE imei = '$imei'");
							mysqli_query($conexao, "INSERT INTO gprmc (date, imei, phone, satelliteFixStatus, latitudeDecimalDegrees, latitudeHemisphere, longitudeDecimalDegrees, longitudeHemisphere, speed, infotext, gpsSignalIndicator, km_rodado, converte) VALUES (now(), '$imei', '$phone', '$satelliteFixStatus', '$latitudeDecimalDegrees', '$latitudeHemisphere', '$longitudeDecimalDegrees', '$longitudeHemisphere', '$speed', '$infotext', '$gpsSignalIndicator', $distance, 1)");
						} 
						else{
							mysqli_query($conexao, "UPDATE bem SET date = date, status_sinal = 'S' WHERE imei = '$imei'");
						}
						
						if(trim($infotext) != "gprmc"){
						    $res = mysqli_query($conexao, "SELECT responsible FROM bem WHERE imei = '$imei'");
							
							while($data = mysqli_fetch_assoc($res)){
								switch($infotext){
									case "dt":
										$body = "Disable Track OK";
										break;
									
									case "et":
										$body = "Stop Alarm OK";
										break;
									
									case "gt";
										$body = "Move Alarm set OK";
										break;
									
									case "help me":
										$body = "Help!";
										verificaAlerta("SOS!", $imei, $conexao);	
										break;
									
									case "ht":
										$body = "Speed alarm set OK";
										break;
									
									case "it":
										$body = "Timezone set OK";
										break;
									
									case "low battery":
										$body = "Low battery!\nYou have about 2 minutes...";
										verificaAlerta("Bateria Fraca", $imei, $conexao);
										break;
									
									case " bat:":
										$body = "Low battery!\nYou have about 2 minutes...";
										verificaAlerta("Bateria Fraca", $imei, $conexao);
										break;
									
									case "Low batt":
										$body = "Low battery!\nYou have about 2 minutes...";
										verificaAlerta("Bateria Fraca", $imei, $conexao);
										break;
									
									case "move":
										$body = "Move Alarm!";
										verificaAlerta("Movimento", $imei, $conexao);
										break;
									
									case "nt":
										$body = "Returned to SMS mode OK";
										break;
									
									case "speed":
										$body = "Speed alarm!";
										verificaAlerta("Velocidade", $imei, $conexao);
										break;
									
									case "stockade":
										$body = "Geofence Violation!";
										verificaAlerta("Cerca", $imei, $conexao);
										break;
								}
								
								$headers = "From: $email_from" . "\r\n" . "Reply-To: $email_from" . "\r\n";
								$responsible = $data['responsible'];
								//$rv = mail($responsible, "Tracker - $imei", $body, $headers);
							}
						}
					}

					if(file_exists("$command_path/$conn_imei")){
						$send_cmd = file_get_contents("$command_path/$conn_imei");
						
						socket_send($socket, $send_cmd, strlen($send_cmd), 0);
						mysqli_query($conexao, "DELETE FROM command WHERE imei = $conn_imei");
						unlink("$command_path/$conn_imei");
						
						printLog($fh, "Comandos do Banco e Arquivo apagados: " . $send_cmd . " imei: " . $conn_imei);				
					}
					break;
				}
			}
			$rec = "";
		}
		mysqli_close($conexao);
	}

	function become_daemon(){
		GLOBAL $fh;

		$pid = pcntl_fork();

		if($pid == -1){
			exit();
		} 
		elseif ($pid) {
			exit();
		} 
		else{
			posix_setsid();
			chdir('/');
			umask(0);
			return posix_getpid();
		}
	}

	function gprsToGps($cord, $hemisphere){
		$novaCord = 0;
		strlen($cord) == 9 && $cord = '0' . $cord;
		
		$g = substr($cord, 0, 3);
		$d = substr($cord, 3);
		
		$novaCord = $g + ($d/60);
		
		if($hemisphere == "S")
			$hemisphere == "S" && $novaCord = $novaCord * -1;
		if($hemisphere == "W")
			$hemisphere == "W" && $novaCord = $novaCord * -1;
		
		return $novaCord;
	}
	
	function verificaAlerta($mensagemAlerta, $imei, $resource){
		$getUltimoAlerta = mysqli_query($resource, "SELECT data FROM alertas WHERE imei = '$imei' AND mensagem = '$mensagemAlerta' ORDER BY data DESC");
		$coluna = mysqli_fetch_assoc($getUltimoAlerta);
	
		if(time() - @$coluna['data'] > 300)
			mysqli_query($resource, "INSERT INTO alertas (imei, mensagem, data) VALUES ('$imei', '$mensagemAlerta', UNIX_TIMESTAMP())");
	}

	function sendSMS($contato, $mensagem, $remetente, $resource){
		$res = mysqli_query($resource, "SELECT valor FROM preferencias WHERE nome = 'url_sms'");
		$data = mysqli_fetch_assoc($res);
		$url = $data['valor'];
		
		$res = mysqli_query($resource, "SELECT valor FROM preferencias WHERE nome = 'usuario_sms'");
		$data = mysqli_fetch_assoc($res);
		$usuario = $data['valor'];
		
		$res = mysqli_query($resource, "SELECT valor FROM preferencias WHERE nome = 'senha_sms'");
		$data = mysqli_fetch_assoc($res);
		$senha = $data['valor'];
		
		$res = mysqli_query($resource, "SELECT valor FROM preferencias WHERE nome = 'de_sms'");
		$data = mysqli_fetch_assoc($res);
		$de = $data['valor'];
		
		file_get_contents($url . "usr=" . $usuario . "&pwd=" . $senha . "&number=55" . $contato . "&sender=" . $de . "&msg=$mensagem");
	}

	function distance($lat1, $lon1, $lat2, $lon2){
		$center_lat = $lat1;
		$center_lng = $lon1;
		$lat = $lat2;
		$lng = $lon2;

		$distance =(6371 * acos((cos(deg2rad($center_lat)) ) * (cos(deg2rad($lat))) * (cos(deg2rad($lng) - deg2rad($center_lng))) + ((sin(deg2rad($center_lat))) * (sin(deg2rad($lat))))));
		return $distance;
	}
?>