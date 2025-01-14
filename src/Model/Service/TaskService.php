<?php

namespace Sthom\App\Model\Service;

use Sthom\App\Model\task;
use Sthom\Kernel\Utils\Repository;

class TaskService
{
//     private Repository $repo;

//     public function __construct()
//     {
//         $this->repo=new Repository(task::class);        
//     }

//     public function getFullTaskById(int $id)
//     {
//         $query = "SELECT 
//     t.id AS taskId, 
//     t.name AS taskName, 
//     t.description AS taskDescription, 
//     t.startDate AS taskStartDate, 
//     t.endDate AS taskEndDate, 
//     t.effort AS taskEffort, 
//     u.name AS devName, 
//     u.firstname AS devFirstname, 
//     u.email AS devEmail, 
//     p.id AS projectId, 
//     p.name AS projectName, 
//     p.description AS projectDescription,
//     p.idManager AS projectIdManager, 
//     p.idState AS projectIdState, 
//     p.idClient AS projectIdClient, 
//     s.name AS stateName, 
//     s.id AS stateId
// FROM task t
// JOIN users u ON u.id = t.idDev
// JOIN project p ON p.id = t.idProject
// JOIN state s ON s.id = t.idState
//         WHERE t.id=:id ";
//         return $this->repo->customQuery($query, [":id" => $id])[0];
//     }
}
