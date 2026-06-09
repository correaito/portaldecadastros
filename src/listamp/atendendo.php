<?php
session_start();
include("../config.php");

$ticket = $_GET['ticket'];
$status = 'Atendendo';
$atendente = $_SESSION['login'];

$sql = "UPDATE cadmatp SET Status='$status', atendente='$atendente' WHERE ticket='$ticket'";
$executa = mysql_query($sql);

header('Location: ../listamp/alteraradm.php?ticket='.$ticket.'');
?>