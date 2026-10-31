<?php

class Profissional {
    private ?int $id = null;
    private string $nome = '';
    private string $email = '';
    private string $telefone = '';
    private string $foto = '';
    private bool $ativo = true;

    //mapeador array(banco)->objeto
    public static function fromArray(array $dados): self {
        $profissional = new self();
        $profissional->id = $dados['id'] ?? null;
        $profissional->nome = $dados['nome'] ?? '';
        $profissional->email = $dados['email'] ?? '';
        $profissional->telefone = $dados['telefone'] ?? '';
        $profissional->foto = $dados['foto'] ?? '';
        $profissional->ativo = $dados['ativo'] ?? true;
        
        return $profissional;
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

    // --- Email ---
    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    // --- Telefone ---
    public function getTelefone(): string {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    // --- Foto ---
    public function getFoto(): string {
        return $this->foto;
    }

    public function setFoto(string $foto): void {
        $this->foto = $foto;
    }

    // --- Ativo (Booleano usa 'is' em vez de 'get') ---
    public function isAtivo(): bool {
        return $this->ativo;
    }

    public function setAtivo(bool $ativo): void {
        $this->ativo = $ativo;
    }
}

?>