<?php

namespace Sthom\App\Controller;

use Sthom\App\Service\TaskService;
use Sthom\Kernel\Http\AbstractController;

class TaskController extends AbstractController
{
    public function taskCheck()
    {
        // Récupérer les données JSON brutes
        $jsonData = file_get_contents('php://input');

        // Décoder les données JSON en tableau associatif
        $data = json_decode($jsonData, true);

        if ($data !== null) {
            // Accéder aux données reçues
            $dev = $data['dev'] ?? null;
            $day = $data['day'] ?? null;
            $empty = TaskService::checkIsFree($dev, $day);
            $this->json(["empty" => $empty, 200]);
        }
    }

    public function create(){
        TaskService::addTask($_POST);
        $this->redirect("/planning");
    }

    public function apiDelete(int $id){
        if ($id === null) {
            throw new \Exception("Task inexistante", 404);
        }
        TaskService::deleteTask($id);
        $this->json(["message" => "Succès"]);
    }
}
