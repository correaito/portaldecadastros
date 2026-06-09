<?php

include("../config.php");

$ticket=$_POST['ticket'];
$status=$_POST['status'];
$coment=$_POST['comentarios'];

$sql="UPDATE contact SET status='$status', comentario='$coment' WHERE ticket='$ticket'"; // atualiza o BD com o status e texto digitado no campo de comentário
$executa= mysql_query($sql);

header('Location: ../listacontact/listagemadm.php?a=alterado'); // direciona para listagemadm.php com a mensagem de êxito na atualização.


?>
