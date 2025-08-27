<?php
class ProdutosMercado{
    public $nome;
    public $categoria;
    public $fornecedor;
    public $qtde_estoque;

    public function atualizarestoque($qtde_vendida) {
        $this->qtde_estoque -= $qtde_vendida;
        return $this->qtde_estoque;
    }

    public function __construct($nome,$categoria,$fornecedor,$qtde_estoque) {
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->qtde_estoque = $qtde_estoque;
    }

}

// $produto1 = new ProdutosMercado();
// $produto1->nome = "Suco Tang";
// $produto1->categoria = "Bebidas";
// $produto1->fornecedor = "Mondelez";
// $produto1->qtde_estoque = 200;

// $produto2 = new ProdutosMercado();
// $produto2->nome = "Energético Monster";
// $produto2->categoria = "Bebida";
// $produto2->fornecedor = "Coca-Cola";
// $produto2->qtde_estoque = 150;

$produto1 = new ProdutosMercado("Suco Tang", "Bebidas", "Mondelez", 200);

$produto2= new ProdutosMercado("Energético Monster", "Bebidas", "Coca-Cola", 150); 

?>