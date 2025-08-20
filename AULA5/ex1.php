<?php
class Cachorro {
    public $nome;
    public $raca;
    public $idade;
    public $castrado;
    public $sexo;
    public function __construct($nome, $raca, $idade, $castrado, $sexo) {
        $this->nome = $nome;
        $this->raca = $raca;
        $this->idade = $idade;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
    }
}

$cachorro1 = new Cachorro("Thor", "Labrador", 5, true, "Macho");
$cachorro2 = new Cachorro("Tequila", "Shih Tzu", 3, false, "Fêmea");
$cachorro3 = new Cachorro("Rex", "Pastor Alemão", 7, true, "Macho");
$cachorro4 = new Cachorro("Luna", "Viram Lata", 2, false, "Fêmea");
$cachorro5 = new Cachorro("Bili", "Poodle", 10, false, "Macho");
$cachorro6 = new Cachorro("Jorlan", "American Bully", 2, true, "Macho");
$cachorro7 = new Cachorro("Bento", "Golden Retriever", 4, true, "Macho");
$cachorro8 = new Cachorro("Mel", "Beagle", 1, false, "Fêmea");
$cachorro9 = new Cachorro("Nina", "Bulldog Francês", 3, true, "Fêmea");
$cachorro10 = new Cachorro("Cookie", "Corgi", 1, false, "Macho");
?>