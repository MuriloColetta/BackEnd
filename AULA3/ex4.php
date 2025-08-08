<?php
$n1 = readline("Digite o 1º número: ");
$n2 = readline("Digite o 2º número: ");
$operacao = readline("Digite a operação (+, -, *, /): ");

switch ($operacao) {
    case "+":
        $soma = $n1 + $n2;
        echo "A soma é: $soma";
        break;
    case "-":
        $sub = $n1 - $n2;
        echo "A subtração é: $sub";
        break;
    case "*":
        $mult = $n1 * $n2;
        echo "A multiplicação é: $mult";
        break;
    case "/":
        $div = $n1 / $n2;
        echo "A divisão é: $div";
        break;
}
?>