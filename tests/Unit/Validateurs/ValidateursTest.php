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


}