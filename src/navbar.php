<?php
date_default_timezone_set('America/Sao_Paulo');
$semana = date("w"); 
$dia = date("j");
$mês = date("n");
$ano = date("Y");
$meses = array(1 => "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", 
"Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
$semanas = array("Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado");
?>
<nav class="navbar navbar-fixed-top" style="z-index: 1050; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
  <div class="navbar-inner" style="border-bottom: none; background: #fff;">
    <div style="display: flex; align-items: center; justify-content: space-between; padding: 8px 15px; width: 100%; box-sizing: border-box;"> 
      
      <div style="display: flex; align-items: center; flex-shrink: 0;">
          <!-- Hamburger menu toggle -->
          <a href="javascript:void(0);" class="btn sidebar-toggle-btn" style="display: flex; align-items: center; justify-content: center; margin-right: 15px; padding: 6px 10px; background: transparent; border: 1px solid #ddd; box-shadow: none;" onclick="toggleSidebar()">
            <i class="icon-th-list" style="margin: 0; opacity: 0.7;"></i>
          </a>
          <a class="brand" href="/index.php" style="padding: 0; margin: 0; display: flex; align-items: center;">
             <img src="/img/logo_extension.png" style="height: auto; max-height: 36px; width: auto; margin: 0; max-width: 100%; object-fit: contain;" class="hidden-phone">
             <img src="/img/logo_reduce.png" style="height: auto; max-height: 30px; width: auto; margin: 0; max-width: 100%; object-fit: contain;" class="visible-phone">
          </a>
      </div>
      
      <div class="nav-collapse collapse" style="display: flex; justify-content: flex-end; align-items: center; flex-shrink: 0;">
          <ul class="nav hidden-phone" style="margin-right: 20px;">
            <li><a href="#" style="color: #666;"><i class="icon-calendar" style="opacity: 0.6;"></i> <?php echo "$semanas[$semana], $dia de $meses[$mês] de $ano"; ?></a></li>
          </ul>

      </div>
    </div>
  </div>
</nav>

<script>
function toggleSidebar() {
    var sidebar = document.getElementById('sidebar-wrapper');
    var content = document.getElementById('page-content-wrapper');
    
    if (window.innerWidth <= 768) {
        if(sidebar.className.indexOf('mobile-open') > -1) {
            sidebar.className = sidebar.className.replace(' mobile-open', '');
        } else {
            sidebar.className += ' mobile-open';
        }
    } else {
        if(sidebar.className.indexOf('collapsed') > -1) {
            sidebar.className = sidebar.className.replace(' collapsed', '');
            content.className = content.className.replace(' collapsed', '');
            localStorage.setItem('sidebar-collapsed', 'false');
        } else {
            sidebar.className += ' collapsed';
            content.className += ' collapsed';
            localStorage.setItem('sidebar-collapsed', 'true');
        }
    }
}

// Restaura o estado da barra lateral (recolhida) automaticamente a cada reload
document.addEventListener("DOMContentLoaded", function() {
    var sidebar = document.getElementById('sidebar-wrapper');
    var content = document.getElementById('page-content-wrapper');
    if (window.innerWidth > 768 && localStorage.getItem('sidebar-collapsed') === 'true') {
        if (sidebar && sidebar.className.indexOf('collapsed') === -1) sidebar.className += ' collapsed';
        if (content && content.className.indexOf('collapsed') === -1) content.className += ' collapsed';
    }
});
</script>
