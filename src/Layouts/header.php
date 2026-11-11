<?php
//Captura do caminho atual da URL para destacar pagina tiva
$uriAtual = $_SERVER['REQUEST_URI'] ?? '';

$empresa = "Nome";

require_once __DIR__ . '/../../config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pagina ?? 'Nome' ?></title>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>">

    <!-- Remover -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Cinzel:wght@600;700&family=Inter:wght@400;600&family=Montserrat:wght@400;700&family=Oswald:wght@500;700&family=Satisfy&display=swap" rel="stylesheet">

</head>
<body class="body">
    <header class="header">
        <div class="header-content">
            <a class="name" href="index.php">
                <img src="" alt="Logo">
                <span><?= $empresa ?? 'Nome' ?></span>
            </a>
            <div class="nav-menu">
                <!--
                <button class="btn-primary" id="btn-tedma">Tema</button>
                -->
                <a href="/SaaS/"
                    class="<?= str_contains($uriAtual,  'index.php') ? 'active' : '' ?>">Início</a>
                <a href="agendar.php"
                    class="<?= str_contains($uriAtual,  'agendar.php') ? 'active' : '' ?>">Agendar</a>
                <a href="contato.php"
                    class="<?= str_contains($uriAtual,  'contato.php') ? 'active' : '' ?>">Contato</a>
                
                <a href="<?php echo ADMIN_URL; ?>">Login</a>

                <a id="btn-tema">
                    <svg width="24" height="24" viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <g clip-path="url(#a)">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10" d="M96 22v30m24-30v36m-42 76v24a11.998 11.998 0 0 0 12 12h12c3.183 0 6.235-1.264 8.485-3.515A11.996 11.996 0 0 0 114 158v-24M48 96v20a11.998 11.998 0 0 0 12 12h72c3.183 0 6.235-1.264 8.485-3.515A11.996 11.996 0 0 0 144 116V96.149L48 96Zm0 0V46a24 24 0 0 1 24-24h72v74H48Z"/>
                        </g>
                        <defs>
                            <clipPath id="a">
                                <path fill="#ffffff" d="M0 0h192v192H0z"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                
            </div>
        </div>
    </header>
    <div class="content">
        <main>