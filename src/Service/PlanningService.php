<?php

namespace Sthom\App\Service;

use DateTime;

class PlanningService
{
    static public function getWeekDays(DateTime $day = new DateTime())
    {
        // Initialisation du tableau pour stocker les dates
        $datesDeLaSemaine = [];


        // Trouver le jour de la semaine actuel (1 = lundi, 7 = dimanche)
        $jourDeLaSemaine = $day->format('N');

        // Aller au début de la semaine (lundi)
        $dateDebutSemaine = clone $day;
        $dateDebutSemaine->modify('-' . ($jourDeLaSemaine - 1) . ' days');

        // Remplir le tableau avec les 7 dates
        for ($i = 0; $i < 5; $i++) {
            $date = clone $dateDebutSemaine;
            $date->modify("+$i days");
            $datesDeLaSemaine[] = $date->format('d-m-Y'); // Format des dates : YYYY-MM-DD
        }

        // Afficher le tableau des dates
        return $datesDeLaSemaine;
    }
}
