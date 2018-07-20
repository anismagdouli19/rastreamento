<?php
	if(isset($_GET['imei']) && isset($_GET['acao'])){
		require_once 'acesso.php';
		require_once 'config.php';
		
		$tipoPagina = 'administracao';
		require_once 'acessoMaster.php';

		$imei = $_POST['imei'];
	$command = $_POST['command'];
	$commandTime = $_POST['commandTime'];
	$commandSpeedLimit = $_POST['commandSpeedLimit'];
	
	$cnx = new mysqli($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
	if ($cnx->connect_errno) {
	echo "Falha ao conectar ao banco: (".$cnx->connect_errno.") ".$cnx->connect_error;
	}

    $cancelar = (isset($_GET['cancelar'])) ? $_GET['cancelar'] : false ;
	$command_path = "/var/www/html/server/comandos";
	
	$resultBem = mysqli_query($conexao,"SELECT modelo_rastreador FROM bem WHERE imei = '$imei'");
	$dataBem = mysqli_fetch_assoc($resultBem);
		
		if(strtoupper($dataBem['modelo_rastreador']) == 'TK103' || $dataBem['modelo_rastreador'] == 'TK303' || $dataBem['modelo_rastreador'] == 'TK104') {
												   		
		if($command == ',C,30s') $command = $commandTime;
		elseif($command == ',H,060') $command = ',H,0' . floor($commandSpeedLimit / 1.609);
		
		if($imei != "" && $command != ""){
			$fn = "$command_path/$imei";
			$fh = fopen($fn, 'w');
			
			$tempstr = "**,imei:$imei$command"; 
			
			fwrite($fh, $tempstr);
			fclose($fh);
			
			$tempstr = "**,imei:$imei$command"; 
		
			if($command == ',N'){
				mysqli_query($conexao, "UPDATE bem SET modo_operacao = 'SMS' WHERE imei = '$imei' AND modo_operacao = 'GPRS'");
			}
			
			if($command == ',J'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));			
				mysqli_query($conexao, "UPDATE bem SET bloqueado = 'S' WHERE imei = '$imei' AND cliente = '$_SESSION[id]'");
			}	
			
			if($command == ',K'){		
				mysqli_query($conexao, "UPDATE bem SET bloqueado = 'N' WHERE imei = '$imei' AND cliente = '$_SESSION[id]'");
			}	
			
			if(!mysqli_query($conexao, "INSERT INTO command (imei, command, userid) VALUES ('$imei', '$tempstr', '$_SESSION[id]')")){
				mysqli_query($conexao, "UPDATE command SET command = '$tempstr' WHERE imei = '$imei'");
				echo "OK";
			}
			echo "OK";
		}
	}
	elseif($dataBem['modelo_rastreador'] == 'ST300'){
		
		if ($imei != "" and $command != "") {
			
			$tempstr = "";
	
			if ($command == ',J'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "ST300CMD;$imei;02;Enable1";
				if (!mysqli_query($conexao,"UPDATE bem set bloqueado = 'S' WHERE imei = '$imei' and cliente = ".$_SESSION['id'].""))
					die('Error: ' . mysqli_error());
			}
	
			if ($command == ',K'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "ST300CMD;$imei;02;Disable1";
				if (!mysqli_query($conexao,"UPDATE bem set bloqueado = 'N' WHERE imei = '$imei' and cliente = ".$_SESSION['id']."")) die('Error: ' . mysql_error());
			}
	
			if ($command == ',B'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "ST300CMD;$imei;02;StatusReq";
			}
	
			if ($command == ',H,060'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$command = '' . floor($commandSpeedLimit);
				$tempstr = "ST300SVC;$imei;02;1;$command;0;0;0;0;1;1;1;0;0;0;0";
			}
	
			if ($command == ',C,30s'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "ST300RPT;$imei;02;120;$commandTime;60;3;0;0;0;0;0";
			}
	
			if ($command == ',G'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "ST300SVC;$imei;02;1;120;0;0;0;0;1;1;1;0;0;0;0";
			}
	
			if ($command == ',E'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "ST300SVC;$imei;02;0;120;0;0;0;0;1;1;1;0;0;0;0";
			}
	
			mysqli_query($conexao, "INSERT INTO command (imei, command, userid) VALUES ('".$imei."', '".$tempstr."', ".$_SESSION['id'].")");
			echo "OK";
		}
		echo "OK";
	}
	elseif($dataBem['modelo_rastreador'] == 'SA200'){
		
		if ($imei != "" and $command != "") {
			
			$tempstr = "";
	
			if ($command == ',J'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "SA200CMD;$imei;02;Enable1";
				if (!mysqli_query($conexao,"UPDATE bem set bloqueado = 'S' WHERE imei = '$imei' and cliente = ".$_SESSION['id'].""))
					die('Error: ' . mysql_error());
			}
	
			if ($command == ',K'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "SA200CMD;$imei;02;Disable1";
				if (!mysqli_query($conexao,"UPDATE bem set bloqueado = 'N' WHERE imei = '$imei' and cliente = ".$_SESSION['id']."")) die('Error: ' . mysqli_error());
			}
	
			if ($command == ',B'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "SA200CMD;$imei;02;StatusReq";
			}
	
			if ($command == ',H,060'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$command = '' . floor($commandSpeedLimit);
				$tempstr = "SA200SVC;$imei;02;1;$command;0;0;0;0;1;1;1;0;0;0;0";
			}
	
			if ($command == ',C,30s'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "SA200RPT;$imei;02;120;$commandTime;60;3;0;0;0;0;0";
			}
	
			if ($command == ',G'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "SA200SVC;$imei;02;1;120;0;0;0;0;1;1;1;0;0;0;0";
			}
	
			if ($command == ',E'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "SA200SVC;$imei;02;0;120;0;0;0;0;1;1;1;0;0;0;0";
			}
	
			mysqli_query($conexao, "INSERT INTO command (imei, command, userid) VALUES ('".$imei."', '".$tempstr."', ".$_SESSION['id'].")");
			echo "OK";
		}
		echo "OK";
	}

	elseif ($dataBem['modelo_rastreador'] == 'GT06N' || $dataBem['modelo_rastreador'] == 'GT06' || $dataBem['modelo_rastreador'] == 'CRX1') {
			
			$tempstr = "";
			// COMANDO PARA BLOQUEAR COMBUSTÍVEL
			if ($command == ',J') {
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "DYD#"; 
				//Guardando log de bloqueio
				if (!mysqli_query("INSERT INTO command_log (imei, command, cliente, ip) VALUES ('$imei', '$tempstr', '$cliente', '$ip')", $cnx)) die('Error: ' . mysqli_error());
				if (!mysqli_query("UPDATE bem set bloqueado = 'S' WHERE imei = '$imei'", $cnx)) die('Error: ' . mysqli_error());
			}

			// COMANDO PARA LIBERAR COMBUSTÍVEL
			if ($command == ',K') {
				$tempstr = "HFYD#";
				if (!mysqli_query("UPDATE bem set bloqueado = 'N' WHERE imei = '$imei'", $cnx)) die('Error: ' . mysqli_error());
			}

			if ($command == 'FORCALOC') {
				$tempstr = "DWXX#";
			}

			if (!mysqli_query("INSERT INTO command (imei, command, userid) VALUES ('$imei', '$tempstr', '$userid')", $cnx)) {
				// Se der erro, atualiza o comando existente
				mysqli_query("UPDATE command set command = '$tempstr' WHERE imei = '$imei'", $cnx);
			}

			$fn = $command_path.$imei;
			$fh = fopen($fn, 'w') or die ("Can not create file");
			//$fh = fopen($fn.'_teste', 'w');
			fwrite($fh, $tempstr);
			fclose($fh);
			
			echo json_encode(true);

		}//FIM Modelo CRX1
		
		elseif($dataBem['modelo_rastreador'] == 'ACCURATE'){
			
			$tempstr = "";
			// COMANDO PARA BLOQUEAR COMBUSTÍVEL
			if ($command == ',J') {
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));
				$tempstr = "DYD,123456#"; 
				//Guardando log de bloqueio
				if (!mysqli_query("INSERT INTO command_log (imei, command, cliente, ip) VALUES ('$imei', '$tempstr', '$cliente', '$ip')", $cnx)) die('Error: ' . mysqli_error());
				if (!mysqli_query("UPDATE bem set bloqueado = 'S' WHERE imei = '$imei'", $cnx)) die('Error: ' . mysqli_error());
			}

			// COMANDO PARA LIBERAR COMBUSTÍVEL
			if ($command == ',K') {
				$tempstr = "HFYD,123456#";
				if (!mysqli_query("UPDATE bem set bloqueado = 'N' WHERE imei = '$imei'", $cnx)) die('Error: ' . mysqli_error());
			}

			if ($command == 'FORCALOC') {
				$tempstr = "DWXX,123456#";
			}

			if (!mysqli_query("INSERT INTO command (imei, command, userid) VALUES ('$imei', '$tempstr', '$userid')", $cnx)) {
				// Se der erro, atualiza o comando existente
				mysqli_query("UPDATE command set command = '$tempstr' WHERE imei = '$imei'", $cnx);
			}

			$fn = $command_path.$imei;
			$fh = fopen($fn, 'w') or die ("Can not create file");
			//$fh = fopen($fn.'_teste', 'w');
			fwrite($fh, $tempstr);
			fclose($fh);
			
			echo json_encode(true);

		}//FIM Modelo GT
	
$cnx->close();
//Cancelando o comando enviado
if ($cancelar != "") {
	$cnx = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME) or die("Não foi possivel conectar ao Mysql".$cnx->error());
	if (!$cnx->query("DELETE FROM command WHERE imei = '$cancelar'")){
		die('Error: ' . $cnx->error());
	}
	$cnx->close();
}
?>