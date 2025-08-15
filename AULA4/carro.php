<?php
$modelo_carro1 = 'Versa';
$marca_carro1 = 'Nissan';
$ano_carro1 = 2020;
$revisao_carro1 = true;
$Ndonos_carro1 = 2;

$modelo_carro2 = 'M5';
$marca_carro2 = 'BMW';
$ano_carro2 = 2018;
$revisao_carro2 = false;
$Ndonos_carro2 = 2;

$modelo_carro3 = '911';
$marca_carro3= 'Porsche';
$ano_carro3 = 2026;
$revisao_carro3 = false;
$Ndonos_carro3 = 1;

$modelo_carro4 = 'Dolphin';
$marca_carro4 = 'BYD';
$ano_carro4 = 2023;
$revisao_carro4 = false;
$Ndonos_carro4 = 1;

function passouRevisao($revisao){
    $revisao = false;
    return $revisao;
}

$revisao_carro4 = passouRevisao($revisao_carro4);

function novoDoo($donos){
    return $donos + 1;
}

$Ndonos_carro4 = novoDoo($Ndonos_carro4);

function exibirCarro($modelo, $marca, $ano, $revisao, $Ndonos) {
    $revisaoTexto = $revisao ? 'Sim' : 'Não';
    echo "O carro $marca $modelo, ano $ano, já passou por revisão: $revisaoTexto, número de donos: $Ndonos \n";
}
exibirCarro($modelo_carro1, $marca_carro1, $ano_carro1, $revisao_carro1, $Ndonos_carro1);
exibirCarro($modelo_carro2, $marca_carro2, $ano_carro2, $revisao_carro2, $Ndonos_carro2);
exibirCarro($modelo_carro3, $marca_carro3, $ano_carro3, $revisao_carro3, $Ndonos_carro3);
exibirCarro($modelo_carro4, $marca_carro4, $ano_carro4, $revisao_carro4, $Ndonos_carro4);
echo "\n";

function semiNovo($ano, $marca, $modelo) {
    $anoAtual = date("Y");

    if (($anoAtual - $ano) <= 3) {
    echo "O carro $marca $modelo é semi-novo. \n";
    } else {
        echo "O carro $marca $modelo não é semi-novo. \n";
    }
}
semiNovo($ano_carro1, $marca_carro1, $modelo_carro1);
semiNovo($ano_carro2, $marca_carro2, $modelo_carro2);
semiNovo($ano_carro3, $marca_carro3, $modelo_carro3);
semiNovo($ano_carro4, $marca_carro4, $modelo_carro4);
echo "\n";

function precisaRevisao($revisao, $ano, $marca, $modelo) {
    $anoAtual = date("Y");

    if (($anoAtual - $ano) > 3 && $revisao == false) {
        echo "O carro $marca $modelo precisa de revisão. \n";
    } else {
        echo "O carro $marca $modelo não precisa de revisão.\n";
    }
}
precisaRevisao($revisao_carro1, $ano_carro1, $marca_carro1, $modelo_carro1);
precisaRevisao($revisao_carro2, $ano_carro2, $marca_carro2, $modelo_carro2);
precisaRevisao($revisao_carro3, $ano_carro3,$marca_carro3, $modelo_carro3);
precisaRevisao($revisao_carro4, $ano_carro4, $marca_carro4, $modelo_carro4);
echo "\n";

function calcularValor($marca, $ano, $Ndonos, $valorFinal) {
    switch ($marca) {
        case 'BMW':
            $valorBase = 300000;
            break;
        case 'Porsche':
            $valorBase = 300000;
            break;
        case 'Nissan':
            $valorBase = 70000;
            break;
        case 'BYD':
            $valorBase = 150000;
            break;
    }
    $anoAtual = date("Y");
    $anosDeUso = $anoAtual - $ano;
    if ($anosDeUso < 0) {
        $anosDeUso = 0;
    }
    $descontoDono = $valorBase * ($Ndonos * 0.05);
    $descontoTempo = $anosDeUso * 3000;
    $valorFinal = $valorBase - $descontoDono - $descontoTempo;
    echo "O valor do carro $marca, ano $ano, com $Ndonos donos é: R$$valorFinal \n";
}
calcularValor($marca_carro1, $ano_carro1, $Ndonos_carro1, $valorFinal);
calcularValor($marca_carro2, $ano_carro2, $Ndonos_carro2, $valorFinal);
calcularValor($marca_carro3, $ano_carro3, $Ndonos_carro3, $valorFinal);
calcularValor($marca_carro4, $ano_carro4, $Ndonos_carro4, $valorFinal);

?>