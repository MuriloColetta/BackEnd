<?php
$temperatura = readline("Digite a temperatura: ");

if ($temperatura < "15") {
    echo "Frio";
} elseif ($temperatura >= "15" && $temperatura <= "25") {
    echo "Agradável";
} else {
    echo "Quente";
}
?>
