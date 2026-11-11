<?php 
    $pagina = "Início";
    $empresa = "Nome";

    include __DIR__ . "/src/Config/Database.php";
    include __DIR__ . "/src/DAO/ServicoDAO.php";

    $pdo = Database::getConexao();
    $sDAO = new ServicoDAO($pdo);

    $servicos = $sDAO->listarTodos();

    

    include_once __DIR__ . '/src/Layouts/header.php'
?>

    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title" id="hero-title">
                Realce sua <br> <span class="highlight">beleza</span> natural
            </h1>
            <hr class="line">
            <p class="hero-subtitle" id="hero-subtitle">Cuidados profissionais em cada detalhe</p>
            <a href="agendar.php" class="btn-primary hero-btn">Agendar Procedimento</a>
        </div>
        <div class="hero-img">
            <img id="img-hero" class="img" src="public/assets/imgs/salon.jpg" alt="Imagem">
        </div>
    </section>

    <section class="services">
        <h1>Conheça nossos Serviços</h1>

        <?php foreach ($servicos as $s) : ?>
            <article class="service-item">
                <div class="service-img">
                    <img src="public/assets/imgs/img.png" class="img" alt="Imagem padrao">
                </div>
                <div class="service-info">
                    <span class="tag-duration">
                        <?php if ($s->getDuracaoMinutos() !== null && $s->getDuracaoMinutos() > 0): ?>
                            ⏱ Duração: ~<?= $s->getDuracaoMinutos() ?> min
                        <?php else : ?>
                            Sob consulta • Atendimento Exclusivo
                        <?php endif ; ?>
                    </span>
                    <h2><?= htmlspecialchars($s->getNome()) ?></h2>
                    <p class="service-description"><?= htmlspecialchars($s->getDescricao())?></p>
                    <!--
                    <a href="#agendar" class="btn-book">Reservar Data</a>
                    -->
                </div>
            </article>
        <?php endforeach ; ?>
    </section>

    <h1 class="title">Onde Estamos</h2>
    <p class="subtitle">Visite o nosso espaço e conheça os serviços presencialmente</p>

    <section class="location" id="contato">
        <div class="location-info">
            <h2><?= $empresa ?></h2>
            <p><small>Morada</small><br> Rua Exemplo, 123<br>Bairro, Cidade - Estado</p>
            <p><small>Telefone / WhatsApp</small><br> (00) 90000-0000</p>
            <p><small>Funcionamento</small><br>
               Segunda a Sábado: 09:00 - 19:00
            </p>
            <p><small>Redes</small><br>
                <a href="">Instagram</a>
                <a href="">Facebook</a>
            </p>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11679.527762511541!2d-45.05159924371882!3d-22.12493095190789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cb4b8fb9b63397%3A0x85a7f003712e651f!2sCentro%20Universit%C3%A1rio%20S%C3%A3o%20Louren%C3%A7o%20-%20UNISEPE!5e1!3m2!1spt-BR!2sbr!4v1794157044856!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>        </div>
    </section>

<?php include_once __DIR__ . '/src/Layouts/footer.php' ?>                   