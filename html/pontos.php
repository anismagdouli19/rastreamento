<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

include('seguranca.php');
header("Content-Type: text/html; charset=utf-8");

$q = $_GET["imei"];
$con = mysql_connect('localhost', 'root', 'horus4321');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("tracker", $con);



/*$sql = "SELECT distinct(imei),

(SELECT latitudeDecimalDegrees FROM bem, cliente WHERE  gprmc.imei = bem.imei AND bem.cliente = cliente.id ORDER BY gprmc.date DESC LIMIT 1) AS latitudeDecimalDegrees,

(SELECT longitudeDecimalDegrees FROM bem, cliente WHERE  gprmc.imei = bem.imei AND bem.cliente = cliente.id ORDER BY gprmc.date DESC LIMIT 1) AS longitudeDecimalDegrees,

(SELECT latitudeHemisphere FROM bem, cliente WHERE  gprmc.imei = bem.imei AND bem.cliente = cliente.id ORDER BY gprmc.date DESC LIMIT 1) AS latitudeHemisphere,

(SELECT longitudeHemisphere FROM bem, cliente WHERE  gprmc.imei = bem.imei AND bem.cliente = cliente.id ORDER BY gprmc.date DESC LIMIT 1) AS longitudeHemisphere,

(SELECT speed FROM bem, cliente WHERE  gprmc.imei = bem.imei AND bem.cliente = cliente.id ORDER BY gprmc.date DESC LIMIT 1) AS speed

FROM gprmc WHERE date > '".date("Y-m-d H:i:s",mktime(0,0,0,date("m")-30,date("d"),date("Y")))."' GROUP BY imei ORDER BY gprmc.date DESC";*/

$sql = "SELECT distinct(gprmc.imei) AS imei, identificacao, nome FROM gprmc, bem, cliente WHERE gprmc.date > '".date("Y-m-d H:i:s",mktime(0,0,0,date("m"),date("d")-30,date("Y")))."' AND bem.cliente = cliente.id AND gprmc.imei = bem.imei GROUP BY gprmc.imei";

$result = mysql_query($sql);

$i = 0;

print("[");
while ($r = mysql_fetch_array($result)) {
	
	$sql_posicao_atual = "SELECT * FROM gprmc WHERE imei = '".$r['imei']."' ORDER BY date DESC LIMIT 1";
	$result_posicao_atual = mysql_query($sql_posicao_atual);
	$data = mysql_fetch_array($result_posicao_atual);
	
	
	strlen($data['latitudeDecimalDegrees']) == 9 && $data['latitudeDecimalDegrees'] = '0'.$data['latitudeDecimalDegrees'];
	$g = substr($data['latitudeDecimalDegrees'],0,3);
	$d = substr($data['latitudeDecimalDegrees'],3);
	$latitudeDecimalDegrees = $g + ($d/60);
	$data['latitudeHemisphere'] == "S" && $latitudeDecimalDegrees = $latitudeDecimalDegrees * -1;
	
	
	strlen($data['longitudeDecimalDegrees']) == 9 && $data['longitudeDecimalDegrees'] = '0'.$data['longitudeDecimalDegrees'];
	$g = substr($data['longitudeDecimalDegrees'],0,3);
	$d = substr($data['longitudeDecimalDegrees'],3);
	$longitudeDecimalDegrees = $g + ($d/60);
	$data['longitudeHemisphere'] == "S" && $longitudeDecimalDegrees = $longitudeDecimalDegrees * -1;
	
	$longitudeDecimalDegrees = $longitudeDecimalDegrees * -1;

	
	if($i>0){
		print(",");
	}
	if($data['date']>date("Y-m-d H:i:s",mktime(date('H'),date('i')-5,date('s'),date('m'),date('d'),date('Y')))){
		$atividade = 1;
	} else {
		$atividade = 0;
	}
	$id = $i + 1;
	print("{");
	print('"Id":"'. $id .'",');
	print('"Imei":"'.$r['imei'].'",');
	print('"Nome":"'.$r['nome'].'",');
	print('"Bem":"'.$r['identificacao'].'",');
	print('"Speed":"'.$data['speed'].'",');
	print('"Data":"'.$data['date'].'",');
	print('"Atividade":"'.$atividade.'",');
	print('"Latitude":"'.$latitudeDecimalDegrees.'",');
	print('"Longitude":"'.$longitudeDecimalDegrees.'"');

	print("}");
	$i++;
}

print("]");