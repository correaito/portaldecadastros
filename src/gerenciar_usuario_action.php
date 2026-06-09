<?php
include("config.php");
include("restrito.php");

// Restringir acesso apenas para administradores
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != '2') {
    header("Location: usuario.php");
    exit;
}

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : '';

if ($acao == 'novo') {
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];
    
    // Verifica se login já existe
    $sql_busca = "SELECT * FROM user WHERE login = '$login'";
    $exe_busca = mysql_query($sql_busca) or die(mysql_error());
    if (mysql_num_rows($exe_busca) == 0) {
        $sql_inclu = "INSERT INTO user(nome, login, senha, email, nivel) VALUES ('$nome', '$login', '$senha', '$email', '$nivel')";
        mysql_query($sql_inclu) or die(mysql_error());
    } else {
        echo "<script>alert('Este login já está sendo utilizado por outro usuário!'); window.history.back();</script>";
        exit;
    }
    header("Location: gerenciar_usuarios.php?a=salvo");
    exit;

} elseif ($acao == 'editar') {
    $id = (int)$_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];
    
    if (!empty($senha)) {
        $sql_update = "UPDATE user SET nome='$nome', email='$email', senha='$senha', nivel='$nivel' WHERE id=$id";
    } else {
        $sql_update = "UPDATE user SET nome='$nome', email='$email', nivel='$nivel' WHERE id=$id";
    }
    
    mysql_query($sql_update) or die(mysql_error());
    
    // Se o usuário editou a si mesmo, e mudou o próprio nível, isso poderia quebrar a sessão, 
    // mas não vamos alterar $_SESSION['nivel'] aqui para não deslogar a menos que relogue.
    
    header("Location: gerenciar_usuarios.php?a=salvo");
    exit;

} elseif ($acao == 'excluir') {
    $id = (int)$_GET['id'];
    
    // Evita que o admin exclua a si mesmo acidentalmente
    if (isset($_SESSION['login'])) {
        $sql_self = "SELECT login FROM user WHERE id=$id";
        $exe_self = mysql_query($sql_self);
        if ($user_self = mysql_fetch_assoc($exe_self)) {
            if ($user_self['login'] == $_SESSION['login']) {
                echo "<script>alert('Você não pode excluir sua própria conta por esta tela.'); window.history.back();</script>";
                exit;
            }
        }
    }

    $sql_delete = "DELETE FROM user WHERE id=$id";
    mysql_query($sql_delete) or die(mysql_error());
    
    header("Location: gerenciar_usuarios.php?a=excluido");
    exit;
} else {
    header("Location: gerenciar_usuarios.php");
    exit;
}
?>
