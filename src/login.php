<?php
if (!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <title>Portal de Cadastro - Login</title>
    
    <!-- Arquivos Bootstrap/configuração/validação -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/logo.ico">

    <!-- Estilização Glassmorphism & UI Moderna -->
    <style>
        body {
            /* Garantindo que o background preencha toda a tela */
            background-image: url('img/intro-bg.jpg'); /* ajuste para imagem real se diferente */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            height: 100vh;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Remove rolagem da tela inteira */
            display: flex;
            flex-direction: column;
        }
        
        .main-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 80px; /* Compensa a altura da navbar fixa para não sobrepor */
            padding-bottom: 20px;
            box-sizing: border-box;
        }

        .login-glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            padding: 20px;
            width: 90%;
            max-width: 310px; 
            max-height: calc(100vh - 120px); 
            overflow-y: auto; 
            transition: all 0.3s ease;
        }

        /* Oculta scrollbar interno para ficar mais limpo mas mantém funcionalidade */
        .login-glass::-webkit-scrollbar {
            width: 4px;
        }
        .login-glass::-webkit-scrollbar-thumb {
            background-color: rgba(0,0,0,0.1);
            border-radius: 4px;
        }

        .login-glass:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        /* Abas Minimalistas */
        .nav-tabs.modern-tabs {
            border-bottom: none;
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
            background: rgba(0,0,0,0.04);
            border-radius: 8px;
            padding: 4px;
        }

        .nav-tabs.modern-tabs > li {
            margin: 0;
            flex: 1;
            text-align: center;
        }

        .nav-tabs.modern-tabs > li > a {
            border: none;
            color: #555;
            font-weight: 500;
            border-radius: 6px;
            padding: 8px 0;
            font-size: 13px;
            margin: 0;
            transition: all 0.2s ease;
        }

        .nav-tabs.modern-tabs > li > a:hover {
            background: rgba(0,0,0,0.02);
            color: #333;
        }

        .nav-tabs.modern-tabs > li.active > a,
        .nav-tabs.modern-tabs > li.active > a:hover,
        .nav-tabs.modern-tabs > li.active > a:focus {
            background: #fff;
            color: #2563eb;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        /* Formulários e Inputs Modernos */
        .modern-form {
            margin: 0;
            padding: 0;
        }

        .modern-form label {
            font-weight: 600;
            color: #444;
            margin-bottom: 4px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }


        .input-icon-wrapper {
            position: relative;
            width: 100%;
        }
        
        .input-icon-wrapper i {
            position: absolute;
            left: 12px;
            top: 40%;
            transform: translateY(-50%);
            opacity: 0.4;
            z-index: 2;
        }

        .modern-form input[type="text"],
        .modern-form input[type="password"] {
            width: 100%;
            padding: 8px 12px 8px 36px;
            height: auto;
            border-radius: 8px;
            border: 1px solid #ddd;
            background: #fafafa;
            font-size: 13px;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.02);
            transition: all 0.3s ease;
            box-sizing: border-box;
            margin-bottom: 12px;
        }

        .modern-form input[type="text"]:focus,
        .modern-form input[type="password"]:focus {
            border-color: #2563eb;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
            outline: none;
        }

        .modern-btn {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
            margin-top: 5px;
            box-sizing: border-box;
        }

        .btn-primary-modern {
            background-color: #2563eb !important;
            background-image: none !important;
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-primary-modern:hover {
            background-color: #1d4ed8;
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4);
            transform: translateY(-1px);
            color: white;
        }

        .btn-success-modern {
            background-color: #10b981 !important;
            background-image: none !important;
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-success-modern:hover {
            background-color: #059669;
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
            transform: translateY(-1px);
            color: white;
        }

        #aviso_caps_lock {
            color: #ef4444;
            font-size: 12px;
            font-weight: 600;
            margin-top: -10px;
            margin-bottom: 15px;
            text-align: right;
        }
        
        .modais-custom .modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }
        
        .modais-custom .modal-footer {
            background: transparent;
            border-top: none;
            box-shadow: none;
        }
    </style>

    <script type="text/javascript"> 
    function checar_caps_lock(ev) {
        var e = ev || window.event;
        var codigo_tecla = e.keyCode?e.keyCode:e.which;
        var tecla_shift = e.shiftKey?e.shiftKey:((codigo_tecla == 16)?true:false);
        if(((codigo_tecla >= 65 && codigo_tecla <= 90) && !tecla_shift) || ((codigo_tecla >= 97 && codigo_tecla <= 122) && tecla_shift)) {
            document.getElementById('aviso_caps_lock').style.visibility = 'visible';
        } else {
            document.getElementById('aviso_caps_lock').style.visibility = 'hidden';
        }
    }
    function up(lstr){
        lstr.value = lstr.value.toUpperCase();
    }
    function down(lstr){
        lstr.value = lstr.value.toLowerCase();
    }
    </script>

    <?php if (isset($_GET['a']) && $_GET['a'] == 'cad'){ ?>
    <script>$(document).ready(function() { $('#myModa3').modal(); });</script>
    <?php } ?>

    <?php if (isset($_GET['a']) && $_GET['a'] == 'erlog'){ ?>
    <script>$(document).ready(function() { $('#errologin').modal(); });</script>
    <?php } ?>

    <?php if (isset($_GET['a']) && $_GET['a'] == 'erduplogin'){ ?>
    <script>$(document).ready(function() { $('#duplogin').modal(); });</script>
    <?php } ?>

    <?php if (isset($_GET['a']) && $_GET['a'] == 'confenvpass'){ ?>
    <script>$(document).ready(function() { $('#confenvpass').modal(); });</script>
    <?php } ?>

