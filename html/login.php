<?php
	require_once 'config.php';

	if(version_compare(phpversion(), '5.7.0', '<')){
		require_once 'server/lib/password.php';
	}
	
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

	$getHash = mysqli_query($conexao, "SELECT id_usuario, senha, admin, data_contrato, data_renovacao, ativo FROM usuarios WHERE apelido = '$usuario'");
	$dados = mysqli_fetch_assoc($getHash);
	$hash = $dados['senha'];

	if(password_verify($senha, $hash)){
		session_start();
		
		$_SESSION['usuario'] = $_POST['usuario'];
		$_SESSION['id'] = $dados['id_usuario'];
		
		if($dados['admin'] == 'S'){
			header("Location: usuarioVisualizar.php");
		}
		else{
			if(time() - $dados['data_renovacao'] <= 31536000 && $dados['ativo'] == 'S'){				
				mysqli_query($conexao, "UPDATE bem SET status_sinal = 'D' WHERE cliente = '$dados[id_usuario]'");		
				header("Location: default.php");
			}
			else{
				mysqli_query($conexao, "UPDATE usuarios SET ativo = 'N', data_inativacao = UNIX_TIMESTAMP() WHERE apelido = '$usuario'");
				header("Location: index.php?desativado=1");
			}
		}
	}
	else{
		header("Location: index.php?error=1");	
	}
?>