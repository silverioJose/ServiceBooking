<?php 
    $pagina = "Contato";

    include __DIR__ . "/src/Config/Database.php";
    include __DIR__ . "/src/DAO/ProfissionalDAO.php";

    $pdo = Database::getConexao();
    $pDAO = new ProfissionalDAO($pdo);

    $profissionais = $pDAO->listarTodos();

    include_once __DIR__ . '/src/Layouts/header.php'
?>

<h1 class="title">Contato</h2>

<section class="location">
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158521.49469658211!2d-43.028544855843926!3d-2.5721407775303198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7f19ee15e39be5f%3A0x2d2895d0d57e9beb!2sParque%20Nacional%20dos%20Len%C3%A7%C3%B3is%20Maranhenses!5e1!3m2!1spt-BR!2sbr!4v1793463398055!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div>
</section>     

<section class="profissionais">
    <h1 class="title">Nossos profissionais</h1>
    <?php if (empty($profissionais)) : ?>
        <h2>Nenhum profissional cadastrado</h2>
    <?php else : ?>
        <div class="profissionais-grid">
            <?php foreach ($profissionais as $p) : ?>
                <div>
                    <img class="img" src="public/assets/imgs/img.png" alt="Profissional">
                    <h2><?= htmlspecialchars($p->getNome()) ?></h2>
                    <p><span><?= htmlspecialchars($p->getTelefone()) ?></span>  •  <?= htmlspecialchars($p->getEmail()) ?></p>
                    
                </div>
            <?php endforeach ; ?>
        </div>
    <?php endif ; ?>
</section>


<?php include_once __DIR__ . '/src/Layouts/footer.php' ?>