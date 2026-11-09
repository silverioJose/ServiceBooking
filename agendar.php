<?php 
    $pagina = "Agendar";

    $empresa = "Nome";

    include __DIR__ . "/src/Config/Database.php";
    include __DIR__ . "/src/DAO/ServicoDAO.php";

    $pdo = Database::getConexao();
    $sDAO = new ServicoDAO($pdo);

    $servicos = $sDAO->listarTodos();

    include_once __DIR__ . '/src/Layouts/header.php'
?>


    <section class="agendamento">
        <div class="agendamento-col">
            <h2 class="agendamento-titulo">Selecione uma data para agendamento</h2>
            <div class="grid-mes">
                <button class="btn-primary" id="btn-anterior">‹</button>
                <h3 id="titulo-mes" class="mes"></h3>
                <button class="btn-primary" id="btn-proximo">›</button>
            </div>

            <table class="calendario">
                
                <thead>
                    <tr>
                        <th>Dom</th>
                        <th>Seg</th>
                        <th>Ter</th>
                        <th>Qua</th>
                        <th>Qui</th>
                        <th>Sex</th>
                        <th>Sáb</th>
                    </tr>
                </thead>
                <tbody id="calendario-corpo"></tbody>
            </table>
        </div>
        <div  class="card-servico">
            <h2>Seu Pedido</h2>
            <div id="pedido-itens"></div>
            <div id="pedido-btn"></div>

            

            <div id="preview-whatsapp"></div>
        </div>
    </section>

    <section class="services">
        <h2>Selecione o serviço</h2>

        <?php foreach ($servicos as $s) : ?>
            <article class="agendar-servico">
                <div class="service-grid">
                    <h3><?= htmlspecialchars($s->getNome()) ?></h3>
                    <div class="service-grid">
                        <div class="service-grid-col">
                            <?= $s->getPreco(); ?> R$     
                            <span >
                                <?php if ($s->getDuracaoMinutos() !== null && $s->getDuracaoMinutos() > 0): ?>
                                <?= $s->getDuracaoMinutos() ?> min
                                <?php else : ?>
                                    Sob consulta
                                <?php endif ; ?>
                            </span>
                             
                        </div>
                        <a href="#agendar" class="btn-book"
                            data-id="<?= (int) $s->getId() ?>"
                            data-nome="<?= htmlspecialchars($s->getNome()) ?>"
                            data-preco="<?= $s->getPreco() ?>"
                            data-tempo="<?= (int) $s->getDuracaoMinutos() ?>">Reservar</a>
                    </div>                
                </div>
            </article>
        <?php endforeach ; ?>
    </section>
    

    <script src="public/js/calendario.js"></script>
    <script src="public/js/pedido.js"></script>
        
<?php include_once __DIR__ . '/src/Layouts/footer.php' ?>