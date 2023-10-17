<?php

namespace Tests\Unit\Validateurs;


use App\Validateurs\Validateur;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Logging\Exception;

class ValidateursTest extends TestCase {


    #[test]
    function verifierNombre_NombrePositif_True () {
        // Arrange
        $validateur = new Validateur();
        // Act
        $result = $validateur->verifierNombre(10);
        // Assert
        $this->assertTrue($result);
    }

    #[test]
    function verifierNombre_NombreNegatif_NombreException () {
        // Arrange
        $validateur = new Validateur();
        // Act
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Le nombre doit être positif');
        // Assert
        $result = $validateur->verifierNombre(-10);

    }




    #[test]
    function validerMotPasse_NbCractereInferieurA8_MotPasseException () {
        // Arrange
        $validateur = new Validateur();
        // Act
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Le mot de passe doit contenir au moins 8 caractères');
        // Assert
        $result = $validateur->validerMotPasse('toto');
    }

    #[test]
    function validerMotPasse_8caracterePasMajuscule_MotPasseException () {
        // Arrange
        $validateur = new Validateur();
        // Act
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Le mot de passe doit contenir au moins une majuscule');
        // Assert
        $result = $validateur->validerMotPasse('kodavonvh');
    }

    #[test]
    function validerMotPasse_8caractereMajusculePasMiniscule_MotPasseException () {
        // Arrange
        $validateur = new Validateur();
        // Act
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Le mot de passe doit contenir au moins une minuscule');
        // Assert
        $result = $validateur->validerMotPasse('BKGZLBGLGB');
    }

    #[test]
    function validerMotPasse_8caractereMajusculeMinisculePasChiffres_MotPasseException () {
        // Arrange
        $validateur = new Validateur();
        // Act
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Le mot de passe doit contenir au moins un chiffre');
        // Assert
        $result = $validateur->validerMotPasse('BKGZLBGLGBdhf');
    }

    #[test]
    function validerMotPasse_AllConditionsValide_MotPasseException () {
        // Arrange
        $validateur = new Validateur();
        // Act
        $result = $validateur->validerMotPasse('Toto97600');
        // Assert
        self::assertTrue($result);
    }








}