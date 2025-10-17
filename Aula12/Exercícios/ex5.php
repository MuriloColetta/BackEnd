<?php
// Cenário 5 – Biblioteca
// Classes :
//   SistemaDeBiblioteca
//   Usuario (base para Aluno, Professor)
//   ItemBibliotecario (base para Livro, Revista)
//   Emprestimo
// Métodos :
//   SistemaDeBiblioteca: registrarEmprestimo(), registrarDevolucao()
//   Usuario: solicitarEmprestimo(), devolverItem()
//   ItemBibliotecario: emprestar(), devolver()
//   Emprestimo: finalizar()
// Relacionamentos:
//   Usuario → Emprestimo: Um usuário pode fazer empréstimos de livros ou revistas.
//   Emprestimo → Livro/Revista: O empréstimo registra qual livro ou revista foi retirado.
//   Livro/Revista → Usuario: O livro ou revista está associado ao usuário que retirou.
//   Usuario ↔ Tipo de usuário: Aluno ou Professor (herança ou classificação).

class SistemaDeBiblioteca {
    public function registrarEmprestimo(Emprestimo $emprestimo) {
        echo "Emprestimo registrado para {$emprestimo->getUsuario()->getNome()} do item '{$emprestimo->getItem()->getTitulo()}'.\n";
    }

    public function registrarDevolucao(Emprestimo $emprestimo) {
        echo "Devolução registrada do item '{$emprestimo->getItem()->getTitulo()}' por {$emprestimo->getUsuario()->getNome()}.\n";
        $emprestimo->finalizar();
    }
}

class Usuario {
    protected string $nome;

    public function __construct(string $nome) {
        $this->nome = $nome;
    }

    public function solicitarEmprestimo(ItemBibliotecario $item, SistemaDeBiblioteca $sistema) {
        echo "{$this->nome} solicitou empréstimo do item '{$item->getTitulo()}'.\n";
        $item->emprestar();
        $emprestimo = new Emprestimo($this, $item);
        $sistema->registrarEmprestimo($emprestimo);
        return $emprestimo;
    }

    public function devolverItem(ItemBibliotecario $item, SistemaDeBiblioteca $sistema, Emprestimo $emprestimo) {
        echo "{$this->nome} devolveu o item '{$item->getTitulo()}'.\n";
        $item->devolver();
        $sistema->registrarDevolucao($emprestimo);
    }

    public function getNome(): string {
        return $this->nome;
    }
}

class Aluno extends Usuario {}
class Professor extends Usuario {}

abstract class ItemBibliotecario {
    protected string $titulo;

    public function __construct(string $titulo) {
        $this->titulo = $titulo;
    }

    public function emprestar() {
        echo "O item '{$this->titulo}' foi emprestado.\n";
    }

    public function devolver() {
        echo "O item '{$this->titulo}' foi devolvido.\n";
    }

    public function getTitulo(): string {
        return $this->titulo;
    }
}

class Livro extends ItemBibliotecario {}
class Revista extends ItemBibliotecario {}

class Emprestimo {
    private Usuario $usuario;
    private ItemBibliotecario $item;

    public function __construct(Usuario $usuario, ItemBibliotecario $item) {
        $this->usuario = $usuario;
        $this->item = $item;
    }

    public function finalizar() {
        echo "Empréstimo do item '{$this->item->getTitulo()}' finalizado.\n";
    }

    public function getUsuario(): Usuario {
        return $this->usuario;
    }

    public function getItem(): ItemBibliotecario {
        return $this->item;
    }
}

$sistema = new SistemaDeBiblioteca();
$usuario = new Aluno("Pedro");
$livro = new Livro("PHP Avançado");

$emprestimo = $usuario->solicitarEmprestimo($livro, $sistema);
$usuario->devolverItem($livro, $sistema, $emprestimo);