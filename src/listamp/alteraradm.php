<?php      
    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();
      
    $nivel_necessario = 2;
      
    // Verifica se não há a variável da sessão que identifica o usuário
    if ($_SESSION['nivel'] != $nivel_necessario) {
        // Destrói a sessão por segurança
    header('Location: listagemadm.php?a=erro');
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
include("../config.php"); // conexão com BD

$ticket=$_GET['ticket']; // Captura o número de ticket da solicitação, no link

$infmp="SELECT * from cadmatp where ticket='$ticket'"; // Consulta no BD, todas as entradas com o número do ticket capturado
$executa = mysql_query($infmp); // Faz a contagem das consultas encontradas no BD, para o ticket procurado

while ($reginfmp= mysql_fetch_array($executa)) // Extrai todas as informações do ticket encontrado e memoriza em reginfmp

{ // Distribui todas as informações memorizadas dos campos do ticket para as strings abaixo
$vsol=$reginfmp['solicitante'];
$vdesc=$reginfmp['descricao'];
$vumied=$reginfmp['unimed'];
$vncm=$reginfmp['ncm'];
$vcodfab=$reginfmp['codfab'];
$vfab=$reginfmp['fab'];
$vcentros=$reginfmp['centros'];
$vgrupomerc=$reginfmp['grupomerc'];
$valiacao=$reginfmp['avaliacao'];
$vcredito=$reginfmp['credito'];
$vticket=$reginfmp['ticket'];
$vstatus=$reginfmp['Status'];
$vcoment=$reginfmp['comentario'];
}

?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/navbar.php'); ?>

<div class="row-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>

<div class="span12 main-content" id="page-content-wrapper">




<style>
.cadform { background-color: #ffffff !important; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 0px !important; border: 1px solid #eaeaea; border-top: none !important; }
.cadform .container-fluid { padding: 30px 20px !important; border: none !important; box-shadow: none !important; background: transparent !important; }
.table-log { border: none; margin-top: 15px; }
.table-log th { background-color: #f8f9fa !important; color: #555 !important; font-weight: 600 !important; font-size: 12px; text-transform: uppercase; border-bottom: 2px solid #eaeaea !important; padding: 10px !important; }
.table-log td { font-size: 13px; color: #444; padding: 12px 10px !important; border-bottom: 1px solid #f0f0f0; }
.table-log tbody tr:hover { background-color: #fcfcfc; }
.divider-vertical { border-left: 1px solid rgba(0,0,0,0.08); padding-left: 30px; margin-left: -1px; min-height: 400px; }
.log-title { font-size: 16px; color: #3b5998; font-weight: 600; margin-bottom: 20px; border-bottom: 1px dashed rgba(0,0,0,0.1); padding-bottom: 10px; }
</style>

<div class="section">
  <div style="display: flex; align-items: center; background-color: #3b5998; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 10px 15px;">
    <a href="javascript:window.history.go(-1)" style="color: #ffffff; margin-right: 15px; text-decoration: none; opacity: 0.8; font-size: 13px;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'"><i class="icon-arrow-left icon-white"></i> Voltar</a>
    <p style="margin-bottom: 0; color: white; font-weight: 600; border-left: 1px solid rgba(255,255,255,0.3); padding-left: 15px; font-size: 14px;"><i class="icon-edit icon-white"></i> Detalhes do Ticket</p>
  </div>
  <div class="cadform">
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span7" style="padding-right: 40px;">



<form action ="/listamp/salvaralteracao.php" method="post" class="form-horizontal">
<fieldset>

<!-- Início do formulário -->


<div class="form-content">

<div class="control-group">
  <label class="control-label" for="Ticket">Solicitante</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vsol;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
   </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Descrição</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo htmlentities($vdesc, ENT_QUOTES, "UTF-8");?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
   </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Unidade de Medida</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vumied;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">NCM</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vncm;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Cód. da peça</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vcodfab;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
   </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Fabricante</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vfab;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
   </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Centros</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vcentros;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
   </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Tipo</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vgrupomerc;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
     </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Classe de avaliação</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $valiacao;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="Ticket">Credito</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vcredito;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
     </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Ticket</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vticket;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="selectbasic">Status</label>
  <div class="controls">
    <select id="selectbasic" name="status" class="input-xlarge">
      <option>Pendente</option>
      <option>Cadastrado</option>
      <option>Recusado</option>
      <option selected><? echo $vstatus ?></option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Alterar</button>
  </div>
</div>

</fieldset>
</form>


</div>


<div class="span5 divider-vertical">

<div class="log-title"><i class="icon-time"></i> Últimas atualizações</div>

<div class="form-content">

<table class="table table-hover table-condensed table-log"> <!-- Área de log com as alterações do ticket  -->
  <thead>
  <th>Data/Horario</th>
  <th>Usuario</th>
  <th>Alteração</th>
</thead>
<tbody>

<tbody>

<?php

$sql= "SELECT * FROM logmp where ticket=$ticket ORDER BY data DESC";  // Exibe o conteúdo de log gravado durante a alteração do ticket
$resultado = mysql_query($sql);

while ($linha = mysql_fetch_assoc($resultado))
{
echo '<tr>';
echo '<td>'.$linha['data'].'</td>';
echo '<td>'.$linha['usuario'].'</td>';
echo '<td>'.$linha['alteracao'].'</td>';
echo '</tr>';
}

?>
</tbody>
</table>

<!-- Caixa de comentário -->
<form action ="/listamp/coment.php?ticket=<?echo $ticket ?>" method="post">
<div class="control-group">
  <label class="control-label" type="text"><strong>Comentário da Célula de Cadastro</strong></label>
  <div class="controls">                     
    <textarea id="textarea" name="comentario" style="width: 90%" rows="4"><? echo $vcoment;?></textarea>
  </div>
</div>

<!-- Botão de gravar o comentário -->
<div class="control-group">
  <label class="control-label" for="btn btn-small btn-primary"></label>
  <div class="controls">
    <button id="btn btn-small btn-primary" name="singlebutton" class="btn btn-small btn-primary">Salvar</button>
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
