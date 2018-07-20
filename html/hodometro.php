<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';

	$imei = $_GET['imei'];
	$acao = $_GET['acao'];

	if($acao == 'hodometro_atual'){
		if($imei != '' && isset($_SESSION['id'])){
			$res = mysqli_query($conexao, "SELECT hodometro, alerta_hodometro FROM bem WHERE imei = '$imei'");
			$dataRes = mysqli_fetch_assoc($res);

			echo json_encode($dataRes);
		}
		return;
	}

	if($acao == 'salvar_hodometro'){
		$hodometro = $_GET['hodometro'];
		$alerta_hodometro = $_GET['alerta_hodometro'];
		
		if($imei != '' && isset($_SESSION['id']) && !empty($hodometro)){
			mysqli_query($conexao, "UPDATE bem SET hodometro = $hodometro, alerta_hodometro = $alerta_hodometro, alerta_hodometro_saldo = $alerta_hodometro WHERE imei = '$imei'");
			echo 'OK';
		}
		return;
	}
?>