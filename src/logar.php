<?php
include("config.php");

$login = $_POST['login'];
$senha = $_POST['senha'];


/* Procura na tabela user uma linha que contenha o login e a senha digitada */
$sql_logar = "SELECT * FROM user WHERE login = '$login' && senha = '$senha'";
$exe_logar = mysql_query($sql_logar) or die (mysql_error());
$fet_logar = mysql_fetch_assoc($exe_logar);
$num_logar = mysql_num_rows($exe_logar);

/* Verifica se o há alguma linha na tabela user com o usuário digitado e o nível 2 */
$sql_nivel = "SELECT * FROM user WHERE nivel = '2' AND login = '$login'";
$exe_nivel = mysql_query($sql_nivel) or die (mysql_error());
$fet_nivel = mysql_fetch_assoc($exe_nivel);
$num_nivel = mysql_num_rows($exe_nivel);



// Verifica se o usuário digitado consta na tabela user
if ($num_logar == 0){
   header("Location:login.php?a=erlog");  // Se não existir retorna mensagem de erro em login.php
}


elseif ($num_nivel == 1) {  // Verifica se o usuário é nível 2. Se encontra 1 resultado, direciona para usuarioadm.php
	  session_start();
   $_SESSION['nome'] = $fet_logar['nome'];
   $_SESSION['login'] = $login;
   $_SESSION['email'] = $fet_logar['email'];
   $_SESSION['senha'] = $senha;
   $_SESSION['nivel'] = $fet_logar['nivel'];

   
   header("Location:usuarioadm.php");
}



else{
   // Se o nível do usuário não for 2, cria sessão para ele em usuario.php
   session_start();
   $_SESSION['nome'] = $fet_logar['nome'];
   $_SESSION['login'] = $login;
   $_SESSION['email'] = $fet_logar['email'];
   $_SESSION['senha'] = $senha;
   $_SESSION['nivel'] = $fet_logar['nivel'];

   
   header("Location:usuario.php");



}
?>