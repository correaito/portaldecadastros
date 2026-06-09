<?php
include("config.php"); //Arquivo configuração do BD


if (isset($_POST['login'])){

   //Captura todos os dados informados em login.php
   session_start();
   $sessao = session_id();
   $nome = $_POST['nome'];
   $login = $_POST['login'];
   $senha = $_POST['senha'];
   $email = $_POST['email'];

   $sql_busca = "SELECT * FROM user WHERE nome = '$nome' AND email='$email'";
   $exe_busca = mysql_query($sql_busca) or die (mysql_error());
   $num_busca = mysql_num_rows($exe_busca);


// Verifica se já não existe uma credencial com mesmo nome de usuário e conta de e-mail na tabela user
if ($num_busca == 0) {

	  // Verifica se é o primeiro usuário do sistema para torná-lo administrador (nível 2)
	  $sql_count = "SELECT COUNT(*) as total FROM user";
	  $exe_count = mysql_query($sql_count);
	  $row_count = mysql_fetch_assoc($exe_count);
	  $nivel = ($row_count['total'] == 0) ? '2' : '1';

	  //Se não existir, grava os dados informados na tabela user
	  $sql_inclu = "INSERT INTO user(nome, login, senha, email, sessao, nivel, foto) VALUES
	                ('$nome', '$login', '$senha', '$email', '$sessao', '$nivel', '')";
	  $exe_inclu = mysql_query($sql_inclu) or die (mysql_error());
      
	  //Cria uma mensagem e envia para o usuário as credenciais por e-mail
	  $topico = "Suas credenciais no $nome_site";
	  $mensagem = "<html>";
	  $mensagem .= "<body>";
	  $mensagem .= "Olá $nome\r\n";
	  $mensagem .= "<br>Obrigado por se registrar no $nome_site.</br>";
      $mensagem .= "<br>";
      $mensagem .= "<br>Segue abaixo suas credenciais:";
	  $mensagem .=	"<br>Login: $login";
	  $mensagem .=	"<br>Senha: $senha";
	  $mensagem .=	"</body>";
	  $mensagem .=	"</html>";
	  $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=utf-8\r\n";
	  $headers .= "From: $nome_site <$email>\r\n";
	 
	  mail($email, $topico, $mensagem, $headers);

    header('Location: login.php?a=cad');
   }

else {
header('Location:login.php?a=erduplogin');

}
}
?>
