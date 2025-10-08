<?php
// Cenário 1 – Viagem pelo Mundo
// Classes :
//   Turista
//   Local
//   Atividade (abstrata/interface)
//   Comida
//   CorpoDagua
// Métodos :
//   Turista: visitar(), comer(), nadar()
//   Local: informarAtividades()
//   Atividade: executar()
//   Comida: getDescricao()
//   CorpoDagua: getTipo()
// Relações :
//   Turista & local (assosiação)
//   Turista & atividade (associação)
//   Turista & comida (associação)
//   Turista & corpodagua (associação)
//   Local & atividade (agregação)

class Turista {
    public string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function visitar(Local $local)
    {
        echo "{$this->nome} está visitando {$local->cidade}, {$local->pais}.\n";
    }

    public function comer(Comida $comida)
    {
        echo "{$this->nome} está comendo {$comida->getDescricao()}.\n";
    }

    public function nadar(CorpoDagua $corpoDagua)
    {
        echo "{$this->nome} está nadando em um(a) {$corpoDagua->getTipo()}.\n";
    }
}

class Local {
    public string $pais;
    public string $cidade;
    public string $tipo;

    public function __construct(string $pais, string $cidade, string $tipo)
    {
        $this->pais = $pais;
        $this->cidade = $cidade;
        $this->tipo = $tipo;
    }

    public function informarAtividades(array $atividades)
    {
        echo "Atividades disponíveis em {$this->cidade}:\n";
        foreach ($atividades as $atividade) {
            $atividade->executar();
        }
    }
}

interface Atividade {
    public function executar();
}

class Comida {
    private string $descricao;

    public function __construct(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }
}

class CorpoDagua {
    private string $tipo;

    public function __construct(string $tipo)
    {
        $this->tipo = $tipo;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }
}

class Passeio implements Atividade {
    public function executar()
    {
        echo "Executando um passeio turístico.\n";
    }
}

class Mergulho implements Atividade {
    public function executar()
    {
        echo "Executando um mergulho.\n \n";
    }
}

$turista = new Turista("Eduardo");
$praia = new Local("Brasil", "Rio de Janeiro", "praia");
$comida = new Comida("Peixe fresco");
$mar = new CorpoDagua("mar");
$atividades = [new Passeio(), new Mergulho()];

$turista->visitar($praia);
$turista->comer($comida);
$turista->nadar($mar);
$praia->informarAtividades($atividades);

$turista = new Turista("Gabriel");
$praia = new Local("Acre", "Feijó", "rio");
$comida = new Comida("Pirarucu");
$mar = new CorpoDagua("rio");
$atividades = [new Passeio(), new Mergulho()];

$turista->visitar($praia);
$turista->comer($comida);
$turista->nadar($mar);
$praia->informarAtividades($atividades);

$turista = new Turista("Mariana");
$praia = new Local("Japão", "Okinawa", "praia");
$comida = new Comida("Sushi");
$mar = new CorpoDagua("oceano");
$atividades = [new Passeio(), new Mergulho()];

$turista->visitar($praia);
$turista->comer($comida);
$turista->nadar($mar);
$praia->informarAtividades($atividades);