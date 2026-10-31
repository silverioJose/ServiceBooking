<?php

class Agendamento {
    private ?int $id = null;
    private ?int $servico_id = null;
    private ?int $profissional_id = null;
    private ?string $data = null;
    private ?string $hora = null;
    private string $nome_cliente = '';
    private string $telefone_cliente = '';
    private string $status = 'confirmado';
    private ?string $criado_em = null;

    //mapeador array(banco)->objeto
    public static function fromArray(array $dados): self {
        $agendamento = new self();
        $agendamento->id = isset($dados['id']) ? (int)$dados['id'] : null;
        $agendamento->servico_id = isset($dados['servico_id']) ? (int)$dados['servico_id'] : null;
        $agendamento->profissional_id = isset($dados['profissional_id']) ? (int)$dados['profissional_id'] : null;
        $agendamento->data = $dados['data'] ?? null;
        $agendamento->hora = $dados['hora'] ?? null;
        $agendamento->nome_cliente = $dados['nome_cliente'] ?? '';
        $agendamento->telefone_cliente = $dados['telefone_cliente'] ?? '';
        $agendamento->status = $dados['status'] ?? 'confirmado';
        $agendamento->criado_em = $dados['criado_em'] ?? null;
        
        return $agendamento;
    }

    // --- ID ---
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    // --- Servico ID ---
    public function getServicoId(): ?int {
        return $this->servico_id;
    }

    public function setServicoId(?int $servico_id): void {
        $this->servico_id = $servico_id;
    }

    // --- Profissional ID ---
    public function getProfissionalId(): ?int {
        return $this->profissional_id;
    }

    public function setProfissionalId(?int $profissional_id): void {
        $this->profissional_id = $profissional_id;
    }

    // --- Data ---
    public function getData(): ?string {
        return $this->data;
    }

    public function setData(?string $data): void {
        $this->data = $data;
    }

    // --- Hora ---
    public function getHora(): ?string {
        return $this->hora;
    }

    public function setHora(?string $hora): void {
        $this->hora = $hora;
    }

    // --- Nome Cliente ---
    public function getNomeCliente(): string {
        return $this->nome_cliente;
    }

    public function setNomeCliente(string $nome_cliente): void {
        $this->nome_cliente = $nome_cliente;
    }

    // --- Telefone Cliente ---
    public function getTelefoneCliente(): string {
        return $this->telefone_cliente;
    }

    public function setTelefoneCliente(string $telefone_cliente): void {
        $this->telefone_cliente = $telefone_cliente;
    }

    // --- Status ---
    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }

    // --- Criado Em ---
    public function getCriadoEm(): ?string {
        return $this->criado_em;
    }

    public function setCriadoEm(?string $criado_em): void {
        $this->criado_em = $criado_em;
    }

}

?>