#!/usr/bin/php -q
<?php
###################################
## Script de backup do banco de  ##
## Dados com envio para e-mail   ##
## Autor: Jorge Martins        ##
## Data da Criacao: 04/10/2017   ##
###################################
$server = "localhost";
$username = "root";
$password = "horus4321";
$db = "trackerjava"; //nome do banco de dados para backup
$dir = "/var/backups"; //Diretorio onde ser feito o backup
$nameBK = $db."-".date('Y-m-d-H-i-s'); //nome do arquivo
echo "\r\nCriando backup do Banco de dados!";
$command = "mysqldump -h $server -u$username -p$password $db > ".$dir."/".$nameBK.".sql";
shell_exec($command);
echo "\r\nCompactando arquivo\r\n";
 
 
//Conforme seu Sistema Operacional e programa de compactação de arquivos
$compact = 'tar -zcvf'.$dir.'/'.$nameBK.'.tar -C '.$dir.' '.$nameBK.'.sql --remove-files';
shell_exec($compact);
 
 
echo "\r\nBackup realizado com sucesso!";

?>