<?php
include("config.php"); //Arquivo configuração do BD
include("restrito.php"); //Arquivo para restrição da página para usuários logados

$sql_busca = "SELECT * FROM user WHERE login = '$login_usuario'";
$exe_busca = mysql_query($sql_busca) or die (mysql_error());
$fet_busca = mysql_fetch_assoc($exe_busca);
?>

<?php $pageTitle = 'Portal de Cadastro - Dados Bancários'; ?>
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
  <p><i class="icon-th-list icon-white"></i> Envio de dados bancários</p>     
       <div class="article"> 


<div class="container cadform">

<!-- Início da formulário -->
<form name="contactform" method="post" action="mailer_banc.php" class="form-horizontal" role="form">

<fieldset>
  
<!-- Campo oculto com o nome do usuário -->
<input id="textinput" type="hidden" name="nome" type="text" onkeyup="up(this)" value="<? echo $_SESSION['nome'];?>" required="">


<div class="control-group">
  <label class="control-label" for="selectbasic">Categoria</label>
  <div class="controls">
    <select id="selectbasic" name="categoria" class="input-xlarge" required="">
      <option></option>
      <option>Fornecedor</option>
      <option>Cliente</option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="textinput">CNPJ</label>
  <div class="controls">
    <input id="textinput" name="cnpj" type="text" placeholder="Digite o CNPJ" class="input-xlarge" required="">
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="textinput">Banco</label>
  <div class="controls">
    <input id="textinput" name="banco" type="text" placeholder="Ex. Guanabara" class="input-xlarge" required="">
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="textinput">Chave de banco</label>
  <div class="controls">
    <input id="textinput" name="chave" type="text" placeholder="Digite a chave de banco" class="input-xlarge">
    </div>
</div>


<div class="control-group">
  <label class="control-label" for="textinput">Conta</label>
  <div class="controls">
    <input id="textinput" name="conta" type="text" placeholder="Digite o numero da conta" class="input-xlarge">
   </div>
</div>


<div class="control-group">
  <label class="control-label" for="textinput">Controle (CC)</label>
  <div class="controls">
    <input id="textinput" name="controle" type="text" placeholder="CC" class="input-xlarge">
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="checkboxes">Formas de pagamento</label>
  <div class="controls">
    <label class="checkbox" for="checkboxes-0">
      <input type="checkbox" name="pagamento[]" value="DOC">
      DOC
    </label>
    <label class="checkbox" for="checkboxes-1">
      <input type="checkbox" name="pagamento[]" value="TED">
      TED
    </label>
    <label class="checkbox" for="checkboxes-2">
      <input type="checkbox" name="pagamento[]" value="Transferência">
      Transferência
    </label>
    <label class="checkbox" for="checkboxes-3">
      <input type="checkbox" name="name=pagamento[]" value="Tributos/Concess. Codigo Barra">
      Tributos/Concess. Codigo Barra
    </label>
    <label class="checkbox" for="checkboxes-4">
      <input type="checkbox" name="pagamento[]" value="Tributos/Concess. S/ Cod Barra">
      Tributos/Concess. S/ Cod Barra
    </label>
    <label class="checkbox" for="checkboxes-5">
      <input type="checkbox" name="pagamento[]" value="Boleto - Cobrança Escritural">
      Boleto - Cobrança Escritural
    </label>
    <label class="checkbox" for="checkboxes-6">
      <input type="checkbox" name="pagamento[]" value="Boleto - Pagamentos">
      Boleto - Pagamentos
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





     


<!-- Modais globais e modais específicas da página -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/modals.php'); ?>
</body>
</html>