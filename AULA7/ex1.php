<?php
class Carro {
    private $marca;
    private $modelo;

    private function __construct($marca, $modelo) {
        $this->setMarca ($marca);
        $this->setModelo ($modelo);
    }

    public function setMarca ($marca) {
        $this->marca = ucwords(strtolower($marca));
    }

    public function getMarca () {
        return $this->marca;
    }

    public function setModelo ($modelo) {
        $this->modelo = $modelo;
    }

    public function getModelo () {
        return $this->modelo;
    }

    public function exibirimfo() {
        return "O carro é um $this->marca $this->modelo\n";
    }
}

$carro1 = new Carro("Nissan", "GTR");

echo $carro1->exibirimfo();

?>