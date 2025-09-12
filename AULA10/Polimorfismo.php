<?php
// Polimorfismo:

// O termo Polimorfismo significa "várias formas". Associando isso a Programação Orientada a Objetos, o conceito se trata de várias classes e suas instâncias (objetos)
// respondendo a um método de formas diferentes. No exemplo do Interface da AULA9, temos um método calcularArea() que responde de forma diferente à classe Circulo. Isso
// quer dizer que a função é a mesma - calcular a área de forma geométrica - mas a operação muda de acordo com a figura.

namespace AULA10;

interface Veiculo {
    public function mover();
}

class Carro implements Veiculo {
    public function mover() {
        echo "O carro está andando\n";
    }
}

class Aviao implements Veiculo {
    public function mover() {
        echo "O avião está voando\n";
    }
}

class Barco implements Veiculo {
    public function mover() {
        echo "O navio está navegando\n";
    }
}

class Elevador implements Veiculo {
    public function mover() {
        echo "O elevador está subindo\n";
    }
}

$carro = new Carro();
$aviao = new Aviao();
$barco = new Barco();
$elevador = new Elevador();

echo $carro->mover();
echo $aviao->mover();
echo $barco->mover();
echo $elevador->mover();