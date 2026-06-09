<?php
session_start(); // Cria a sessão
include("config.php"); // Configuração do BD

date_default_timezone_set('America/Sao_Paulo');  // Estabelece a data/hora de Brasilia

$hoje = date('d-m-Y H:i:s');  // Estabelece o padrão de exibição de data/hora.
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$ncm = $_POST['ncm'];
$centros  = 'None';
if(isset($_POST['centro']) && is_array($_POST['centro']) && count($_POST['centro']) > 0){
    $centros = implode(', ', $_POST['centro']);
}
$canal  = 'None';
if(isset($_POST['canais']) && is_array($_POST['canais']) && count($_POST['canais']) > 0){
    $canal = implode(', ', $_POST['canais']);
}

$idembd2 = "SELECT * FROM codserv WHERE descrc = '$descricao'"; //verifica na tabela codserv (base SAP) se o serviço já não está cadastrado.
$queryidem2 = mysql_query($idembd2); // Envia uma consulta para a tabela codserv com o termo pesquisado em $idembd2
$linha = mysql_fetch_assoc($queryidem2); // Captura todos os dados da linha pesquisada
$linha2 = $linha['id']; // Captura o dado encontrado da coluna id 
$_SESSION['linha']=$linha2; // Cria uma sessão, e memoriza o código id da linha encontrada
$idemcod2 = mysql_num_rows($queryidem2); // Conta o número de linhas encontradas

if ($idemcod2 >= 1) // Verifica se a descrição do serviço constam em codserv (base SAP), se sim retorna erro

{header('Location: cservico.php?a=erroidem2');} 

else {

if (!isset($ac)){
	    // Se todas as condições forem atendidas, grava os dados na tabela cadservp
	  $sql_inclu = "INSERT INTO cadservp (data, solicitante, descricao, ncm, centros, canal)
	   VALUES ('$hoje', '$nome', '$descricao', '$ncm', '$centros', '$canal')";
	  $exe_inclu = mysql_query($sql_inclu) or die (mysql_error());
      $ticket_id = mysql_insert_id();
      $sql_log = "INSERT INTO logservp (data, usuario, alteracao, ticket) VALUES ('$hoje', '$nome', 'Aberto', '$ticket_id')";
      mysql_query($sql_log);


// Após a gravação dos dados na tabela, redireciona para a página cservico.php com a mensagem de êxito 
header('Location: cservico.php?a=envio');

$headers = "Content-Type:text/html; charset=UTF-8\n";
$headers .= "MIME-Version: 1.0\n";

}
}
?>


