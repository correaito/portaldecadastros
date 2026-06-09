<?php

session_start();

if ($_SESSION['nivel'] == '2') {

	header("Location:/listaservpres/listagemadm.php"); // Se o nível do usuário for 2, redireciona para /listaservpres/listagemadm.php
}

else {

	header("Location:/listaservpres/listagemusuario.php"); // Se o nível do usuário for 1, redireciona para /listaservpres/listagemusuario.php
}

?>