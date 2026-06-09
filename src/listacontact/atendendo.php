<?php

include("../config.php"); // conexão com o BD

$ticket=$_GET['ticket']; // recupera o número do ticket
$status='Atendendo';

$sql="UPDATE contact SET status='$status' WHERE ticket='$ticket'"; // atualiza o ticket para "Atendendo" para a instrução do próximo atendente
$executa= mysql_query($sql);

header('Location: ../listacontact/alteraradm.php?ticket='.$ticket.''); // redireciona para a pagina alteraradm.php.


?>
