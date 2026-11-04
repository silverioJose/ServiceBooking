<?php
require_once __DIR__ . '/../../config/config.php';

require_once ROOT_PATH . 'src/Config/Database.php';
require_once ROOT_PATH . 'src/DAO/ServicoDAO.php';

$pdo = Database::getConexao();
$sDAO = new ServicoDAO($pdo);


include_once ADMIN_PATH . '/layout/sidebar.php';

/* 
$id = $_GET['id'] ?? $_POST['id'] ?? null;

if ($id) {
    $s = $sDAO->listarPorId((int)$id);
}



<?php if (isset($servico) && $servico->getId()): ?>
    <input type="hidden" name="id" value="<?= $s->getId(); ?>">
<?php endif; ?>

*/



?>

<div class="painel">
    <H1>Adicionar</H1>
    <a href="<?php echo ADMIN_URL; ?>servicos/index.php">Voltar</a>
</div>

<form class="form" action="salvar.php" method="POST" enctype="multipart/form-data">
    
    <div>
        <label for="">Nome</label><br>
        <Input type="text" name="nome" placeholder="Nome do serviço">
    </div>
    <div>
        <label for="">Descricao</label><br>
        <input type="text" name="descricao" placeholder="Descrição do serviço">
    </div>
    <div>
        <label for="">Duracao em minutos</label><br>
        <input type="number" name="duracao_minutos" min="0" step="30" placeholder="00">
    </div>
    <div>
        <label for="">Preco</label><br>
        <input type="number" name="preco" min="0" step="10.0" placeholder="0.00">
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