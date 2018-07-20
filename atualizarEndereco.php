<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';

	if(isset($_POST['id']) && isset($_POST['addr'])){
		$idRota = (int) $_POST['id'];
		$address = addslashes($_POST['addr']);

		mysqli_query($conexao, "UPDATE gprmc SET address = '" . utf8_decode($address) . "', date = date WHERE id = $idRota");
	}
?>