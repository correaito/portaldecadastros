<?php
include("config.php"); //Arquivo configuração do BD
include("restrito.php"); //Arquivo para restrição da página para usuários logados

$sql_busca = "SELECT * FROM user WHERE login = '$login_usuario'";
$exe_busca = mysql_query($sql_busca) or die (mysql_error());
$fet_busca = mysql_fetch_assoc($exe_busca);
?>

<?php $pageTitle = 'Portal de Cadastro - Abertura de Chamados'; ?>
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
  <p><i class="icon-th-list icon-white"></i> Contato</p>     

       <div class="article"> 


<div class="container cadform">

<!-- Início da formulário -->
<form name="contactform" method="post" action="mailer_contact.php" class="form-horizontal" role="form">

<fieldset>
<!-- Campo oculto com o nome do usuário -->
<input id="textinput" type="hidden" name="nome" type="text" onkeyup="up(this)" value="<? echo $_SESSION['nome'];?>" required="">

<div class="control-group">
  <label class="control-label" for="selectbasic">Motivo do contato</label>
  <div class="controls">
    <select id="selectbasic" name="motivo" class="input-xlarge" required="">
      <option></option>
      <option>Alteração de cadastro</option>
      <option>Expansão de cadastro</option>
      <option>Eliminação de cadastro</option>
      <option>Divergência em cadastro</option>
      <option>Sugestão melhoria do Portal</option>
      <option>Retificação</option>
      <option>Outro</option>
    </select>
  </div>
</div>

<div class="control-group">
  <label class="control-label" type="text">Mensagem</label>
  <div class="controls">                     
    <textarea id="textarea" name="mensagem" style="width: 60%" rows="4" required=""></textarea>
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






     


<!-- Modais globais e modais específicas da página -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/modals.php'); ?>
</body>
</html>