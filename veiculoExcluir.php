<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';

	$idVeiculo = $_GET['idVeiculo'];
	$userid = $_GET['userid'];
	
	mysqli_query($conexao, "DELETE FROM bem WHERE id = '$idVeiculo' AND cliente = '$userid'");
	
	header("Location: veiculoVisualizar.php?userid=$userid");
?>