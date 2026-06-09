<!-- Modais Genéricos do Sistema -->

<div id="myModa3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Selecione o relatório</h3>
  </div>
  <div class="modal-body">
    <p><a href="/menu_rel_option_mp.php"> Solicitações de material próprio</a></p>
    <p><a href="/menu_rel_option_mter.php"> Solicitações de material de terceiro</a></p>
    <p><a href="/menu_rel_option_client.php">Solicitações de cliente</a></p>
    <p><a href="/menu_rel_option_servp.php">Solicitações de serviço prestado</a></p>
    <p><a href="/menu_rel_option_forn.php">Solicitações de fornecedor</a></p>
    <p>Solicitações de dados bancários</p>
    <p><a href="/menu_rel_option_contact.php">Abertura de chamados</a></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  </div>
</div>

<div id="envio" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
   <h3 id="myModalLabel">Obrigado!</h3>
  </div>
  <div class="modal-body">
    O formulário foi enviado com sucesso. Acompanhe suas solicitações através da área de <a href="/menu_rel_option_forn.php">relatórios.</a>
  </div>
  <div class="modal-footer">
   <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  </div>
</div>

<div id="erro1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
   <h3 id="myModalLabel">Atenção!</h3>
  </div>
  <div class="modal-body">
    Esse registro já foi enviado ao portal anteriormente 
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  </div>
</div>

<div id="erro2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Atenção!</h3>
  </div>
  <div class="modal-body">
    Esse registro já está cadastrado no SAP, com o código <?php $linha = isset($_SESSION["linha"]) ? $_SESSION["linha"] : ''; echo $linha; ?>.
  </div>
  <div class="modal-footer">
   <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  </div>
</div>
