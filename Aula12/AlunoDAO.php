<?php
class AlunoDAO { // "DAO" --> "Data Access Object"
    private $aluno =[]; // Array para armazenamento temporário dos obetos e seus atributos, antes de mandar para o banco de dados. Foi criado inicialmente vazio [];

    public function criarAluno(Aluno $aluno) { // Método Create --> para criar um novo objeto;
        $this->aluno[$aluno->getId()] = $aluno;
    }

    public function lerAluno() { // Método Read --> para ler informações de um objeto já criado;
        return $this->aluno;
    }

    public function atualizarAluno($id, $novoNome, $novoCurso) { // Método Update --> para atualizar informações de um objeto já existente;
        if (isset($this->aluno[$id])) {
            $this->aluno[$id]->setNome($novoNome);
            $this->aluno[$id]->setCurso($novoCurso);
        }
    }

    public function excluirAluno($id) { // Método Delete --> para excluir um objeto
        unset($this->aluno[$id]);
    }
}