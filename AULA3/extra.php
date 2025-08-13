<?php
$n1 = (int)readline("Digite um número: ");
$n2 = (float)readline("Digite outro número: ");

if (gettype($n1) == gettype($n2)) {
    echo "Os números são do mesmo tipo.";
} else {
    echo "Os números são de tipos diferentes.";
}
?>