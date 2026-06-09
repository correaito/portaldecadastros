<?php
      // Inicia a sessão e verifica o nível do usuário
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
include("../config.php"); // conexão com o BD

$ticket=$_GET['ticket']; // Captura o número de ticket da solicitação, no link

$infmp="SELECT * from cadforn where ticket='$ticket'"; // Consulta no BD, todas as entradas com o número do ticket capturado
$executa = mysql_query($infmp); // Faz a contagem das consultas encontradas no BD, para o ticket procurado

while ($reginfmp= mysql_fetch_array($executa)) // Extrai todas as informações do ticket encontrado e memoriza em reginfmp

{ // Distribui todas as informações memorizadas dos campos do ticket para as strings abaixo
$vsol=$reginfmp['solicitante'];
$vgrupoconta=$reginfmp['grupocont'];
$vcentro=$reginfmp['centro'];
$vcnpj=$reginfmp['cnpj'];
$vrazao=$reginfmp['razao'];
$vinscricao=$reginfmp['inscricao'];
$vincrimun=$reginfmp['incrimun'];
$vendereco=$reginfmp['endereco'];
$vbairro=$reginfmp['bairro'];
$vcidade=$reginfmp['cidade'];
$vestado=$reginfmp['estado'];
$vcep=$reginfmp['cep'];
$vemailc=$reginfmp['emailc'];
$vticket=$reginfmp['ticket'];
$vstatus=$reginfmp['status'];
$vcoment=$reginfmp['comentario'];
$vnumero=$reginfmp['numero'];
$vfantasia=$reginfmp['fantasia'];
$vtel=$reginfmp['telefone'];
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



<form action ="/listaforn/salvaralteracao.php" method="post" class="form-horizontal">
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
  <label class="control-label" for="Ticket">Centro</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vcentro;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
    </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Grupo de Conta</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vgrupoconta;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
    </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">CNPJ</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vcnpj;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
    </div>
</div>

<div class="control-group controls-row">
  <label class="control-label" for="textinput">Razão/ Fantasia</label>
    <div class="controls">
    <input id="Ticket" class="span3" name="ticket" value="<? echo $vrazao;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
    <input id="Ticket" class="span2" style="width: 35%" name="ticket" value="<? echo $vfantasia;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
   </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Inscrição Estadual</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vinscricao;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
   </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Inscrição Municipal</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vincrimun;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
   </div>
</div>

<div class="control-group controls-row">
  <label class="control-label" for="textinput">Endereço, nº</label>
    <div class="controls">
    <input id="Ticket" class="span3" name="ticket" value="<? echo $vendereco;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
    <input id="Ticket" class="span1" name="ticket" value="<? echo $vnumero;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
   </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Bairro</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vbairro;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
    </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Cidade</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vcidade;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
     </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Estado</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vestado;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
    </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">CEP</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vcep;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
    </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">Telefone</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vtel;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
    </div>
</div>

<div class="control-group">
  <label class="control-label" for="Ticket">E-mail</label>
  <div class="controls">
    <input id="Ticket" name="ticket" value="<? echo $vemailc;?>" type="text" readonly="yes" placeholder="" class="input-xlarge">
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
<!-- Fim do formulário -->
</form>

</div>


<div class="span5 divider-vertical"> <!-- Área direita do grid -->

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

$sql= "SELECT * FROM logforn where ticket=$ticket ORDER BY data DESC"; // Exibe o conteúdo de log gravado durante a alteração do ticket
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
<form action ="/listaforn/coment.php?ticket=<?echo $ticket ?>" method="post">
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



        </div> <!-- end row-fluid inside container -->
      </div> <!-- end container-fluid -->
    </div> <!-- end cadform -->
  </div> <!-- end section -->
</div> <!-- end page-content-wrapper -->
</div> <!-- end row-fluid (main) -->
</html>
