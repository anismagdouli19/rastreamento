<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';

	$id = $_GET["id"];
	$imei = $_GET["imei"];
	$coordenadas = $_GET["coordenadas"];
	$latitude = $_GET["latitude"];
	$longitude = $_GET["longitude"];

	$exp = explode("|", $coordenadas);

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

	if($latVerticeUm < $latitude || $latitude < $latVerticeDois && $longitude < $lngVerticeUm || $lngVerticeDois < $longitude)
		$status = '0';
	else
		$status = '1';

	mysqli_query($conexao, "UPDATE geo_fence SET coordenadas = '$coordenadas', tipo = '$status', disp = 'S', dt_altao = '" . date("d/m/Y H:i:s") . "' WHERE id = '$id'");
	echo "OK";
?>