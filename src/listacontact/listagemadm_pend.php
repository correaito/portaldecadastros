<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<html lang="pt-br">
<title>Portal de Cadastro - Listagens</title>


<html>
<?php
if ($_GET['a'] == 'erro'){
/* Gera a mensagem de erro para o usuario informando que ele não tem permissão de acesso */
?>
<script language="JavaScript">
alert('Você não tem privilégio administrativo para editar as solicitações.');
</script>
<? } ?>

<head>

  
<!-- Arquivos Bootstrap/configuração/validação -->
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.css" rel="stylesheet">

<link href="../css/style.css" rel="stylesheet" rel="stylesheet">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="../img/logo.ico">


</head>
<body>


<?php
include("../restrito.php");
include("../config.php"); // conexão com o BD
session_start();
$usuariologado = $_SESSION['login'];

// Aqui começa a paginação dos resultados
$pagina = $_GET['pag'];
if(!$pagina) { $pagina = 1;} 
$limite = 15;
$inicio = ($pagina * $limite) - $limite;

$filtro_sql = "";
$url_filtros = "";
foreach ($_GET as $key => $value) {
    if (strpos($key, 'f_') === 0 && trim($value) !== '') {
        $coluna = substr($key, 2); 
        $f_val = mysql_real_escape_string($value);
        $filtro_sql .= " AND `$coluna` LIKE '%$f_val%' ";
        $url_filtros .= "&$key=" . urlencode($value);
    }
}


// Banco de dados do relatório, limitado

$sql = "SELECT * FROM contact where Status='Pendente'  $filtro_sql ORDER BY ticket DESC LIMIT $inicio,$limite";

$resultado = mysql_query($sql);

// Banco de dados da paginação, ilimitado

$consulta = mysql_query("SELECT * FROM contact where Status='Pendente'  $filtro_sql ORDER BY ticket DESC"); 

// Captura o número do total de registros no nosso banco a partir da nossa consulta
$total_registros = mysql_num_rows($consulta);

/* Define o total de páginas a serem mostradas baseada
na divisão do total de registros pelo limite de registros a serem mostrados */
$total_paginas = Ceil($total_registros / $limite);


?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/navbar.php'); ?>

<!-- Inicio da coluna 1 -->
<div class="row-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>

<!-- Início da coluna 2 -->
<div class="span12 main-content" id="page-content-wrapper">    

<div class="section">

  <p><i class="icon-list-alt icon-white"></i> Chamados abertos pelo usuário</p>
  <div class="cadform">
    <div class="container-fluid" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 15px 20px; margin-bottom: 0px; border: 1px solid #eaeaea;">





