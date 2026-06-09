<?php
include("config.php");
include("restrito.php");

// Restringir acesso apenas para administradores
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != '2') {
    header("Location: usuario.php");
    exit;
}

$pageTitle = 'Portal de Cadastro - Gerenciar Usuários';

// Paginação
$pagina = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
if(!$pagina) { $pagina = 1;} 
$limite = 15;
$inicio = ($pagina * $limite) - $limite;

// Filtros
$filtro_sql = "";
$url_filtros = "";
foreach ($_GET as $key => $value) {
    if (strpos($key, 'f_') === 0 && trim($value) !== '') {
        $coluna = substr($key, 2); 
        $f_val = mysql_real_escape_string($value);
        $filtro_sql .= " AND `$coluna` LIKE '%$f_val%' ";
        $url_filtros .= "&$key=" . urlencode($value);
    }
}
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/alerts.php'); ?>

<body>
<!-- Inicio da navbar do topo  -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/navbar.php'); ?>

<!-- Inicio da coluna 1 -->
<div class="row-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>

<!-- Início da coluna 2 -->
<div class="span12 main-content" id="page-content-wrapper">    
<div class="section">
  <p><i class="icon-cog icon-white"></i> Gerenciar Usuários</p>
  
  <div class="cadform">
    <div class="container-fluid" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 15px 20px; margin-bottom: 0px; border: 1px solid #eaeaea;">

