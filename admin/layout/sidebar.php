<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Admin' ?></title>
    <link rel="stylesheet" href="../../public/css/main.css">

</head>
<body>
  <div>
    <!--Barra de navegação lateral-->
    <section class="menu">
        <div class="top-bar">
            <div>
              <a href="../../">
                <h3>NOME</h3>
              </a>
                
            </div>

            <div class="user">
                <p>Nome: <?= htmlspecialchars($_SESSION['admin_nome'] ?? 'Admin') ?> | <a href="../login/logout.php">Sair</a></p>
                
            </div>
        </div>
       

      <nav class="sidebar">
        <ul>

          <li class="sidebar-link"><a href="#">Serviços</a></li>
          <li class="sidebar-link"><a href="#">Agendamentos</a></li>
          <li class="sidebar-link"><a href="#">Funcionários</a></li>
        </ul>

        <p>v0.1 - Protótipo</p>
      </nav>

      
    </section>

    

    <main class="adminconteudo">
        <h2>Conteudo</h2>
    </main>
</html>