<?php

include __DIR__ . "../../src/Config/Database.php";
include __DIR__ . "../../src/DAO/ServicoDAO.php";

$pdo = Database::getConexao();
$sDAO = new ServicoDAO($pdo);

$servicos = $sDAO->listarTodos();

include_once __DIR__ . '/layout/sidebar.php'
?>

<div class="painel">
    <H1>Servicos</H1>
    <a href="">Adicionar</a>
</div>


<section>
    <table class="tabela-servicos">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Duração</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody class="tabela-servicos-dados">
            <?php if (empty($servicos)) : ?>
                <tr><td colspan="4">Nenhum serviço cadastrado</td></tr>
            <?php else : ?>
                <?php foreach ($servicos as $s) : ?>
                    <tr>
                        <td><?= htmlspecialchars($s->getNome()) ?></td>
                        <td>
                            <?php if ($s->getDuracaoMinutos() !== null && $s->getDuracaoMinutos() > 0): ?>
                                <?= $s->getDuracaoMinutos() ?> min
                            <?php else : ?>
                                Sob consulta
                            <?php endif ; ?>
                        </td>
                        <td><?= $s->getPreco() ?> R$</td>
                        <td>
                            <a class="btn-editar" href="">Editar</a>
                            <a class="btn-atencao" href="">Excluir</a>
                        </td>
                        
                    </tr>
                <?php endforeach ; ?>
            <?php endif ; ?>

        </tbody>

        
    </table>
</section>

<?php
include_once __DIR__ . '/layout/footer.php'
?>