<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<style>
#sidebar-wrapper::-webkit-scrollbar {
    width: 6px;
}
#sidebar-wrapper::-webkit-scrollbar-track {
    background: transparent;
}
#sidebar-wrapper::-webkit-scrollbar-thumb {
    background: #2a3b4c; /* Azul escuro bem fininho */
    border-radius: 3px;
}
#sidebar-wrapper::-webkit-scrollbar-thumb:hover {
    background: #1e2a36;
}
</style>
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="<?php echo in_array($currentPage, ['menu_rel_option_userpainel.php', 'usuarioadm.php', 'usuario.php']) ? 'active' : ''; ?>">
        <a href="/menu_rel_option_userpainel.php"><i class="icon-user icon-white"></i> <span>Área do Usuário</span></a>
      </li>
      <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == '2'): ?>
      <li class="<?php echo in_array($currentPage, ['gerenciar_usuarios.php', 'gerenciar_usuario_form.php']) ? 'active' : ''; ?>">
        <a href="/gerenciar_usuarios.php"><i class="icon-cog icon-white"></i> <span>Gerenciar Usuários</span></a>
      </li>
      <?php endif; ?>
      <?php 
      $isFormActive = in_array($currentPage, ['index.php', 'cmterceiro.php', 'cfornecedor.php', 'cclient.php', 'cservico.php', 'dadosbancarios.php']); 
      ?>
      <li class="<?php echo $isFormActive ? 'active' : ''; ?>">
        <a href="#collapseFormularios" data-toggle="collapse" style="background-color: <?php echo $isFormActive ? '#2c3e50' : 'transparent'; ?>;">
          <i class="icon-file icon-white"></i> <span>Nova Solicitação</span> 
          <i class="icon-chevron-down icon-white" style="margin-left: 10px; margin-top: 2px; opacity: 0.5;"></i>
        </a>
      </li>
      <div id="collapseFormularios" class="collapse <?php echo $isFormActive ? 'in' : ''; ?>" style="background-color: #243342;">
          <ul style="list-style: none; margin: 0; padding: 0;">
            <li class="<?php echo $currentPage == 'index.php' ? 'active' : ''; ?>">
              <a href="/index.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-pencil icon-white" style="opacity: 0.7;"></i> <span>Material próprio</span></a>
            </li>
            <li class="<?php echo $currentPage == 'cmterceiro.php' ? 'active' : ''; ?>">
              <a href="/cmterceiro.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-pencil icon-white" style="opacity: 0.7;"></i> <span>Material de terceiro</span></a>
            </li>
            <li class="<?php echo $currentPage == 'cfornecedor.php' ? 'active' : ''; ?>">
              <a href="/cfornecedor.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-pencil icon-white" style="opacity: 0.7;"></i> <span>Fornecedor</span></a>
            </li>
            <li class="<?php echo $currentPage == 'cclient.php' ? 'active' : ''; ?>">
              <a href="/cclient.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-pencil icon-white" style="opacity: 0.7;"></i> <span>Cliente</span></a>
            </li>
            <li class="<?php echo $currentPage == 'cservico.php' ? 'active' : ''; ?>">
              <a href="/cservico.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-pencil icon-white" style="opacity: 0.7;"></i> <span>Serviço prestado</span></a>
            </li>
            <li class="<?php echo $currentPage == 'dadosbancarios.php' ? 'active' : ''; ?>">
              <a href="/dadosbancarios.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-file icon-white" style="opacity: 0.7;"></i> <span>Dados bancários</span></a>
            </li>
          </ul>
      </div>
      <?php 
      $currentPath = $_SERVER['PHP_SELF'];
      $isMpActive = strpos($currentPath, '/listamp/') !== false || $currentPage == 'menu_rel_option_mp.php';
      $isMterActive = strpos($currentPath, '/listamterc/') !== false || $currentPage == 'menu_rel_option_mter.php';
      $isFornActive = strpos($currentPath, '/listaforn/') !== false || $currentPage == 'menu_rel_option_forn.php';
      $isClientActive = strpos($currentPath, '/listaclient/') !== false || $currentPage == 'menu_rel_option_client.php';
      $isServpActive = strpos($currentPath, '/listaservpres/') !== false || $currentPage == 'menu_rel_option_servp.php';
      $isContactActive = strpos($currentPath, '/listacontact/') !== false || $currentPage == 'menu_rel_option_contact.php';
      
      $isRelatorioActive = $isMpActive || $isMterActive || $isFornActive || $isClientActive || $isServpActive || $isContactActive; 
      ?>
      <li class="<?php echo $isRelatorioActive ? 'active' : ''; ?>">
        <a href="#collapseRelatorios" data-toggle="collapse" style="background-color: <?php echo $isRelatorioActive ? '#2c3e50' : 'transparent'; ?>;">
          <i class="icon-folder-open icon-white"></i> <span>Solicitações</span> 
          <i class="icon-chevron-down icon-white" style="margin-left: 10px; margin-top: 2px; opacity: 0.5;"></i>
        </a>
      </li>
      <div id="collapseRelatorios" class="collapse <?php echo $isRelatorioActive ? 'in' : ''; ?>" style="background-color: #243342;">
          <ul style="list-style: none; margin: 0; padding: 0;">
            <li class="<?php echo $isMpActive ? 'active' : ''; ?>">
              <a href="/menu_rel_option_mp.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-file icon-white" style="opacity: 0.7;"></i> <span>Material próprio</span></a>
            </li>
            <li class="<?php echo $isMterActive ? 'active' : ''; ?>">
              <a href="/menu_rel_option_mter.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-file icon-white" style="opacity: 0.7;"></i> <span>Material de terceiro</span></a>
            </li>
            <li class="<?php echo $isFornActive ? 'active' : ''; ?>">
              <a href="/menu_rel_option_forn.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-file icon-white" style="opacity: 0.7;"></i> <span>Fornecedor</span></a>
            </li>
            <li class="<?php echo $isClientActive ? 'active' : ''; ?>">
              <a href="/menu_rel_option_client.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-file icon-white" style="opacity: 0.7;"></i> <span>Cliente</span></a>
            </li>
            <li class="<?php echo $isServpActive ? 'active' : ''; ?>">
              <a href="/menu_rel_option_servp.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-file icon-white" style="opacity: 0.7;"></i> <span>Serviço prestado</span></a>
            </li>
            <li class="<?php echo $isContactActive ? 'active' : ''; ?>">
              <a href="/menu_rel_option_contact.php" style="padding: 10px 10px 10px 50px; font-size: 13px; display: block; text-decoration: none; color: #fff;"><i class="icon-file icon-white" style="opacity: 0.7;"></i> <span>Chamados</span></a>
            </li>
          </ul>
      </div>
      <li class="<?php echo $currentPage == 'contato.php' ? 'active' : ''; ?>">
        <a href="/contato.php"><i class="icon-envelope icon-white"></i> <span>Contato</span></a>
      </li>
    </ul>

    <!-- Mini Perfil na Barra Lateral -->
    <?php
    $login_side = $_SESSION['login'];
    $sql_side = mysql_query("SELECT foto, nome FROM user WHERE login = '$login_side'");
    if($sql_side && mysql_num_rows($sql_side) > 0) {
        $fet_side = mysql_fetch_assoc($sql_side);
        $imagem_side = $fet_side['foto'] ? $fet_side['foto'] : 'default.png';
        $nome_side = $fet_side['nome'];
    } else {
        $imagem_side = 'default.png';
        $nome_side = $_SESSION['nome'];
    }
    
    // Extrai o primeiro nome para não quebrar a linha
    $primeiro_nome = explode(' ', trim($nome_side))[0];
    ?>
    <div style="position: absolute; bottom: 0; width: 100%; border-top: 1px solid rgba(255,255,255,0.05); padding: 20px 0 15px 0; background-color: #1a252f; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <div style="margin-bottom: 12px;">
            <img src="/fotos/<?php echo $imagem_side; ?>" alt="Perfil" style="width: 55px; height: 55px; border-radius: 50%; object-fit: cover; border: 2px solid #ecf0f1; box-shadow: 0 4px 15px rgba(0,0,0,0.4);">
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center; width: 65%;">
            <a href="#modalLogout" data-toggle="modal" style="color: #7f8c8d; transition: all 0.3s; padding: 5px; display: flex; align-items: center;" title="Sair do Sistema" onmouseover="this.style.color='#ecf0f1'" onmouseout="this.style.color='#7f8c8d'">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0.8;">
                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                  <polyline points="16 17 21 12 16 7"></polyline>
                  <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
            </a>
            <a href="#mdconta" data-toggle="modal" style="color: #7f8c8d; transition: all 0.3s; padding: 5px; display: flex; align-items: center;" title="Configurações da Conta" onmouseover="this.style.color='#ecf0f1'" onmouseout="this.style.color='#7f8c8d'">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" style="opacity: 0.8;">
                  <circle cx="4" cy="12" r="2.5"></circle>
                  <circle cx="12" cy="12" r="2.5"></circle>
                  <circle cx="20" cy="12" r="2.5"></circle>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Modal Confirmar Logout -->
