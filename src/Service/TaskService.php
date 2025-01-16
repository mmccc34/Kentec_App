<?php

namespace Sthom\App\Service;

use DateTime;
use DateTimeImmutable;
use Sthom\App\Model\Repository\TaskRepository;
use Sthom\App\Model\task;

class TaskService
{
    public static function checkIsFree($idDev, $day1, $day2 = null)
    {
        if ($day2 === null) $day2 = $day1;
        $repo = new TaskRepository;
        return empty($repo->getTaskByUser($idDev, [$day1, $day2]));
    }

    public static function addTask($data)
    {
        $requiredFields = ["dev-id", "startDate", "endDate", "idProject", "idState", "effort", "description", "name"];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                throw new \Exception("Le champ '$field' est obligatoire.");
            }
        }
        if ($data['startDate'] <= $data['endDate']) {
            if (TaskService::checkIsFree($data['dev-id'], $data['startDate'], $data['endDate'])){
                $newTask=new task();
                $newTask->setName($data['name']);
                $newTask->setDescription($data['description']);
                $newTask->setStartDate(new DateTimeImmutable($data['startDate']));
                $newTask->setEffort($data['effort']);
                $newTask->setEndDate(new DateTimeImmutable($data['endDate']));
                $newTask->setIdProject($data['idProject']);
                $newTask->setIdState($data['idState']);
                $newTask->setIdDev($data['dev-id']);
                $taskRepo=new TaskRepository;
                $taskRepo->insert($newTask);
            }
        }
    }

    public static function deleteTask($id){
        $taskRepo=new TaskRepository;
        $taskRepo->delete($id);
    }
}
