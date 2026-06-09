<?php
include("config.php"); //Arquivo configuração do BD
include("restrito.php"); //Arquivo para restrição da página para usuários logados

$sql_busca = "SELECT * FROM user WHERE login = '$login_usuario'";
$exe_busca = mysql_query($sql_busca) or die (mysql_error());
$fet_busca = mysql_fetch_assoc($exe_busca);
?>

<?php $pageTitle = 'Portal de Cadastro - Dashboard'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/alerts.php'); ?>

<?php
if (isset($_GET['a']) && $_GET['a'] == 'erro'){
?>
<script language="JavaScript">
alert('Você não tem privilégio administrativo para acessar essa página.');
</script>
<?php } ?>

<body>


 <!-- Inicio da barra do topo  -->

<?php include($_SERVER['DOCUMENT_ROOT'] . '/navbar.php'); ?>


 <!-- Inicio da coluna 1 -->
<div class="row-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>


<!-- Início da coluna 2 -->
<div class="span12 main-content" id="page-content-wrapper">    

<div class="section">
<p><i class="icon-th-list icon-white"></i> Cadastro de material próprio</p>     

</div>
   <div class="article"> 


<div class="container cadform">

<!-- Início da formulário -->
<form name="f1" method="post" action="mailer_cmp.php" class="form-horizontal" role="form">
<fieldset>

<!-- Campo oculto com o nome do usuário -->
<input id="textinput" type="hidden" name="nome" type="text" onkeyup="up(this)" value="<? echo $_SESSION['nome'];?>" required="">

<div class="control-group">
  <label class="control-label" for="textinput">Descrição</label>
  <div class="controls">
    <input id="textinput" name="descricao" type="text" placeholder="Descrição do material" onkeyup="up(this)" class="input-xlarge" required="">
    </div>
</div>


