<?php

require_once __DIR__ . '/../Model/Servico.php';

class ServicoDAO {
    private PDO $pdo;
    //Recebe e guarda a conexão com banco, assim permitindo que 
    //todos metodos da classe reutilizarem a mesma conexao PDO
    public function __construct($pdo) {
        //Pega conexao do arquivo de conexao e guarda na variavel local
        $this->pdo = $pdo;
    }

    public function getParametros(Servico $servico): array {
        return [
            ':nome' => $servico->getNome(),
            ':descricao' => $servico->getDescricao(),
            ':duracao_minutos' =>$servico->getDuracaoMinutos(),
            ':preco' => $servico->getPreco(),
            ':foto' => $servico->getFoto()
        ];
    }

    public function listarTodos(): array {
        $sql = "SELECT * FROM servicos ORDER BY id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $linhas = $stmt->fetchAll();
        $servicos = [];
        
        foreach($linhas as $linha) {
            $servicos[] = Servico::fromArray($linha);
        }
        return $servicos;
    }

    public function listarPorId(int $id): ?Servico {
        $sql = "SELECT * FROM servicos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $linha = $stmt->fetch();

        if (!$linha) {
            return null;
        }

        return Servico::fromArray($linha);
    }

    public function inserir(Servico $servico): bool {
        $sql = "INSERT INTO servicos (
                nome, descricao, duracao_minutos, preco, foto
            ) VALUES (
                :nome, :descricao, :duracao_minutos, :preco, :foto
            )";

        $stmt = $this->pdo->prepare($sql);
        
        $sucesso = $stmt->execute($this->getParametros($servico));

        if ($sucesso) {
            $servico->setId((int) $this->pdo->lastInsertId());
        }

        return $sucesso;
    }

    public function excluir($id): bool {
        $sql = "DELETE FROM servicos WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }

}

?>