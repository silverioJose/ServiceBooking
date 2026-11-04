<?php
require_once __DIR__ . '/../../config/config.php';

require_once ROOT_PATH . 'src/Config/Database.php';
require_once ROOT_PATH . 'src/DAO/ServicoDAO.php';

$pdo = Database::getConexao();

$id = $_GET['id'] ?? $_POST['id'] ?? null;

if (!$id) {
    header('Location: ' . ADMIN_URL . 'servicos/index.php');
    exit;
}

$sDAO = new ServicoDAO($pdo);

$sDAO->excluir((int) $id);

header('Location: ' . ADMIN_URL . 'servicos/index.php');
exit;
?>