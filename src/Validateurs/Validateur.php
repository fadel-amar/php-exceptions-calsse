<?php

namespace App\Validateurs;


use App\Exceptions\MotPasseException;
use App\Exceptions\NombreException;

class Validateur
{

    public function verifierNombre(int $nombre): bool
    {
        // Vérifier si le nombre est positif
        if ($nombre < 0) {
            // Lancer une exception
            throw new NombreException("Le nombre doit être positif");
        }

        return true;
    }

    function validerMotPasse(string $motPasse) : bool {
        // Vérifier si la longueur est >= 8
        if (strlen($motPasse) <= 8 ) {
            throw new MotPasseException("Le mot de passe doit contenir au moins 8 caractères");
        }
         // Vérifier si le mdp conte=inet au moins une majuscule
        // Utiliser une expression régulière

        if(!preg_match("/[A-Z]/", $motPasse)){
            throw new MotPasseException("Le mot de passe doit contenir au moins une majuscule");
        }

        if(!preg_match("/[a-z]/", $motPasse)){
            throw new MotPasseException("Le mot de passe doit contenir au moins une minuscule");
        }

        if(!preg_match("/[0-9]/", $motPasse)){
            throw new MotPasseException("Le mot de passe doit contenir au moins un chiffre");
        }

        return true;

    }
}