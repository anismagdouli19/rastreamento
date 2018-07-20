<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';
	
	if(isset($_GET['id_grupo'])){
		$idGrupo = $_GET['id_grupo'];
		if(isset($_GET['acao'])) $acao = $_GET['acao'];
		elseif ($idGrupo) $acao = 'grupo_alterar';
		else $acao = 'grupo_adicionar';

		if($acao == 'dados'){
			$listaBens = "";
			$bensCliente = mysqli_query($conexao, "SELECT name, id FROM bem WHERE cliente = '$_SESSION[id]' ORDER BY name ASC") or die(mysqli_error($conexao));
			$bensGrupo = mysqli_query($conexao, "SELECT b.name, b.id FROM bem b JOIN grupo_bem gb ON gb.bem = b.id WHERE b.cliente = '$_SESSION[id]' AND gb.grupo = $idGrupo");

			if(mysqli_num_rows($bensGrupo) > 0){
				$veiculos = array();
				$i = 0;
				while($row = mysqli_fetch_assoc($bensGrupo)){
					$veiculos[$i]['name'] = $row['name'];
					$veiculos[$i]['id'] = $row['id'];
					$i++;
				}
				$contador = count($veiculos);
			}
			else{
				$contador = 0;
				$selecionado = " ";
			}

			while($option = mysqli_fetch_assoc($bensCliente)){
				for($i=0; $i < $contador; $i++) {
					if($option['id'] == $veiculos[$i]['id']){
						$selecionado = " selected ";
						break;
					}
					else $selecionado = " ";
				}
				$listaBens .= "<option". $selecionado ."value=\"". $option['id'] ."\">". $option['name'] ."</option>";
			}
			echo json_encode($listaBens);
		}

		if($acao == 'remover'){
			if(mysqli_query($conexao, "DELETE FROM grupo WHERE id = $idGrupo")){
				mysqli_query($conexao, "DELETE FROM grupo_bem WHERE grupo = $idGrupo");
				echo "OK";
			}
			else echo "Ops! Algo deu errado: " . mysqli_error($conexao);
		}

		if($acao == 'grupo_adicionar'){
			$nome = $_GET['nome_grupo'];
			$veiculos = $_GET['veiculos_grupo'];

			if(mysqli_query($conexao, "INSERT INTO grupo(nome, cliente) VALUES ('$nome', '$_SESSION[id]')")){
				$insertID = mysqli_insert_id($conexao);
				foreach($veiculos as $valor) {
					$query = mysqli_query($conexao, "SELECT imei, name FROM bem WHERE id = $valor AND cliente = '$_SESSION[id]'");
					if(mysqli_num_rows($query) > 0) {
						$data = mysqli_fetch_assoc($query);
						if (!mysqli_query($conexao, "INSERT INTO grupo_bem(bem, cliente, imei, descricao, grupo) VALUES($valor, '$_SESSION[id]', '".$data['imei']."', '".$data['name']."', $insertID)")){
							$error_gb = true;
						}
					}
					else $error_b = true;
				}

				if(isset($error_b)){
					echo "<section class='alert alert-danger'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Erro: </strong>Bem inexistente no cadastro do cliente.</section>";
				}
				elseif(isset($error_gb)){
					echo "<section class='alert alert-warning'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Falha no Banco de Dados: </strong>" . mysqli_error($conexao) . ".</section>";
				}
				else echo "<section class='alert alert-success'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Sucesso! </strong>O grupo foi cadastrado com êxito.</section>";
			}
			else die("<section class='alert alert-warning'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Falha no Banco de Dados: </strong>" . mysqli_error($conexao) . ".</section>");
		}

		if($acao == 'grupo_alterar') {
			$nome = $_GET['nome_grupo'];
			$veiculos = $_GET['veiculos_grupo'];

			$retorno = mysqli_query("UPDATE grupo SET nome = '$nome' WHERE id = $idGrupo");

			if($retorno){
				if(mysqli_query($conexao, "DELETE FROM grupo_bem WHERE grupo = $idGrupo")){
					foreach($veiculos as $valor){
						$query = mysqli_query($conexao, "SELECT imei, name FROM bem WHERE id = $valor AND cliente = '$_SESSION[id]'");
						if(mysqli_num_rows($query) > 0) {
							$data = mysqli_fetch_assoc($query);
							if(!mysqli_query($conexao, "INSERT INTO grupo_bem(bem, cliente, imei, descricao, grupo) VALUES($valor, '$_SESSION[id]', '".$data['imei']."', '".$data['name']."', $idGrupo)")) {
								$error_gb = true;
							}
						}
						else $error_b = true;
					}
				}
				else $error_del = true;

				if(isset($error_del)){
					echo "<section class='alert alert-warning'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Falha no Banco de Dados: </strong>" . mysqli_error($conexao) . ".</section>";
				}
				elseif(isset($error_b)){
					echo "<section class='alert alert-danger'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Erro: </strong>Bem inexistente no cadastro do cliente.</section>";
				}
				elseif(isset($error_gb)){
				 	echo "<section class='alert alert-warning'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Falha no Banco de Dados: </strong>" . mysqli_error($conexao) . ".</section>";
				}
				else echo "<section class='alert alert-success'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Sucesso! </strong>O grupo foi alterado com êxito.</section>";
			}
			else{
				echo "<section class='alert alert-danger'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Erro: </strong>" . mysqli_error($conexao) . ".</section>";
			}
		}
	}

	if(isset($_GET['id_inserido'])){
		$nome = $_GET['id_inserido'];
		$query = mysqli_query($conexao, "SELECT id FROM grupo WHERE nome = '$nome'");
		$dados = mysqli_fetch_assoc($query);
		echo $dados['id'];
	}
?>