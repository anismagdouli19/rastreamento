<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';
	
	$imei = $_GET["imei"];
	$nome = $_GET["NomeCerca"];
	$coordenadas = $_GET["cerca"];
	$tipoEnvio = 0;
	$tipoAcao = 0;

	$resultGPRMC = mysqli_query($conexao, "SELECT latitudeDecimalDegrees, latitudeHemisphere, longitudeDecimalDegrees, longitudeHemisphere FROM gprmc WHERE gpsSignalIndicator = 'F' AND imei = $imei ORDER BY id DESC LIMIT 1,1");
	if(mysqli_num_rows($resultGPRMC)) {
		while($data = mysqli_fetch_assoc($resultGPRMC)){
			strlen($data['latitudeDecimalDegrees']) == 9 && $data['latitudeDecimalDegrees'] = '0'.$data['latitudeDecimalDegrees'];
			$g = substr($data['latitudeDecimalDegrees'], 0, 3);
			$d = substr($data['latitudeDecimalDegrees'], 3);
			$latitudeDecimalDegrees = $g + ($d / 60);
			$data['latitudeHemisphere'] == "S" && $latitudeDecimalDegrees = $latitudeDecimalDegrees * -1;

			strlen($data['longitudeDecimalDegrees']) == 9 && $data['longitudeDecimalDegrees'] = '0' . $data['longitudeDecimalDegrees'];
			$g = substr($data['longitudeDecimalDegrees'], 0, 3);
			$d = substr($data['longitudeDecimalDegrees'], 3);
			$longitudeDecimalDegrees = $g + ($d / 60);
			$data['longitudeHemisphere'] == "S" && $longitudeDecimalDegrees = $longitudeDecimalDegrees * -1;

			$longitudeDecimalDegrees = $longitudeDecimalDegrees * -1;
		}

		$lat_point = $latitudeDecimalDegrees;
		$lng_point = $longitudeDecimalDegrees;
	}


	$cerca = str_replace("(", "", str_replace(")", "", str_replace(")(", "|", $coordenadas)));

	$exp = explode("|", $cerca);

	if((count($exp)) < 5){
		$strExp = explode(",", $exp[0]);
		$strExp1 = explode(",", $exp[2]);
	}
	else{
		$int = (count($exp)) / 2;
		$strExp = explode(",", $exp[0]);
		$strExp1 = explode(",", $exp[$int]);
	}

	$latVerticeUm = $strExp[0];
	$lngVerticeUm = $strExp[1];
	$latVerticeDois = $strExp1[0];
	$lngVerticeDois = $strExp1[1];

	if($latVerticeUm < $lat_point ||  $lat_point < $latVerticeDois && $lng_point < $lngVerticeUm || $lngVerticeDois < $lng_point ){
		$status = '0';
	} 
	else{
		$status = '1';
	}

	if($verifica = mysqli_query($conexao, "SELECT nome FROM geo_fence WHERE imei = '$imei'")){
		if(mysqli_num_rows($verifica)){
			echo "Detectamos uma cerca existente para o veículo selecionado.";
		}
		else{
			$resultado = mysqli_query($conexao, "INSERT INTO geo_fence (coordenadas, nome, imei, tipo, tipoEnvio, tipoAcao, dt_incao, disp) VALUES ('$cerca', '$nome', '$imei', '$status', '$tipoEnvio', '$tipoAcao', '" . date("d/m/Y H:i:s") . "', 'S')");
		}
	}
	else echo mysqli_error();

	echo "OK";
?>