</head>
<body>

<!-- Cabeçalho idêntico ao do sistema -->
<?php include('navbar.php'); ?>

<!-- Container Principal Centralizado -->
<div class="main-wrapper">
    <div class="login-glass">
        
        <!-- Abas Modernizadas -->
        <ul class="nav nav-tabs modern-tabs">
            <li class="active"><a href="#login" data-toggle="tab">Acesso</a></li>
            <li><a href="#create" data-toggle="tab">Criar Conta</a></li>
            <li><a href="#senha" data-toggle="tab">Senha</a></li>
        </ul>

        <div id="myTabContent" class="tab-content">
            <!-- ABA: LOGIN -->
            <div class="tab-pane active in" id="login">
                <form class="modern-form" method="post" action="logar.php">
                    <label>Usuário</label>
                    <div class="input-icon-wrapper"><i class="icon-user"></i><input type="text" name="login" onkeypress="checar_caps_lock(event)" placeholder="Seu usuário" autofocus required></div>
                    
                    <label>Senha</label>
                    <div class="input-icon-wrapper"><i class="icon-lock"></i><input type="password" name="senha" onkeypress="checar_caps_lock(event)" placeholder="Sua senha" required></div>
                    
                    <div id="aviso_caps_lock" style="visibility: hidden">Caps Lock ativado!</div>
                    
                    <button type="submit" class="btn modern-btn btn-success-modern">Entrar</button>
                </form>                
            </div>

            <!-- ABA: CRIAR CONTA -->
            <div class="tab-pane fade" id="create">
                <form class="modern-form" method="post" action="cadastro.php">
                    <label>Nome</label>
                    <div class="input-icon-wrapper"><i class="icon-pencil"></i><input type="text" name="nome" placeholder="Insira seu nome" required></div>
                    
                    <label>Usuário</label>
                    <div class="input-icon-wrapper"><i class="icon-user"></i><input type="text" name="login" placeholder="Escolha um usuário" required></div>
                    
                    <label>E-mail</label>
                    <div class="input-icon-wrapper"><i class="icon-envelope"></i><input type="text" name="email" placeholder="você@dominio.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required></div>
                    
                    <label>Senha</label>
                    <div class="input-icon-wrapper"><i class="icon-lock"></i><input type="password" name="senha" placeholder="Escolha uma senha" required></div>
                    
                    <button type="submit" class="btn modern-btn btn-primary-modern">Criar Conta</button>
                </form>
            </div>

            <!-- ABA: SENHA -->
            <div class="tab-pane fade" id="senha">
                <form class="modern-form" method="post" action="esquece_senha.php">
                    <p style="color: #666; font-size: 13px; margin: 0 0 20px 0; padding: 0; text-indent: 0; line-height: 1.5; text-align: left;">Esqueceu sua senha? Informe seu usuário abaixo e enviaremos suas credenciais por e-mail.</p>
                    <label>Usuário</label>
                    <div class="input-icon-wrapper"><i class="icon-user"></i><input type="text" name="login" placeholder="Seu usuário cadastrado" required></div>
                    
                    <button type="submit" class="btn modern-btn btn-primary-modern">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modais (efeito lightbox) mantidas com estilo ajustado -->
<div class="modais-custom">
    <div id="myModa3" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="border-radius: 12px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 style="color: #10b981;">Parabéns!</h3>
      </div>
      <div class="modal-body">
        <p>Cadastro efetuado com sucesso. Verifique sua caixa de e-mail com as suas credenciais.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Fechar</button>
      </div>
    </div>

    <div id="errologin" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="border-radius: 12px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 style="color: #ef4444;">Atenção!</h3>
      </div>
      <div class="modal-body">
        <p>O usuário ou senha que você informou não é válido. Verifique e tente novamente.</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
      </div>
    </div>

    <div id="duplogin" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="border-radius: 12px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 style="color: #ef4444;">Atenção!</h3>
      </div>
      <div class="modal-body">
        <p>O usuário que você informou já existe em nossa base. Escolha outro e tente novamente.</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
      </div>
    </div>

    <div id="confenvpass" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true" style="border-radius: 12px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 style="color: #2563eb;">Obrigado!</h3>
      </div>
      <div class="modal-body">
        <p>Verifique sua caixa de entrada. Suas credenciais foram enviadas para seu endereço de e-mail.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Fechar</button>
      </div>
    </div>
</div>

</body>
</html>