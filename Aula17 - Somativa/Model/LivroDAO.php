<?php
require_once 'Livro.php';
require_once 'Connection.php';

class LivroDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();

        // Garante existência da tabela
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS livros (
                id INT AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(200),
                autor VARCHAR(150),
                ano_publicacao INT,
                genero VARCHAR(100),
                qtde INT
            )
        ");
    }

    // CREATE
    public function criarLivro(Livro $livro) {
        $stmt = $this->conn->prepare("
            INSERT INTO livros (titulo, autor, ano_publicacao, genero, qtde)
            VALUES (:titulo, :autor, :ano_publicacao, :genero, :qtde)
        ");
        $stmt->execute([
            ':titulo' => $livro->getTitulo(),
            ':autor' => $livro->getAutor(),
            ':ano_publicacao' => $livro->getAno_publicacao(),
            ':genero' => $livro->getgenero(),
            ':qtde' => $livro->getQtde()
        ]);
    }

    // READ
    public function lerLivros() {
        $stmt = $this->conn->query("SELECT * FROM livros ORDER BY titulo");

        $result = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['titulo']] = new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano_publicacao'],
                $row['genero'],
                $row['qtde']
            );
        }

        return $result;
    }

    // UPDATE
    public function atualizarLivro($tituloOriginal, $novoTitulo, $autor, $ano_publicacao, $genero, $qtde) {
        $stmt = $this->conn->prepare("
            UPDATE livros
            SET titulo = :novoTitulo, autor = :autor,
                ano_publicacao = :ano_publicacao, genero = :genero, qtde = :qtde
            WHERE titulo = :tituloOriginal
        ");

        $stmt->execute([
            ':novoTitulo' => $novoTitulo,
            ':autor' => $autor,
            ':ano_publicacao' => $ano_publicacao,
            ':genero' => $genero,
            ':qtde' => $qtde,
            ':tituloOriginal' => $tituloOriginal
        ]);
    }

    // DELETE
    public function deletarLivro($titulo) {
        $stmt = $this->conn->prepare("
            DELETE FROM livros WHERE titulo = :titulo
        ");
        $stmt->execute([':titulo' => $titulo]);
    }

    // BUSCAR POR TITULO
    public function buscarPorTitulo($titulo) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE titulo = :titulo LIMIT 1");
        $stmt->execute([':titulo' => $titulo]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano_publicacao'],
                $row['genero'],
                $row['qtde']
            );
        }
        return null;
    }
}
?>