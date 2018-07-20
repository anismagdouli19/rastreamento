<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';
	
	if(isset($_GET['id_regra'])){
		$idRegra = $_GET['id_regra'];
		
		if (isset($_GET['acao'])) $acao = $_GET['acao'];
		elseif ($idRegra) $acao = 'regra_alterar';
		else $acao = 'regra_adicionar';

		if($acao == 'dados'){
			$listaBens = "";
			$bensCliente = mysqli_query($conexao, "SELECT name, id FROM bem WHERE cliente = '$_SESSION[id]' ORDER BY name ASC");
			
			$selecionado = "";

			while($option = mysqli_fetch_assoc($bensCliente)){
				$id = $option['id'];
				$name = $option['name'];
				
				$listaBens .= "<option $selecionado value='$id'>$name</option>";
			}
			echo json_encode($listaBens);
		}

		if($acao == 'remover'){
			if(mysqli_query($conexao, "DELETE FROM regras WHERE id_regra = '$idRegra'"))
				echo "OK";
			else
				echo "Desculpe, não foi possível excluir.";
		}

		if($acao == 'regra_adicionar'){
			$nome = $_GET['nome_regra'];
			$emails = $_GET['email'];

			mysqli_query($conexao, "INSERT INTO regras (id_cerca, cliente, titulo, motoristas, veiculos, horario, dias, validade, condicao, emails) VALUES (1, '$_SESSION[id]', '$nome', 'N', 'N', 'N', 'N', 'N', 'N', '$emails')");
			echo "<section class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Sucesso!</strong> A regra foi cadastrada com êxito.</section>";
		}

		if($acao == 'regra_alterar'){

		}
	}

	if(isset($_GET['id_inserido'])){
		$nome = $_GET['id_inserido'];
		$query = mysqli_query($conexao, "SELECT id_regra FROM regras WHERE titulo = '$nome'");
		$dados = mysqli_fetch_assoc($query);
		echo $dados['id_regra'];
	}
?>