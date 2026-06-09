<?php
include("config.php"); //Arquivo configuração do BD
include("restrito.php"); //Arquivo para restrição da página para usuários logados

$sql_busca = "SELECT * FROM user WHERE login = '$login_usuario'";
$exe_busca = mysql_query($sql_busca) or die (mysql_error());
$fet_busca = mysql_fetch_assoc($exe_busca);
?>

<?php $pageTitle = 'Portal de Cadastro - Cliente'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/alerts.php'); ?>

<?php
if (isset($_GET['a']) && $_GET['a'] == 'erro'){
?>
<script language="JavaScript">
alert('Você esqueceu de marcar pelo menos uma opção nas Organizações ou Canais de distribuição.');
</script>
<?php } ?>

  <body>

  <!-- Inicio da navbar do topo  -->

<?php include($_SERVER['DOCUMENT_ROOT'] . '/navbar.php'); ?>




<!-- Inicio da coluna 1 -->
<div class="row-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>


<!-- Início da coluna 2 -->

<div class="span12 main-content" id="page-content-wrapper">    

<div class="section">
  <p><i class="icon-th-list icon-white"></i> Cadastro de Cliente</p>     
    <div class="article"> 
        <div class="container cadform">

<!-- Início do formulário -->

<form name="contactform" method="post" action="mailer_client.php" class="form-horizontal" role="form">
<fieldset>

<!-- Campo oculto com o nome do usuário -->
<input id="textinput" type="hidden" name="nome" type="text" onkeyup="up(this)" value="<? echo $_SESSION['nome'];?>" required="">


<div class="control-group">
  <label class="control-label" for="checkboxes">Organizações</label>
  <div class="controls">
    <label class="checkbox" for="checkboxes-0">
      <input type="checkbox" name="organizacao[]" value="Org.Vendas Matriz">
      Org.Vendas Matriz
    </label>
    <label class="checkbox" for="checkboxes-1">
      <input type="checkbox" name="organizacao[]" value="Org.Vendas PG">
      Org.Vendas PG
    </label>
    <label class="checkbox" for="checkboxes-2">
      <input type="checkbox" name="organizacao[]" value="Org.Vendas Rio G.">
      Org.Vendas Rio G.
    </label>
    <label class="checkbox" for="checkboxes-3">
      <input type="checkbox" name="organizacao[]" value="Org.Vendas Itajai">
      Org.Vendas Itajai
    </label>
    <label class="checkbox" for="checkboxes-4">
      <input type="checkbox" name="organizacao[]" value="Org.Vendas Porto">
      Org.Vendas Porto
    </label>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="checkboxes">Canais de distribuição</label>
  <div class="controls">
    <label class="checkbox" for="checkboxes-0">
      <input type="checkbox" name="canais[]" value="Carga Geral">
      Carga Geral
    </label>
    <label class="checkbox" for="checkboxes-1">
      <input type="checkbox" name="canais[]" value="Frigorífico">
      Frigorífico
    </label>
    <label class="checkbox" for="checkboxes-2">
      <input type="checkbox" name="canais[]" value="Pátio">
      Pátio
    </label>
    </div>
</div>

<div class="control-group">
  <label class="control-label" for="selectbasic">Grupo de Contas</label>
  <div class="controls">
    <select id="selectbasic" name="grupoconta" class="input-xlarge" required="">
  <option></option>
  <option>Clientes Pessoa Jurídica</option>
  <option>Clientes Pessoa Física</option>
  <option>Coligada/Controlada</option>
  <option>Clientes Funcionário</option>
  <option>Clientes Extrangeiros</option>
  <option>Clientes Ocasional</option>
    </select>
  </div>
</div>

<!-- Campos Razão e Fantasia-->
<div class="control-group controls-row">
  <label class="control-label" for="textinput">Razão Social/Fantasia</label>
  <div class="controls">
    <input id="textinput" class="span3" name="razao" type="text" placeholder="Digite o nome ou Razão Social" onkeyup="up(this)" class="input-xlarge" required="">    
    <input id="textinput" class="span3" name="fantasia" type="text" placeholder="Fantasia" onkeyup="up(this)" class="input-xlarge" required="">
    </div>
  </div>

