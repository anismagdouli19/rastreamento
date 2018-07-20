<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'administracao';
	require_once 'acessoMaster.php';

	$idAlerta = isset($_GET['idAlerta']) ? $_GET['idAlerta'] : "";
	$sql = "SELECT a.id_alerta, a.mensagem, a.data, a.imei, b.name, u.nome FROM alertas a INNER JOIN bem b ON b.imei = a.imei INNER JOIN usuarios u ON b.cliente = u.id_usuario WHERE a.viewed_adm = 'N' ORDER BY data DESC LIMIT 0, 26";
	$result = mysqli_query($conexao, $sql);

	if($idAlerta != ""){
		if($idAlerta == "Tudo"){
			mysqli_query($conexao, "UPDATE alertas SET viewed_adm = 'S' WHERE viewed_adm = 'N'");
		}
		else{
			mysqli_query($conexao, "UPDATE alertas SET viewed_adm = 'S' WHERE id_alerta = '$idAlerta'");
		}
	}
	else{
		$loopcount = 0;
		$dados = array('lista' => '');

		while($data = mysqli_fetch_assoc($result)){
			switch($data['mensagem']){
				case 'SOS!':
				case 'Rastreador Desat.':
				case 'Rastreador Inativo':
					$alertaClass = 'danger';
					break;
				case 'Cerca Violada':
				case 'Bateria Fraca':
				case 'Alarme Disparado':
					$alertaClass = 'warning';
					break;
				default:
					$alertaClass = 'primary';
					break;
			}
			
			if(strlen($data['nome']) >= 25) {
				$dados['lista'] .= 
					"<li>
						<a href='javascript:fecharAlerta(\"" . $data['id_alerta'] . "\");' title='" . $data['nome'] . "'>
							<span class='label label-success'>" . substr($data['nome'], 0, 20) . "..." . "</span> <span class='label label-$alertaClass'>" . $data['name'] . "</span> " . $data['mensagem'] . " (" . date("d/m/Y \à\s H:i", $data['data']) . ")
						</a>
					</li>";
			}
			else{
				$dados['lista'] .= 
					"<li>
						<a href='javascript:fecharAlerta(\"" . $data['id_alerta'] . "\");' title='" . $data['nome'] . "'>
							<span class='label label-success'>" . $data['nome'] . "</span> <span class='label label-$alertaClass'>" . $data['name'] . "</span> " . $data['mensagem'] . " (" . date("d/m/Y \à\s H:i", $data['data']) . ")
						</a>
					</li>";
			}
			
			$loopcount++;
		}

		if($loopcount == 0){
			$dados['lista'] = "<li><a href='javascript:void(0)'><span class='label label-success'>OK</span> Nenhum alerta</a></li>";
			$dados['count'] = 0;
		} 
		else{
			$dados['lista'] .= "<hr /><li><a href='javascript:fecharAlerta(\"Tudo\");'>Marcar Todos Como Visto</a></li>";
			$dados['count'] = $loopcount;
		}
		echo json_encode($dados);
	}
?>