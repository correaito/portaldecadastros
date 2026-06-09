<?php
include("config.php"); //Arquivo configuração do BD
include("restrito.php"); //Arquivo para restrição da página para usuários logados

$sql_busca = "SELECT * FROM user WHERE login = '$login_usuario'";
$exe_busca = mysql_query($sql_busca) or die (mysql_error());
$fet_busca = mysql_fetch_assoc($exe_busca);
?>

<?php $pageTitle = 'Portal de Cadastro - Material de Terceiros'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/alerts.php'); ?>

<body>

<!-- Inicio da navbar do topo  -->

<?php include($_SERVER['DOCUMENT_ROOT'] . '/navbar.php'); ?>



<!-- Inicio da coluna 1 -->
<div class="row-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>



<!-- Início da coluna 2 -->
<div class="span12 main-content" id="page-content-wrapper">    

<div class="section">
  <p><i class="icon-th-list icon-white"></i> Cadastro de material de terceiro</p>     

    <div class="article"> 

<!-- Início da formulário -->
<div class="container cadform">

<form name="contactform" method="post" action="mailer_cmt.php" class="form-horizontal" role="form">
<fieldset>

<!-- Campo oculto com o nome do usuário -->
<input id="textinput" type="hidden" name="nome" type="text" onkeyup="up(this)" value="<? echo $_SESSION['nome'];?>" required="">


<div class="control-group">
  <label class="control-label" for="textinput">Descrição</label>
  <div class="controls">
    <input id="textinput" name="descricao" type="text" placeholder="Descrição completa do material" onkeyup="up(this)" class="input-xlarge" required="">
     </div>
</div>


<div class="control-group">
  <label class="control-label" for="textinput">NCM</label>
  <div class="controls">
    <input id="textinput" name="ncm" type="text" onKeyPress="MascaraNCM(contactform.ncm);" 
maxlength="10" onBlur="ValidaNCM(contactform.ncm);" class="input-xlarge" required="">
    <div id="ncm_feedback" style="margin-top: 8px; display: none; font-size: 13px;"></div>
    </div>
</div>


<div class="control-group">
  <label class="control-label" for="selectbasic">Peso</label>
  <div class="controls">
    <select id="selectbasic" name="peso" class="input-xlarge" required="">
      <option></option>
      <option>Fixo</option>
      <option>Variável</option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="textinput">Peso unitário</label>
  <div class="controls">
    <input id="textinput" name="conversao" type="text" placeholder="Ex.: 1 CX = 12 KG" onkeyup="up(this)" class="input-xlarge" required="">
     </div>
</div>


<div class="control-group">
  <label class="control-label" for="selectbasic">Grupo de Mercadorias</label>
  <div class="controls">
    <select id="selectbasic" name="grupomerc" class="input-xlarge" required="">
<option></option>
<option> Aves </option>
<option>Bovinos</option>
<option>Bubalinos</option>
<option>Caprinos</option>
<option>Equinos</option>
<option>Farinhas</option>
<option>Industrializados</option>
<option>Lacteos</option>
<option>Ovinos</option>
<option>Pescados</option>
<option>Suínos</option>
<option>Vegetais</option>
<option>Carga Geral</option>
<option>Algodão (CG)</option>
<option>Terceiro - PRODUTOS IMPORTADOS</option>
 </select>
 </div>
</div>


