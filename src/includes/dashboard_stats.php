<?php
// Script responsável por consolidar os dados numéricos para os gráficos da Dashboard
$filter = "";
$and_filter = "";

if (isset($is_user_dashboard) && $is_user_dashboard === true) {
    $filter = " WHERE solicitante='" . mysql_real_escape_string($nomelogado) . "'";
    $and_filter = " AND solicitante='" . mysql_real_escape_string($nomelogado) . "'";
}

if (!function_exists('gerarGraficoCircular')) {
    function gerarGraficoCircular($cadastrado, $pendente, $recusado) {
        $total = $cadastrado + $pendente + $recusado;
        if ($total == 0) {
            return "background: #eee;";
        }
        $pct_cad = ($cadastrado / $total) * 100;
        $pct_pend = ($pendente / $total) * 100;
        $fim_cad = round($pct_cad, 1);
        $fim_pend = round($pct_cad + $pct_pend, 1);
        return "background: conic-gradient(#5cb85c 0% {$fim_cad}%, #f0ad4e {$fim_cad}% {$fim_pend}%, #d9534f {$fim_pend}% 100%);";
    }
}


// 1. Material Próprio (cadmatp)
$total_regmatpfull = mysql_num_rows(mysql_query("SELECT ticket FROM cadmatp" . $filter));
$total_regmatpcad = mysql_num_rows(mysql_query("SELECT ticket FROM cadmatp WHERE Status='Cadastrado'" . $and_filter));
$total_regmatppend = mysql_num_rows(mysql_query("SELECT ticket FROM cadmatp WHERE Status='Pendente'" . $and_filter));
$total_regmatprec = mysql_num_rows(mysql_query("SELECT ticket FROM cadmatp WHERE Status='Recusado'" . $and_filter));

// 2. Material de Terceiros (cadmater)
$total_regmaterfull = mysql_num_rows(mysql_query("SELECT ticket FROM cadmater" . $filter));
$total_regmatercad = mysql_num_rows(mysql_query("SELECT ticket FROM cadmater WHERE Status='Cadastrado'" . $and_filter));
$total_regmaterpend = mysql_num_rows(mysql_query("SELECT ticket FROM cadmater WHERE Status='Pendente'" . $and_filter));
$total_regmaterrec = mysql_num_rows(mysql_query("SELECT ticket FROM cadmater WHERE Status='Recusado'" . $and_filter));

// 3. Cliente (cadclient)
$total_regcfull = mysql_num_rows(mysql_query("SELECT ticket FROM cadclient" . $filter));
$total_regccad = mysql_num_rows(mysql_query("SELECT ticket FROM cadclient WHERE Status='Cadastrado'" . $and_filter));
$total_regcpend = mysql_num_rows(mysql_query("SELECT ticket FROM cadclient WHERE Status='Pendente'" . $and_filter));
$total_regcrec = mysql_num_rows(mysql_query("SELECT ticket FROM cadclient WHERE Status='Recusado'" . $and_filter));

// 4. Fornecedor (cadforn)
$total_regffull = mysql_num_rows(mysql_query("SELECT ticket FROM cadforn" . $filter));
$total_regfcad = mysql_num_rows(mysql_query("SELECT ticket FROM cadforn WHERE Status='Cadastrado'" . $and_filter));
$total_regfpend = mysql_num_rows(mysql_query("SELECT ticket FROM cadforn WHERE Status='Pendente'" . $and_filter));
$total_regfrec = mysql_num_rows(mysql_query("SELECT ticket FROM cadforn WHERE Status='Recusado'" . $and_filter));

// 5. Serviço Prestado (cadservp)
$total_regservpfull = mysql_num_rows(mysql_query("SELECT ticket FROM cadservp" . $filter));
$total_regservpcad = mysql_num_rows(mysql_query("SELECT ticket FROM cadservp WHERE Status='Cadastrado'" . $and_filter));
$total_regservppend = mysql_num_rows(mysql_query("SELECT ticket FROM cadservp WHERE Status='Pendente'" . $and_filter));
$total_regservprec = mysql_num_rows(mysql_query("SELECT ticket FROM cadservp WHERE Status='Recusado'" . $and_filter));

// 6. Chamados (contact)
$total_regcontfull = mysql_num_rows(mysql_query("SELECT ticket FROM contact" . $filter));
$total_regcontcad = mysql_num_rows(mysql_query("SELECT ticket FROM contact WHERE status='Atendido'" . $and_filter));
$total_regcontpend = mysql_num_rows(mysql_query("SELECT ticket FROM contact WHERE status='Pendente'" . $and_filter));
$total_regcontrec = mysql_num_rows(mysql_query("SELECT ticket FROM contact WHERE status='Recusado'" . $and_filter));
?>