<div id="modalLogout" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
  <div class="modal-header" style="background-color: #e74c3c; border-bottom: 1px solid #c0392b; padding: 20px;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: 2px; color: #fff; opacity: 0.8; text-shadow: none;">×</button>
    <h3 style="margin: 0; color: #fff; font-weight: 600; font-size: 20px; display: flex; align-items: center; gap: 8px;">
      <i class="icon-warning-sign icon-white" style="margin: 0; margin-top: -2px;"></i> Sair do Sistema
    </h3>
  </div>
  <div class="modal-body" style="padding: 30px 25px; text-align: center;">
    <h4 style="color: #2c3e50; font-weight: 600; margin-bottom: 15px; font-size: 22px;">Tem certeza que deseja sair?</h4>
    <p style="color: #7f8c8d; font-size: 15px; line-height: 1.5;">Sua sessão atual será encerrada de forma segura e você precisará informar sua senha novamente para acessar o portal.</p>
  </div>
  <div class="modal-footer" style="background-color: #f8f9fa; border-top: 1px solid #eaeaea; padding: 15px 25px; display: flex; justify-content: center; gap: 15px;">
    <button class="btn" data-dismiss="modal" aria-hidden="true" style="border-radius: 6px; padding: 10px 25px; font-weight: 600; color: #7f8c8d; border: 1px solid #bdc3c7;">Permanecer Conectado</button>
    <a href="/logout.php" class="btn btn-danger" style="border-radius: 6px; padding: 10px 30px; font-weight: 600; box-shadow: 0 2px 5px rgba(231, 76, 60, 0.3); color: #fff; text-decoration: none;">Sim, sair agora</a>
  </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/modal_conta.php'); ?>
