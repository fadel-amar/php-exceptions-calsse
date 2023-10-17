<?php

namespace Integration\UserStories;

use App\Exceptions\MotPasseException;
use App\UserStories\CreerCompteUS;
use App\Validateurs\Validateur;
use PHPUnit\Framework\Attributes\Test;


class creerCompteUSITTest extends \PHPUnit\Framework\TestCase
{
    #[test]
    public function creerCompteUS_MotPasseValide_True() {
        // Arrange
        $validateur = new Validateur();

        $creerCompteUS = new CreerCompteUS($validateur);

        //act
        $resultat = $creerCompteUS->execute('HZA', 'fdsjfbbqfùhz577@klhlhSDgfzaga');

        // assert
        $this->assertTrue($resultat);
    }

    #[test]
    public function creerCompteUS_MotPasseInvalide_Exception() {
        // Arrange
        $validateur = new Validateur();

        $creerCompteUS = new CreerCompteUS($validateur);
        $this->expectException(MotPasseException::class);
        //act
        $resultat = $creerCompteUS->execute('HZA', 'poop');


    }






}