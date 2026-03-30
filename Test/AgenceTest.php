<?php

use PHPUnit\Framework\TestCase;
use App\Models\Agence;

class AgenceTest extends TestCase
{
    public function testInsertAgence()
    {
        $agence = new Agence();
        $result = $agence->create([
            'nom' => 'TestVille',
            'adresse' => '1 rue du Test',
            'ville' => 'TestCity',
            'code_postal' => '99999'
        ]);

        $this->assertTrue($result);
    }
}