<?php
	require_once 'acesso.php';
	require_once 'config.php';

	$idVinculo = $_GET['vinculo'];
	$idBem = $_GET['idBem'];
	$motoristaID = $_GET['motorista'];
	
	mysqli_query($conexao, "UPDATE bem SET apelido = 'Desvinculado' WHERE id = '$idBem' AND cliente = '$_SESSION[id]'");
	mysqli_query($conexao, "DELETE FROM vinculos WHERE id_vinculo = '$idVinculo' AND cliente = '$_SESSION[id]'");

	header("location: motoristaDetalhe.php?motorista=$motoristaID");
?>