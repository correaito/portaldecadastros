<?php
session_start(); // Inicia a sessão
include("config.php");
date_default_timezone_set('America/Sao_Paulo'); // Estabelece a data/hora de Brasilia

$hoje = date('d-m-Y H:i:s'); // Estabelece o padrão de exibição de data/hora.
$nome = $_POST['nome'];
$organizacoes  = 'None';
if(isset($_POST['organizacao']) && is_array($_POST['organizacao']) && count($_POST['organizacao']) > 0){
    $organizacoes = implode(', ', $_POST['organizacao']);
}
$canal  = 'None';
if(isset($_POST['canais']) && is_array($_POST['canais']) && count($_POST['canais']) > 0){
    $canal = implode(', ', $_POST['canais']);
}
$grupocont = $_POST['grupoconta'];
$cnpj = $_POST['cnpj'];
$razao = $_POST['razao'];
$inscricao = $_POST['inscricao'];
$incrimun = $_POST['incrimun'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$emailc = $_POST['email1'];
$numero = $_POST['numero'];
$fantasia = $_POST['fantasia'];


$sql1 = "SELECT * FROM codsclient WHERE cnpj = '$cnpj'"; // Pesquisa na tabela codsclient se CNPJ está cadastrado
$query1 = mysql_query($sql1);  // Envia uma consulta para a tabela codsclient para o termo buscado em $sql1
$linha = mysql_fetch_assoc($query1); // Captura todos os dados que encontrou na linha pesquisada
$linha2 = $linha['id']; // Captura o dado da coluna id da tabela codsclient
$_SESSION['linha']=$linha2; // Cria uma sessão, e memoriza o código id da linha encontrada
$num_rows1 = mysql_num_rows($query1); // Conta o número de linhas encontradas


$sql = "SELECT * FROM cadclient WHERE cnpj = '$cnpj'"; // Pesquisa nas solicitações ao Portal se CNPJ já foi enviado antes
$query = mysql_query($sql); // Envia uma consulta para a tabela para o termo buscado em $sql
$num_rows = mysql_num_rows($query); // Conta o número de linhas encontradas


if (($canal == 'None') || ($organizacoes == 'None')) {  // Se não houver seleção de nenhum canal ou organização, retorna erro

header('Location: cclient.php?a=erro');
//salva
}

elseif ($num_rows1 > 0)    // Se encontrar algum resultado da tabela codsclient, retorna erro
{header('Location: cclient.php?a=erro2');}


elseif ($num_rows > 0)      // Se encontrar algum resultado da tabela cadclient, retorna erro
{header('Location: cclient.php?a=erro1');}


else {


if (!isset($ac)){
	  // Se todas as condições forem atendidas, grava todos os dados na tabela cadclient
	  $sql_inclu = "INSERT INTO cadclient (data, solicitante, organizacao, canal, grupoconta, cnpj, razao, inscricao, incrimun, endereco, bairro, cidade, estado, cep, telefone, emailc, numero, fantasia)
	  VALUES ('$hoje', '$nome', '$organizacoes', '$canal', '$grupocont', '$cnpj', '$razao','$inscricao', '$incrimun', '$endereco', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$emailc', '$numero', '$fantasia')";
	  $exe_inclu = mysql_query($sql_inclu) or die (mysql_error());
      $ticket_id = mysql_insert_id();
      $sql_log = "INSERT INTO logclient (data, usuario, alteracao, ticket) VALUES ('$hoje', '$nome', 'Aberto', '$ticket_id')";
      mysql_query($sql_log);


// Após a gravação dos dados na tabela, redireciona para a página cclient.php com a mensagem de êxito 
header('Location: cclient.php?a=envio');

$headers = "Content-Type:text/html; charset=UTF-8\n";
$headers .= "MIME-Version: 1.0\n";

}
}

?>