<div class="control-group">
  <label class="control-label" for="selectbasic">Unidade de medida</label>
  <div class="controls">
    <select id="selectbasic" name="unimed" class="input-xlarge" required="">
      <option></option>
      <option>/10 gramas</option>
      <option>/100 gramas</option>
      <option>/100 mililitros</option>
      <option>/20 gramas</option>
      <option>/25 gramas</option>
      <option>/250 gramas</option>
      <option>/gramas</option>
      <option>1 / metro quadrado</option>
      <option>1/Minute</option>
      <option>Acidez</option>
      <option>Acre</option>
      <option>Anos (annum)</option>
      <option>Apontamento Diario</option>
      <option>Artigo de valor</option>
      <option>Balde</option>
      <option>Barra</option>
      <option>Barrica</option>
      <option>Big Bag</option>
      <option>Bloco</option>
      <option>Bobinas</option>
      <option>Bombona</option>
      <option>Brix</option>
      <option>Cada</option>
      <option>Caixa</option>
      <option>Caixa de papelão</option>
      <option>Caixote</option>
      <option>Capacidade térmica específica</option>
      <option>centigrama/grama</option>
      <option>Centilitro</option>
      <option>Centímetro</option>
      <option>Centímetro cúbico</option>
      <option>Centímetro quadrado</option>
      <option>centímetro/15 segundos</option>
      <option>centímetro/30 segundos</option>
      <option>centímetro/minuto</option>
      <option>Centímetros cúbicos/segundo</option>
      <option>Centímetros/segundo</option>
      <option>Cento</option>
      <option>Chapa</option>
      <option>Cilindro</option>
      <option>Comprimento em m/unidade</option>
      <option>Condutibilidade térmica</option>
      <option>Conjunto</option>
      <option>Container</option>
      <option>Crédito</option>
      <option>DE MASSA</option>
      <option>DE PRODUTO PRONTO PARA CONSUMO</option>
      <option>Decímetro</option>
      <option>Decímetro cúbico</option>
      <option>Dias</option>
      <option>Dúzia</option>
      <option>EM EMULSÃO</option>
      <option>EM PASTILHA</option>
      <option>EM SABONETE</option>
      <option>EM SALMOURA</option>
      <option>EM SOLUÇÃO</option>
      <option>EM XAROPE</option>
      <option>Embalagem Padrão Campinas</option>
      <option>Embalagem Padrão Campinas /MIL</option>
      <option>Embalagem Padrão Estancia /MIL</option>
      <option>Embalagem Padrão Jaraguá</option>
      <option>Embalagem Padrão Jaraguá / MIL</option>
      <option>Embalagem Padrão Manaus</option>
      <option>Embalagem Padrão Manaus / MIL</option>
      <option>Embalagem Padrão Nordeste</option>
      <option>Fardo</option>
      <option>Feixe</option>
      <option>Folhas</option>
      <option>Frasco</option>
      <option>Função</option>
      <option>Galão</option>
      <option>Galão EUA</option>
      <option>Galões por hora (US)</option>
      <option>Galões por milha (US)</option>
      <option>Garafão</option>
      <option>Garrafa</option>
      <option>Gay Lussac</option>
      <option>Gigajoule</option>
      <option>Gigaohm</option>
      <option>Grade</option>
      <option>Grama - ingrediente ativo</option>
      <option>Grama IngrAtivo / litro</option>
      <option>Grama ouro</option>
      <option>Grama/centímetro cúbico</option>
      <option>Gramas</option>
      <option>gramas/ mililitros</option>
      <option>GRAMAS/100 GRAMAS</option>
      <option>GRAMAS/100 LITROS</option>
      <option>GRAMAS/100 MILILITROS</option>
      <option>GRAMAS/100 QUILOGRAMAS</option>
      <option>GRAMAS/80 GRAMAS</option>
      <option>GRAMAS/LITROS</option>
      <option>Gramas/metro cúbico</option>
      <option>Gramas/metro quadrado</option>
      <option>Gramas/mol</option>
      <option>Graus</option>
      <option>Hectares</option>
      <option>Hectolitro</option>
      <option>Hora</option>
      <option>Horas</option>
      <option>Horas de crédito</option>
      <option>Itens</option>
      <option>Jardas</option>
      <option>Jardas cúbicas</option>
      <option>Jardas quadradas</option>
      <option>Joule/mole</option>
      <option>Joules/quilograma</option>
      <option>KCalorias 100 gramas</option>
      <option>Kelvin/minuto</option>
      <option>Kelvin/segundo</option>
      <option>kg DE MASSA</option>
      <option>kg DE PÓ</option>
      <option>kg DE PRODUTO FINAL</option>
      <option>kg ingrediente ativo / kg</option>
      <option>Kilomol</option>
      <option>Kilonewton</option>
      <option>Kilopascal</option>
      <option>Kilovoltampere</option>
      <option>Kits</option>
      <option>L DE BEBIDA FINAL</option>
      <option>L DE XAROPE COMPOSTO</option>
      <option>Libra EUA</option>
      <option>Litro</option>
      <option>LITRO/TONELADA</option>
      <option>Litros por 100 km</option>
      <option>Litros por hora</option>
      <option>LITROS/100 LITROS</option>
      <option>Litros/minuto</option>
      <option>Litros/molsegundo</option>
      <option>Maço</option>
      <option>Maiúsculas</option>
      <option>Megajoule</option>
      <option>Meganewton</option>
      <option>Megaohm</option>
      <option>Megavolt</option>
      <option>Megavoltampere</option>
      <option>Megawatt hora</option>
      <option>Meses</option>
      <option>Metro</option>
      <option>Metro cúbico</option>
      <option>Metro cúbico/dia</option>
      <option>Metro cúbico/hora</option>
      <option>Metro cúbico/segundo</option>
      <option>Metro quadrado</option>
      <option>Metro/segundo</option>
      <option>Metro/segundo quadrado</option>
      <option>Metros quadrados/segundo</option>
      <option>Metros/hora</option>
      <option>Metros/minuto</option>
      <option>Micro Joule 100/Gramas</option>
      <option>Microampère</option>
      <option>Microfarad</option>
      <option>Micrograma</option>
      <option>Micrograma 100 gramas</option>
      <option>Micrograma/ 100 gramas</option>
      <option>micrograma/litro</option>
      <option>Micrograma/litro</option>
      <option>micrograma/mililitro</option>
      <option>Microgramas/metro cúbico</option>
      <option>Microlitro</option>
      <option>Micrometro</option>
      <option>Microsegundos</option>
      <option>Microsiemens por centímetro</option>
      <option>milequivalente/quilo</option>
      <option>Milha</option>
      <option>Milhares</option>
      <option>Milhas por galão (US)</option>
      <option>Milhas quadradas</option>
      <option>Miliequivalente/100 gramas</option>
      <option>Milifarad</option>
      <option>Miligrama</option>
      <option>Miligrama/100 gramas</option>
      <option>Miligrama/100 mililitros</option>
      <option>Miligrama/litro</option>
      <option>Miligramas de KOH/gramas</option>
      <option>Miligramas/metro cúbico</option>
      <option>Mililitro</option>
      <option>Mililitro - ingrediente ativo</option>
      <option>MILILITROS/100 GRAMAS</option>
      <option>MILILITROS/100 LITROS</option>
      <option>Mililitros/100 mililitros</option>
      <option>MILILITROS/100 QUILOGRAMAS</option>
      <option>MILILITROS/LITRO</option>
      <option>MILILITROS/TONELADA</option>
      <option>Milímetro</option>
      <option>Milímetro cúbico</option>
      <option>Milímetros quadrados</option>
      <option>Milinewton/metro</option>
      <option>Milipascal/segundos</option>
      <option>Milisegundos</option>
      <option>Millimol por litro</option>
      <option>Minuto</option>
      <option>Mol por litro</option>
      <option>Mol por metro cúbico</option>
      <option>Nanoampere</option>
      <option>Nanofarad</option>
      <option>Nanômetro</option>
      <option>Nano-segundos</option>
      <option>Newton/metro</option>
      <option>Newton/milímetro quadrado</option>
      <option>Nº de pessoas</option>
      <option>Número Máximo Permitido/gramas</option>
      <option>Onça</option>
      <option>Onça líquida EUA</option>
      <option>Pacote</option>
      <option>Palete</option>
      <option>Palete</option>
      <option>Pallet</option>
      <option>Pares</option>
      <option>Partes por bilhões</option>
      <option>Partes por milhão</option>
      <option>Parts per trilhão</option>
      <option>Pascal-segundo</option>
      <option>Pé cúbico</option>
      <option>Peça</option>
      <option>Percentual de Área</option>
      <option>Permilagem</option>
      <option>Pés</option>
      <option>Pés quadrados</option>
      <option>Picofarad</option>
      <option>Picosegundo</option>
      <option>Pinta líquida EUA</option>
      <option>Polegada (inch)</option>
      <option>Polegadas cúbicas</option>
      <option>Ponto de Amolecimento</option>
      <option>Pontos</option>
      <option>Porcentagem</option>
      <option>Pote</option>
      <option>Quarto, líquido EUA</option>
      <option>QUILO JOULES / 100 GRAMAS</option>
      <option>Quilograma</option>
      <option>Quilograma - ingrediente ativo</option>
      <option>Quilograma força/centímetro</option>
      <option>Quilograma força/centímetro²</option>
      <option>Quilograma/ metro² .segundo</option>
      <option>Quilograma/barril EUA</option>
      <option>Quilograma/metro quadrado seg</option>
      <option>Quilogramas /10 litros</option>
      <option>Quilogramas /100 quilogramas</option>
      <option>QUILOGRAMAS/100 LITROS</option>
      <option>Quilogramas/decímetro cúbico</option>
      <option>Quilogramas/metro cúbico</option>
      <option>Quilogramas/mol</option>
      <option>Quilogramas/segundo</option>
      <option>Quilojoule/mole</option>
      <option>Quilojoules/quilograma</option>
      <option>Quilômetro</option>
      <option>Quilômetro quadrado</option>
      <option>Quilômetros/hora</option>
      <option>Quilotoneladas</option>
      <option>Quota grp.empresas em %</option>
      <option>Recipiente</option>
      <option>Refil</option>
      <option>Resistência elétrica espec.</option>
      <option>Resistência elétrica espec.</option>
      <option>Resma</option>
      <option>Rolo</option>
      <option>Saco</option>
      <option>Semanas</option>
      <option>Serviços</option>
      <option>Siemens por metro</option>
      <option>SKB/g</option>
      <option>SOBRE O PÓ</option>
      <option>SOBRE O PRODUTO FINAL</option>
      <option>Tambor</option>
      <option>Tanque</option>
      <option>Taxa de permeação</option>
      <option>Taxa de permeação SI</option>
      <option>TN</option>
      <option>Tonelada</option>
      <option>Tonelada Movimentada</option>
      <option>Toneladas EUA</option>
      <option>Toneladas/metro cúbico</option>
      <option>Um (1)</option>
      <option>umol TE/g</option>
      <option>Unidade</option>
      <option>Unidade de atividade</option>
      <option>unidade formadora colonias/g</option>
      <option>Unidade formadora colonias/mL</option>
      <option>Unidade Nefelométrica Turbidez</option>
      <option>unidade pungência</option>
      <option>Unidades enzima</option>
      <option>Unidades enzima/mililitro</option>
      <option>URL/10cm2</option>
      <option>Valor de pH</option>
      <option>Velocidade de evaporação</option>
      <option>Voltampere</option>
    </select>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="textinput">NCM</label>
  <div class="controls">
   <input id="textinput"  name="ncm" type="text" type="text" onKeyPress="MascaraNCM(f1.ncm);" 
