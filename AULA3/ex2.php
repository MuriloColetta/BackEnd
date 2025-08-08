<?php
$nota = readline("Digite a nota do aluno: ");

if ($nota >= 9) {
    echo "Excelente";
} elseif ($nota >= 7) {
    echo "Bom";
} else {
    echo "Reprovado";
}
?>