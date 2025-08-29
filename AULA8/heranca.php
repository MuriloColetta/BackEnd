<?php
class Imovel {
    private $categoria;
    private $nComodos;
    private $valor;
    private $estadoConservacao;

    public function __construct($categoria, $nComodos, $valor, $estadoConservacao) {
        $this->categoria = $categoria;
        $this->nComodos = $nComodos;
        $this->valor = $valor;
        $this->estadoConservacao = $estadoConservacao;

    }
}

class Casa extends Imovel {
    private $tem_quintal;

    public function __construct($categoria, $nComodos, $valor, $estadoConservacao, $tem_quintal) {
        parent::__construct($categoria, $nComodos, $valor, $estadoConservacao);
        $this->tem_quintal = $tem_quintal;
    }
}

class Apartamento extends Imovel {
    private $andar;

    public function __construct($categoria, $nComodos, $valor, $estadoConservacao, $andar) {
        parent::__construct($categoria, $nComodos, $valor, $estadoConservacao);
        $this->andar = $andar;
    }
}

class Escola extends Imovel {
    private $seguimento;

    public function __construct($categoria, $nComodos, $valor, $estadoConservacao, $seguimento) {
        parent::__construct($categoria, $nComodos, $valor, $estadoConservacao);
        $this->seguimento = $seguimento;
    }
}