maxlength="10" onBlur="ValidaNCM(f1.ncm);" class="input-xlarge" required="">
    <div id="ncm_feedback" style="margin-top: 8px; display: none; font-size: 13px;"></div>
</div>
</div>

<div class="control-group">
  <label class="control-label" for="textinput">Código da peça</label>
  <div class="controls">
    <input id="textinput" name="codfab" type="text" placeholder="Digite o código" class="input-xlarge" onkeyup="up(this)">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="textinput">Fabricante</label>
  <div class="controls">
    <input id="textinput" name="fab" type="text" placeholder="CNPJ ou código SAP" onKeyPress="return(soNums(event))" class="input-xlarge">
    </div>
</div>

<div class="control-group">
  <label class="control-label" for="centro">Centro</label>
  <div class="controls">
    <label class="checkbox inline" for="centro-0">
      <input type="checkbox" name="centro[]" value="PA01">
      PA01
    </label>
    <label class="checkbox inline" for="centro-1">
      <input type="checkbox" name="centro[]" value="PA02">
      PA02
    </label>
    <label class="checkbox inline" for="centro-2">
      <input type="checkbox" name="centro[]" value="PG01">
      PG01
    </label>
    <label class="checkbox inline" for="centro-3">
      <input type="checkbox" name="centro[]" value="IT01">
      IT01
    </label>
    <label class="checkbox inline" for="centro-4">
      <input type="checkbox" name="centro[]" value="RG01">
      RG01
    </label>
  </div>
