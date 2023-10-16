<?php
require_once "./vendor/autoload.php";

use App\Validateurs\Validateur;

// Appel validateur
$validateur = new Validateur();

try {
    $validateur->verifierNombre(-110);
    echo "le nombre est positif";
} catch (\App\Exceptions\NombreException $e) {
    echo $e->getMessage();
}