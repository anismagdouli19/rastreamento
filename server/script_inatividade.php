#!/usr/bin/php -q
<?php
	$conexao = mysqli_connect("localhost", "root", "horus4321", "tracker");
	$getVeiculos = mysqli_query($conexao, "SELECT imei, date FROM bem WHERE DATE_SUB(NOW(), INTERVAL 3 DAY) >= date ORDER BY date ASC");
	
	while($dados = mysqli_fetch_assoc($getVeiculos)){
		mysqli_query($conexao, "INSERT INTO alertas (imei, mensagem, data) VALUES ('$dados[imei]', 'Rastreador Inativo', " . strtotime($dados['date']) . ")");
	}
?>