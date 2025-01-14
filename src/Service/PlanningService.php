<?php

namespace Sthom\App\Service;

use DateTime;
use Sthom\App\Model\Repository\TaskRepository;

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
            $datesDeLaSemaine[] = $date->format('Y-m-d'); // Format des dates : YYYY-MM-DD
        }

        // Afficher le tableau des dates
        return $datesDeLaSemaine;
    }

    static public function loadTask(array $users,array $days){
        $sortedTasks=[];
        $repo=new TaskRepository;

        foreach($users as $user){

        $dates=[
            $days[0],
            $days[4]
        ];
        $sortedTasks[$user->getId()]=[];

        $tasks=$repo->getTaskByUser($user->getId(),$dates);
        foreach($tasks as $task){
            if($task["startDate"]<$days[0])$task["displayStartDate"]=$days[0];
            else $task["displayStartDate"]=$task["startDate"];
            if($task["endDate"]>$days[4])$task["displayEndDate"]=$days[4];
            else $task["displayEndDate"]=$task["endDate"];

            $sortedTasks[$user->getId()][$task["displayStartDate"]]=$task;
        }
    
        }
        return $sortedTasks;
    }
}
