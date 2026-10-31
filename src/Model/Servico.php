<?php

class Servico {
    private ?int $id = null;
    private string $nome = '';
    private string $descricao = '';
    private int $duracao_minutos = 0;
    private float $preco = 0.0;
    private string $foto = '';

    //mapeador array(banco)->objeto
    public static function fromArray(array $dados): self {
        $servico = new self();
        $servico->id = $dados['id'] ?? null;
        $servico->nome = $dados['nome'] ?? '';
        $servico->descricao = $dados['descricao'] ?? '';
        $servico->duracao_minutos = $dados['duracao_minutos'] ?? 0;
        $servico->preco = $dados['preco'] ?? 0.0;
        $servico->foto = $dados['foto'] ?? '';
        
        return $servico;
    }

    // --- ID ---
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    // --- Nome ---
    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    // --- Descricao ---
    public function getDescricao(): string {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void {
        $this->descricao = $descricao;
    }

    // --- Duracao Minutos ---
    public function getDuracaoMinutos(): int {
        return $this->duracao_minutos;
    }

    public function setDuracaoMinutos(int $duracao_minutos): void {
        $this->duracao_minutos = $duracao_minutos;
    }

    // --- Preco ---
    public function getPreco(): float {
        return $this->preco;
    }

    public function setPreco(float $preco): void {
        $this->preco = $preco;
    }

    // --- Foto ---
    public function getFoto(): string {
        return $this->foto;
    }

    public function setFoto(string $foto): void {
        $this->foto = $foto;
    }
}

?>