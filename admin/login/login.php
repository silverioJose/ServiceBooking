<?php

session_start();

if (isset($_SESSION['admin_logado']) && $_SESSION['admin_logado'] === true) {
    header('Location: ../layout/sidebar.php');
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (!empty($email) && !empty($senha)) {
        try {
            require_once '../../src/Config/Database.php';
            $pdo = Database::getConexao();

            $stmt = $pdo->prepare("Select * FROM admins WHERE email = :email");
            $stmt->execute([':email' => $email]);
            $admin = $stmt->fetch();

            if ($admin && $senha === $admin['senha']) {
                $_SESSION['admin_logado']= true;
                $_SESSION['admin_email'] = $admin['email'];
                $_SESSION['admin_nome'] = $admin['nome'] ?? 'Admintrador';
                
                header('Location: ../layout/sidebar.php');
                exit;
            } else {
                header('Location: ../index.php?erro=dados_incorretos');
                exit;
            }
        } catch (PDOException $e) {
            header('Location: ../index.php?erro=servidor');
            exit;
        }
    } else {
        header('Location: ../index.php?erro=vazios');
        exit;
    }
}

?>
