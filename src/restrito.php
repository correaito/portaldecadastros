<?php
/* Esta condição trava as páginas, permitindo o acesso somente as usuários logados. Utilizar include para aplicar as páginas que deseja travar acesso */
@session_start();
if (isset($_SESSION['login']) && isset($_SESSION['senha'])){  
   $login_usuario = $_SESSION['login']; 
}
else {
   header("Location:login.php");
   exit();
}
