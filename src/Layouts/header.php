<?php
//Captura do caminho atual da URL para destacar pagina tiva
$uriAtual = $_SERVER['REQUEST_URI'] ?? '';

$empresa = "Estudio";

require_once __DIR__ . '/../../config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pagina ?? 'Nome' ?></title>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>">
</head>
<body class="body">
    <header class="header">
        <div class="header-content">
            <a class="name" href="index.php">
                <img src="" alt="Logo">
                <span><?= $empresa ?? 'Nome' ?></span>
            </a>
            <div class="nav-menu">
                <a href="/SaaS/"
                    class="<?= str_contains($uriAtual,  'index.php') ? 'active' : '' ?>">Início</a>
                <a href="agendar.php"
                    class="<?= str_contains($uriAtual,  'agendar.php') ? 'active' : '' ?>">Agendar</a>
                <a href="contato.php"
                    class="<?= str_contains($uriAtual,  'contato.php') ? 'active' : '' ?>">Contato</a>
                
                <a href="<?php echo ADMIN_URL; ?>">Login</a>
                
            </div>
        </div>
    </header>
    <div class="content">
        <main>