<?php
namespace AULA10;
interface Forma {
    public function calcularArea($area);
}

class Quadrado implements Forma {
    public function calcularArea($lado) {
        $area = $lado * $lado;
        return $area;
    }
}

class Retangulo implements Forma {
    public $altura;
    public function calcularArea($base) {
        $area = $base * $this->altura;
        return $area;
    }
}

class Circulo implements Forma {
    public function calcularArea($raio) {
        $area = 3.14 * ($raio * $raio);
        return $area;
    }
}

$quadrado = new Quadrado();
$retangulo = new Retangulo();
$circulo = new Circulo();

echo "Área do quadrado: ".$square->calcularArea(readline("\nDigite a medida do lado do qiadrado:"))."\n";
echo "Área do retângulo: ".$retangulo->calcularArea(readline("\nDigite a medida da base do retângulo:"), readline("\nDigite a medida da altura do retângulo:"))."\n";
echo "Área do círculo: ".$circle->calcularArea(readline("\nDigite a medida do raio do círculo:"))."\n";