</div>

<div class="control-group">
<label class="control-label" for="selectbasic">Tipo Material</label>
<div class="controls">
<select id="selectbasic" onchange="cambia_classeav()" name="grupomerc" class="input-xlarge" required="">
<option value="0" selected>Selecione...
<option value="ZAPE">ZAPE - Apeação </option>
<option value="ZEXP">ZEXP - Expediente</option>
<option value="ZFER">ZFER - Ferramentas</option>
<option value="ZMAN">ZMAN - Manut. Predial</option>
<option value="ZSAU">ZSAU - Saúde ocupacional</option>
<option value="ZSEG">ZSEG - Segurança</option>
<option value="ZVEI">ZVEI - Peças de veículos</option>
<option value="ZNAV">ZNAV - Mat. não avaliado</option>
<option value="ZCOM">ZCOM - Combust. e Lubrificantes</option>
</select>
</div>
</div>

<div class="control-group">
  <label class="control-label" for="selectbasic">Aplicação</label>
  <div class="controls">
    <select id="selectbasic" name="classeav" class="input-xlarge" required="">
     <option value="-">-
    </select>
     <a href="#myModal" role="button" class="btn" data-toggle="modal"><i class="icon-question-sign"></i></a>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="selectbasic">Utilização material</label>
  <div class="controls">
    <select id="selectbasic" name="credito" class="input-xlarge" required="">
      <option></option>
 <option>Continuação processamento - Direito a crédito</option>
 <option>Consumo - Sem direito a crédito</option>
 <option>DIEN - Serviço</option>
 </select>
  <a href="#myModa2" role="button" class="btn" data-toggle="modal"><i class="icon-question-sign"></i></a>
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

     
<!-- Modais (efeito lightbox ) com mensagens informativas para o usuário. -->

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Como aplicar corretamente?</h3>
  </div>
  <div class="modal-body">
 <p><strong>Mat.Emb. e apeação carga:</strong> material utilizado para embalamento e apeação de cargas de clientes Martini</p>
 <p><strong>Mat.Manut.Cons.Maq.Equip.:</strong> materiais para manutenção de veiculos operacionais, empilhadeiras, guindastes, etc</p>
 <p><strong>Material de Expediente:</strong> papeis, canetas, mat. uso geral escritório</p>
 <p><strong>Ferramentas e utensílios:</strong> chaves de fenda, termometros, etc.</p>
 <p><strong>Mat.Manut.Cons.Mov.Utens.:</strong> Reparos de cadeiras, mesas, armários, etc.</p>
 <p><strong>Saúde ocupacional:</strong> material caixa de primeiros socorros, bandagens, etc</p>
 <p><strong>Equipamentos de segurança:</strong> uniformes e EPI's</p>
 <p><strong>Peças e aces. de veículos:</strong> peças para manutenção dos veiculos leves. Ex: carros de passeio.</p>
 <p><strong>Prod. acabado de terceiro:</strong> material estocado em nossos armazens</p>
 <p><strong>Material não avaliado:</strong> imobilizado, sucata, sobras destinadas a vendas, etc.</p>
 <p><strong>Material de TI:</strong> roteadores, teclado, mouse, etc</p>
 <p><strong>Material de copa/cozinha:</strong> utensilios de cozinha, bebidas, chá, café. Lanches e outras refeições que não fazem parte do PAT (Programa de Alimentação do Trabalhador)</p>
 <p><strong>Mat.higiene/limpeza:</strong> produtos para limpeza de sanitários e geral, produtos de higiene. </p>
 <p><strong>Bens de pequeno valor:</strong> bens duráveis, porém com valor abaixo de imobilização. Ex.: escrivaninhas, cadeiras simples, balcões, puxadores de porta, suportes de parede, etc.</p>
 <p><strong>Festas e recepções:</strong> materiais para organização de festas, confraternizações da Martini e recepções a clientes</p>
 <p><strong>Brindes:</strong> brindes a clientes Martini e funcionários. </p>
 <p><strong>Mat.man.edificações:</strong> material de construção, para reformas estruturais no predio (tijolo, cimento, cinzel, canos de pvc, brocas, pregos, etc)</p>
 <p><strong>Gas Amonia:</strong> gás amonia utilizado no compressor do frigorífico.</p>
 <p><strong>Gastos Segurança Predial:</strong> materiais de combate a incendio, monitoramento, etc.</p>
  </div>
  <div class="modal-footer">
 <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  </div>