<div class="control-group">
  <label class="control-label" for="selectbasic">U.M. comercial</label>
  <div class="controls">
    <select id="selectbasic" name="unidcomerc" class="input-xlarge" required="">
      <option></option>
      <option>Polegadas quadradas</option>
      <option>Polegadas cúbicas</option>
      <option>Porcentagem</option>
      <option>Percentual de Área</option>
      <option>Permilagem</option>
      <option>/10 gramas</option>
      <option>/100 gramas</option>
      <option>/20 gramas</option>
      <option>/25 gramas</option>
      <option>/250 gramas</option>
      <option>/gramas</option>
      <option>Metros/minuto</option>
      <option>Horas de crédito</option>
      <option>Comprimento em m/unidade</option>
      <option>L DE XAROPE COMPOSTO</option>
      <option>L DE BEBIDA FINAL</option>
      <option>kg DE PÓ</option>
      <option>kg DE MASSA</option>
      <option>kg DE PRODUTO FINAL</option>
      <option>DE PRODUTO PRONTO PARA CONSUMO</option>
      <option>DE MASSA</option>
      <option>EM SALMOURA</option>
      <option>EM XAROPE</option>
      <option>EM SOLUÇÃO</option>
      <option>SOBRE O PÓ</option>
      <option>EM PASTILHA</option>
      <option>EM EMULSÃO</option>
      <option>EM SABONETE</option>
      <option>SOBRE O PRODUTO FINAL</option>
      <option>Acre</option>
      <option>Anos (annum)</option>
      <option>Barra</option>
      <option>Balde</option>
      <option>Bombona</option>
      <option>Bobinas</option>
      <option>Barrica</option>
      <option>BIG BAG</option>
      <option>Brix</option>
      <option>Centímetros cúbicos/segundo</option>
      <option>Decímetro cúbico</option>
      <option>Cada</option>
      <option>Cento</option>
      <option>Millimol por litro</option>
      <option>Chapa</option>
      <option>Cilindro</option>
      <option>Conjunto</option>
      <option>Centilitro</option>
      <option>Centímetro</option>
      <option>Centímetro quadrado</option>
      <option>Centímetro cúbico</option>
      <option>Centímetros/segundo</option>
      <option>Container</option>
      <option>Crédito</option>
      <option>Quota grp.empresas em %</option>
      <option>Caixa</option>
      <option>Caixa de papelão</option>
      <option>Caixote</option>
      <option>Dias</option>
      <option>Decímetro</option>
      <option>Acidez</option>
      <option>Dúzia</option>
      <option>Embalagem Padrão Campinas /MIL</option>
      <option>Embalagem Padrão Estancia /MIL</option>
      <option>Embalagem Padrão Jaraguá / MIL</option>
      <option>Unidades enzima/mililitro</option>
      <option>Embalagem Padrão Manaus / MIL</option>
      <option>Embalagem Padrão Campinas</option>
      <option>Embalagem Padrão Jaraguá</option>
      <option>Embalagem Padrão Manaus</option>
      <option>Embalagem Padrão Nordeste</option>
      <option>Frasco</option>
      <option>Fardo</option>
      <option>Folhas</option>
      <option>Onça líquida EUA</option>
      <option>gramas/ mililitros</option>
      <option>GRAMAS/100 LITROS</option>
      <option>GRAMAS/100 GRAMAS</option>
      <option>Galão</option>
      <option>Grama ouro</option>
      <option>Grama - ingrediente ativo</option>
      <option>Grama IngrAtivo / litro</option>
      <option>Gigajoule</option>
      <option>Gay Lussac</option>
      <option>GRAMAS/LITROS</option>
      <option>Gramas/mol</option>
      <option>Gramas/metro quadrado</option>
      <option>Gramas/metro cúbico</option>
      <option>Gigaohm</option>
      <option>Galões por hora (US)</option>
      <option>Galões por milha (US)</option>
      <option>Garrafa</option>
      <option>Graus</option>
      <option>Grade</option>
      <option>Garafão</option>
      <option>Galão EUA</option>
      <option>Hora</option>
      <option>Hectares</option>
      <option>Hectolitro</option>
      <option>Horas</option>
      <option>Picofarad</option>
      <option>Itens</option>
      <option>Joules/quilograma</option>
      <option>Capacidade térmica específica</option>
      <option>Joule/mole</option>
      <option>KCalorias 100 gramas</option>
      <option>Quilogramas/decímetro cúbico</option>
      <option>Quilograma</option>
      <option>Quilogramas/mol</option>
      <option>Quilograma/metro quadrado seg</option>
      <option>Quilograma - ingrediente ativo</option>
      <option>Quilogramas/segundo</option>
      <option>Quilogramas/metro cúbico</option>
      <option>Kits</option>
      <option>Quilojoules/quilograma</option>
      <option>Quilojoule/mole</option>
      <option>Quilômetro</option>
      <option>Quilômetro quadrado</option>
      <option>Quilômetros/hora</option>
      <option>Kilomol</option>
      <option>Kelvin/minuto</option>
      <option>Kelvin/segundo</option>
      <option>Kilonewton</option>
      <option>Kilopascal</option>
      <option>Quilotoneladas</option>
      <option>Kilovoltampere</option>
      <option>kg ingrediente ativo / kg</option>
      <option>Litro</option>
      <option>LITROS/100 LITROS</option>
      <option>Libra EUA</option>
      <option>Litros por 100 km</option>
      <option>Litros/minuto</option>
      <option>Litros/molsegundo</option>
      <option>Litros por hora</option>
      <option>LITRO/TONELADA</option>
      <option>Metro</option>
      <option>1 / metro quadrado</option>
      <option>Mol por litro</option>
      <option>Mol por metro cúbico</option>
      <option>Metro/segundo</option>
      <option>Metro quadrado</option>
      <option>Metros quadrados/segundo</option>
      <option>Metro cúbico</option>
      <option>Metro cúbico/dia</option>
      <option>Metro cúbico/hora</option>
      <option>Metro cúbico/segundo</option>
      <option>Maiúsculas</option>
      <option>Maço</option>
      <option>Micrograma 100 gramas</option>
      <option>Miliequivalente/100 gramas</option>
      <option>Megajoule</option>
      <option>Meses</option>
      <option>Milifarad</option>
      <option>Miligrama</option>
      <option>Miligrama/100 gramas</option>
      <option>Miligrama/100 mililitros</option>
      <option>Miligramas de KOH/gramas</option>
      <option>Miligrama/litro</option>
      <option>Megaohm</option>
      <option>Miligramas/metro cúbico</option>
      <option>Megavolt</option>
      <option>Metros/hora</option>
      <option>Milha</option>
      <option>Milhas quadradas</option>
      <option>Milhares</option>
      <option>Minuto</option>
      <option>Microsegundos</option>
      <option>Mililitros/100 mililitros</option>
      <option>/100 mililitros</option>
      <option>Mililitro - ingrediente ativo</option>
      <option>Milímetro</option>
      <option>MILILITROS/100 LITROS</option>
      <option>Milímetros quadrados</option>
      <option>Milímetro cúbico</option>
      <option>Meganewton</option>
      <option>Milinewton/metro</option>
      <option>Milhas por galão (US)</option>
      <option>Milipascal/segundos</option>
      <option>Milisegundos</option>
      <option>Metro/segundo quadrado</option>
      <option>Microsiemens por centímetro</option>
      <option>Megawatt hora</option>
      <option>Nanoampere</option>
      <option>Nanômetro</option>
      <option>Nanofarad</option>
      <option>Newton/metro</option>
      <option>Newton/milímetro quadrado</option>
      <option>Número Máximo Permitido/gramas</option>
      <option>Nano-segundos</option>
      <option>Unidade Nefelométrica Turbidez</option>
      <option>Resistência elétrica espec.</option>
      <option>Resistência elétrica espec.</option>
      <option>Onça</option>
      <option>Pontos</option>
      <option>Pacote</option>
      <option>Palete</option>
      <option>Pares</option>
      <option>Pascal-segundo</option>
      <option>Peça</option>
      <option>Valor de pH</option>
      <option>1/Minute</option>
      <option>Taxa de permeação SI</option>
      <option>Polegada (inch)</option>
      <option>Pote</option>
      <option>Partes por bilhões</option>
      <option>Partes por milhão</option>
      <option>Parts per trilhão</option>
      <option>Taxa de permeação</option>
      <option>Nº de pessoas</option>
      <option>Picosegundo</option>
      <option>Pinta líquida EUA</option>
      <option>Pés quadrados</option>
      <option>Pé cúbico</option>
      <option>Pés</option>
      <option>Quarto, líquido EUA</option>
      <option>Recipiente</option>
      <option>Refil</option>
      <option>Grama/centímetro cúbico</option>
      <option>Rolo</option>
      <option>Função</option>
      <option>Siemens por metro</option>
      <option>Saco</option>
      <option>Serviços</option>
      <option>Semanas</option>
      <option>Tambor</option>
      <option>Megavoltampere</option>
      <option>TN</option>
      <option>Tonelada</option>
      <option>Toneladas/metro cúbico</option>
      <option>Toneladas EUA</option>
      <option>Tanque</option>
      <option>Unidade de atividade</option>
      <option>Unidades enzima</option>
      <option>Unidade formadora colonias/mL</option>
      <option>unidade formadora colonias/g</option>
      <option>Micrograma/ 100 gramas</option>
      <option>Um (1)</option>
      <option>Unidade</option>
      <option>URL/10cm2</option>
      <option>unidade pungência</option>
      <option>Voltampere</option>
      <option>Artigo de valor</option>
      <option>Condutibilidade térmica</option>
      <option>Velocidade de evaporação</option>
      <option>Jardas</option>
      <option>Jardas quadradas</option>
      <option>Jardas cúbicas</option>
      <option>Pallet</option>
      <option>Tonelada Movimentada</option>
      <option>Unidade</option>
      <option>centigrama/grama</option>
      <option>centímetro/30 segundos</option>
      <option>centímetro/minuto</option>
      <option>centímetro/15 segundos</option>
      <option>Gramas</option>
      <option>GRAMAS/100 QUILOGRAMAS</option>
      <option>GRAMAS/100 MILILITROS</option>
      <option>GRAMAS/80 GRAMAS</option>
      <option>QUILOGRAMAS/100 LITROS</option>
      <option>Quilograma força/centímetro²</option>
      <option>Quilograma/ metro² .segundo</option>
      <option>Quilogramas /10 litros</option>
      <option>Quilogramas /100 quilogramas</option>
      <option>SKB/g</option>
      <option>Quilograma/barril EUA</option>
      <option>Quilograma força/centímetro</option>
      <option>Micro Joule 100/Gramas</option>
      <option>QUILO JOULES / 100 GRAMAS</option>
      <option>milequivalente/quilo</option>
      <option>Mililitro</option>
      <option>MILILITROS/LITRO</option>
      <option>MILILITROS/100 QUILOGRAMAS</option>
      <option>MILILITROS/100 GRAMAS</option>
      <option>MILILITROS/TONELADA</option>
      <option>Resma</option>
      <option>Micrograma</option>
      <option>micrograma/litro</option>
      <option>micrograma/mililitro</option>
      <option>umol TE/g</option>
      <option>Bloco</option>
      <option>Ponto de Amolecimento</option>
      <option>Microampère</option>
      <option>Microfarad</option>
      <option>Micrograma/litro</option>
      <option>Microgramas/metro cúbico</option>
      <option>Microlitro</option>
      <option>Micrometro</option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="selectbasic">U.M. devolução</label>
  <div class="controls">
    <select id="selectbasic" name="uniddev" class="input-xlarge" required="">
      <option></option>
      <option>Polegadas quadradas</option>
      <option>Polegadas cúbicas</option>
      <option>Porcentagem</option>
      <option>Percentual de Área</option>
      <option>Permilagem</option>
      <option>/10 gramas</option>
      <option>/100 gramas</option>
      <option>/20 gramas</option>
      <option>/25 gramas</option>
      <option>/250 gramas</option>
      <option>/gramas</option>
      <option>Metros/minuto</option>
      <option>Horas de crédito</option>
      <option>Comprimento em m/unidade</option>
      <option>L DE XAROPE COMPOSTO</option>
      <option>L DE BEBIDA FINAL</option>
      <option>kg DE PÓ</option>
      <option>kg DE MASSA</option>
      <option>kg DE PRODUTO FINAL</option>
      <option>DE PRODUTO PRONTO PARA CONSUMO</option>
      <option>DE MASSA</option>
      <option>EM SALMOURA</option>
      <option>EM XAROPE</option>
      <option>EM SOLUÇÃO</option>
      <option>SOBRE O PÓ</option>
      <option>EM PASTILHA</option>
      <option>EM EMULSÃO</option>
      <option>EM SABONETE</option>
      <option>SOBRE O PRODUTO FINAL</option>
      <option>Acre</option>
      <option>Anos (annum)</option>
      <option>Barra</option>
      <option>Balde</option>
      <option>Bombona</option>
      <option>Bobinas</option>
      <option>Barrica</option>
      <option>BIG BAG</option>
      <option>Brix</option>
      <option>Centímetros cúbicos/segundo</option>
      <option>Decímetro cúbico</option>
      <option>Cada</option>
      <option>Cento</option>
      <option>Millimol por litro</option>
      <option>Chapa</option>
      <option>Cilindro</option>
      <option>Conjunto</option>
      <option>Centilitro</option>
      <option>Centímetro</option>
      <option>Centímetro quadrado</option>
      <option>Centímetro cúbico</option>
      <option>Centímetros/segundo</option>
      <option>Container</option>
      <option>Crédito</option>
      <option>Quota grp.empresas em %</option>
      <option>Caixa</option>
      <option>Caixa de papelão</option>
      <option>Caixote</option>
      <option>Dias</option>
      <option>Decímetro</option>
      <option>Acidez</option>
      <option>Dúzia</option>
      <option>Embalagem Padrão Campinas /MIL</option>
      <option>Embalagem Padrão Estancia /MIL</option>
      <option>Embalagem Padrão Jaraguá / MIL</option>
      <option>Unidades enzima/mililitro</option>
      <option>Embalagem Padrão Manaus / MIL</option>
      <option>Embalagem Padrão Campinas</option>
      <option>Embalagem Padrão Jaraguá</option>
      <option>Embalagem Padrão Manaus</option>
      <option>Embalagem Padrão Nordeste</option>
      <option>Frasco</option>
      <option>Fardo</option>
      <option>Folhas</option>
      <option>Onça líquida EUA</option>
      <option>gramas/ mililitros</option>
      <option>GRAMAS/100 LITROS</option>
      <option>GRAMAS/100 GRAMAS</option>
      <option>Galão</option>
      <option>Grama ouro</option>
      <option>Grama - ingrediente ativo</option>
      <option>Grama IngrAtivo / litro</option>
      <option>Gigajoule</option>
      <option>Gay Lussac</option>
      <option>GRAMAS/LITROS</option>
      <option>Gramas/mol</option>
      <option>Gramas/metro quadrado</option>
      <option>Gramas/metro cúbico</option>
      <option>Gigaohm</option>
      <option>Galões por hora (US)</option>
      <option>Galões por milha (US)</option>
      <option>Garrafa</option>
      <option>Graus</option>
      <option>Grade</option>
      <option>Garafão</option>
      <option>Galão EUA</option>
      <option>Hora</option>
      <option>Hectares</option>
      <option>Hectolitro</option>
      <option>Horas</option>
      <option>Picofarad</option>
      <option>Itens</option>
      <option>Joules/quilograma</option>
      <option>Capacidade térmica específica</option>
      <option>Joule/mole</option>
      <option>KCalorias 100 gramas</option>
      <option>Quilogramas/decímetro cúbico</option>
      <option>Quilograma</option>
      <option>Quilogramas/mol</option>
      <option>Quilograma/metro quadrado seg</option>
      <option>Quilograma - ingrediente ativo</option>
      <option>Quilogramas/segundo</option>
      <option>Quilogramas/metro cúbico</option>
      <option>Kits</option>
      <option>Quilojoules/quilograma</option>
      <option>Quilojoule/mole</option>
      <option>Quilômetro</option>
      <option>Quilômetro quadrado</option>
      <option>Quilômetros/hora</option>
      <option>Kilomol</option>
      <option>Kelvin/minuto</option>
      <option>Kelvin/segundo</option>
      <option>Kilonewton</option>
      <option>Kilopascal</option>
      <option>Quilotoneladas</option>
      <option>Kilovoltampere</option>
      <option>kg ingrediente ativo / kg</option>
      <option>Litro</option>
      <option>LITROS/100 LITROS</option>
      <option>Libra EUA</option>
      <option>Litros por 100 km</option>
      <option>Litros/minuto</option>
      <option>Litros/molsegundo</option>
      <option>Litros por hora</option>
      <option>LITRO/TONELADA</option>
      <option>Metro</option>
      <option>1 / metro quadrado</option>
      <option>Mol por litro</option>
      <option>Mol por metro cúbico</option>
      <option>Metro/segundo</option>
      <option>Metro quadrado</option>
      <option>Metros quadrados/segundo</option>
      <option>Metro cúbico</option>
      <option>Metro cúbico/dia</option>
      <option>Metro cúbico/hora</option>
      <option>Metro cúbico/segundo</option>
      <option>Maiúsculas</option>
      <option>Maço</option>
      <option>Micrograma 100 gramas</option>
      <option>Miliequivalente/100 gramas</option>
      <option>Megajoule</option>
      <option>Meses</option>
      <option>Milifarad</option>
      <option>Miligrama</option>
      <option>Miligrama/100 gramas</option>
      <option>Miligrama/100 mililitros</option>
      <option>Miligramas de KOH/gramas</option>
      <option>Miligrama/litro</option>
      <option>Megaohm</option>
      <option>Miligramas/metro cúbico</option>
      <option>Megavolt</option>
      <option>Metros/hora</option>
      <option>Milha</option>
      <option>Milhas quadradas</option>
      <option>Milhares</option>
      <option>Minuto</option>
      <option>Microsegundos</option>
      <option>Mililitros/100 mililitros</option>
      <option>/100 mililitros</option>
      <option>Mililitro - ingrediente ativo</option>
      <option>Milímetro</option>
      <option>MILILITROS/100 LITROS</option>
      <option>Milímetros quadrados</option>
      <option>Milímetro cúbico</option>
      <option>Meganewton</option>
      <option>Milinewton/metro</option>
      <option>Milhas por galão (US)</option>
      <option>Milipascal/segundos</option>
      <option>Milisegundos</option>
      <option>Metro/segundo quadrado</option>
      <option>Microsiemens por centímetro</option>
      <option>Megawatt hora</option>
      <option>Nanoampere</option>
      <option>Nanômetro</option>
      <option>Nanofarad</option>
      <option>Newton/metro</option>
      <option>Newton/milímetro quadrado</option>
      <option>Número Máximo Permitido/gramas</option>
      <option>Nano-segundos</option>
      <option>Unidade Nefelométrica Turbidez</option>
      <option>Resistência elétrica espec.</option>
      <option>Resistência elétrica espec.</option>
      <option>Onça</option>
      <option>Pontos</option>
      <option>Pacote</option>
      <option>Palete</option>
      <option>Pares</option>
      <option>Pascal-segundo</option>
      <option>Peça</option>
      <option>Valor de pH</option>
      <option>1/Minute</option>
      <option>Taxa de permeação SI</option>
      <option>Polegada (inch)</option>
      <option>Pote</option>
      <option>Partes por bilhões</option>
      <option>Partes por milhão</option>
      <option>Parts per trilhão</option>
      <option>Taxa de permeação</option>
      <option>Nº de pessoas</option>
      <option>Picosegundo</option>
      <option>Pinta líquida EUA</option>
      <option>Pés quadrados</option>
      <option>Pé cúbico</option>
      <option>Pés</option>
      <option>Quarto, líquido EUA</option>
      <option>Recipiente</option>
      <option>Refil</option>
      <option>Grama/centímetro cúbico</option>
      <option>Rolo</option>
      <option>Função</option>
      <option>Siemens por metro</option>
      <option>Saco</option>
      <option>Serviços</option>
      <option>Semanas</option>
      <option>Tambor</option>
      <option>Megavoltampere</option>
      <option>TN</option>
      <option>Tonelada</option>
      <option>Toneladas/metro cúbico</option>
      <option>Toneladas EUA</option>
      <option>Tanque</option>
      <option>Unidade de atividade</option>
      <option>Unidades enzima</option>
      <option>Unidade formadora colonias/mL</option>
      <option>unidade formadora colonias/g</option>
      <option>Micrograma/ 100 gramas</option>
      <option>Um (1)</option>
      <option>Unidade</option>
      <option>URL/10cm2</option>
      <option>unidade pungência</option>
      <option>Voltampere</option>
      <option>Artigo de valor</option>
      <option>Condutibilidade térmica</option>
      <option>Velocidade de evaporação</option>
      <option>Jardas</option>
      <option>Jardas quadradas</option>
      <option>Jardas cúbicas</option>
      <option>Pallet</option>
      <option>Tonelada Movimentada</option>
      <option>Unidade</option>
      <option>centigrama/grama</option>
      <option>centímetro/30 segundos</option>
      <option>centímetro/minuto</option>
      <option>centímetro/15 segundos</option>
      <option>Gramas</option>
      <option>GRAMAS/100 QUILOGRAMAS</option>
      <option>GRAMAS/100 MILILITROS</option>
      <option>GRAMAS/80 GRAMAS</option>
      <option>QUILOGRAMAS/100 LITROS</option>
      <option>Quilograma força/centímetro²</option>
      <option>Quilograma/ metro² .segundo</option>
      <option>Quilogramas /10 litros</option>
      <option>Quilogramas /100 quilogramas</option>
      <option>SKB/g</option>
      <option>Quilograma/barril EUA</option>
      <option>Quilograma força/centímetro</option>
      <option>Micro Joule 100/Gramas</option>
      <option>QUILO JOULES / 100 GRAMAS</option>
      <option>milequivalente/quilo</option>
      <option>Mililitro</option>
      <option>MILILITROS/LITRO</option>
      <option>MILILITROS/100 QUILOGRAMAS</option>
      <option>MILILITROS/100 GRAMAS</option>
      <option>MILILITROS/TONELADA</option>
      <option>Resma</option>
      <option>Micrograma</option>
      <option>micrograma/litro</option>
      <option>micrograma/mililitro</option>
      <option>umol TE/g</option>
      <option>Bloco</option>
      <option>Ponto de Amolecimento</option>
      <option>Microampère</option>
      <option>Microfarad</option>
      <option>Micrograma/litro</option>
      <option>Microgramas/metro cúbico</option>
      <option>Microlitro</option>
      <option>Micrometro</option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="textinput">Fabricante</label>
  <div class="controls">
    <input id="textinput" name="fab" type="text" placeholder="CPF/CNPJ" class="input-xlarge" onKeyPress="return(soNums(event))" maxlength="18" onBlur="validar(this)" required="">
    </div>
