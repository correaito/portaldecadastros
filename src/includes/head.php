<!DOCTYPE html> 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<html lang="pt-br">
<head>
<title><?php echo isset($pageTitle) ? $pageTitle : 'Portal de Cadastro - MARTINI MEAT'; ?></title>
    
<!-- Arquivos Bootstrap/configuração/validação -->
<link href="/css/bootstrap.css" rel="stylesheet">
<link href="/css/bootstrap-responsive.css" rel="stylesheet">
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/validacaoCNPJCPF.js" charset="iso-8859-1"></script> 
<link href="/css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="/img/logo.ico">

<!-- Scripts globais e mascaras -->
<script type="text/javascript" src="/js/validacoes.js"></script>

<?php
/* Data atual na navbar */
date_default_timezone_set('America/Sao_Paulo');
$semana = date("w"); 
$dia = date("j");
$mês = date("n");
$ano = date("Y");
$meses = array(1 => "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
$semanas = array("Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado");
?>

</head>