<div class="control-group">
  <label class="control-label" for="textinput">CNPJ/CPF</label>
  <div class="controls">
    <input id="textinput" name="cnpj" type="text" placeholder="CPF/CNPJ" onKeyPress="return(soNums(event))" maxlength="18" onBlur="validar(this)" class="input-xlarge" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="textinput">Inscrição Estadual</label>
  <div class="controls">
    <input id="textinput" name="inscricao" type="text" placeholder="Se isento, digite 000" onKeyPress="return(soNums(event))" class="input-xlarge" required="">
     </div>
</div>

<div class="control-group">
  <label class="control-label" for="textinput">Inscrição municipal</label>
  <div class="controls">
    <input id="textinput" name="incrimun" type="text" placeholder="Se isento, digite 000" onkeyup="up(this)" class="input-xlarge" required="">
     </div>
</div>

<div class="control-group controls-row">
  <label class="control-label" for="textinput">Endereço, nº</label>
  <div class="controls">
    <input id="textinput" class="span3" name="endereco" type="text" placeholder="Digite o endereço" onkeyup="up(this)" class="input-xlarge" required="">    
    <input id="textinput" class="span1" name="numero" type="text" placeholder="Nº" class="input-xlarge" onkeyup="up(this)" required="">
    </div>
  </div>

<div class="control-group">
  <label class="control-label" for="textinput">Bairro</label>
  <div class="controls">
    <input id="textinput" name="bairro" type="text" placeholder="Digite o bairro" onkeyup="up(this)" class="input-xlarge" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="textinput">Cidade</label>
  <div class="controls">
    <input id="textinput" name="cidade" type="text" placeholder="Digite a cidade" onkeyup="up(this)" class="input-xlarge" required="">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="selectbasic">Estado</label>
  <div class="controls">
    <select id="selectbasic" name="estado" class="input-xlarge" required="">
      <option></option>
      <option>Acre</option>
      <option>Alagoas</option>
      <option>Amazonas</option>
      <option>Amapá</option>
      <option>Bahia</option>
      <option>Ceará</option>
      <option>Brasília</option>
      <option>Espírito Santo</option>
      <option>EXTERIOR</option>
      <option>Goiás</option>
      <option>Maranhão</option>
      <option>Minas Gerais</option>
      <option>Mato Grosso do Sul</option>
      <option>Mato Grosso</option>
      <option>Pará</option>
      <option>Paraíba</option>
      <option>Pernambuco</option>
      <option>Piauí</option>
      <option>Paraná</option>
      <option>Rio de Janeiro</option>
      <option>Rio Grande do Norte</option>
      <option>Rondônia</option>
      <option>Roraima</option>
      <option>Rio Grande do Sul</option>
      <option>Santa Catarina</option>
      <option>Sergipe</option>
      <option>São Paulo</option>
      <option>Tocantins</option>
      <option>Exterior</option>
    </select>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="textinput">CEP</label>
  <div class="controls">
    <input id="textinput" name="cep" type="text" onKeyPress="MascaraCep(contactform.cep);"
 maxlength="9" onBlur="ValidaCep(contactform.cep)" class="input-xlarge" required="">
   </div>
</div>

<div class="control-group">
  <label class="control-label" for="textinput">Telefone</label>
  <div class="controls">
    <input id="textinput" name="telefone" type="text" onKeyPress="MascaraTelefone(contactform.telefone);" 
maxlength="13"  onBlur="ValidaTelefone(contactform.telefone);" class="input-xlarge">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="textinput">E-mail</label>
  <div class="controls">
    <input id="textinput" name="email1" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="nome@dominio.com" class="input-xlarge">
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
<!-- Fim do formulário. -->

</div>
</div>
</div>

<!-- Modais (efeito lightbox ) com mensagens informativas para o usuário. -->
     









<!-- Modais globais e modais específicas da página -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/modals.php'); ?>
</body>
</html>