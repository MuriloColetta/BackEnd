<?php
class Funcionario {
    private $nome;
    private $salario;

    public function __construct($nome, $salario) {
        $this->setNome($nome);
        $this->setSalario($salario);
    }

    public function setNome($nome) {
        $this->nome = ucwords(strtolower($nome));
    }

    public function getNome() {
        return $this->nome;
    }

    public function setSalario($salario) {
        $this->salario = abs((float)$salario);
    }

    public function getSalario() {
        return $this->salario;
    }

    public function exibirinfo() {
        return "O funcionário $this->nome tem o salário de R$ $this->salario\n";
    }
}

$funcionario1 = new Funcionario("Eduardo", 1501.50);

echo $funcionario1->exibirinfo();

$funcionario1->setNome("Hiro");
$funcionario1->setSalario(1800.99);

echo $funcionario1->exibirinfo();
?>