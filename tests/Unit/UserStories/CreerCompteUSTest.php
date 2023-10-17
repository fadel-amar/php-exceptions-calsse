<?php

namespace Unit\UserStories;

use App\Exceptions\MotPasseException;
use App\UserStories\CreerCompteUS;
use App\Validateurs\Validateur;
use PHPUnit\Framework\Attributes\Test;


class CreerCompteUSTest extends \PHPUnit\Framework\TestCase
{

    #[test]
    public function creerCompteUS_MotPasseValide_True() {
        // Arrange
        // MOCKER LA classe validateur
        $validateurMock = $this->createMock(Validateur::class);
        // Simuler le résultat de la méthode validerMotPasse
        $validateurMock->method("ValiderMotPasse")
                        ->willReturn(true);

        $creerCompteUS = new CreerCompteUS($validateurMock);

        //act
        $resultat = $creerCompteUS->execute('HEHEHE', 'fdsjfbbqfùhz577@klhlhSDgfzaga');

        // assert
        $this->assertTrue($resultat);
    }

    #[test]
    public function creerCompteUS_MotPasseInValide_False() {
        // Arrange
        // MOCKER LA classe validateur
        $validateurMock = $this->createMock(Validateur::class);
        // Simuler le résultat de la méthode validerMotPasse
        $validateurMock->method("ValiderMotPasse")
            ->will($this->throwException(new MotPasseException()));

        $creerCompteUS = new CreerCompteUS($validateurMock);
        $this->expectException(MotPasseException::class);

        //act
        $resultat = $creerCompteUS->execute('HEHEHE', 'Popo');

    }




}