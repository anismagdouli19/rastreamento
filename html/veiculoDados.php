<?php
	require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';

	if(isset($_GET['filtro'])){
		$imei = $_GET['filtro'];

		if(strstr($imei, 'grupo_')){
			$grupo = explode('_', $imei);
			$dadosBem = mysqli_query($conexao, "SELECT b.name, b.status_sinal, b.bloqueado, b.tipo, b.identificacao, b.apelido, b.modelo_rastreador, b.marca, b.modelo, b.ligado, date_format(la.date , '%d/%m/%Y %h:%i:%s') as date, la.latitudeDecimalDegrees, la.longitudeDecimalDegrees, la.longitudeHemisphere, la.latitudeHemisphere, la.converte, la.speed FROM bem b LEFT JOIN loc_atual la ON la.imei = b.imei JOIN grupo_bem gb ON gb.bem = b.id JOIN grupo g ON g.id = gb.grupo WHERE g.id = $grupo[1]");
		}
		else{
			$dadosBem = mysqli_query($conexao, "SELECT b.name, b.status_sinal, b.bloqueado, b.tipo, b.identificacao, b.apelido, b.modelo_rastreador, b.marca, b.modelo, b.ligado, date_format(la.date , '%d/%m/%Y %h:%i:%s') as date, la.latitudeDecimalDegrees, la.longitudeDecimalDegrees, la.longitudeHemisphere, la.latitudeHemisphere, la.converte, la.speed FROM bem b LEFT JOIN loc_atual la ON la.imei = b.imei WHERE b.imei = $imei");
		}
		$strInfo = '[';

		while($row = mysqli_fetch_assoc($dadosBem)){
		    if($row['converte'] == 1){
				strlen($row['latitudeDecimalDegrees']) == 9 && $row['latitudeDecimalDegrees'] = '0' . $row['latitudeDecimalDegrees'];
				$g = substr($row['latitudeDecimalDegrees'], 0, 3);
				$d = substr($row['latitudeDecimalDegrees'], 3);
				$latitudeDecimalDegrees = $g + ($d / 60);
				$row['latitudeHemisphere'] == "S" && $latitudeDecimalDegrees = $latitudeDecimalDegrees * -1;
			
				strlen($row['longitudeDecimalDegrees']) == 9 && $row['longitudeDecimalDegrees'] = '0' . $row['longitudeDecimalDegrees'];
				$g = substr($row['longitudeDecimalDegrees'], 0, 3);
				$d = substr($row['longitudeDecimalDegrees'], 3);
				$longitudeDecimalDegrees = $g + ($d / 60);
				$row['longitudeHemisphere'] == "W" && $longitudeDecimalDegrees = $longitudeDecimalDegrees * -1;
			} 
			else{
				$latitudeDecimalDegrees = $row['latitudeDecimalDegrees'];
				$longitudeDecimalDegrees = $row['longitudeDecimalDegrees'];
			}

			$strInfo .= '{';
			$strInfo .= "'imei':'".$imei."',";
			$strInfo .= "'name':'".$row['name']."',";
			$strInfo .= "'sinal':'".$row['status_sinal']."',";
			$strInfo .= "'block':'".$row['bloqueado']."',";
			$strInfo .= "'tipo':'".$row['tipo']."',";
			$strInfo .= "'latitude':'".$latitudeDecimalDegrees."',";
			$strInfo .= "'longitude':'".$longitudeDecimalDegrees."',";
			$strInfo .= "'speed':'".$row['speed']."',";
			$strInfo .= "'identificacao':'".$row['identificacao']."',";
			$strInfo .= "'apelido':'".$row['apelido']."',";
			$strInfo .= "'modelo_rastreador':'".$row['modelo_rastreador']."',";
			$strInfo .= "'marca':'".$row['marca']."',";
			$strInfo .= "'modelo':'".$row['modelo']."',";
			$strInfo .= "'data':'".$row['date']."',";
			$strInfo .= "'velocidade':'".$row['speed']."',";
			$strInfo .= "'endereco':'',";
			$strInfo .= "'ligado':'".$row['ligado']."'";
			$strInfo .= '},';
		}
		
		$strInfo .= ']';
		$strInfo = str_replace(',]', ']', $strInfo);
		echo $strInfo;
	}

	if(isset($_GET['posicao'])){
		$posicao = $_GET['posicao'];

		if(strstr($posicao, 'grupo_')){
			$grupo = explode('_', $posicao);
			$novaPos = mysqli_query($conexao, "SELECT la.latitudeDecimalDegrees, la.longitudeDecimalDegrees, la.longitudeHemisphere, la.latitudeHemisphere, la.converte, b.status_sinal, b.bloqueado, b.tipo, b.ligado FROM loc_atual la LEFT JOIN bem b ON la.imei = b.imei JOIN grupo_bem gb ON gb.bem = b.id JOIN grupo g ON g.id = gb.grupo WHERE g.id = $grupo[1]");
		}
		else {
			$novaPos = mysqli_query($conexao, "SELECT la.latitudeDecimalDegrees, la.latitudeHemisphere, la.longitudeDecimalDegrees, la.longitudeHemisphere, la.converte, b.status_sinal, b.bloqueado, b.tipo, b.ligado FROM loc_atual la INNER JOIN bem b ON b.imei = la.imei WHERE la.imei = $posicao");
		}

		$strInfo = "[";
		while($row = mysqli_fetch_assoc($novaPos)){
	        if($row['converte'] == 1){
	    		strlen($row['latitudeDecimalDegrees']) == 9 && $row['latitudeDecimalDegrees'] = '0' . $row['latitudeDecimalDegrees'];
	    		$g = substr($row['latitudeDecimalDegrees'], 0, 3);
	    		$d = substr($row['latitudeDecimalDegrees'], 3);
	    		$latitudeDecimalDegrees = $g + ($d / 60);
	    		$row['latitudeHemisphere'] == "S" && $latitudeDecimalDegrees = $latitudeDecimalDegrees * -1;
	    	
	    		strlen($row['longitudeDecimalDegrees']) == 9 && $row['longitudeDecimalDegrees'] = '0' . $row['longitudeDecimalDegrees'];
	    		$g = substr($row['longitudeDecimalDegrees'], 0, 3);
	    		$d = substr($row['longitudeDecimalDegrees'], 3);
	    		$longitudeDecimalDegrees = $g + ($d / 60);
	    		$row['longitudeHemisphere'] == "W" && $longitudeDecimalDegrees = $longitudeDecimalDegrees * -1;
	    	} 
			else{
	    		$latitudeDecimalDegrees = $row['latitudeDecimalDegrees'];
	    		$longitudeDecimalDegrees = $row['longitudeDecimalDegrees'];
	    	}

			$address = utf8_encode($row['address']);
		$address = str_replace("'","`",$address);


		$strInfo .= "{";
		$strInfo .= "'imei':'".$row['imei']."',";
		$strInfo .= "'nome':'".$row['name']."',";
		$strInfo .= "'latitude':'".$latitudeDecimalDegrees."',";
		$strInfo .= "'longitude':'".$longitudeDecimalDegrees."',";
		$strInfo .= "'endereco':'".$address."',";
		$strInfo .= "'sinal':'".$row['status_sinal']."',";
		$strInfo .= "'block':'".$row['bloqueado']."',";
		$strInfo .= "'tipo':'".$row['tipo']."',";
		$strInfo .= "'ligado':'".$row['ligado']."',";
		$strInfo .= "'velocidade':'".$row['speed']."',";
		$strInfo .= "'hodometro':'".$row['hodometro']."',";
		$strInfo .= "'modelo':'".$row['modelo_rastreador']."',";
		$strInfo .= "'chip':'".$row['operadora']."'";
		$strInfo .= "},";
		
	}	
		$strInfo .= "]";
		$strInfo = str_replace(',]', ']', $strInfo);
		echo $strInfo;
	}
?>