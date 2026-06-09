<?php
session_start();
include("../config.php");

$ticket = $_GET['ticket'];
$status = 'Atendendo';
$atendente = $_SESSION['login'];

$sql = "UPDATE cadmater SET Status='$status', atendente='$atendente' WHERE ticket='$ticket'";
$executa = mysql_query($sql);

header('Location: ../listamterc/alteraradm.php?ticket='.$ticket.'');
?>