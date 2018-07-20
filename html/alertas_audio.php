<?php
  require_once 'acesso.php';
	require_once 'config.php';
	
	$tipoPagina = 'cliente';
	require_once 'acessoMaster.php';

  if (!$logado) {
  	header("Location: index.php");
  	exit();
  }
  
   

$query = mysqli_query("SELECT * FROM alertas WHERE (viewed_adm = 'N') AND (alertas ='SOS!')");
$dados = mysqli_fetch_assoc($query);


if ($dados['viewed_adm'] == 'N') && ($dados['alertas'] == 'SOS!')  echo "<audio src='alerta.mp3' hidden='true' autoplay loop></audio>";
?>


