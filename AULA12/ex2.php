<?php
// Cenário 2 – Heróis e Personagens
// Classes :
//   Heroi
//   Missao
//   LocalDeTreinamento
//   Shopping
//   Brinquedo
//   Crianca
// Métodos :
//   Heroi: treinar(), realizarMissao(), doarBrinquedo()
//   Missao: iniciar(), finalizar()
//   LocalDeTreinamento: oferecerTreinamento()
//   Shopping: receberDoacao()
//   Brinquedo: getTipo()
//   Crianca: receberBrinquedo()
// Relacionamentos :
//   Heroi & Missao (agregação)
//   Heroi & LocaldeTreinamento (agregação)
//   Heroi & shopping (assosiação)
//   Heroi & Brinquedo (assosiação)
//   Heroi & crianca (assosiação)
//   Brinquedo & crianca (agregação) 

class Heroi {
    public string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function treinar(LocalDeTreinamento $local)
    {
        echo "{$this->nome} está treinando em {$local->getNome()}.\n";
        $local->oferecerTreinamento($this);
    }

    public function realizarMissao(Missao $missao)
    {
        echo "{$this->nome} está iniciando a missão '{$missao->getDescricao()}'.\n";
        $missao->iniciar();
        $missao->finalizar();
    }

    public function doarBrinquedo(Brinquedo $brinquedo, Crianca $crianca)
    {
        echo "{$this->nome} está doando um(a) {$brinquedo->getTipo()} para {$crianca->getNome()}.\n";
        $crianca->receberBrinquedo($brinquedo);
    }
}

class Missao {
    private string $descricao;

    public function __construct(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function iniciar()
    {
        echo "Missão '{$this->descricao}' iniciada.\n";
    }

    public function finalizar()
    {
        echo "Missão '{$this->descricao}' finalizada.\n";
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }
}

class LocalDeTreinamento {
    private string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function oferecerTreinamento(Heroi $heroi)
    {
        echo "Treinamento oferecido para {$heroi->nome} em {$this->nome}.\n";
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}

class Shopping {
    private string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function receberDoacao(Brinquedo $brinquedo)
    {
        echo "Shopping {$this->nome} recebeu a doação de um(a) {$brinquedo->getTipo()}.\n";
    }
}

class Brinquedo {
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

class Crianca {
    private string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function receberBrinquedo(Brinquedo $brinquedo)
    {
        echo "{$this->nome} recebeu um(a) {$brinquedo->getTipo()}.\n \n";
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}

$heroi = new Heroi("Batman");
$missao = new Missao("Apagar o fogo");
$local = new LocalDeTreinamento("Cotil");
$crianca = new Crianca("Paulo");
$brinquedo = new Brinquedo("bola");
$shopping = new Shopping("Shopping Center");

$heroi->treinar($local);
$heroi->realizarMissao($missao);
$heroi->doarBrinquedo($brinquedo, $crianca);
$shopping->receberDoacao($brinquedo);


$heroi = new Heroi("Superman");
$missao = new Missao("Impedir vazamento de óleo");
$local = new LocalDeTreinamento("Cotil");
$crianca = new Crianca("João");
$brinquedo = new Brinquedo("carrinho");
$shopping = new Shopping("Shopping Center");

$heroi->treinar($local);
$heroi->realizarMissao($missao);
$heroi->doarBrinquedo($brinquedo, $crianca);
$shopping->receberDoacao($brinquedo);


$heroi = new Heroi("Homem-Aranha");
$missao = new Missao("Salvar o parque");
$local = new LocalDeTreinamento("Cotil");
$crianca = new Crianca("Ana");
$brinquedo = new Brinquedo("boneca");
$shopping = new Shopping("Shopping Center");

$heroi->treinar($local);
$heroi->realizarMissao($missao);
$heroi->doarBrinquedo($brinquedo, $crianca);
$shopping->receberDoacao($brinquedo);