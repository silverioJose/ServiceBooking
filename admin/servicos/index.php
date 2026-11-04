<?php
require_once __DIR__ . '/../../config/config.php';

require_once ROOT_PATH . 'src/Config/Database.php';
require_once ROOT_PATH . 'src/DAO/ServicoDAO.php';

$pdo = Database::getConexao();
$sDAO = new ServicoDAO($pdo);

$servicos = $sDAO->listarTodos();

include_once ADMIN_PATH . '/layout/sidebar.php';
?>

<div class="painel">
    <H1>Servicos</H1>
    <a href="form.php">Adicionar</a>
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
                            <a class="btn-editar" href="<?= ADMIN_URL ?>servicos/form.php?id=<?= $s->getId() ?>">Editar</a>
                            <a class="btn-atencao" href="<?= ADMIN_URL ?>servicos/excluir.php?id=<?= $s->getId() ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                        </td>
                        
                    </tr>
                <?php endforeach ; ?>
            <?php endif ; ?>

        </tbody>

        
    </table>
</section>

<?php
include_once ADMIN_PATH . '/layout/footer.php';
?>