</div>

<div id="myModa2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Utilização do material?</h3>
  </div>
  <div class="modal-body">
 <p><strong>Continuação processamento:</strong> insumos, materiais aplicados nas operações (apeação, cintamento, unitização) da Martini. Materiais aplicados na manutenção de veiculos operacionais (Ex. empilhadeiras, stackers, tractors, etc) e materiais aplicados na manutenção predial (tijolo, cimento, tubos e conexões de pvc, lâmpadas fluorescentes, etc)</p>
 <p><strong>Consumo:</strong> para consumo próprio da empresa (materiais de expediente, mat. para manutenção de veiculos convencionais/passeio)</p>
 <p><strong>DIEN - Serviço:</strong> para serviços tomados (manutenção predial, manutenção de empilhadeiras, etc)</p>
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
Você precisa marcar pelo menos um centro.
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


<div id="erroidem" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Atenção!</h3>
  </div>
  <div class="modal-body">
Esse material já foi enviado ao Portal numa solicitação de cadastro anterior.
     </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
     </div>
</div>

<div id="erroidem2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Atenção!</h3>
  </div>
  <div class="modal-body">
Esse material já está cadastrado no SAP, com o código <? $linha=$_SESSION["linha"]; echo $linha; ?>. 
     </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
     </div>
</div>



  <!-- Modais globais e modais específicas da página -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/modals.php'); ?>
</body>
</html>