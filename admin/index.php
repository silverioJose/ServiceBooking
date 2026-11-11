<?php
$erro = '';
if (isset($_GET['erro'])) {
    if ($_GET['erro'] === 'dados_incorretos') $erro = "E-mail ou palavra-passe incorretos.";
    if ($_GET['erro'] === 'vazios') $erro = "Por favor, preencha todos os campos.";
    if ($_GET['erro'] === 'servidor') $erro = "Erro interno no servidor.";
}

require_once __DIR__ . '/../config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Painel Admin</title>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>">
</head>

<body>  
    <section class="login">  
        <div class="login-box">      
            <h2>Painel Administrativo</h2><br>
            
            <?php if (!empty($erro)): ?>
                <p><?= htmlspecialchars($erro) ?></p>
            <?php endif; ?>

            <form action="login/login.php" method="POST">
                <div class="form-group">
                    <label for="email">E-mail</label><br>
                    <input class="login-input" type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label><br>
                    <input class="login-input" type="password" id="senha" name="senha" required>
                </div>
                <br>
                <div class="login-grid">
                    <a class="btn-login" href="../">Sair</a>
                    <button type="submit" class="btn-login">Entrar</button>         
                </div>
            </form>
    </div>
    </section>
    <script src="<?php echo BASE_URL; ?>public/js/style.js"></script>
</body>
</html>