<?php

session_start(); // Cria a sessão

if ($_SESSION['nivel'] == '2') {

	header("Location:/listamp/listagemadm.php"); // Se o nível do usuário for 2, redireciona para /listamp/listagemadm.php
}

else {

	header("Location:/listamp/listagemusuario.php"); // Se o nível do usuário for 1, redireciona para /listamp/listagemusuario.php
}

?>