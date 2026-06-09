<?php      
    // Inicia a sessão e verifica se o usuário tem nível necessário para acessar a pagina
    if (!isset($_SESSION)) session_start();
      
    $nivel_necessario = 2;
      
    // Verifica se não há a variável da sessão que identifica o usuário
    if ($_SESSION['nivel'] != $nivel_necessario) {
        // Destrói a sessão por segurança
    header('Location: listagemadm.php?a=erro'); // se não tiver o nível necessário, redireciona para a página de relatórios com a mensagem de erro
        }
    ?>

<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<html lang="pt-br">
<title>Portal de Cadastro - Material Terceiro</title>
<html>
<head>
    
<!-- Arquivos Bootstrap/configuração/validação -->
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<script src="../js/bootstrap.js"></script>
<link href="../css/style.css" rel="stylesheet" rel="stylesheet">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="../img/logo.ico">


<?php 
include("../config.php"); // conexão com o BD

$ticket=$_GET['ticket'];

$infmp="SELECT * from contact where ticket='$ticket'";
$executa = mysql_query($infmp);

while ($reginfmp= mysql_fetch_array($executa))

{
$vsol=$reginfmp['solicitante'];
$vmotivo=$reginfmp['motivo'];
$vmesage=$reginfmp['mensagem'];
$vticket=$reginfmp['ticket'];
$vstatus=$reginfmp['status'];
$vcomentario=$reginfmp['comentario'];
}
?>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/navbar.php'); ?>

<div class="row-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>

<div class="span12 main-content" id="page-content-wrapper">





<style>
.cadform { background-color: #ffffff !important; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 0px !important; border: 1px solid #eaeaea; border-top: none !important; }
.cadform .container-fluid { padding: 30px 20px !important; border: none !important; box-shadow: none !important; background: transparent !important; }
</style>

<div class="section">
  <div style="display: flex; align-items: center; background-color: #3b5998; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 10px 15px;">
    <a href="javascript:window.history.go(-1)" style="color: #ffffff; margin-right: 15px; text-decoration: none; opacity: 0.8; font-size: 13px;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'"><i class="icon-arrow-left icon-white"></i> Voltar</a>
    <p style="margin-bottom: 0; color: white; font-weight: 600; border-left: 1px solid rgba(255,255,255,0.3); padding-left: 15px; font-size: 14px;"><i class="icon-edit icon-white"></i> Detalhes do Ticket</p>
  </div>
  <div class="cadform">
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">

<form action ="/listacontact/salvaralteracao.php" method="post" class="form-horizontal">
<fieldset>

<!-- Início do formulário -->


<div class="form-content">

<div class="control-group">
  <label class="control-label" for="Ticket">Solicitante</label>
  <div class="controls">
    <input id="Ticket" name="solicitante" value="<? echo $vsol;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
    </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Ticket</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vticket;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
    </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Motivo</label>
  <div class="controls">
    <input id="Ticket" name="motivo" value="<? echo $vmotivo;?>" type="text" readonly="yes"placeholder="" class="input-xlarge">
    </div>
</div>

<div class="control-group">
  <label class="control-label" type="text">Mensagem</label>
  <div class="controls">                     
    <textarea id="textarea" name="mensagem" style="width: 60%" rows="4" readonly="yes"><?php echo $vmesage; ?></textarea>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="selectbasic">Status</label>
  <div class="controls">
    <select id="selectbasic" name="status" class="input-xlarge">
      <option>Pendente</option>
      <option>Atendido</option>
      <option>Recusado</option>
      <option selected><? echo $vstatus ?></option>
      </select>
  </div>
</div>

<div class="control-group">
  <label class="control-label" type="text">Resposta da Equipe</label>
  <div class="controls">                     
    <textarea id="textarea" name="comentarios" style="width: 60%" rows="4"><? echo $vcomentario;?></textarea>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Atualizar</button>
  </div>
</div>

</fieldset>
</form>
<!-- Fim do formulário -->

        </div> <!-- end row-fluid inside container -->
      </div> <!-- end container-fluid -->
    </div> <!-- end cadform -->
  </div> <!-- end section -->
</div> <!-- end page-content-wrapper -->
</div> <!-- end row-fluid (main) -->
</html>
