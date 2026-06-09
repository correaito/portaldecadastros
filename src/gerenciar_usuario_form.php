<?php
include("config.php");
include("restrito.php");

// Restringir acesso apenas para administradores
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != '2') {
    header("Location: usuario.php");
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$user_data = [
    'nome' => '',
    'login' => '',
    'email' => '',
    'nivel' => '1',
    'senha' => ''
];

if ($id > 0) {
    $sql = "SELECT * FROM user WHERE id = $id";
    $exe = mysql_query($sql) or die(mysql_error());
    if (mysql_num_rows($exe) > 0) {
        $user_data = mysql_fetch_assoc($exe);
    } else {
        $id = 0; // Usuário não encontrado
    }
}

$pageTitle = ($id > 0) ? 'Editar Usuário' : 'Novo Usuário';
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/alerts.php'); ?>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/navbar.php'); ?>

<div class="row-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>

<div class="span12 main-content" id="page-content-wrapper">    
<div class="section">
  <div style="display: flex; align-items: center; background-color: #3b5998; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 10px 15px;">
    <a href="gerenciar_usuarios.php" style="color: #ffffff; margin-right: 15px; text-decoration: none; opacity: 0.8; font-size: 13px;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'"><i class="icon-arrow-left icon-white"></i> Voltar</a>
    <p style="margin-bottom: 0; color: white; font-weight: 600; border-left: 1px solid rgba(255,255,255,0.3); padding-left: 15px; font-size: 14px; background: none; box-shadow: none; padding-top: 0; padding-bottom: 0;"><i class="icon-user icon-white"></i> <?php echo $pageTitle; ?></p>
  </div>
  
  <div class="article"> 
    <div class="container cadform" style="border-top-left-radius: 0; border-top-right-radius: 0; margin-top: 0;">
        
      <form method="post" action="gerenciar_usuario_action.php" class="form-horizontal">
        <input type="hidden" name="acao" value="<?php echo ($id > 0) ? 'editar' : 'novo'; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="control-group">
          <label class="control-label" for="nome">Nome *</label>
          <div class="controls">
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($user_data['nome']); ?>" required class="input-xlarge">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="login">Login *</label>
          <div class="controls">
            <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($user_data['login']); ?>" required class="input-xlarge" <?php echo ($id > 0) ? 'readonly' : ''; ?>>
            <?php if($id > 0): ?><span class="help-inline">Login não pode ser alterado.</span><?php endif; ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="email">E-mail *</label>
          <div class="controls">
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" required class="input-xlarge">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="senha">Senha <?php echo ($id == 0) ? '*' : ''; ?></label>
          <div class="controls">
            <input type="text" id="senha" name="senha" value="" class="input-xlarge" <?php echo ($id == 0) ? 'required' : ''; ?>>
            <span class="help-inline"><?php echo ($id > 0) ? 'Deixe em branco para não alterar a senha.' : ''; ?></span>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="nivel">Nível de Acesso *</label>
          <div class="controls">
            <select id="nivel" name="nivel" required class="input-xlarge">
              <option value="1" <?php echo ($user_data['nivel'] == '1') ? 'selected' : ''; ?>>Comum (Nível 1)</option>
              <option value="2" <?php echo ($user_data['nivel'] == '2') ? 'selected' : ''; ?>>Administrador (Nível 2)</option>
            </select>
          </div>
        </div>

        <div class="form-actions" style="background: transparent; border-top: 1px solid #eee;">
          <button type="submit" class="btn btn-success"><i class="icon-ok icon-white"></i> Salvar Usuário</button>
          <a href="gerenciar_usuarios.php" class="btn btn-default">Cancelar</a>
        </div>
      </form>

    </div>
  </div>
</div>
</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/modals.php'); ?>
</body>
</html>
