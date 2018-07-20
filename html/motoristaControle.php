<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';

	$motorista = $_GET['motorista'];
	$comando = $_GET['comando'];
	
	if($comando != "" && $motorista != ""){
		if($comando == "Ativar"){
			mysqli_query($conexao, "UPDATE motoristas SET ativo = '1' WHERE id_motorista = '$motorista' AND cliente = '$_SESSION[id]'");
			header("location: motoristaDetalhe.php?motorista=$motorista");
			exit();
		}
		else{
			if($comando == "Inativar"){
				$idBem = $_GET['idBem'];
				
				mysqli_query($conexao, "UPDATE motoristas SET ativo = '0' WHERE id_motorista = '$motorista' AND cliente = '$_SESSION[id]'");
				mysqli_query($conexao, "UPDATE bem SET apelido = 'Desvinculado' WHERE id = '$idBem' AND cliente = '$_SESSION[id]'");
				mysqli_query($conexao, "DELETE FROM vinculos WHERE id_motorista = '$motorista' AND cliente = '$_SESSION[id]'");
				header("location: motoristaDetalhe.php?motorista=$motorista");
				exit();
			}
			else{
				mysqli_query($conexao, "DELETE FROM motoristas WHERE id_motorista = '$motorista' AND cliente = '$_SESSION[id]'");
				header("location: motoristaVisualizar.php");
				exit();
			}
		}
	}
?>