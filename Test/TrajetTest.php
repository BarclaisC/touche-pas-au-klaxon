<?php

use PHPUnit\Framework\TestCase;
use App\Models\Trajet;

class TrajetTest extends TestCase
{
    public function testInsertTrajet()
    {
        $trajet = new Trajet();
        $result = $trajet->create([
            'id_agence_depart' => 1,
            'id_agence_arrivee' => 2,
            'id_employe' => 1,
            'date_heure_depart' => '2026-04-01 08:00:00',
            'date_heure_arrivee' => '2026-04-01 12:00:00',
            'nb_places_total' => 4,
            'nb_places_dispo' => 3
        ]);

        $this->assertTrue($result);
    }
}