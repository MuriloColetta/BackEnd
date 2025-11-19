<?php
require_once __DIR__ . '/../Model/LivroDAO.php';
require_once __DIR__ . '/../Model/Livro.php';

class LivroController {
    private $dao;

    // Construtor: cria o objeto DAO (responsável por salvar/carregar)
    public function __construct() {
        $this->dao = new LivroDAO();
    }

    // Lista todas as livro
    public function ler() {
        return $this->dao->lerLivros();
    }

    // Cadastra nova livro
    public function criar($titulo, $autor, $ano_publicacao, $genero, $qtde) {

        // // Gera ID automaticamente com base no timestamp (exemplo simples)
        // $id = time(); // Função caso o objeto tenha um atributo de ID

        $livro = new Livro( $titulo, $autor, $ano_publicacao, $genero, $qtde);
        $this->dao->criarLivro($livro);
    }

    // Atualiza livro existente
    public function atualizar( $titulo, $novoTitulo, $autor, $ano_publicacao, $genero, $qtde) {
        $this->dao->atualizarLivro( $titulo, $novoTitulo, $autor, $ano_publicacao, $genero, $qtde);
    }

    // Exclui livro
    public function deletar($titulo) {
        $this->dao->deletarLivro($titulo);
    }
}
?>