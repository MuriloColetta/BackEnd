<?php
// Cenário 4 – Ciclo da Vida
    // Classes :
    //   Pessoa
    //   Escolha
    //   BancoDeSangue
    // Métodos :
    //   Pessoa: engravidar(), nascer(), crescer(), fazerEscolha(), doarSangue()
    //   Escolha: executar()
    //   BancoDeSangue: receberDoacao()
    // Relacionamentos:
    //   Pessoa → Gravidez: Uma pessoa pode engravidar e gerar outra pessoa.
    //   Gravidez → Pessoa: A gravidez resulta no nascimento de uma nova pessoa.
    //   Pessoa → Crescimento: Uma pessoa passa pelo processo de crescer (físico e mental).
    //   Crescimento → Pessoa: O crescimento evolui a pessoa para novas fases da vida.
    //   Pessoa → Escolha: Cada pessoa pode tomar decisões que afetam a própria vida ou a dos outros.
    //   Pessoa → DoacaoSangue: Uma pessoa pode doar sangue para ajudar outras pessoas.
    //   DoacaoSangue → Pessoa: A doação beneficia outras pessoas que precisam.

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

class Pessoa {
    public string $nome;

    public function __construct(string $nome) {
        $this->nome = $nome;
    }

    public function engravidar() {
        echo "{$this->nome} está grávida.\n";
    }

    public function nascer() {
        echo "{$this->nome} nasceu.\n";
    }

    public function crescer() {
        echo "{$this->nome} está crescendo.\n";
    }

    public function fazerEscolha(Escolha $escolha) {
        echo "{$this->nome} está fazendo uma escolha.\n";
        $escolha->executar($this);
    }

    public function doarSangue(BancoDeSangue $banco) {
        echo "{$this->nome} está doando sangue.\n";
        $banco->receberDoacao($this);
    }
}

class Escolha {
    private string $descricao;

    public function __construct(string $descricao) {
        $this->descricao = $descricao;
    }

    public function executar(Pessoa $pessoa) {
        echo "{$pessoa->nome} realizou a escolha: {$this->descricao}.\n";
    }

    public function getDescricao(): string {
        return $this->descricao;
    }
}

class BancoDeSangue {
    private string $nome;

    public function __construct(string $nome) {
        $this->nome = $nome;
    }

    public function receberDoacao(Pessoa $pessoa) {
        echo "O banco de sangue {$this->nome} recebeu doação de {$pessoa->nome}.\n";
    }

    public function getNome(): string {
        return $this->nome;
    }
}

$pessoa = new Pessoa("Lucas");
$escolha = new Escolha("Estudar Medicina");
$banco = new BancoDeSangue("Central");

$pessoa->nascer();
$pessoa->crescer();
$pessoa->engravidar();
$pessoa->fazerEscolha($escolha);
$pessoa->doarSangue($banco);