<?php
include("config.php");

header('Content-Type: application/json');

if (!isset($_GET['q']) || empty($_GET['q'])) {
    echo json_encode(['status' => 'error', 'message' => 'Nenhum NCM informado.']);
    exit;
}

// Remove tudo que não for número
$q = preg_replace('/[^0-9]/', '', $_GET['q']);

if (strlen($q) < 4) {
    echo json_encode(['status' => 'error', 'message' => 'NCM muito curto.']);
    exit;
}

// Formata o NCM se ele tiver 8 dígitos
$formatted_q = $q;
if (strlen($q) == 8) {
    $formatted_q = substr($q, 0, 4) . '.' . substr($q, 4, 2) . '.' . substr($q, 6, 2);
}

// 1. Verifica se existe EXATAMENTE no banco local
$sql = "SELECT codigo FROM ncm WHERE codigo = '$formatted_q' OR codigo = '$q'";
$res = mysql_query($sql);

if (mysql_num_rows($res) > 0) {
    $row = mysql_fetch_assoc($res);
    $found_code = str_replace('.', '', $row['codigo']);
    
    // Busca descrição na BrasilAPI
    $api_url = "https://brasilapi.com.br/api/ncm/v1/" . $found_code;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'PortalCadastroMM/1.0');
    $api_response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    $descricao = "Descrição não encontrada na base nacional.";
    if ($httpcode == 200) {
        $data = json_decode($api_response, true);
        if (isset($data['descricao'])) {
            $descricao = $data['descricao'];
        }
    }
    
    echo json_encode([
        'status' => 'success',
        'exact_match' => true,
        'codigo' => $row['codigo'],
        'descricao' => $descricao
    ]);
    exit;
}

// 2. Se não encontrou exato, busca sugestões (LIKE primeiros 4 dígitos)
$prefix = substr($formatted_q, 0, 4);
$sql_sug = "SELECT codigo FROM ncm WHERE codigo LIKE '$prefix%' LIMIT 3";
$res_sug = mysql_query($sql_sug);

$suggestions = [];
while ($row = mysql_fetch_assoc($res_sug)) {
    $sug_code = str_replace('.', '', $row['codigo']);
    
    // Busca descrição na BrasilAPI para a sugestão
    $api_url = "https://brasilapi.com.br/api/ncm/v1/" . $sug_code;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'PortalCadastroMM/1.0');
    $api_response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    $descricao = "Descrição indisponível.";
    if ($httpcode == 200) {
        $data = json_decode($api_response, true);
        if (isset($data['descricao'])) {
            $descricao = $data['descricao'];
        }
    }
    
    $suggestions[] = [
        'codigo' => $row['codigo'],
        'descricao' => $descricao
    ];
}

if (count($suggestions) > 0) {
    echo json_encode([
        'status' => 'success',
        'exact_match' => false,
        'suggestions' => $suggestions
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'NCM não localizado e não há sugestões similares no banco.'
    ]);
}
?>
