<?php

require_once __DIR__ . '/../../config/config.php';

require_once ROOT_PATH . 'src/Config/Database.php';
require_once ROOT_PATH . 'src/DAO/ServicoDAO.php';

$pdo = Database::getConexao();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $duracao_minutos = $_POST['duracao_minutos'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $foto = $_POST['foto'] ?? '';

    $s = new Servico();

    if (!empty($id)) {
        $s->setId((int) $id);
    }

    $s->setNome($nome);
    $s->setDescricao($descricao);
    $s->setDuracaoMinutos((int)$duracao_minutos);
    $s->setPreco((float)$preco);
    $s->setFoto($foto);

    $sDAO = new ServicoDAO($pdo);

    if (empty($id)) {
        $sucesso = $sDAO->inserir($s);
    } else {
        $sucesso = $sDAO->atualizar($s);
    }

    if ($sucesso) {
        header('Location: ' . ADMIN_URL . 'servicos/index.php?sucesso=1');
        exit;
    } else {
        header('Location: ' . ADMIN_URL . 'servicos/index.php');
        exit;
    }
}


?>