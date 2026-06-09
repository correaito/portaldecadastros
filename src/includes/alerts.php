<?php
// Gatilhos globais de mensagens modais baseadas na URL

$modals = [
    'envio' => ['title' => 'Sucesso!', 'msg' => 'Solicitação enviada com sucesso! Aguarde a análise.', 'type' => 'success'],
    'erroncm' => ['title' => 'Atenção: NCM Inválido', 'msg' => 'O NCM informado não foi localizado na tabela oficial TIPI-Receita. Verifique o código e tente novamente.', 'type' => 'error'],
    'erroopcao' => ['title' => 'Atenção: Centro Ausente', 'msg' => 'Você precisa marcar pelo menos um Centro (PA01, PA02, etc) para prosseguir.', 'type' => 'error'],
    'erroopcao1' => ['title' => 'Atenção: Organização de Vendas', 'msg' => 'Você precisa selecionar uma Organização de Vendas.', 'type' => 'error'],
    'erroopcao2' => ['title' => 'Atenção: Grupo de Contas', 'msg' => 'Você precisa selecionar o Grupo de Contas.', 'type' => 'error'],
    'erroidem' => ['title' => 'Aviso: Solicitação Duplicada', 'msg' => 'Uma solicitação idêntica a esta já foi enviada ao Portal anteriormente e encontra-se na fila de avaliação.', 'type' => 'warning'],
    'erroidem2' => ['title' => 'Aviso: Cadastro Existente', 'msg' => 'Este Material Próprio já encontra-se ativo no banco de dados do sistema.', 'type' => 'warning'],
    'erroidem4' => ['title' => 'Aviso: Cadastro Existente', 'msg' => 'Este Fornecedor já encontra-se ativo no banco de dados do sistema.', 'type' => 'warning'],
    'erroidem5' => ['title' => 'Aviso: Cadastro Existente', 'msg' => 'Este Material de Terceiro já encontra-se ativo no banco de dados do sistema.', 'type' => 'warning'],
    'erroidem6' => ['title' => 'Aviso: Cadastro Existente', 'msg' => 'Este Serviço Prestado já encontra-se ativo no banco de dados do sistema.', 'type' => 'warning'],
    'erroidem7' => ['title' => 'Aviso: Cadastro Existente', 'msg' => 'Este Cliente já encontra-se ativo no banco de dados do sistema.', 'type' => 'warning'],
    'erro1' => ['title' => 'Acesso Negado', 'msg' => 'Você não tem privilégio administrativo para acessar esta página.', 'type' => 'error'],
    'erro2' => ['title' => 'Acesso Negado', 'msg' => 'Ação não permitida.', 'type' => 'error'],
    'alterado' => ['title' => 'Atualizado', 'msg' => 'Registro atualizado e salvo com sucesso.', 'type' => 'success'],
    'salvo' => ['title' => 'Salvo!', 'msg' => 'Usuário cadastrado/atualizado com sucesso.', 'type' => 'success'],
    'excluido' => ['title' => 'Excluído', 'msg' => 'Usuário removido com sucesso.', 'type' => 'success'],
];

if (isset($_GET['a']) && array_key_exists($_GET['a'], $modals)) {
    $info = $modals[$_GET['a']];
    ?>
    <div id="genericModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="border-radius: 8px;">
      <div class="modal-header" style="<?php echo ($info['type'] == 'success') ? 'background-color: #dff0d8; color: #3c763d;' : (($info['type'] == 'warning') ? 'background-color: #fcf8e3; color: #8a6d3b;' : 'background-color: #f2dede; color: #a94442;'); ?> border-radius: 8px 8px 0 0;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="opacity: 0.6;">×</button>
        <h3 id="myModalLabel" style="font-size: 18px; margin: 0;"><i class="<?php echo ($info['type'] == 'success') ? 'icon-ok' : (($info['type'] == 'warning') ? 'icon-warning-sign' : 'icon-remove'); ?>"></i> <?php echo $info['title']; ?></h3>
      </div>
      <div class="modal-body" style="padding: 20px; font-size: 14px;">
        <p><?php echo $info['msg']; ?></p>
      </div>
      <div class="modal-footer" style="border-radius: 0 0 8px 8px;">
        <button class="btn btn-<?php echo ($info['type'] == 'success') ? 'success' : (($info['type'] == 'warning') ? 'warning' : 'danger'); ?>" data-dismiss="modal" aria-hidden="true">OK, Entendi</button>
      </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#genericModal').modal('show');
    });
    </script>
    <?php
}
?>
