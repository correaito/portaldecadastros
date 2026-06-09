<?php

session_start();

if ($_SESSION['nivel'] == '2') {

	header("Location:/listamterc/listagemadm.php"); // Se o nível do usuário for 2, redireciona para /listamterc/listagemadm.php
}

else {

	header("Location:/listamterc/listagemusuario.php"); // Se o nível do usuário for 1, redireciona para /listamterc/listagemusuario.php
}

?>