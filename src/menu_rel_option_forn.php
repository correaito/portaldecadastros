<?php

session_start();

if ($_SESSION['nivel'] == '2') {

	header("Location:/listaforn/listagemadm.php"); // Se o nível do usuário for 2, redireciona para /listaforn/listagemadm.php
}

else {

	header("Location:/listaforn/listagemusuario.php"); // Se o nível do usuário for 1, redireciona para /listaforn/listagemusuario.php
}

?>