<style>
.section > p { margin-bottom: 0 !important; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 8px 15px !important; }
.cadform { background-color: #ffffff !important; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 0px !important; border: 1px solid #eaeaea; border-top: none !important; }
.cadform .container-fluid { padding: 0 !important; border: none !important; box-shadow: none !important; background: transparent !important; }
.cadform .table-responsive { padding: 0px; margin: 0; width: 100%; overflow-x: auto; }
.table-custom { width: 100% !important; max-width: 100% !important; margin: 0 !important; background-color: transparent; border-collapse: collapse; border: none !important; }
.table-custom th { background-color: #f4f6f9 !important; color: #333 !important; font-weight: 600 !important; text-transform: uppercase; font-size: 12px; padding: 15px 20px !important; border-bottom: 2px solid #ddd !important; text-align: left !important; border-top: none !important; white-space: nowrap; }
.table-custom td { padding: 12px 15px !important; vertical-align: middle !important; text-align: left !important; border-top: 1px solid #f0f0f0 !important; white-space: nowrap; }
.truncate-text { max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; vertical-align: middle; cursor: help; }
</style>
        
      <div style="padding: 15px 20px 5px 20px;">
          <a href="gerenciar_usuario_form.php" class="btn btn-primary"><i class="icon-plus icon-white"></i> Novo Usuário</a>
      </div>

      <form method="get" action="gerenciar_usuarios.php">
      <div class="table-responsive">
      <table class="table table-hover table-condensed table-custom" style="width: 100% !important; margin: 0 !important;">
        <thead style="color: #333;">
          <tr>
            <th style="text-transform: uppercase;">ID</th>
            <th style="text-transform: uppercase;">Nome</th>
            <th style="text-transform: uppercase;">Login</th>
            <th style="text-transform: uppercase;">E-mail</th>
            <th style="text-transform: uppercase;">Nível</th>
            <th style="width: 90px; text-transform: uppercase;">Ações</th>
          </tr>
          <tr class="filters">
            <th style="padding: 5px !important;"><input type="text" name="f_id" value="<?php echo isset($_GET['f_id']) ? htmlspecialchars($_GET['f_id']) : ''; ?>" style="width: 90%; margin: 0; padding: 2px 5px; font-size: 11px; font-weight: normal; border-radius: 4px; border: 1px solid #ccc; background: #fff;" placeholder="Filtrar..."></th>
            <th style="padding: 5px !important;"><input type="text" name="f_nome" value="<?php echo isset($_GET['f_nome']) ? htmlspecialchars($_GET['f_nome']) : ''; ?>" style="width: 90%; margin: 0; padding: 2px 5px; font-size: 11px; font-weight: normal; border-radius: 4px; border: 1px solid #ccc; background: #fff;" placeholder="Filtrar..."></th>
            <th style="padding: 5px !important;"><input type="text" name="f_login" value="<?php echo isset($_GET['f_login']) ? htmlspecialchars($_GET['f_login']) : ''; ?>" style="width: 90%; margin: 0; padding: 2px 5px; font-size: 11px; font-weight: normal; border-radius: 4px; border: 1px solid #ccc; background: #fff;" placeholder="Filtrar..."></th>
            <th style="padding: 5px !important;"><input type="text" name="f_email" value="<?php echo isset($_GET['f_email']) ? htmlspecialchars($_GET['f_email']) : ''; ?>" style="width: 90%; margin: 0; padding: 2px 5px; font-size: 11px; font-weight: normal; border-radius: 4px; border: 1px solid #ccc; background: #fff;" placeholder="Filtrar..."></th>
            <th style="padding: 5px !important;">
              <select name="f_nivel" style="width: 95%; margin: 0; padding: 2px 5px; font-size: 11px; font-weight: normal; border-radius: 4px; border: 1px solid #ccc; background: #fff;">
                <option value=""></option>
                <option value="1" <?php echo (isset($_GET['f_nivel']) && $_GET['f_nivel'] == '1') ? 'selected' : ''; ?>>Comum</option>
                <option value="2" <?php echo (isset($_GET['f_nivel']) && $_GET['f_nivel'] == '2') ? 'selected' : ''; ?>>Admin</option>
              </select>
            </th>
            <th style="padding: 5px !important; text-align: center;"><button type="submit" class="btn btn-mini btn-info" style="margin-top: 0px;" title="Buscar"><i class="icon-search icon-white" style="margin-top: -1px; vertical-align: middle;"></i></button></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql_users = "SELECT * FROM user WHERE 1=1 $filtro_sql ORDER BY id DESC LIMIT $inicio,$limite";
          $exe_users = mysql_query($sql_users) or die(mysql_error());
          
          $consulta = mysql_query("SELECT * FROM user WHERE 1=1 $filtro_sql"); 
          $total_registros = mysql_num_rows($consulta);
          $total_paginas = ceil($total_registros / $limite);
          
          if (mysql_num_rows($exe_users) > 0) {
              while ($user = mysql_fetch_assoc($exe_users)) {
                  $nivel_text = ($user['nivel'] == '2') ? '<span class="label label-important">Admin</span>' : '<span class="label label-info">Comum</span>';
                  
                  echo "<tr>";
                  echo "<td>{$user['id']}</td>";
                  echo "<td>{$user['nome']}</td>";
                  echo "<td>{$user['login']}</td>";
                  echo "<td>{$user['email']}</td>";
                  echo "<td>{$nivel_text}</td>";
                  echo "<td>
                          <a href='gerenciar_usuario_form.php?id={$user['id']}' class='btn btn-small btn-warning' title='Editar'><i class='icon-pencil icon-white'></i> Editar</a>
                          <a href='gerenciar_usuario_action.php?acao=excluir&id={$user['id']}' class='btn btn-small btn-danger' title='Excluir' onclick=\"return confirm('Tem certeza que deseja excluir o usuário {$user['nome']}?');\"><i class='icon-trash icon-white'></i> Excluir</a>
                        </td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='6' class='text-center'>Nenhum usuário cadastrado.</td></tr>";
          }
          ?>
        </tbody>
      </table>
      </div>

      <!-- Paginação -->
      <ul class="pager" style="text-align: center; margin-top: 20px;">
        <li>
          <?php    
          if (($pagina == $total_paginas) and ($pagina > 1)) {
              echo "<a href=gerenciar_usuarios.php?pag=".($pagina-1)."$url_filtros>Anterior</a>";      
          } elseif (($pagina == 1) and ($pagina < $total_paginas)) {
              echo "<a href=gerenciar_usuarios.php?pag=".($pagina+1)."$url_filtros>Próximo</a>"; 
          } elseif (($pagina > 1) and ($pagina < $total_paginas)) {
              echo "<a href=gerenciar_usuarios.php?pag=".($pagina-1)."$url_filtros>Anterior</a>";      
              echo "<a href=gerenciar_usuarios.php?pag=".($pagina+1)."$url_filtros>Próximo</a>";
          }
          ?>
        </li>
      </ul>
      </form>

    </div>
  </div>
</div>

</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/modals.php'); ?>
</body>
</html>
