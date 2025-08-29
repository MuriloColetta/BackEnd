<?php
class Aluno {
    private $nome;
    private $nota;

    public function __construct($nome, $nota) {
        $this->setNome($nome);
        $this->setnota($nota);
    }

    public function setNome($nome) {
        $this->nome = ucwords(strtolower($nome));
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNota($nota) {
        if ($nota >= 0 && $nota <= 10) {
            $this->nota = $nota;
        }else {
            $this->nota = 0;
        }
    }

    public function getNota() {
        return $this->nota;
    }

    public function exibirinfo() {
        return "O aluno $this->nome tem a nota $this->nota\n";
    }
}

$aluno1 = new Aluno("Murilo", 10);
$aluno2 = new Aluno("Eduardo",16);

echo $aluno1->exibirinfo();
echo $aluno2->exibirinfo();
?>