</div>


<div class="control-group">
  <label class="control-label" for="textinput">Código da peça</label>
  <div class="controls">
    <input id="textinput" name="codfab" type="text" class="input-xlarge" required="">
   </div>
</div>


<div class="control-group">
  <label class="control-label" for="selectbasic">Classe de lote</label>
  <div class="controls">
    <select id="selectbasic" name="classlote" class="input-xlarge" required="">
      <option></option>
      <option>Dados característicos do container</option>
      <option>Dados do lote de entrada - Carga Geral</option>
      <option>Dados laudo de classificação de milho</option>
      <option>Dados laudo de classificação de soja</option>
      <option>Lote – Fertilizantes</option>
      <option>Materiais - Papel  Mto</option>
      <option>Materiais frigorificados</option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="checkboxes">Centros</label>
  <div class="controls">
    <label class="checkbox inline" for="checkboxes-0">
      <input type="checkbox" name="centro[]" value="PA01">
      PA01
    </label>
    <label class="checkbox inline" for="checkboxes-1">
      <input type="checkbox" name="centro[]" value="PA02">
      PA02
    </label>
    <label class="checkbox inline" for="checkboxes-2">
      <input type="checkbox" name="centro[]" value="PG01">
      PG01
    </label>
    <label class="checkbox inline" for="checkboxes-3">
      <input type="checkbox" name="centro[]" value="IT01">
      IT01
    </label>
    <label class="checkbox inline" for="checkboxes-4">
      <input type="checkbox" name="centro[]" value="RG01">
      RG01
    </label>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="checkboxes">Depósitos</label>
  <div class="controls">
      <label class="checkbox" for="checkboxes-0">
      <input type="checkbox" name="deposito[]" value="CG01 - Carga Geral">
      CG01 - Carga Geral
      </label>
      <label class="checkbox" for="checkboxes-1">
      <input type="checkbox" name="deposito[]" value="FR01 - Frigorifico">
      FR01 - Frigorifico
      </label>
      <label class="checkbox" for="checkboxes-2">
      <input type="checkbox" name="deposito[]" value="GC01 - Grão Convencional">
      GC01 - Grão Convencional
      </label>
      <label class="checkbox" for="checkboxes-3">
      <input type="checkbox" name="deposito[]" value="FE01 - Fertilizantes">
      FE01 - Fertilizantes
      </label>
      <label class="checkbox" for="checkboxes-4">
      <input type="checkbox" name="deposito[]" value="CV01 - Patio Container Vazio">
      CV01 - Patio Container Vazio
      </label>
      <label class="checkbox" for="checkboxes-5">
      <input type="checkbox" name="deposito[]" value="CC01 - Patio Container Cheio">
      CC01 - Patio Container Cheio
      </label>  
     </div>
   </div>

