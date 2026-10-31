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

}

?>