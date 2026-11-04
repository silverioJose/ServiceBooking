<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Admin' ?></title>
    <link rel="stylesheet" href="../public/css/main.css">

</head>
<body class="admin">
  <div>
    <!--Barra de navegação lateral-->
    <section class="menu">
        <div class="top-bar">
            <div>
              <a href="painel.php">
                <h3>Painel Admin</h3>
              </a>
                
            </div>

            <div class="user">
                <p>
                  <span>
                    <?= htmlspecialchars($_SESSION['admin_nome'] ?? 'Admin') ?> 
                  </span>
                  | 
                  <a class="btn-atencao" href="/admin/login/logout.php">Sair</a>
                </p>
                
            </div>
        </div>
       

      <nav class="sidebar">
        <ul>

          <li class="sidebar-link"><a href="servicos.php">Serviços</a></li>
          <li class="sidebar-link"><a href="agendamentos.php">Agendamentos</a></li>
          
        </ul>

      </nav>  
    </section>

    <main class="adminconteudo">
        
