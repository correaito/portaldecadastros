<?php
session_start(); // Cria a sessão
include("config.php"); // Configuração do BD

date_default_timezone_set('America/Sao_Paulo'); // Estabelece a data/hora de Brasilia

$hoje = date('d-m-Y H:i:s'); // Estabelece o padrão de exibição de data/hora.
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$ncm = $_POST['ncm'];
$peso = $_POST['peso'];
$grupomerc = $_POST['grupomerc'];
$unidcomerc = $_POST['unidcomerc'];
$uniddev = $_POST['uniddev'];
$codfab = $_POST['codfab'];
$fab = $_POST['fab'];
$conversoes = $_POST['conversao'];
$classlote = $_POST['classlote'];
$a=ltrim($codfab, "0"); // Deixa o nº inteiro, sem zero a esquerda
$centros  = 'None';
if(isset($_POST['centro']) && is_array($_POST['centro']) && count($_POST['centro']) > 0){
    $centros = implode(', ', $_POST['centro']);
}
$depositos  = 'None';
if(isset($_POST['deposito']) && is_array($_POST['deposito']) && count($_POST['deposito']) > 0){
    $depositos = implode(', ', $_POST['deposito']);
}

$controles  = '';
if(isset($_POST['controle']) && is_array($_POST['controle']) && count($_POST['controle']) > 0){
    $controles = implode(', ', $_POST['controle']);
}


$bdncm = "SELECT * FROM ncm WHERE codigo = '$ncm'"; // Pesquisa na tabela ncm a verificar se o $ncm está na tabela TIPI-Receita
$queryncm = mysql_query($bdncm); // Envia uma consulta para a tabela ncm com o termo pesquisado em $bdncm
$numncm = mysql_num_rows($queryncm); // Envia uma consulta para a tabela ncm com o termo pesquisado em $bdncm

$consultfabcod = "SELECT * FROM codfab WHERE cod = '$codfab' AND cnpj = '$fab'";  //verifica se o material conta na tabela codfab (base SAP)
$codfabc = mysql_query($consultfabcod); // Envia uma consulta para a tabela codfab com o termo pesquisado em $consultfabcod
$linha = mysql_fetch_assoc($codfabc); // Captura todos os dados da linha encontrada
$linha2 = $linha['id']; // Captura o dado da coluna id 
$_SESSION['linha']=$linha2; // Cria uma sessão, e memoriza o código id da linha encontrada
$num_codfab = mysql_num_rows($codfabc);  // Conta o número de linhas encontradas


$sql = "SELECT * FROM cadmater WHERE codfab = '$codfab' AND fab = '$fab'"; // Verifica se já foi enviado um material com peça/CNPJ idêntico anteriormente. 
$query = mysql_query($sql); // Envia uma consulta para a tabela cadmater com o termo pesquisado em $sql
$num_rows = mysql_num_rows($query); // Conta o número de linhas encontradas

if ($num_rows > 0) 
{  header('Location: cmterceiro.php?a=errocodfab');} // Verifica se peça/fabricante constam em cadmater (base Portal), se sim retorna erro

else if ($num_codfab == 1) 
{header('Location: cmterceiro.php?a=errocodfabc');} // Verifica se peça/fabricante constam na tabela codfab (base SAP), se sim retorna erro

else if (($centros == 'None') || ($depositos == 'None')) // Verifica se centro/deposito foram assinalados, se não, retorna erro
{  header('Location: cmterceiro.php?a=erroopcao');}

else if (($fab == '75294801000106') || ($fab == '75294801000610') || ($fab == '75294801001005') || ($fab == '75294801001188') || ($fab == '75294801000882'))
{  header('Location: cmterceiro.php?a=erromartini');} // Verifica se o CNPJ do fabricante é de alguma das filias Martini, se for retorna erro. 

else if ($numncm == 0) 
{header('Location: cmterceiro.php?a=erroncm');} // Verifica se o NCM consta na tabela ncm (TIPI-Receita), se não retorna erro.  


else {

	  // Se todas as condições foram atendidas, grava os dados na tabela cadmater
	  $sql_inclu = "INSERT INTO cadmater (data, solicitante, descricao, grupomerc, ncm, peso, conversao, unidcomerc, uniddev, codfab, fab, classlote, centros, depositos, controle)
	   VALUES ('$hoje', '$nome', '$descricao', '$grupomerc', '$ncm', '$peso', '$conversoes', '$unidcomerc', '$uniddev', '$a', '$fab', '$classlote', '$centros','$depositos', '$controles')";
	  $exe_inclu = mysql_query($sql_inclu) or die (mysql_error());
      $ticket_id = mysql_insert_id();
      $sql_log = "INSERT INTO logmater (data, usuario, alteracao, ticket) VALUES ('$hoje', '$nome', 'Aberto', '$ticket_id')";
      mysql_query($sql_log);


// Após a gravação dos dados na tabela, redireciona para a página cmterceiro.php com a mensagem de êxito 
header('Location: cmterceiro.php?a=envio');

$headers = "Content-Type:text/html; charset=UTF-8\n";
$headers .= "MIME-Version: 1.0\n";

}
?>