<style>
.section > p { margin-bottom: 0 !important; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 8px 15px !important; }
.cadform { background-color: #ffffff !important; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 0px !important; border: 1px solid #eaeaea; border-top: none !important; }
.cadform .container-fluid { padding: 0 !important; border: none !important; box-shadow: none !important; background: transparent !important; }
.cadform .table-responsive { padding: 0px; margin: 0; width: 100%; overflow-x: auto; }
.table-custom { width: 100% !important; max-width: 100% !important; margin: 0 !important; background-color: transparent; border-collapse: collapse; border: none !important; }
.table-custom th { background-color: #f4f6f9 !important; color: #333 !important; font-weight: 600 !important; text-transform: uppercase; font-size: 12px; padding: 15px 20px !important; border-bottom: 2px solid #ddd !important; text-align: left !important; border-top: none !important; white-space: nowrap; }
.table-custom td { padding: 12px 15px !important; vertical-align: middle !important; text-align: left !important; border-top: 1px solid #f0f0f0 !important; white-space: nowrap; }
.truncate-text { max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; vertical-align: middle; cursor: help; }
</style>
<form method="GET" action="">
<div class="table-responsive">
<table class="table table-hover table-condensed table-custom" style="width: 100% !important; margin: 0 !important;" style="width: 100% !important; margin: 0 !important;">
<thead>
<tr>
<th>Data</th>
  <th>Usuario</th>
  <th>Motivo</th>
  <th>Ticket.</th>
  <th>Status.</th>
  <th></th>
</tr>

<tr class="filters">
  <th style="padding: 5px !important;"><input type="text" name="f_data" value="<?php echo isset($_GET['f_data']) ? htmlspecialchars($_GET['f_data']) : ''; ?>" style="width: 90%; margin: 0; padding: 2px 5px; font-size: 11px; font-weight: normal; border-radius: 4px; border: 1px solid #ccc; background: #fff;" placeholder="Filtrar..."></th>
  <th style="padding: 5px !important;"><input type="text" name="f_solicitante" value="<?php echo isset($_GET['f_solicitante']) ? htmlspecialchars($_GET['f_solicitante']) : ''; ?>" style="width: 90%; margin: 0; padding: 2px 5px; font-size: 11px; font-weight: normal; border-radius: 4px; border: 1px solid #ccc; background: #fff;" placeholder="Filtrar..."></th>
  <th style="padding: 5px !important;"><input type="text" name="f_motivo" value="<?php echo isset($_GET['f_motivo']) ? htmlspecialchars($_GET['f_motivo']) : ''; ?>" style="width: 90%; margin: 0; padding: 2px 5px; font-size: 11px; font-weight: normal; border-radius: 4px; border: 1px solid #ccc; background: #fff;" placeholder="Filtrar..."></th>
  <th style="padding: 5px !important;"><input type="text" name="f_ticket" value="<?php echo isset($_GET['f_ticket']) ? htmlspecialchars($_GET['f_ticket']) : ''; ?>" style="width: 90%; margin: 0; padding: 2px 5px; font-size: 11px; font-weight: normal; border-radius: 4px; border: 1px solid #ccc; background: #fff;" placeholder="Filtrar..."></th>
  <th style="padding: 5px !important;"><input type="text" name="f_status" value="<?php echo isset($_GET['f_status']) ? htmlspecialchars($_GET['f_status']) : ''; ?>" style="width: 90%; margin: 0; padding: 2px 5px; font-size: 11px; font-weight: normal; border-radius: 4px; border: 1px solid #ccc; background: #fff;" placeholder="Filtrar..."></th>
  <th style="padding: 5px !important; text-align: center;"><button type="submit" class="btn btn-mini btn-info" style="margin-top: 0px;"><i class="icon-search icon-white"></i></button></th>
</tr>
</thead>
<tbody>

<?php

while ($linha = mysql_fetch_assoc($resultado)) // salva o resultado das consultas do BD em $linha e destrincha entre as colunas abaixo
{
$ticket=$linha['ticket'];

if ($linha['status'] == 'Atendido') { // Linhas na cor verde com status Cadastrado
echo '<tr class="success">';
echo '<td>'.$linha['data'].'</td>';
echo '<td>'.$linha['solicitante'].'</td>';
echo '<td>'.$linha['motivo'].'</td>';
echo '<td>'.$linha['ticket'].'</td>';
echo '<td>'.$linha['status'].'</td>';
echo '<td><a href="../listacontact/alteraradm.php?ticket='.$ticket.'">Editar</a></td>';
echo '</tr>';
}


elseif ($linha['status'] == 'Pendente') { // Linhas na cor amarela com status Pendente
echo '<tr class="warning">';
echo '<td>'.$linha['data'].'</td>';
echo '<td>'.$linha['solicitante'].'</td>';
echo '<td>'.$linha['motivo'].'</td>';
echo '<td>'.$linha['ticket'].'</td>';
echo '<td>'.$linha['status'].'</td>';
echo '<td><a href="../listacontact/atendendo.php?ticket='.$ticket.'">Editar</a></td>';
echo '</tr>';
}


elseif ($linha['status'] == 'Recusado') { // Linhas na cor vermelha com status Recusado
echo '<tr class="error">';
echo '<td>'.$linha['data'].'</td>';
echo '<td>'.$linha['solicitante'].'</td>';
echo '<td>'.$linha['motivo'].'</td>';
echo '<td>'.$linha['ticket'].'</td>';
echo '<td>'.$linha['status'].'</td>';
echo '<td><a href="../listacontact/alteraradm.php?ticket='.$ticket.'">Editar</a></td>';
echo '</tr>';
}

elseif ($linha['status'] == 'Atendendo') { // Linhas na cor azul com status Atendendo
echo '<tr class="info">'; 
echo '<td>'.$linha['data'].'</td>';
echo '<td>'.$linha['solicitante'].'</td>';
echo '<td>'.$linha['motivo'].'</td>';
echo '<td>'.$linha['ticket'].'</td>';
echo '<td>'.$linha['status'].'</td>';
echo '<td><a href="">Editar</a></td>';
echo '</tr>';
}


else { // Sem status, linha na cor branca 
echo '<tr>';
echo '<td>'.$linha['data'].'</td>';
echo '<td>'.$linha['solicitante'].'</td>';
echo '<td>'.$linha['motivo'].'</td>';
echo '<td>'.$linha['ticket'].'</td>';
echo '<td>'.$linha['status'].'</td>';
echo '<td><a href="../listacontact/alteraradm.php?ticket='.$ticket.'">Editar</a></td>';
echo '</tr>';
}
}

?>

</tbody>
</table>
</div>
</form>

<ul class="pager"> <!-- Botões para controle de paginação de resultados -->
<li>
<?    
if    (($pagina == $total_paginas) and ($pagina > 1)) {
echo "<a href=../listacontact/listagemadm_pend.php?pag=".($pagina-1)."$url_filtros>Anterior</a>";    
        }

elseif (($pagina == 1) and ($pagina < $total_paginas))
{
echo "<a href=../listacontact/listagemadm_pend.php?pag=".($pagina+1)."$url_filtros>Próximo</a>"; 
        }

elseif (($pagina > 1) and ($pagina < $total_paginas)) {
echo "<a href=../listacontact/listagemadm_pend.php?pag=".($pagina-1)."$url_filtros>Anterior</a>";      
echo "<a href=../listacontact/listagemadm_pend.php?pag=".($pagina+1)."$url_filtros>Próximo</a>";
}

elseif (($pagina == 1) and ($pagina == $total_paginas)) {
echo ""; 
        }

else {
  echo "";
}        

?>
</li>
</ul>

 <!-- Reflesh na página a cada 60s  -->

</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/modals.php'); ?>

</div>
</div>
</div>
</div>
</div>
</html>