<div class="control-group">
  <label class="control-label" for="checkboxes">Controles</label>
  <div class="controls">
    <label class="checkbox inline" for="checkboxes-0">
      <input type="checkbox" name="controle[]" value="Estatístico SIF">
      Estatistico SIF
    </label>
    <label class="checkbox inline" for="checkboxes-1">
      <input type="checkbox" name="controle[]" value="Peso Bruto">
      Peso Bruto 
    </label>
     <a href="#myModa4" role="button" class="btn" data-toggle="modal"><i class="icon-question-sign"></i></a>
     </div>
   </div>

<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
  </div>
</div>

</fieldset>
</form>
<!-- Fim do formulário-->

</div>
</div>
</div>

<!-- Modais (efeito lightbox ) com mensagens informativas para o usuário. -->






<div id="errocodfab" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Atenção!</h3>
  </div>
  <div class="modal-body">
Essa solicitação já foi enviada ao Portal anteriormente. <a href="contato.php"> Clique aqui se deseja reforçar a solicitação ou fazer uma retificação.</a>
     </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
     </div>
</div>

<div id="erroopcao" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Atenção!</h3>
  </div>
  <div class="modal-body">
Você esqueceu de marcar alguma das opções: "Centros", "Depósitos" ou "Canais". Verifique e tente novamente.  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
     </div>
