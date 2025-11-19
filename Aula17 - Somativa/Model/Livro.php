<?php
class Livro {
        private $titulo;
        private $autor;
        private $ano_publicacao;
        private $genero;
        private $qtde;

        public function __construct ($titulo,$autor,$ano_publicacao,$genero,$qtde) {
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->ano_publicacao = $ano_publicacao;
            $this->genero = $genero;
            $this->qtde = $qtde;
        }

        public function getTitulo()
        {
                return $this->titulo;
        }

        public function setTitulo($titulo): self
        {
                $this->titulo = $titulo;
                return $this;
        }

        public function getAutor()
        {
                return $this->autor;
        }

        public function setAutor($autor): self
        {
                $this->autor = $autor;
                return $this;
        }

        public function getAno_publicacao()
        {
                return $this->ano_publicacao;
        }

        public function setAno_publicacao($ano_publicacao): self
        {
                $this->ano_publicacao = $ano_publicacao;
                return $this;
        }

        public function getGenero()
        {
                return $this->genero;
        }

        public function setGenero($genero): self
        {
                $this->genero = $genero;
                return $this;
        }

        public function getQtde()
        {
                return $this->qtde;
        }

        public function setQtde($qtde): self
        {
                $this->qtde = $qtde;
                return $this;
        }
    }
?>