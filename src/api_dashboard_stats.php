<?php
header('Content-Type: application/json');
include("config.php");
include("restrito.php");

// Determina se os filtros por usuário logado devem ser aplicados
if (isset($_GET['is_user_dashboard']) && $_GET['is_user_dashboard'] == '1') {
    $is_user_dashboard = true;
} else {
    $is_user_dashboard = false;
}

$nomelogado = $_SESSION['nome'];

// O script dashboard_stats.php requer as variaveis $nomelogado e $is_user_dashboard
// E carrega todas as variaveis $total_reg...
include($_SERVER['DOCUMENT_ROOT'] . '/includes/dashboard_stats.php');

$response = array(
    'matp' => array(
        'full' => $total_regmatpfull,
        'cad' => $total_regmatpcad,
        'pend' => $total_regmatppend,
        'rec' => $total_regmatprec,
        'style' => gerarGraficoCircular($total_regmatpcad, $total_regmatppend, $total_regmatprec)
    ),
    'mater' => array(
        'full' => $total_regmaterfull,
        'cad' => $total_regmatercad,
        'pend' => $total_regmaterpend,
        'rec' => $total_regmaterrec,
        'style' => gerarGraficoCircular($total_regmatercad, $total_regmaterpend, $total_regmaterrec)
    ),
    'client' => array(
        'full' => $total_regcfull,
        'cad' => $total_regccad,
        'pend' => $total_regcpend,
        'rec' => $total_regcrec,
        'style' => gerarGraficoCircular($total_regccad, $total_regcpend, $total_regcrec)
    ),
    'forn' => array(
        'full' => $total_regffull,
        'cad' => $total_regfcad,
        'pend' => $total_regfpend,
        'rec' => $total_regfrec,
        'style' => gerarGraficoCircular($total_regfcad, $total_regfpend, $total_regfrec)
    ),
    'serv' => array(
        'full' => $total_regsfull,
        'cad' => $total_regscad,
        'pend' => $total_regspend,
        'rec' => $total_regsrec,
        'style' => gerarGraficoCircular($total_regscad, $total_regspend, $total_regsrec)
    ),
    'contact' => array(
        'full' => $total_regconfull,
        'cad' => $total_regconcad,
        'pend' => $total_regconpend,
        'rec' => $total_regconrec,
        'style' => gerarGraficoCircular($total_regconcad, $total_regconpend, $total_regconrec)
    )
);

echo json_encode($response);
?>
