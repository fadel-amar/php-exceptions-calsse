<?php

namespace App\Validateurs;


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
}