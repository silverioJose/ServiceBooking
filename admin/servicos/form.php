<?php
require_once __DIR__ . '/../../config/config.php';

require_once ROOT_PATH . 'src/Config/Database.php';
require_once ROOT_PATH . 'src/DAO/ServicoDAO.php';

$pdo = Database::getConexao();
$sDAO = new ServicoDAO($pdo);


include_once ADMIN_PATH . '/layout/sidebar.php';

$servico = null;
$tituloPagina = "Novo Serviço";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $servico = $sDAO->listarPorId($id);

    if ($servico) {
        $tituloPagina = "Editar Serviço";
    }
}



?>

<div class="painel">
    <H1><?= $tituloPagina ?? 'Serviços' ?></H1>
    <a href="<?php echo ADMIN_URL; ?>servicos/index.php">Voltar</a>
</div>

<form class="form" action="salvar.php" method="POST" enctype="multipart/form-data">
    
    <?php if ($servico && $servico->getId()): ?>
        <input type="hidden" name="id" value="<?= $servico->getId(); ?>">
    <?php endif; ?>

    <div>
        <label for="">Nome</label><br>
        <Input type="text" name="nome" placeholder="Nome do serviço"
            value="<?= $servico ? htmlspecialchars($servico->getNome()) : ''; ?>" required>
    </div>
    <div>
        <label for="">Descricao</label><br>
        <textarea name="descricao" rows="6" placeholder="Digite a descrição do serviço..."><?= $servico ? htmlspecialchars($servico->getDescricao()) : ''; ?></textarea>
    </div>
    <div>
        <label for="">Duracao em minutos</label><br>
        <input type="number" name="duracao_minutos" min="0" placeholder="00"
            value="<?= $servico ? $servico->getDuracaoMinutos() : ''; ?>">
    </div>
    <div>
        <label for="">Preco - R$</label><br>
        <input type="number" name="preco" min="0" step="10.0" placeholder="0.00"
            value="<?= $servico ? $servico->getPreco() : ''; ?>">
    </div>
    <div>
        <label for="">Foto</label><br>
        <input type="file" name="foto">
    </div>
    <br>
    <button type="submit">Salvar</button>
</form>


<?php
include_once ADMIN_PATH . '/layout/footer.php';
?>