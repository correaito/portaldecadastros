<?php
session_start(); // Cria a sessão
include("config.php"); // Configuração do BD

date_default_timezone_set('America/Sao_Paulo'); // Estabelece a data/hora de Brasilia

$hoje = date('d-m-Y H:i:s'); // Estabelece o padrão de exibição de data/hora.
$nome = $_POST['nome'];
$grupocont = $_POST['grupoconta'];
$centro  = 'None';
if(isset($_POST['centros']) && is_array($_POST['centros']) && count($_POST['centros']) > 0){
    $centro = implode(', ', $_POST['centros']); }
$cnpj = $_POST['cnpj'];
$razao = $_POST['razao'];
$cnh = $_POST['cnh'];
$inscricao = $_POST['inscricao'];
$incrimun = $_POST['incrimun'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$emailf = $_POST['email2'];
$numero = $_POST['numero'];
$fantasia = $_POST['fantasia'];

$sql = "SELECT * FROM cadforn WHERE cnpj = '$cnpj'"; // Pesquisa na tabela cadforn (base Portal) se CNPJ já foi enviado antes
$query = mysql_query($sql); // Envia uma consulta para a tabela cadforn para o termo buscado em $sql
$num_rows = mysql_num_rows($query); // Conta o número de linhas encontradas

$sql1 = "SELECT * FROM codsforn WHERE cnpj = '$cnpj'"; // Verifica na tabela codsforn (base SAP) se o material já está cadastrado
$query1 = mysql_query($sql1); // Envia uma consulta para a tabela codsforn para o termo buscado em $sql1
$linha = mysql_fetch_assoc($query1); // Captura todos os dados que encontrou na linha pesquisada
$linha2 = $linha['id']; // Captura o dado da coluna id da linha encontrada
$_SESSION['linha']=$linha2; // Cria uma sessão, e memoriza o código id da linha encontrada
$num_rows1 = mysql_num_rows($query1); // Conta o número de linhas encontradas

if ($centro == 'None')  // Se o solicitante não selecionou nenhum centro, retorna erro

header('Location: cfornecedor.php?a=erro');

elseif ($num_rows1 >= 1)  // Se encontrar algum resultado da tabela codsforn, retorna erro
{
header('Location: cfornecedor.php?a=erro2'); }


elseif ($num_rows > 0)  // Se encontrar algum resultado da tabela cadforn, retorna erro
{

header('Location: cfornecedor.php?a=erro1');
//salva
}
else {


if (!isset($ac)){
	  // Se todas as condições forem atendidas, grava todos os dados na tabela cadforn
	  $sql_inclu = "INSERT INTO cadforn (data, solicitante, grupocont, centro, cnpj, razao, inscricao, incrimun, endereco, bairro, cidade, estado, cep, telefone, emailf, numero, fantasia)
	  VALUES ('$hoje', '$nome', '$grupocont', '$centro', '$cnpj', '$razao','$inscricao', '$incrimun', '$endereco', '$bairro', '$cidade', '$estado', '$cep', '$telefone', '$emailf', '$numero', '$fantasia')";
	  $exe_inclu = mysql_query($sql_inclu) or die (mysql_error());
      $ticket_id = mysql_insert_id();
      $sql_log = "INSERT INTO logforn (data, usuario, alteracao, ticket) VALUES ('$hoje', '$nome', 'Aberto', '$ticket_id')";
      mysql_query($sql_log);


// Após a gravação dos dados na tabela, redireciona para a página cfornecedor.php com a mensagem de êxito 
header('Location: cfornecedor.php?a=envio');

$headers = "Content-Type:text/html; charset=UTF-8\n";
$headers .= "MIME-Version: 1.0\n";

}
}
?>




