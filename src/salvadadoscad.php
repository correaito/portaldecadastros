<?php
session_start(); // Cria a sessão
include("config.php"); // Configuração do BD

date_default_timezone_set('America/Sao_Paulo');

$usuariolog = $_SESSION['login'];
$usuario = $_POST['usuario'];
$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];

// Verifica se existe imagem em base64 recebida do Cropper
$tem_nova_foto = false;
$nome_nova_foto = '';

if (!empty($_POST['foto_base64'])) {
    $base64_string = $_POST['foto_base64'];
    
    // Extrai o conteúdo do base64 (remove o cabeçalho 'data:image/png;base64,')
    $partes = explode(',', $base64_string);
    if (count($partes) == 2) {
        $conteudo_base64 = $partes[1];
        $dados_imagem = base64_decode($conteudo_base64);
        
        // Gera nome único para nunca dar colisão ou sobrescrita acidental
        $nome_nova_foto = uniqid('avatar_') . '.png';
        $caminho_destino = "fotos/" . $nome_nova_foto;
        
        if (file_put_contents($caminho_destino, $dados_imagem)) {
            $tem_nova_foto = true;
        }
    }
} elseif (!empty($_FILES['foto']['name'])) {
    // Fallback: se o javascript falhou, salva a imagem bruta tradicional
    $nome_nova_foto = $_FILES['foto']['name'];
    if (move_uploaded_file($_FILES['foto']['tmp_name'], "fotos/" . $nome_nova_foto)) {
        $tem_nova_foto = true;
    }
}

if ($tem_nova_foto) {
    // Antes de atualizar o banco, recupera qual era a foto antiga
    $query_foto_antiga = mysql_query("SELECT foto FROM user WHERE login='$usuariolog'");
    if ($query_foto_antiga && mysql_num_rows($query_foto_antiga) > 0) {
        $linha = mysql_fetch_assoc($query_foto_antiga);
        $foto_antiga = $linha['foto'];
        
        // Exclui a foto antiga do servidor (exceto se for a padrão) para não gerar "lixo"
        if (!empty($foto_antiga) && $foto_antiga != 'default.png' && file_exists("fotos/" . $foto_antiga)) {
            unlink("fotos/" . $foto_antiga);
        }
    }
    
    $sql_insert = mysql_query("UPDATE user SET login='$usuario', nome='$nome', email='$email', senha='$senha', foto='$nome_nova_foto' WHERE login='$usuariolog'"); 
} else {
    // Apenas atualiza dados textuais
    $sql_insert = mysql_query("UPDATE user SET login='$usuario', nome='$nome', email='$email', senha='$senha' WHERE login='$usuariolog'"); 
}

// Atualiza a sessão para o usuário não precisar relogar para ver seus novos dados
$_SESSION['login'] = $usuario;
$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;

header('Location: menu_rel_option_userpainel.php'); 
?>