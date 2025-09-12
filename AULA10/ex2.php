<?php
namespace AULA10;

interface Animal {
    public function fazerSom();
}

class Cachorro implements Animal {
    public function fazerSom() {
        return "O cachorro faz: Au Au!\n";
    }
}

class Gato implements Animal {
    public function fazerSom() {
        return "O gato faz: Miau!\n";
    }
}

class Vaca implements Animal {
    public function fazerSom() {
        return "A vaca faz: Muu!\n";
    }
}

$cachorro = new Cachorro();
$gato = new Gato();
$vaca = new Vaca();

echo $cachorro->fazerSom();
echo $gato->fazerSom();
echo $vaca->fazerSom();