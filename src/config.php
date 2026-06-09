<?php
$host = getenv('DB_HOST') ?: "mysql.hostinger.com.br"; //Servidor do mysql
$user = getenv('DB_USER') ?: "u643904105_root"; //Usuario do banco de dados
$senha = getenv('DB_PASSWORD') ?: "toor123"; //senha do banco de dados
$db = getenv('DB_NAME') ?: "u643904105_bdlog"; //banco de dados
$nome_site = "Portal de Cadastros - Martini Meat"; //Nome do site
$site = getenv('SITE_URL') ?: "http://www.cadastromm.url.ph"; // Dominio website

mysql_connect($host, $user, $senha) or die (mysql_error());
mysql_select_db($db) or die (mysql_error()); 
?>
