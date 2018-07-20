<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';

	$userID = $_GET['userid'];
	$comando = $_GET['comando'];
	
	if($comando != "" && $userID != ""){
		if($comando == "Ativar"){
			mysqli_query($conexao, "UPDATE usuarios SET ativo = 'S', data_renovacao = UNIX_TIMESTAMP() WHERE id_usuario = '$userID'");
			header("Location: usuarioDetalhe.php?userid=$userID");
			exit();
		}
		else{
			if($comando == "Inativar"){
				mysqli_query($conexao, "UPDATE usuarios SET ativo = 'N' WHERE id_usuario = '$userID'");
				header("Location: usuarioDetalhe.php?userid=$userID");
				exit();
			}
			else{
				mysqli_query($conexao, "DELETE FROM usuarios WHERE id_usuario = '$userID'");
				header("Location: usuarioVisualizar.php");
				exit();
			}
		}
	}
?>