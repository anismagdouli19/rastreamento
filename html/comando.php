
#!/usr/bin/php -q
<?php 
	
	$tipoPagina = 'cliente';
	

	$imei = $_POST['imei'];
	$command = $_POST['command'];
	$commandTime = $_POST['commandTime'];
	$commandSpeedLimit = $_POST['commandSpeedLimit'];

	$cancelar = (isset($_GET['cancelar'])) ? $_GET['cancelar'] : false;
	$command_path = "/var/www/html/server/comandos";
	
	$resultBem = mysqli_query($conexao,"SELECT modelo_rastreador FROM bem WHERE imei = '$imei'");
	$dataBem = mysqli_fetch_assoc($resultBem);
	
	if(strtoupper($dataBem['modelo_rastreador']) == 'TK103'){
												   		
				if($imei != "" && $command != ""){
			$fn = "$command_path/$imei";
			$fh = fopen($fn, 'w');
			
			$tempstr = "**,imei:$imei$command"; 
			
			fwrite($fh, $tempstr);
			fclose($fh);
			
			$tempstr = "**,imei:$imei$command"; 
		
			
			if($command == ',J'){
				$ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv("REMOTE_ADDR"));			
				mysqli_query($conexao, "UPDATE bem SET bloqueado = 'S' WHERE imei = '$imei' AND cliente = '$_SESSION[id]'");
			}	
				
			
			if(!mysqli_query($conexao, "INSERT INTO command (imei, command, userid) VALUES ('$imei', '$tempstr', '$_SESSION[id]')")){
				mysqli_query($conexao, "UPDATE command SET command = '$tempstr' WHERE imei = '$imei'");
				echo "OK";
			}
			echo "OK";
		}
	}
?>