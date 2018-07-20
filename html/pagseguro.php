<?php
if (isset($_GET["service"])){
	$w_service = $_GET["service"];
}

//pagamento de cadastro
if($w_service=='cobranca'){
	$w_id_cobranca = $_GET["id_cobranca"];
	$w_referencia  = $_GET["referencia"];
	
	// dados do cliente
	$conecta = @mysql_connect("localhost", "root", "otavio3009") or print (mysql_error()); 
	mysql_select_db("tracker", $conecta) or print(mysql_error()); 

	//a. Dados do pagseguro
	$sql = "select email_pagseguro, token_pagseguro
			  from preferencias";			   
	$result = mysql_query($sql, $conecta); 
	
	while($consulta = mysql_fetch_array($result)) { 
		$w_email_pagseguro = $consulta["email_pagseguro"];
		$w_token_pagseguro = $consulta["token_pagseguro"];
	} 

	//b. dados da cobrança
	$sql = "select hc.id, hc.id_usuario, hc.dt_vencimento, hc.vl_cobranca, hc.referencia,
				   u.nome, u.email
			  from historico_cobrancas hc,
				   usuarios u
			 where hc.id = ".$w_id_cobranca."
			   and hc.referencia = ".$w_referencia."
			   and hc.id_usuario = u.id_usuario";
			   
	$result = mysql_query($sql, $conecta); 
	
	while($consulta = mysql_fetch_array($result)) { 
		$w_usuario = $consulta["id_usuario"];
		$w_nome    = $consulta["nome"];
		$w_email   = $consulta["email"];
		$w_plano   = $consulta["referencia"];
		$w_valor   = $consulta["vl_cobranca"];		
	} 
	
	mysql_free_result($result); 
	mysql_close($conecta); 
	
	$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';
	$data['email']            = $w_email_pagseguro;//'otagomes@hotmail.com';
	$data['token']            = $w_token_pagseguro;// '5ADC1B7A433C4D0DB989869077A6C368';
	$data['currency']         = 'BRL';
	$data['itemId1']          = $w_id_cobranca;
	$data['itemDescription1'] = 'REF. '.$w_referencia.' '.$w_nome;
	$data['itemAmount1']      = $w_valor;
	$data['itemQuantity1']    = '1';
	$data['itemWeight1']      = '0';
	$data['reference']        = $w_id_cobranca;
	$data['senderName']       = $w_nome;
	$data['senderAreaCode']   = '11';
	$data['senderPhone']      = '56273440';
	$data['senderEmail']      = $w_email;
	$data['shippingType']     = '3';
	$data['redirectURL']      = 'http://www.google.com';

	$data = http_build_query($data);
	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	$xml= curl_exec($curl);

	if($xml == 'Unauthorized'){
		echo "Infelizmente ocorreu um erro. Por favor entre em contato com nosso suporte através do site e informe o seguinte erro: SEM AUTORIZAÇÃO.";
		exit;//Mantenha essa linha
	}
	$xml = simplexml_load_string($xml);
	
	if(count($xml -> error) > 0){
		echo "Infelizmente ocorreu um erro. Por favor entre em contato com nosso suporte através do site e informe o seguinte erro: ". $xml->error;	
		exit;
	}
	
	//echo $xml -> code;
	header('Location: https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);

}

//enviar email de cobrança
if($w_service=='email'){

	$id = $_GET["id_cliente"];
	$referencia = $_GET["referencia"];
	
	$conecta = @mysql_connect("localhost", "root", "otavio3009") or print (mysql_error()); 
	mysql_select_db("tracker", $conecta) or print(mysql_error()); 

	$sql = "select id 
			  from historico_cobrancas 
			 where id_usuario = ".$id."
			   and referencia = ".$referencia."
	";			   
	$result = mysql_query($sql, $conecta); 
	
	while($consulta = mysql_fetch_array($result)) { 
		$id = $consulta["id"];
	} 
	
	mysql_free_result($result); 
	mysql_close($conecta); 
	
	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "suportegrupocns@gmail.com";
	$mail->Password = "otavio123";
	$mail->setFrom('suportegrupocns@gmail.com');
	$mail->addAddress('otagomes@hotmail.com', 'Otavio');
	$mail->Subject = 'GRUPOCNS - Fatura Gerada';
	$mail->msgHTML('Ol&aacute;, esta &eacute; a sua fatura mensal do GRUPO CNS. </br> Clique <a href="http://188.166.177.140/pagseguro.php?service=cobranca&id_cobranca='.$id.'&referencia='.$referencia.'">aqui</a> para realizar o seu pagamento. ');
	$mail->AltBody = 'Se você não conseguir visualizar essa mensagem, copie o seguinte texto e cole no seu navegador preferido: http://188.166.177.140/pagseguro.php?service=cobranca&id_cobranca='.$id.'&referencia='.$referencia.'';
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}

}

