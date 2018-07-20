<?php
	require_once 'acesso.php';
	require_once 'config.php';

	$dataInicio = $_POST["txtDataInicio"];
	$dataFinal = $_POST["txtDataFinal"];
	$imei = $_POST["nrImeiConsulta"];
	$nome = $_POST["nomeVeiculo"];
	$hrDataInicio = $_POST["hrDataInicio"];
	$hrDataFinal = $_POST["hrDataFinal"];
	$mnDataInicio = $_POST["mnDataInicio"];
	$mnDataFinal = $_POST["mnDataFinal"];

	function formataHora($hrEntrada, $mnEntrada){
		$hrSaida;
		$mnSaida;
		
		switch($hrEntrada){
			case "0": $hrSaida = "00"; break;
			case "1": $hrSaida = "01"; break;
			case "2": $hrSaida = "02"; break;
			case "3": $hrSaida = "03"; break;
			case "4": $hrSaida = "04"; break;
			case "5": $hrSaida = "05"; break;
			case "6": $hrSaida = "06"; break;
			case "7": $hrSaida = "07"; break;
			case "8": $hrSaida = "08"; break;
			case "9": $hrSaida = "09"; break;
			case "10": $hrSaida = "10"; break;
			case "11": $hrSaida = "11"; break;
			case "12": $hrSaida = "12"; break;
			case "13": $hrSaida = "13"; break;
			case "14": $hrSaida = "14"; break;
			case "15": $hrSaida = "15"; break;
			case "16": $hrSaida = "16"; break;
			case "17": $hrSaida = "17"; break;
			case "18": $hrSaida = "18"; break;
			case "19": $hrSaida = "19"; break;
			case "20": $hrSaida = "20"; break;
			case "21": $hrSaida = "21"; break;
			case "22": $hrSaida = "22"; break;
			case "23": $hrSaida = "23"; break;
		}

		switch($mnEntrada){
			case "00": $mnSaida = ":00:00"; break;
			case "10": $mnSaida = ":10:00"; break;
			case "15": $mnSaida = ":15:00"; break;
			case "20": $mnSaida = ":20:00"; break;
			case "25": $mnSaida = ":25:00"; break;
			case "30": $mnSaida = ":30:00"; break;
			case "35": $mnSaida = ":35:00"; break;
			case "40": $mnSaida = ":40:00"; break;
			case "45": $mnSaida = ":45:00"; break;
			case "50": $mnSaida = ":50:00"; break;
			case "55": $mnSaida = ":55:00"; break;
			case "59": $mnSaida = ":59:59"; break;
		}   
		return $hrSaida . $mnSaida;
	}
	
	$query = "SELECT date_format(date,'%d/%m/%Y %H:%i:%s') AS data, latitudeDecimalDegrees, latitudeHemisphere, longitudeDecimalDegrees, longitudeHemisphere, speed, converte, ligado
			  FROM gprmc WHERE imei = '$imei' AND date BETWEEN '$dataInicio " . formataHora($hrDataInicio, $mnDataInicio) . "' AND '$dataFinal " . formataHora($hrDataFinal, $mnDataFinal) . "'
		      ORDER BY date ASC";
			  
	$result = mysqli_query($conexao, $query);
	
	$dataInicio = date_create($dataInicio);
	$dataInicioFormatada = date_format($dataInicio, "d/m/Y");
	
	$dataFinal = date_create($dataFinal);
	$dataFinalFormatada = date_format($dataFinal, "d/m/Y");
?>

<section class="row" id="tracar" style="margin: 0 0 15px 0;">
	<button style="float: right;" type="button" class="btn btn-success" onclick="tracarHistorico();"><i class="fa fa-map-marker"></i> Traçar Rota</button>
	<button style="float: right; margin-right: 5px;" type="button" class="btn btn-default" onclick="imprimirHistorico();"><i class="fa fa-print"></i> Imprimir</button>
</section>
<section id="areaImpressa">
	<section class="row">
		<section class="col-lg-4"><strong>Veículo: </strong><?php echo $nome; ?></section>
		<section class="col-lg-4"><center><strong>Início: </strong><?php echo $dataInicioFormatada . ' - ' . $hrDataInicio . ":" . $mnDataInicio; ?></center></section>
		<section class="col-lg-4"><span style='float: right;'><strong>Fim: </strong><?php echo $dataFinalFormatada . ' - ' . $hrDataFinal . ":" . $mnDataFinal; ?></span></section>
	</section>
	
	<section id="KmRodado" style="font-size: 20px;">
		<hr>
		<center><span id='km-rodado'></span></center>
		<hr>
	</section>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Data</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Endereço</th>
				<th>Velocidade</th>
				<th>Ligado</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$latAnt = '';
				$lonAnt = '';
				$ligadoAnt = "";

				if(mysqli_num_rows($result) !== 0){
					while($data = mysqli_fetch_assoc($result)){ 
						if($data['converte'] == 1){
							strlen($data['latitudeDecimalDegrees']) == 9 && $data['latitudeDecimalDegrees'] = '0'.$data['latitudeDecimalDegrees'];
							$g = substr($data['latitudeDecimalDegrees'], 0, 3);
							$d = substr($data['latitudeDecimalDegrees'], 3);
							$latitudeDecimalDegrees = $g + ($d / 60);
							$data['latitudeHemisphere'] == "S" && $latitudeDecimalDegrees = $latitudeDecimalDegrees * - 1;
						
							strlen($data['longitudeDecimalDegrees']) == 9 && $data['longitudeDecimalDegrees'] = '0'.$data['longitudeDecimalDegrees'];
							$g = substr($data['longitudeDecimalDegrees'], 0, 3);
							$d = substr($data['longitudeDecimalDegrees'], 3);
							$longitudeDecimalDegrees = $g + ($d / 60);
							$data['longitudeHemisphere'] == "W" && $longitudeDecimalDegrees = $longitudeDecimalDegrees * - 1;
						} 
						else{
							$latitudeDecimalDegrees = $data['latitudeDecimalDegrees'];
							$longitudeDecimalDegrees = $data['longitudeDecimalDegrees'];
						}

						if($latitudeDecimalDegrees > 0) $latitudeDecimalDegrees = $latitudeDecimalDegrees * - 1;
						if($longitudeDecimalDegrees > 0) $longitudeDecimalDegrees = $longitudeDecimalDegrees * - 1;

						$escreveSN = $data['ligado'] == 'S' || $data['speed'] > 0 ? 'Sim' : 'Não';					
						echo 
							"<tr>
								<td>" . $data['data'] . "</td>
								<td>" . $latitudeDecimalDegrees . "</td>
								<td>" . $longitudeDecimalDegrees . "</td>
								<td>" . $address . "</td>
								<td>" . number_format($data['speed'] * 1.60934, 0, ",", ".") . " Km/h</td>
								<td>" . $escreveSN . "</td>
							</tr>";
					}
				}
				else{
					echo "<tr><td colspan='6' class='text-center'>Nenhum resultado encontrado</td></tr>";
				}
			?>
		</tbody>
	</table>
</section>