<?php
session_start();

include("../config.php");

$usuariolog = $_SESSION['login'];

$del = "DELETE FROM user WHERE login = '$usuariolog'"; /* Função que deleta a conta do usuário.  */
$delgo = mysql_query($del) or die('Erro ao deletar');

header('Location: login.php');  /* Após deletar a conta do usuário, redireciona para login.php.  */

?>
