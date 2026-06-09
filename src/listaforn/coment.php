<?php

include("../config.php");

$ticket=$_GET['ticket'];
$coment=$_POST['comentario'];

$sql="UPDATE cadforn SET comentario='$coment' WHERE ticket='$ticket'"; // Atualiza a informação da caixa de comentário
$executa= mysql_query($sql);

header('Location: ../listaforn/alteraradm.php?ticket='.$ticket.''); // redireciona para a pagina alteraradm.php.

?>
