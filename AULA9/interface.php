<?php

//Notificadores d acess:
//Existem 3 tipos: Public, Private e Protected
// Public NomeDoAtributo: métodos e eatributos públicos

//Private NomeDoAtributo: métodos e atributos privados para acesso somente dentro da classe e de suas classes filhas

//Protected NomeDoAtributo: métodos e atributos protegidos para acesso somente da classe e de suas classes filhas

//Pacotes: sintaxe logo no início do código, que atribui de onde os arquivos pertencem, ou seja, o caminho da pasta em que ele está contido. Exemplo:

//namespace AULA9;

//Caso tenha mais arquivos que formam o BackEnd de uma página WEB e possuam a mesma raiz, o nomespace será o mesmo

namespace AULA9;

Interface Pagamento {
    public function pagar($valor);
}

class CartaoCredito implements Pagamento {
    function pagar($valor) {
        echo "Pagamento realizado com cartão de crédto, valor: $valor\n";
    }
}

class PIX implements Pagamento {
    function pagar($valor) {
        echo "Pagamento realizado via PIX, valor: $valor\n";
    }
}

interface Forma {
    public function calcularArea($area);
}

class Quadrado implements Forma {
    public function calcularArea($lado) {
        $area = $lado * $lado;
        return $area;
    }
}

class Circulo implements Forma {
    public function calcularArea($raio) {
        $area = 3.14 * ($raio * $raio);
        return $area;
    }
}

$square = new Quadrado();
$circle = new Circulo();

echo "Área do quadrado: ".$square->calcularArea(readline("\nDigite a medida do lado do qiadrado:"))."\n";
echo "Área do círculo: ".$circle->calcularArea(readline("\nDigite a medida do raio do círculo:"))."\n";

class Pentagono implements Forma {
    public function calcularArea($lado,)
}