<?php

namespace App\UserStories;

use App\Exceptions\MotPasseException;
use App\Validateurs\Validateur;

class CreerCompteUS
{

    private Validateur $validateur;

    /**
     * @param Validateur $validateur
     */
    public function __construct(Validateur $validateur)
    {
        $this->validateur = $validateur;
    }



    public function execute(string $login, $motPasse): bool {
        // le login est-il unique ?
        // le mot de passe est-il valide ?
        $this->validateur->validerMotPasse($motPasse);
        // Créer l'utilisateur dans la bdd
        return true;
    }


}