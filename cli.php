<?php

require_once __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', 1);

$turningGrille = new \App\Service\TurningGrille("SHIFROTEXT");
$matrix = $turningGrille->encrypt();

print_r($matrix);

echo "\n";


$turningGrille = new \App\Service\TurningGrille("SCXROTDHATIEFFEB");
$matrix = $turningGrille->decrypt();

print_r($matrix);