<?php
	$getPermissao = mysqli_query($conexao, "SELECT admin FROM usuarios WHERE apelido = '$_SESSION[usuario]'");
	$dados = mysqli_fetch_assoc($getPermissao);
	
	if($tipoPagina == 'cliente' && $dados['admin'] == 'S'){
		header("Location: usuarioVisualizar.php");
		exit();
	}
	elseif($tipoPagina == 'administracao' && $dados['admin'] == 'N'){
		header("Location: default.php");
		exit();
	}
?>