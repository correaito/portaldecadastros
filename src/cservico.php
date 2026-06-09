<?php
include("config.php"); //Arquivo configuração do BD
include("restrito.php"); //Arquivo para restrição da página para usuários logados

$sql_busca = "SELECT * FROM user WHERE login = '$login_usuario'";
$exe_busca = mysql_query($sql_busca) or die (mysql_error());
$fet_busca = mysql_fetch_assoc($exe_busca);
?>

<?php $pageTitle = 'Portal de Cadastro - Serviço Prestado'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/alerts.php'); ?>

<body>

  <!-- Inicio da barra do topo  -->

<?php include($_SERVER['DOCUMENT_ROOT'] . '/navbar.php'); ?>




<!-- Inicio da coluna 1 -->
<div class="row-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>



<!-- Início da coluna 2 -->
<div class="span12 main-content" id="page-content-wrapper">    

<div class="section">
  <p><i class="icon-th-list icon-white"></i> Cadastro de serviço prestado</p>     

   <div class="article"> 

<div class="container cadform">

<!-- Início da formulário -->
<form name="contactform" method="post" action="mailer_cservp.php" class="form-horizontal" role="form">
<fieldset>
<!-- Campo oculto com o nome do usuário -->
<input id="textinput" type="hidden" name="nome" type="text" onkeyup="up(this)" value="<? echo $_SESSION['nome'];?>" required="">

<div class="control-group">
  <label class="control-label" for="textinput">Descrição</label>
  <div class="controls">
    <input id="textinput" name="descricao" type="text" placeholder="Descrição completa do serviço" onkeyup="up(this)" class="input-xlarge" required="">
    </div>
</div>

<div class="control-group">
  <label class="control-label" for="textinput">NCM</label>
  <div class="controls">
   <input id="textinput" name="ncm" type="text" placeholder="0000.00.00" class="input-xlarge" required="">
    <div id="ncm_feedback" style="margin-top: 8px; display: none; font-size: 13px;"></div>
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
  <label class="control-label" for="checkboxes">Canais de distribuição</label>
  <div class="controls">
    <label class="checkbox" for="checkboxes-0">
      <input type="checkbox" name="canais[]" value="Intercompany">
      Intercompany
    </label>
    <label class="checkbox" for="checkboxes-1">
      <input type="checkbox" name="canais[]" value="Carga Geral">
      Carga Geral
    </label>
    <label class="checkbox" for="checkboxes-2">
      <input type="checkbox" name="canais[]" value="Patio">
      Patio
    </label>
    <label class="checkbox" for="checkboxes-3">
      <input type="checkbox" name="canais[]" value="Frigorífico">
      Frigorífico
    </label>
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





<div id="erroidem2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Atenção!</h3>
  </div>
  <div class="modal-body">
Esse serviço já está cadastrado no SAP, com o código  <? $linha=$_SESSION["linha"]; echo $linha; ?>.
     </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
     </div>
</div>

<!-- Modais globais e modais específicas da página -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/modals.php'); ?>
</body>
</html>