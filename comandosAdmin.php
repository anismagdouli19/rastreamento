<?php
	if(isset($_GET['imei']) && isset($_GET['acao'])){
		require_once 'acesso.php';
		require_once 'config.php';
		
		$tipoPagina = 'administracao';
		require_once 'acessoMaster.php';

		$command  = $_GET['acao'];		
		$imei = $_GET['imei'];
		@$commandSpeedLimit = $_GET['velocidade'];
		@$commandTime = $_GET['tempo'];

		if($command == ',H,060') $command = ',H,0' . floor($commandSpeedLimit / 1.609);
		if($command == ',C,30s') $command = ',C,' . $commandTime;

		$fn = "/var/www/html/server/comandos/$imei";
		$fh = fopen($fn, 'w');
	
		$tempstr = "**,imei:$imei$command"; 
		fwrite($fh, $tempstr);
		fclose($fh);

		if($command == ',J'){
			mysqli_query($conexao, "UPDATE bem SET bloqueado = 'S' WHERE imei = '$imei'");
			$tempstr = chr(0x78).chr(0x78).chr(0x15).chr(0x80).chr(0x0F).chr(0x00).chr(0x01).chr(0xA9).chr(0x58).chr(0x44).chr(0x59).chr(0x44).chr(0x2C).chr(0x30).chr(0x30).chr(0x30).chr(0x30).chr(0x30).chr(0x30).chr(0x23).chr(0x00).chr(0xA0).chr(0xDC).chr(0xF1).chr(0x0D).chr(0x0A);
		}

		if($command == ',K'){
			mysqli_query($conexao, "UPDATE bem SET bloqueado = 'N' WHERE imei = '$imei'");
			$tempstr = chr(0x78).chr(0x78).chr(0x16).chr(0x80).chr(0x10).chr(0x00).chr(0x01).chr(0xA9).chr(0x63).chr(0x48).chr(0x46).chr(0x59).chr(0x44).chr(0x2C).chr(0x30).chr(0x30).chr(0x30).chr(0x30).chr(0x30).chr(0x30).chr(0x23).chr(0x00).chr(0xA0).chr(0x7B).chr(0xDC).chr(0x0D).chr(0x0A);
		}

		$getID = mysqli_query($conexao, "SELECT cliente FROM bem WHERE imei = '$imei'");
		$userData = mysqli_fetch_assoc($getID);

		if(!mysqli_query($conexao, "INSERT INTO command (imei, command, userid) VALUES ('$imei', '$tempstr', '" . $userData['cliente'] . "')")){
			mysqli_query($conexao, "UPDATE command SET command = '$tempstr' WHERE imei = '$imei'");
		}
		
		echo json_encode(true);
	}
?>