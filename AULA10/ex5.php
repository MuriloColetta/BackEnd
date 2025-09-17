<?php
class Calculadora {
    public function somar(...$numeros) {
        return array_sum($numeros);
    }
}

$calculadora = new Calculadora();

echo "Soma de 2 números: " . $calculadora->somar(5, 10) . "\n";
echo "Soma de 3 números: " . $calculadora->somar(1, 2, 3) . "\n";