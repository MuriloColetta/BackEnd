<?php
namespace AULA10;

interface Veiculo {
    public function mover();
}

class Carro implements Veiculo {
    public function mover() {
        echo "O carro está andando na estrada\n";
    }
}

class Barco implements Veiculo {
    public function mover() {
        echo "O navio está navegando no mar\n";
    }
}

class Aviao implements Veiculo {
    public function mover() {
        echo "O avião está voando no céu\n";
    }
}

class Elevador implements Veiculo {
    public function mover() {
        echo "O elevador está correndo pelo prédio\n";
    }
}

$carro = new Carro();
$barco = new Barco();
$aviao = new Aviao();
$elevador = new Elevador();

echo $carro->mover();
echo $barco->mover();
echo $aviao->mover();
echo $elevador->mover();