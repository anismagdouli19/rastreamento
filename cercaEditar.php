<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';
	
	if(isset($_GET['imei'])){
		$strImei = $_GET['imei'];
		$strId = $_GET['id'];

		$resultado = mysqli_query($conexao, "SELECT latitudeDecimalDegrees, latitudeHemisphere, longitudeDecimalDegrees, longitudeHemisphere FROM gprmc WHERE gpsSignalIndicator = 'F' and imei = $strImei order by id desc limit 1,1") or die(mysqli_error());	
		
		if(mysqli_num_rows($resultado)){
			while($data = mysqli_fetch_assoc($resultado)){
				strlen($data['latitudeDecimalDegrees']) == 9 && $data['latitudeDecimalDegrees'] = '0' . $data['latitudeDecimalDegrees'];
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
			$latitude = $latitudeDecimalDegrees;
			$longitude = $longitudeDecimalDegrees;
		}
		else{
			$latitude = 0;
			$longitude = 0;
		}

		$latCoord = array();
		$lngCoord = array();

		$resultado = mysqli_query($conexao, "SELECT * FROM geo_fence WHERE id = '$strId'") or die(mysqli_error());
		while ($linha = mysqli_fetch_assoc($resultado)){
			$id = $linha["id"];
			$imei = $linha["imei"];
			$coordenada = $linha["coordenadas"];
			$replace = explode('|', $coordenada);
			$count = count($replace);
			for ($i=0; $i < $count; $i++) { 
				$coord = explode(",", $replace[$i]);
				$latCoord[] = $coord[0];
				$lngCoord[] = $coord[1];
			}
		}

		$imprima = array(
			'imei' => $strImei,
			'id' => $strId,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'latCoord' => $latCoord,
			'lngCoord' => $lngCoord,
		);

		echo json_encode($imprima);
	}
?>