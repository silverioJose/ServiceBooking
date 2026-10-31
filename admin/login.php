<?php

session_start();

if (isset($_SESSION['admin_logado']) && $_SESSION['admin_logado'] === true) {
    header('Location: servicos.php');
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (!empty($email) && !empty($senha)) {
        try {
            require_once '../src/Config/Database.php';
            $pdo = Database::getConexao();

            $stmt = $pdo->prepare("Select * FROM admins WHERE email = :email");
            $stmt->execute([':email' => $email]);
            $admin = $stmt->fetch();

            if ($admin && $senha === $admin['senha']) {
                $_SESSION['admin_logado']= true;
                $_SESSION['admin_email'] = $admin['email'];

                header('Location: servicos.php');
                exit;
            } else {
                $erro = "E-mail ou palavra passe incorretos.";
            }
        } catch (PDOException $e) {
            $erro = "Erro interno no servidor. Tente novamente.";
        }
    } else {
    $erro = "Por favor, preencha todos os campos";
    }
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login - Painel Admin</title>
    <link rel="stylesheet" href="../public/css/main.css">
</head>
<body>
    

    <section class="login">
        <a class="btn-primary" href="../">Sair</a>
        <div class="login-box">
            
            <h2>Painel Administrativo</h2><br>
            
            <?php if (!empty($erro)): ?>
                <p style="color: red; margin-bottom: 15px;"><?= htmlspecialchars($erro) ?></p>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">E-mail</label><br>
                    <input class="login-input" type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label><br>
                    <input class="login-input" type="password" id="senha" name="senha" required>
                </div>
                <br>
                <button type="submit" class="btn-login">Entrar</button>
            </form>
    </div>
    </section>

</body>
</html>