</div>

<div id="erromartini" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Atenção!</h3>
  </div>
  <div class="modal-body">
Você incluiu o CNPJ da própria Martini Meat como fabricante. Verifique e tente novamente.  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
     </div>
</div>

<div id="myModa4" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Controles</h3>
  </div>
  <div class="modal-body">
 <p><strong>Estatístico SIF:</strong> Para produtos frigoríficados, flegar quando se tratar dos produtos com controle estatístico SIF. Para o Carga Geral, somente flegar quando se tratar dos clientes Patense e Farima.</p>
 <p><strong>Peso Bruto:</strong> Somente para os SKIDS da Klabin este fleg de controle de peso bruto deverá estar ativo. Dica: São todos os materiais da Klabin que iniciam com a letra "F". Exemplo: F-CKF192.</p>
</div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
     </div>
</div>

<div id="erroncm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Atenção!</h3>
  </div>
  <div class="modal-body">
O NCM que você está tentando incluir não se encontra na base do SAP. Verificar com o Depto Fiscal.
     </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
     </div>
</div>

<div id="errocodfabc" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Atenção!</h3>
  </div>
  <div class="modal-body">
Esse material já está cadastrado no SAP, com o código  <? $linha=$_SESSION["linha"]; echo $linha; ?>.
     </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
     </div>
</div>


<!-- Modais globais e modais específicas da página -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/modals.php'); ?>
</body>
</html>