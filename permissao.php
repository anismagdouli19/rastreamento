<?php
	$getPermissao = mysqli_query($conexao, "SELECT id_usuario, admin FROM usuarios WHERE apelido = '$_SESSION[usuario]'");
	$dados = mysqli_fetch_assoc($getPermissao);
	
	if($dados['admin'] == 'N'){
		if(isset($_GET['userid'])){
			if($dados['id_usuario'] != $_GET['userid']){
				header("Location: " . $_SERVER['PHP_SELF'] . "?userid=" . $dados['id_usuario']);
				exit();
			}
		}
		elseif(isset($_GET['motorista'])){
			$result = mysqli_query($conexao, "SELECT * FROM motoristas WHERE id_motorista = '$_GET[motorista]' AND cliente = '$_SESSION[id]'");
			
			if(mysqli_num_rows($result) < 1){
				header("Location: motoristaVisualizar.php");
				exit();
			}
		}
	}
?>