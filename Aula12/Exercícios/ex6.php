<?php
// Cenário 6 – Cinema
// Classes :
//   SistemaDeCinema
//   Cliente
//   Filme
//   Sessao
//   Ingresso
//   Sala
// Métodos :
//   SistemaDeCinema: exibirSessoes(), venderIngresso()
//   Cliente: comprarIngresso()
//   Filme: getDetalhes()
//   Sessao: reservarAssento(), liberarAssento()
//   Ingresso: validar()
//   Sala: verificarDisponibilidade()
// Relacionamentos:
//   Cliente → Ingresso: O cliente compra um ingresso para uma sessão.
//   Ingresso → Sessao: O ingresso pertence a uma sessão de filme específica.
//   Sessao → Filme: Cada sessão exibe um filme.
//   Cliente ↔ Sessao: O cliente escolhe a sessão para assistir.

class SistemaDeCinema {
    private array $sessoes = [];

    public function adicionarSessao(Sessao $sessao) {
        $this->sessoes[] = $sessao;
    }

    public function exibirSessoes() {
        echo "Sessões disponíveis:\n";
        foreach ($this->sessoes as $sessao) {
            echo "- {$sessao->getFilme()->getDetalhes()} na Sala {$sessao->getSala()->getNumero()}\n";
        }
    }

    public function venderIngresso(Cliente $cliente, Sessao $sessao, int $assento) {
        if ($sessao->reservarAssento($assento)) {
            $ingresso = new Ingresso($cliente, $sessao, $assento);
            echo "Ingresso vendido para {$cliente->getNome()} no assento {$assento}.\n";
            $ingresso->validar();
            return $ingresso;
        } else {
            echo "Assento {$assento} não disponível.\n";
            return null;
        }
    }
}

class Cliente {
    private string $nome;

    public function __construct(string $nome) {
        $this->nome = $nome;
    }

    public function comprarIngresso(SistemaDeCinema $sistema, Sessao $sessao, int $assento) {
        return $sistema->venderIngresso($this, $sessao, $assento);
    }

    public function getNome(): string {
        return $this->nome;
    }
}

class Filme {
    private string $titulo;
    private string $duracao;

    public function __construct(string $titulo, string $duracao) {
        $this->titulo = $titulo;
        $this->duracao = $duracao;
    }

    public function getDetalhes(): string {
        return "{$this->titulo} ({$this->duracao})";
    }
}

class Sessao {
    private Filme $filme;
    private Sala $sala;
    private array $assentos = [];

    public function __construct(Filme $filme, Sala $sala) {
        $this->filme = $filme;
        $this->sala = $sala;
        $this->assentos = array_fill(1, $sala->getCapacidade(), false);
    }

    public function reservarAssento(int $numero): bool {
        if ($this->verificarDisponibilidade($numero)) {
            $this->assentos[$numero] = true;
            return true;
        }
        return false;
    }

    public function liberarAssento(int $numero) {
        $this->assentos[$numero] = false;
    }

    public function verificarDisponibilidade(int $numero): bool {
        return isset($this->assentos[$numero]) && !$this->assentos[$numero];
    }

    public function getFilme(): Filme {
        return $this->filme;
    }

    public function getSala(): Sala {
        return $this->sala;
    }
}

class Ingresso {
    private Cliente $cliente;
    private Sessao $sessao;
    private int $assento;

    public function __construct(Cliente $cliente, Sessao $sessao, int $assento) {
        $this->cliente = $cliente;
        $this->sessao = $sessao;
        $this->assento = $assento;
    }

    public function validar() {
        echo "Ingresso para {$this->cliente->getNome()} validado no assento {$this->assento}.\n";
    }
}

class Sala {
    private int $numero;
    private int $capacidade;

    public function __construct(int $numero, int $capacidade) {
        $this->numero = $numero;
        $this->capacidade = $capacidade;
    }

    public function verificarDisponibilidade(int $assento): bool {
        return $assento > 0 && $assento <= $this->capacidade;
    }

    public function getNumero(): int {
        return $this->numero;
    }

    public function getCapacidade(): int {
        return $this->capacidade;
    }
}

$sistema = new SistemaDeCinema();
$sala = new Sala(1, 10);
$filme = new Filme("Aventura Épica", "120 min");
$sessao = new Sessao($filme, $sala);

$sistema->adicionarSessao($sessao);
$sistema->exibirSessoes();

$cliente = new Cliente("Carla");
$ingresso = $cliente->comprarIngresso($sistema, $sessao, 5);