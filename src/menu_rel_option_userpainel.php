<?php

session_start();

if ($_SESSION['nivel'] == '2') {

	header("Location: usuarioadm.php"); // Se o nível do usuário for 2, redireciona para usuarioadm.php
}

else {

	header("Location: usuario.php"); // Se o nível do usuário for 1, redireciona para usuario.php
}

?>