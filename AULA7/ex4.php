<?php
class Produto {
    private $nome;
    private $preco;
    private $estoque;

    public function __construct($nome, $preco, $estoque) {
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setEstoque($estoque);
    }

    public function setNome($nome) {
        $this->nome = ucwords(strtolower($nome));
    }

    public function getNome() {
        return $this->nome;
    }

    public function setPreco($preco) {
        $this->preco = abs((float)$preco);
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setEstoque($estoque) {
        $this->estoque = abs((int)$estoque);
    }

    public function getEstoque() {
        return $this->estoque;
    }

    public function exibirinfo() {
        return "O produto $this->nome custa R$ $this->preco e tem $this->estoque unidades no estoque.\n";
    }
}

$produto1 = new Produto("Notebook", 3500.50, 10);
$produto2 = new Produto("Garrafa", 230, 3);

echo $produto1->exibirinfo();
echo $produto2->exibirinfo();
?>