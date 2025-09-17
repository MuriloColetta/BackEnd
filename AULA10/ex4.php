<?php
namespace AULA10;

class Email {
    public function enviar() {
        echo "Enviando email...\n";
    }
}

class Sms {
    public function enviar() {
        echo "Enviando SMS...\n";
    }
}

function notificar($meio) {
    echo $meio->enviar();
}

$email = new Email();
$sms = new Sms();

notificar($email);
notificar($sms);