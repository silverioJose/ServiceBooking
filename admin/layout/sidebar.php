<?php
require_once __DIR__ . '/../../config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Admin' ?></title>
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>">

</head>
<body class="admin">
  <div>
    <!--Barra de navegação lateral-->
    <section class="menu">
        <div class="top-bar">
            <div>
              <a href="<?php echo ADMIN_URL; ?>painel.php"">
                <h3>Painel Admin</h3>
              </a>
                
            </div>

            <div class="user">
                <p>
                  <span>
                    <?= htmlspecialchars($_SESSION['admin_nome'] ?? 'Admin') ?> 
                  </span>
                  | 
                  <a class="btn-atencao" href="<?php echo BASE_URL; ?>">Sair</a>
                </p>
                
            </div>
        </div>
       

      <nav class="sidebar">
        <ul>

          <li class="sidebar-link"><a href="<?php echo ADMIN_URL; ?>/servicos">Serviços</a></li>
          <li class="sidebar-link"><a href="<?php echo ADMIN_URL; ?>/agendamentos">Agendamentos</a></li>
          
        </ul>

      </nav>  
    </section>

    <main class="adminconteudo">
        
