<?php

session_start();

if ($_SESSION['nivel'] == '2') {

	header("Location:/listaclient/listagemadm.php"); // Se o nível do usuário for 2, redireciona para /listaclient/listagemadm.php
}

else {

	header("Location:/listaclient/listagemusuario.php"); // Se o nível do usuário for 1, redireciona para /listaclient/listagemusuario.php
}

?>