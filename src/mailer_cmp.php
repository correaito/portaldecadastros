<?php
session_start();  // Cria a sessão
include("config.php"); // Configuração do BD
date_default_timezone_set('America/Sao_Paulo'); // Estabelece a data/hora de Brasilia

$hoje = date('d-m-Y H:i:s'); // Estabelece o padrão de exibição de data/hora.
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$unimed = $_POST['unimed'];
$ncm = $_POST['ncm'];
$codfab = $_POST['codfab'];
$fab = $_POST['fab'];
$centros  = 'None';
if(isset($_POST['centro']) && is_array($_POST['centro']) && count($_POST['centro']) > 0){
    $centros = implode(', ', $_POST['centro']); }
$grupomerc = $_POST['grupomerc'];
$avaliacao = $_POST['classeav'];
$credito = $_POST['credito'];

$a=ltrim($codfab, "0"); // Deixa o nº inteiro, sem zero a esquerda


$idembd2 = "SELECT * FROM codsmp WHERE descrc = '$descricao' AND cod = '$codfab'"; // Verifica na tabela codsmp se a descrição/peça já não está cadastrada.
$queryidem2 = mysql_query($idembd2); // Envia uma consulta para a tabela codsmp com o termo pesquisado em $idembd2
$linha = mysql_fetch_assoc($queryidem2); // Catura todos os dados da linha encontrada
$linha2 = $linha['id']; // Captura o dado da coluna id 
$_SESSION['linha']=$linha2; // Cria uma sessão, e memoriza o código id da linha encontrada
$idemcod2 = mysql_num_rows($queryidem2); // Conta o número de linhas encontradas


$idembd = "SELECT * FROM cadmatp WHERE descricao = '$descricao' AND codfab = '$codfab'"; // Pesquisa nas solicitações ao Portal se a descrição/peça já foi enviado antes
$queryidem = mysql_query($idembd); // Envia uma consulta para a tabela cadmatp com o termo pesquisado em $idembd
$idemcod = mysql_num_rows($queryidem); // Conta o número de linhas encontradas


$bdncm = "SELECT * FROM ncm WHERE codigo = '$ncm'"; // Pesquisa na tabela ncm a verificar se o $ncm está na tabela TIPI-Receita
$queryncm = mysql_query($bdncm); // Envia uma consulta para a tabela ncm com o termo pesquisado em $bdncm
$numncm = mysql_num_rows($queryncm); // Envia uma consulta para a tabela ncm com o termo pesquisado em $bdncm

if ($numncm == 0)  // Se não localizar nenhum resultado na tabela ncm, retorna erro
{header('Location: index.php?a=erroncm');}


elseif ($centros == 'None') // Se a variável $centros não trouxer nenhuma informação, retorna erro

{header('Location: index.php?a=erroopcao');}


elseif ($idemcod2 >= 1) // Se localizar algum resultado para codsmp, retorna erro

{header('Location: index.php?a=erroidem2');}


elseif ($idemcod >= 1) // Se localizar algum resultado para cadmtp, retorna erro

{header('Location: index.php?a=erroidem');}


else

{	  // Se todas as condições forem atendidas, grava os dados na tabela cadmtp
	  $sql_inclu = "INSERT INTO cadmatp (data, solicitante, descricao, unimed, ncm, codfab, fab, centros, grupomerc, avaliacao, credito)
	   VALUES ('$hoje', '$nome', '$descricao', '$unimed ', '$ncm', '$a', '$fab', '$centros', '$grupomerc', '$avaliacao', '$credito')";
	  $exe_inclu = mysql_query($sql_inclu) or die (mysql_error());
      $ticket_id = mysql_insert_id();
      $sql_log = "INSERT INTO logmp (data, usuario, alteracao, ticket) VALUES ('$hoje', '$nome', 'Aberto', '$ticket_id')";
      mysql_query($sql_log);


// Após a gravação dos dados na tabela, redireciona para a página index.php com a mensagem de êxito 
header('Location: index.php?a=envio');

$headers = "Content-Type:text/html; charset=UTF-8\n";
$headers .= "MIME-Version: 1.0\n";

}
?>