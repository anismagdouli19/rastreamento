<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';	
	
	mysqli_query($conexao, "UPDATE preferencias SET email_pagseguro = '".$_POST["email_pagseguro"]."', token_pagseguro= '".$_POST["token_pagseguro"]."'");
	header('location: usuarioVisualizar.php');
?>