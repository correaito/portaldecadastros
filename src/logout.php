<?php   
session_start(); // Traz a sessão
session_destroy(); // Destroi a sessão
header("location:/index.php"); // Após destruir a sessão, redireciona para index.php
exit();
?>