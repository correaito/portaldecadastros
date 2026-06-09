<?php
session_start();
include("../config.php"); // conexão com o BD

date_default_timezone_set('America/Sao_Paulo'); // formato de data/hora sincronizado com horário de Brasilia

$hoje = date('d-m-Y H:i:s');  // formato de data/hora padrão
$nome = $_SESSION['login'];

$ticket=$_POST['ticket'];
$status=$_POST['status'];

$sql = "SELECT * FROM cadmatp WHERE Status = '$status' AND ticket='$ticket'";
$query = mysql_query($sql);
$num_rows = mysql_num_rows($query);

if($num_rows == 0) // se nenhuma referencia for encontrada, atualiza o status no BD, e grava o log com a alteração

{

$sql="UPDATE cadmatp SET Status='$status' WHERE ticket='$ticket'";
$executa= mysql_query($sql);

$sql_inclu = "INSERT INTO logmp (data, usuario, alteracao, ticket)
	   VALUES ('$hoje', '$nome', '$status', '$ticket')";
	     $exe_inclu = mysql_query($sql_inclu) or die (mysql_error());

header('Location: ../listamp/listagemadm.php?a=alterado');} // redireciona para listagemadm.php com mensagem de êxito após a atualização
 
else

{header('Location: ../listamp/listagemadm.php?a=alterado');} // ainda que o BD não tenha sido atualizado, o sistema irá gerar mensagem de êxito


?>
