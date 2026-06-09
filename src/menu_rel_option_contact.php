<?php

session_start();

if ($_SESSION['nivel'] == '2') {

	header("Location:/listacontact/listagemadm.php"); // Se o nível do usuário for 2, redireciona para /listacontact/listagemadm.php
}

else {

	header("Location:/listacontact/listagemusuario.php"); // Se o nível do usuário for 1, redireciona para /listacontact/listagemusuario.php
}

?>