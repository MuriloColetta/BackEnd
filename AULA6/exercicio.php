<?php 

    //Ex1

    class Moto{
        public $marca;
        public $modelo;
        public $ano;
        public $km;
    }

    //Ex2
    echo"\n";
    $moto1=new Moto();
    $moto1->marca="Honda";
    $moto1->modelo= "Biz";
    $moto1->ano= "2010";
    $moto1->km= 200000;

    $moto2=new Moto();
    $moto2->marca= "BMW";
    $moto2->modelo= "G310 GS";
    $moto2->ano= "2025";
    $moto2->km= 10;

    $moto3=new Moto();
    $moto3->marca= "Yamaha";
    $moto3->modelo= "MT03";
    $moto3->ano= "2022";
    $moto3->km= 28000;

    //Ex3

    

    //Ex4, 5 e 6
    echo"\n";
    class Cachorro {
        public $raca;
        public $nome;
        public $sexo;

        public function latir() {
            $sexo = strtolower($this->sexo);
            if ($sexo == "m") {         
                echo "O {$this->nome} está latindo\n";
            } else {
                echo "A {$this->nome} está latindo\n";
            }
        }

        public function marcarterritorio(){
            $sexo=strtolower($this->sexo);
            if($sexo=="m"){
                echo"O cachorro {$this->nome} da raça {$this->raca} está marcando território\n";
            }else{
                echo "A cadela {$this->nome} da raça {$this->raca} está marcando território\n";
            }
        }

        public function __construct($raca, $nome, $sexo) {
            $this->raca = $raca;
            $this->nome = $nome;
            $this->sexo = $sexo;
        }
    }

    $cachorro1 = new Cachorro("Pitbull","Gaia","F");

    $cachorro2 = new Cachorro("Yorkshire","Toddy","M");

    $cachorro1->latir();
    $cachorro2->latir();

    $cachorro1->marcarterritorio();
    $cachorro2->marcarterritorio();

    //Ex7 e 8
    echo"\n";
    class Usuarios{
        public $nome;
        public $idade;
        public $sexo;
        public $estado_civil;
        public $casado_anos;

        public function verifcarreservista(){
            $sexo=strtolower($this->sexo);
            $idade=$this->idade;

            if($sexo=="m"){
                if($idade>=18){
                    echo "Você cumpre todos os requisitos, se apresente no quartel\n";
                }else{
                    $temporestante=18-$this->idade;
                    echo "Você não tem idade para se alistar, vá ao quartel daqui $temporestante anos\n";
                }
            }else{
                echo "Mulheres não podem se alistar\n";
            }
        }

        public function casamento(){
            if($this->estado_civil== "Solteiro"){
                echo "Oloco mano aí é foda\n";
            }else{
                echo "Parabéns pelos {$this->casado_anos} anos de casado!\n";
            }
        }

        public function __construct($nome,$idade,$sexo,$estado_civil, $casado_anos){
            $this->nome = $nome;
            $this->idade = $idade;
            $this->sexo = $sexo;
            $this->estado_civil = $estado_civil;
            $this->casado_anos = $casado_anos;
        }
    }

    $pessoa1=new Usuarios("Charlo",16,"M","Solteiro",0);
    $pessoa2=new Usuarios("Bianca",20,"F", "Casado",3);
    $pessoa3=new Usuarios("Xavier",20,"M", "Solteiro",0);

    $pessoa1->verifcarreservista();
    $pessoa2->verifcarreservista();
    $pessoa3->verifcarreservista();

    $pessoa1->casamento();
    $pessoa2->casamento();
    $pessoa3->casamento()

?>