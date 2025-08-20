<?php
class Carro {
    public $marca;
    public $modelo;
    public $ano;
    public $revisao;
    public $Ndonos;

    public function __construct($marca, $modelo, $ano, $revisao, $Ndonos) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->revisao = $revisao;
        $this->Ndonos = $Ndonos;
    }
}

$carro1 = new Carro("Porsche", "911", "2020", false, 3);
$carro2 = new Carro("Mitsubishi", "Lancer", "1945", true, 1);
$carro3 = new Carro("Ford", "Mustang", "2021", false, 1);
$carro4 = new Carro("Nissan", "GTR", "2018", true, 2);
$carro5 = new Carro("BMW", "M3", "2023", false, 1);
$carro6 = new Carro("Wolkswagen", "Fusca", "1959", false, 3);
?>