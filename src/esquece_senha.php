<?php
include("config.php");

if (isset($_POST['login'])){
   $login = $_POST['login'];
   // Verifica se existe o usuario
   $sql_busca = "SELECT * FROM user WHERE login = '$login'";
   $exe_busca = mysql_query($sql_busca) or die (mysql_error());
   $fet_busca = mysql_fetch_assoc($exe_busca);
   $num_busca = mysql_num_rows($exe_busca);
   //verifica se existe uma linha com o login digitado
   if ($num_busca > 0){   // Se encontrar o usuário, cria a mensagem e envia as credenciais para o e-mail do solicitante
      $email = $fet_busca['email'];
	  $senha = $fet_busca['senha'];
	  $topico = "Recuperação de senha";
	  $mensagem = "<html>"; 
	  $mensagem .= "<body>";
	  $mensagem .= "<br>Você efetuou um pedido de recuperação de senha no $nome_site.</br>";
	  $mensagem .=	"<br>Login: $login";
	  $mensagem .=	"<br>Senha: $senha</br>";
	  $mensagem .= "<br>Site oficial do $nome_site";
	  $mensagem .=	"<br><a href='$site'>$site</a></br>";
	  $mensagem .=	"</body>";
	  $mensagem .=	"</html>";
	  $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	  $headers .= "From: $nome_site <$email>\r\n";
	 	 
	  mail($email, $topico, $mensagem, $headers);
       header('Location:login.php?a=confenvpass');
   }
else {
	header('Location:login.php?a=erlog');  // Se não encontrar o usuário, retorna com a mensagem de erro em login.php
}
}

?>
