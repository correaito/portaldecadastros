<?php

session_start(); // Cria a sessão
include("config.php"); // Configuração do BD

date_default_timezone_set('America/Sao_Paulo'); // Estabelece a data/hora de Brasilia

$hoje = date('d-m-Y H:i:s'); // Estabelece o padrão de exibição de data/hora.
$nome = $_POST['nome'];
$motivo = $_POST['motivo'];
$mensagem = $_POST['mensagem'];

if (!isset($ac)){
	  // Grava os dados das variáveis na tabela contact
	  $sql_inclu = "INSERT INTO contact (data, solicitante, motivo, mensagem)
	   VALUES ('$hoje', '$nome', '$motivo', '$mensagem')";
	  $exe_inclu = mysql_query($sql_inclu) or die (mysql_error());

// Após a gravação dos dados na tabela, redireciona para a página contato.php com a mensagem de êxito 
header('Location: contato.php?a=envio');

$headers = "Content-Type:text/html; charset=UTF-8\n";
$headers .= "MIME-Version: 1.0\n";

}


?>

