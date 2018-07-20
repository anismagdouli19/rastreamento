<?php 
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';
	
	if(version_compare(phpversion(), '5.5.0', '<')){
		require_once 'server/lib/password.php';
	}

	$senha = $_GET["senha_atual"];
	$nova = $_GET["nova_senha"];
	$repita = $_GET["repita_senha"];
	
	$getHashAtual = mysqli_query($conexao, "SELECT senha FROM usuarios WHERE id_usuario = '$_SESSION[id]'");
	$coluna = mysqli_fetch_array($getHashAtual);
	$hashAtual = $coluna["senha"];

	if($senha != "" && $nova != "" && $repita != ""){
		if(password_verify($senha, $hashAtual)){
			$hash = password_hash($nova, PASSWORD_DEFAULT);
			mysqli_query($conexao, "UPDATE usuarios SET senha = '$hash' WHERE id_usuario = '$_SESSION[id]'");
			
			echo "<section class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Sucesso!</strong> A senha foi alterada com êxito.</section>";
		}
		else 
			die("<section class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Erro:</strong> A senha atual está incorreta.</section>");
	} 
	else 
		echo "Existem campos obrigatórios em branco!";
?>