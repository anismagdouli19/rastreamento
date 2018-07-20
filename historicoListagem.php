<?php 
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';

	$imei = $_GET["imei"];

	$res = mysqli_query($conexao, "SELECT modo_operacao FROM bem WHERE imei = '$imei' AND modo_operacao = 'SMS' AND cliente = '$_SESSION[id]'");
	if(mysqli_num_rows($res) != 0){
		echo 
			"<tr>
				<td><b>Atenção:</b>Este GPS está operando em modo <i>SMS</i>. Para o rastreamento, ative o modo GPRS. Para os últimos registros, ver em histórico.</td>
			</tr>";
	}
	else{
		$loopcount = 0;
		$latAnt = '';
		$longAnt = '';
		$endAnt = '';

		$result = mysqli_query($conexao, "SELECT id, date, latitudeDecimalDegrees, longitudeDecimalDegrees, latitudeHemisphere, longitudeHemisphere, speed, address, converte FROM gprmc WHERE gpsSignalIndicator in ('F', 'L', 'A') AND imei = '$imei' ORDER BY id DESC LIMIT 10");

		while($data = mysqli_fetch_assoc($result)){
			$idRota = $data['id'];
			$trackerdate = preg_replace("^(..)(..)(..)(..)(..)$^","\\3/\\2/\\1 \\4:\\5", $data['date']);
			$latitudeDecimalDegrees = 0;
			$longitudeDecimalDegrees = 0;
			
			if($data['converte'] == 1) {
				strlen($data['latitudeDecimalDegrees']) == 9 && $data['latitudeDecimalDegrees'] = '0'.$data['latitudeDecimalDegrees'];
				$g = substr($data['latitudeDecimalDegrees'], 0, 3);
				$d = substr($data['latitudeDecimalDegrees'], 3);
				$latitudeDecimalDegrees = $g + ($d / 60);
				$data['latitudeHemisphere'] == "S" && $latitudeDecimalDegrees = $latitudeDecimalDegrees * -1;
		
				strlen($data['longitudeDecimalDegrees']) == 9 && $data['longitudeDecimalDegrees'] = '0'.$data['longitudeDecimalDegrees'];
				$g = substr($data['longitudeDecimalDegrees'], 0, 3);
				$d = substr($data['longitudeDecimalDegrees'], 3);
				$longitudeDecimalDegrees = $g + ($d / 60);
				$data['longitudeHemisphere'] == "W" && $longitudeDecimalDegrees = $longitudeDecimalDegrees * -1;
			} 
			else{
				$latitudeDecimalDegrees = $data['latitudeDecimalDegrees'];
				$longitudeDecimalDegrees = $data['longitudeDecimalDegrees'];
			}
			
			$speed = $data['speed'] * 1.60934;

			$address = utf8_encode($data['address']);
			if($latitudeDecimalDegrees != $latAnt && $longitudeDecimalDegrees != $longAnt) {
				if($address == null or $address == ""){
					$json = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=".$latitudeDecimalDegrees.",".$longitudeDecimalDegrees));
					if(isset($json->status) && $json->status == 'OK'){
						$address = $json->results[0]->formatted_address;

						$atualiza = mysqli_query($conexao, "UPDATE gprmc SET address = '" . utf8_decode(mysqli_real_escape_string($conexao, $address))  . "' WHERE id = $idRota");
					}
				}
			}
			else $address = $endAnt;

			echo "<tr id='rota$idRota'>";
			echo "<td>" . date('d/m/Y', strtotime($data['date'])) . "</td>";
			echo "<td>" . date('H:i:s', strtotime($data['date'])) . "</td>";
			echo "<td>" . $latitudeDecimalDegrees . "</td>";
			echo "<td>" . $longitudeDecimalDegrees . "</td>";
			echo "<td>" . $address ."</td>";
			echo "<td>" . (int)$speed. " Km/h" . " </td>";
			echo "<td>" . $escreveSN . "</td>";
			echo "<td><button type='button' title='Clique para ver no mapa' class='btn btn-default' onclick=\"verNoMapa(" . $latitudeDecimalDegrees . "," . $longitudeDecimalDegrees . ");\"><i class='fa fa-eye'></i></button></td>";
			echo "</tr>";

			$endAnt = $address;	  
			$loopcount++;
		}
		
		if($loopcount == 0) {
			if($imei == "ALL") {
				echo "<tr>";
				echo "<td>Visualizando toda a frota. Cada cor indica as últimas 20 posições.</td>";
				echo "</tr>";
			} 
			else{
				echo "<tr>";
				echo "<td colspan='7'><i>Não há registro de histórico para este veículo.</i></td>";
				echo "</tr>";
			}
		}
	}
?>