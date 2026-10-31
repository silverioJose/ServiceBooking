<?php

require_once __DIR__ . '/../Model/Profissional.php';

class ProfissionalDAO {
    private PDO $pdo;
    //Recebe e guarda a conexão com banco, assim permitindo que 
    //todos metodos da classe reutilizarem a mesma conexao PDO
    public function __construct($pdo) {
        //Pega conexao do arquivo de conexao e guarda na variavel local
        $this->pdo = $pdo;
    }

    public function listarTodos(): array {
        $sql = "SELECT * FROM profissionais ORDER BY id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $linhas = $stmt->fetchAll();
        $profissional = [];
        
        foreach($linhas as $linha) {
            $profissional[] = Profissional::fromArray($linha);
        }
        return $profissional;
    }

}

?>