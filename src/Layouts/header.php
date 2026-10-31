<?php
//Captura do caminho atual da URL para destacar pagina tiva
$uriAtual = $_SERVER['REQUEST_URI'] ?? '';

//Apontamento até a pasta raiz
if (!defined('BASE_URL')) define('BASE_URL', '/SaaS');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nome ?? 'Nome' ?></title>
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body class="body">
    <header class="header">
        <div class="header-content">
            <a class="name" href="index.php">
                <img src="" alt="Logo">
                <span><?= $nome ?? 'Nome' ?></span>
            </a>
            <div class="nav-menu">
                <a href="index.php"
                    class="<?= str_contains($uriAtual,  'index.php') ? 'active' : '' ?>">Início</a>
                <a href="agendar.php"
                    class="<?= str_contains($uriAtual,  'agendar.php') ? 'active' : '' ?>">Agendar</a>
                <a href="contato.php"
                    class="<?= str_contains($uriAtual,  'contato.php') ? 'active' : '' ?>">Contato</a>
            </div>
        </div>
    </header>
    <div class="content">
        <main>