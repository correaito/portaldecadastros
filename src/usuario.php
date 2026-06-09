<?php
include("config.php"); // Configuração do BD
include("restrito.php"); // Condição de acesso a usuários logados
session_start(); // Cria sessão

$usuariologado = $_SESSION['nome']; // Memoriza a session na variável
$nomelogado = $_SESSION['nome']; // Memoriza a session na variável

$sql_busca = "SELECT * FROM user WHERE login = '$login_usuario'";
$exe_busca = mysql_query($sql_busca) or die (mysql_error());
$fet_busca = mysql_fetch_assoc($exe_busca);
$imagemuser= $fet_busca['foto'] // pega o nome da foto do usuário
?>

<?php

?>

<?php 
$is_user_dashboard = true;
include($_SERVER['DOCUMENT_ROOT'] . '/includes/dashboard_stats.php'); 
$pageTitle = 'Portal de Cadastro - Área do Usuário'; 
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
<div class="span12 main-content" id="page-content-wrapper" style="background-color: #e2e8f0; min-height: 100vh; padding: 12px 20px 20px 20px;">    

<?php
// Agregando valores totais
$total_geral = $total_regmatpfull + $total_regmaterfull + $total_regcfull + $total_regffull + $total_regservpfull + $total_regcontfull;
$total_atendidos = $total_regmatpcad + $total_regmatercad + $total_regccad + $total_regfcad + $total_regservpcad + $total_regcontcad;
$total_pendentes = $total_regmatppend + $total_regmaterpend + $total_regcpend + $total_regfpend + $total_regservppend + $total_regcontpend;
$total_recusados = $total_regmatprec + $total_regmaterrec + $total_regcrec + $total_regfrec + $total_regservprec + $total_regcontrec;
?>

<div class="section">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
        <?php
        $primeiro_nome_greet = explode(' ', trim($_SESSION['nome']))[0];
        $hora_atual = date('H');
        if ($hora_atual >= 5 && $hora_atual < 12) {
            $saudacao = "Bom dia";
        } elseif ($hora_atual >= 12 && $hora_atual < 18) {
            $saudacao = "Boa tarde";
        } else {
            $saudacao = "Boa noite";
        }
        ?>
        <h2 style="margin: 0; color: #2c3e50; font-weight: 400; font-size: 24px;"><?php echo $saudacao . ', ' . $primeiro_nome_greet; ?>!</h2>
    </div>

    <!-- Cards Superiores -->
    <div class="row-fluid" style="margin-bottom: 30px;">
        <div class="span3">
            <div style="background-color: #1a365d; color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <span style="font-size: 14px; opacity: 0.8;">Minhas Solicitações</span>
                    <i class="icon-list-alt icon-white"></i>
                </div>
                <div style="font-size: 32px; font-weight: 300;" id="total-geral"><?php echo $total_geral; ?></div>
            </div>
        </div>
        <div class="span3">
            <div style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 4px solid #48bb78;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <span style="font-size: 14px; color: #718096;">Atendidos</span>
                    <i class="icon-ok" style="opacity: 0.5;"></i>
                </div>
                <div style="font-size: 32px; font-weight: 300; color: #2d3748;" id="total-atendidos"><?php echo $total_atendidos; ?></div>
            </div>
        </div>
        <div class="span3">
            <div style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 4px solid #ed8936;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <span style="font-size: 14px; color: #718096;">Pendentes</span>
                    <i class="icon-time" style="opacity: 0.5;"></i>
                </div>
                <div style="font-size: 32px; font-weight: 300; color: #2d3748;" id="total-pendentes"><?php echo $total_pendentes; ?></div>
            </div>
        </div>
        <div class="span3">
            <div style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 4px solid #e53e3e;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <span style="font-size: 14px; color: #718096;">Recusados</span>
                    <i class="icon-remove" style="opacity: 0.5;"></i>
                </div>
                <div style="font-size: 32px; font-weight: 300; color: #2d3748;" id="total-recusados"><?php echo $total_recusados; ?></div>
            </div>
        </div>
    </div>

    <!-- Área de Gráficos -->
    <div class="row-fluid">
        <div class="span8">
            <div style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 20px;">
                <h4 style="margin-top: 0; color: #2c3e50; font-weight: 400; margin-bottom: 20px;">Estatísticas por Categoria</h4>
                <div style="position: relative; height: 250px; width: 100%;">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
        <div class="span4">
            <div style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                <h4 style="margin-top: 0; color: #2c3e50; font-weight: 400; text-align: center; margin-bottom: 20px;">Visão Geral</h4>
                <div style="position: relative; height: 250px; width: 100%;">
                    <canvas id="doughnutChart"></canvas>
                    <div style="position: absolute; top: 42%; left: 50%; transform: translate(-50%, -50%); text-align: center; pointer-events: none;">
                        <div style="font-size: 26px; font-weight: bold; color: #1a365d; line-height: 1;" id="pct-sucesso">
                            <?php echo $total_geral > 0 ? round(($total_atendidos / $total_geral) * 100) : 0; ?>%
                        </div>
                        <div style="font-size: 11px; color: #718096; text-transform: uppercase; letter-spacing: 1px; margin-top: 4px;">Sucesso</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>


<!-- Modais (efeito lightbox ) com mensagens informativas para o usuário. -->

 

<!-- Modais globais e modais específicas da página -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/includes/modals.php'); ?>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Scripts dos Gráficos -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Cores
    const colors = {
        primary: '#3498db',
        success: '#2ecc71',
        warning: '#f1c40f',
        danger: '#e74c3c',
        purple: '#9b59b6',
        dark: '#34495e'
    };

    // Dados para o Gráfico de Barras (Solicitações por Categoria)
    const ctxBar = document.getElementById('barChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Mat. Próprio', 'Mat. Terceiros', 'Clientes', 'Fornecedores', 'Serviço Prest.', 'Chamados'],
            datasets: [{
                label: 'Total de Solicitações',
                data: [
                    <?php echo $total_regmatpfull; ?>, 
                    <?php echo $total_regmaterfull; ?>, 
                    <?php echo $total_regcfull; ?>, 
                    <?php echo $total_regffull; ?>, 
                    <?php echo $total_regservpfull; ?>, 
                    <?php echo $total_regcontfull; ?>
                ],
                backgroundColor: [colors.primary, colors.success, colors.warning, colors.danger, colors.purple, colors.dark],
                borderWidth: 0,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 2000,
                easing: 'easeOutQuart',
                y: {
                    from: 500
                }
            },
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [2, 4] } },
                x: { grid: { display: false } }
            }
        }
    });

    // Dados para o Gráfico de Rosca (Visão Geral de Sucesso)
    const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
    const doughnutChart = new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: ['Atendidos', 'Pendentes', 'Recusados'],
            datasets: [{
                // Inicializa zerado para forçar a animação de varredura (sweep)
                data: [0, 0, 0], 
                backgroundColor: ['#48bb78', '#ed8936', '#e53e3e'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            layout: {
                padding: 15
            },
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            },
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // Injeta os dados reais após um leve atraso, acionando a animação natural
    setTimeout(() => {
        doughnutChart.data.datasets[0].data = [
            <?php echo $total_atendidos; ?>, 
            <?php echo $total_pendentes; ?>, 
            <?php echo $total_recusados; ?>
        ];
        doughnutChart.update();
    }, 250);
});
</script>

</body>
</html>