if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){

	//a. Dados do pagseguro
	$sql = "select email_pagseguro, token_pagseguro
			  from preferencias";			   
	$result = mysql_query($sql, $conecta); 
	
	while($consulta = mysql_fetch_array($result)) { 
		$w_email_pagseguro = $consulta["email_pagseguro"];
		$w_token_pagseguro = $consulta["token_pagseguro"];
	} 
	
    //$email = 'otagomes@hotmail.com';
    //$token = '5ADC1B7A433C4D0DB989869077A6C368';
	
	$_POST['notificationCode'];
	
    $url = 'https://ws.pagseguro.uol.com.br/v2/transactions/notifications/' . $_POST['notificationCode'] . '?email=' . $w_email_pagseguro . '&token=' . $w_token_pagseguro;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction= curl_exec($curl);
    curl_close($curl);

    if($transaction == 'Unauthorized'){
        exit;
    }
    $transaction = simplexml_load_string($transaction);
	
	if ($transaction->status == 3){
		echo $id_cobranca = $transaction->reference;

		$conecta = @mysql_connect("localhost", "root", "otavio3009") or print (mysql_error()); 
		mysql_select_db("tracker", $conecta) or print(mysql_error()); 	
		
		$tipopagamento = substr($id_cobranca,0,4);
		
		echo $tipopagamento;
		
		if ($tipopagamento=='9999'){
			// pagamento de cobrança por desativação - baixar todas as cobranças em aberto
			echo $id_usuario = substr($id_cobranca,4);
			
			$sql = "update historico_cobrancas 
			           set dt_pagamento = now(), status = 'PAGO' 
					 where id_usuario = ".$id_usuario." 
					   and status = 'INADIMPLENTE' ";
			mysql_query($sql, $conecta); 
			
			// b. desbloquear cliente
			$sql = "update usuarios set ativo = 'S' where id_usuario = ".$id_usuario." ";
			mysql_query($sql, $conecta); 		

		}
		else {
			// pagamento de mensalidade normal
			
			// a. dar baixa na cobrança
			$sql = "update historico_cobrancas set dt_pagamento = now(), status = 'PAGO' where id = ".$id_cobranca." ";				   
			mysql_query($sql, $conecta); 
			
			// b. desbloquear cliente
			$sql = "select id_usuario
					  from historico_cobrancas 
					 where id  = ".$id_cobranca."
			";			   
			$result = mysql_query($sql, $conecta); 
			
			while($consulta = mysql_fetch_array($result)) { 
				$id_usuario = $consulta["id_usuario"];
			} 
			mysql_free_result($result); 
			
			$sql = "update usuarios set ativo = 'S' where id_usuario = ".$id_usuario." ";
			mysql_query($sql, $conecta); 		

		}

		
		
		mysql_close($conecta); 
	}
}

if($w_service=='desativado'){
	//a. Dados do pagseguro
	$sql = "select email_pagseguro, token_pagseguro
			  from preferencias";			   
	$result = mysql_query($sql, $conecta); 
	
	while($consulta = mysql_fetch_array($result)) { 
		$w_email_pagseguro = $consulta["email_pagseguro"];
		$w_token_pagseguro = $consulta["token_pagseguro"];
	} 
	
	//b. dados do cliente
	$conecta = @mysql_connect("localhost", "root", "otavio3009") or print (mysql_error()); 
	mysql_select_db("tracker", $conecta) or print(mysql_error()); 

	$sql = "select hc.id, hc.id_usuario, hc.dt_vencimento, sum(hc.vl_cobranca) as vl_cobranca,
				   u.nome, u.email
			  from historico_cobrancas hc,
				   usuarios u
			 where hc.id_usuario = ".$_GET["id"]."
			   and hc.id_usuario = u.id_usuario
			   and hc.status     = 'INADIMPLENTE'
    ";
			   
	$result = mysql_query($sql, $conecta); 
	
	while($consulta = mysql_fetch_array($result)) { 
		$w_usuario = $consulta["id_usuario"];
		$w_nome    = $consulta["nome"];
		$w_email   = $consulta["email"];
		$w_plano   = $consulta["referencia"];
		$w_valor   = $consulta["vl_cobranca"];		
	} 
	
	mysql_free_result($result); 
	mysql_close($conecta); 

	$w_id_cobranca = '9999'.$w_usuario;

	$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';
	$data['email']            = $w_email_pagseguro; //'otagomes@hotmail.com';
	$data['token']            = $w_token_pagseguro;//'5ADC1B7A433C4D0DB989869077A6C368';
	$data['currency']         = 'BRL';
	$data['itemId1']          = $w_id_cobranca;
	$data['itemDescription1'] = 'USUARIO DESATIVADO '.$w_usuario." ".$w_nome;
	$data['itemAmount1']      = $w_valor;
	$data['itemQuantity1']    = '1';
	$data['itemWeight1']      = '0';
	$data['reference']        = $w_id_cobranca;
	$data['senderName']       = $w_nome;
	$data['senderAreaCode']   = '11';
	$data['senderPhone']      = '56273440';
	$data['senderEmail']      = $w_email;
	$data['shippingType']     = '3';
	$data['redirectURL']      = 'http://www.grupocns.com.br';

	$data = http_build_query($data);
	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	$xml= curl_exec($curl);

	if($xml == 'Unauthorized'){
		echo "Infelizmente ocorreu um erro. Por favor entre em contato com nosso suporte através do site e informe o seguinte erro: SEM AUTORIZAÇÃO.";
		exit;//Mantenha essa linha
	}
	$xml = simplexml_load_string($xml);
	
	if(count($xml -> error) > 0){
		echo "Infelizmente ocorreu um erro. Por favor entre em contato com nosso suporte através do site e informe o seguinte erro: ". $xml->error;	
		exit;
	}
	
	//echo $xml -> code;
	header('Location: https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);

}

?>