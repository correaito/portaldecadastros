<?php

// Definimos para quem vai ser enviado o email
$para = "alan.garmatter@martinimeat.com.br, marcelo.ramos@martinimeat.com.br, rafael.zerek@martinimeat.com.br";
$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$cnpj = $_POST['cnpj'];
$banco = $_POST['banco'];
$chave = $_POST['chave'];
$conta = $_POST['conta'];
$controle = $_POST['controle'];
$pagamentos  = 'None';
if(isset($_POST['pagamento']) && is_array($_POST['pagamento']) && count($_POST['pagamento']) > 0){
    $pagamentos = implode(', ', $_POST['pagamento']);
}

include("config.php");  // Configuração do BD
include("restrito.php"); // Configuração de acesso restrito para usuários logados

$sql_busca = "SELECT * FROM user WHERE login = '$login_usuario'";
$exe_busca = mysql_query($sql_busca) or die (mysql_error());
$fet_busca = mysql_fetch_assoc($exe_busca);
$user = $fet_busca['nome'];

// Cria o corpo da mensagem que será enviada aos emails selecionados
$assunto = "$user solicitou a inclusão de dados bancários";
 
$mensagem = "
<tr font-size=11px>$user solicitou a inclusão de dados bancários de um $categoria:
<br>
<br>
<strong>CNPJ:</strong> $cnpj <br>
<strong>Banco:</strong> $banco <br>
<strong>Chave de banco:</strong> $chave <br>
<strong>Conta bancária:</strong> $conta <br>
<strong>Controle (CC):</strong> $controle <br>
<strong>Formas de pagamento:</strong> $pagamentos <br>
<br>
*********************************************************************************
<br>
Enviado via Portal de Cadastros Martini Meat<br>
</tr>
";

//3 - Agora inserimos as codificações corretas
$headers = "Content-Type:text/html; charset=UTF-8\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "From: Cadastro<cadastro.png@martinimeat.com.br>\n"; // Será exibido para quem receber a mensagem que o email partiu deste endereço seguido do nome

mail($para, $assunto, $mensagem, $headers); // Função que faz o envio do email

// Após o envio do e-mail, redireciona para dadosbancarios.php com a mensagem de formulário enviado com sucesso 
header('Location: dadosbancarios.php?a=envio');
exit();


?>


