<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';
	
	$idAlerta = isset($_GET['idAlerta']) ? $_GET['idAlerta'] : "";

	if(isset($_SESSION['id'])){
		$sql = "SELECT b.name, a.id_alerta, a.imei, a.mensagem, a.data FROM bem b INNER JOIN alertas a ON b.imei = a.imei WHERE b.cliente = '$_SESSION[id]' ORDER BY a.data DESC";
		$result = mysqli_query($conexao, $sql);
	}

	if($idAlerta != ""){
		if($idAlerta != "Tudo"){
			mysqli_query($conexao, "DELETE FROM alertas WHERE id_alerta = '$idAlerta'");
		}
		else{
			while($bensCliente = mysqli_fetch_array($result))
				mysqli_query($conexao, "DELETE FROM alertas WHERE imei = '$bensCliente[imei]'");
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
			$dados['lista'] .= 
				"<li>
					<a href='javascript:fecharAlerta(\"" . $data['id_alerta'] . "\");' title='Clique para marcar como visualizada'>
						<span class='label label-$alertaClass'>" . $data['name'] . "</span> " . $data['mensagem'] . " (" . date("d/m/Y \à\s H:i", $data['data']) . ")
					</a>
				</li>";
			
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

	 $count = mysqli_query("SELECT count(*) FROM alertas WHERE viewed_adm = 'N'", $cnx) or die(mysql_error());
?>
	 <?php
$query = mysqli_query("SELECT * FROM alertas WHERE viewed_adm = 'N'");
$dados = mysqli_fetch_assoc($query);
?>
<?php
if ($dados['viewed_adm'] == 'N') echo "<audio src='alerta.mp3' hidden='true' autoplay loop></audio>";
?>
<?php
if ($fechar != "" and $imei != ""){
	if ($fechar != "tudo") {
		if (!mysqli_query("UPDATE alertas set viewed_adm = 'S', date = date WHERE imei = '$imei' and alertas = '$fechar' and viewed_adm = 'N'", $con)){
			die('Error: ' . mysqli_error());
		}	
	}
	else {
		while ($bensCliente = mysqli_fetch_array($result)) {
			if (!mysqli_query("UPDATE alertas set viewed_adm = 'S', date = date WHERE imei = '$bensCliente[imei]' and viewed_adm = 'N'", $con)){
				die('Error: ' . mysqli_error());
			}
		}
	}
}
?>
