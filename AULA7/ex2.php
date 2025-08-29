<?php
class Pessoa {
    private $nome;
    private $idade;
    private $email;

    private function __construct($nome, $idade, $email) {
        $this->setNome ($nome);
        $this->setIdade ($idade);
        $this->setEmail ($email);
    }

    public function setNome($nome) {
        $this->nome = ucwords(strtolower($nome));
    }

    public function getNome() {
        return $this->nome;
    }

    public function setIdade($idade) {
        $this->idade = abs((int)$idade);
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setEmail($email) {
        $this->email = strtolower($email);
    }

    public function getEmail() {
        return $this->email;
    }

    public function exibirnfo() {
        return "O nome é $this->nome, tem $this->idade anos e o email é $this->email";
    }
}

$pessoa1 = new Pessoa("Murilo", 16, "ex@gmail.com");

echo $pessoa1->exibirnfo();
?>