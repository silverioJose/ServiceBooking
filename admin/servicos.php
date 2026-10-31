<?php
session_start();

// Proteção: Se o admin não estiver logado, redireciona para o login
if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gerir Serviços - Painel Admin</title>
    <link rel="stylesheet" href="../public/css/main.css">
</head>
<body>

    <header style="padding: 20px; background: #f4f4f4; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center;">
        <h2>Painel Administrativo - Serviços</h2>
        <div>
            <span>Logado como: <strong><?= htmlspecialchars($_SESSION['admin_email'] ?? 'Admin') ?></strong></span> | 
            <a href="logout.php" style="color: red; text-decoration: none; margin-left: 10px;">Sair</a>
        </div>
    </header>

    <main style="padding: 30px;">
        <h3>Lista de Serviços (Teste Estático)</h3>
        <p style="color: #666; margin-bottom: 20px;">Esta é uma página protegida. Se consegues ver isto, o teu login funcionou!</p>

        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; background: #fff;">
            <thead>
                <tr style="background: #f9f9f9;">
                    <th>ID</th>
                    <th>Nome do Serviço</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Corte de Cabelo</td>
                    <td>R$ 50,00</td>
                    <td>
                        <a href="#" style="color: #007bff; text-decoration: none;">Editar</a> | 
                        <a href="#" style="color: #dc3545; text-decoration: none;">Excluir</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Dia da Noiva</td>
                    <td>R$ 500,00</td>
                    <td>
                        <a href="#" style="color: #007bff; text-decoration: none;">Editar</a> | 
                        <a href="#" style="color: #dc3545; text-decoration: none;">Excluir</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

</body>
</html>