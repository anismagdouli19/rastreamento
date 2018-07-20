<?php 
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';

	@$codCerca = $_GET["codCerca"];
	@$codImei = $_GET["codImei"];

	if($codCerca != ""){
		mysqli_query($conexao, "DELETE FROM geo_fence WHERE id = $codCerca");
		echo "OK";
	}

	if($codImei != ""){
		mysqli_query($conexao, "DELETE FROM geo_fence WHERE imei = $codImei");
		echo "OK";
	}
?>