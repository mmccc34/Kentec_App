<?php

namespace Sthom\App\Controller;

use Sthom\App\Service\UsersService;
use Sthom\Kernel\Http\AbstractController;

class UsersController extends AbstractController
{
    private UsersService $service;

    public function __construct()
    {
        $this->service = new UsersService();
    }

    public function list()
    {
        $users = $this->service->getAllUsers();
        $this->render('users/list', ["list" => $users, 'title' => 'Users List']);
    }

    public function detail(int $id)
    {
        $user = $this->service->getUserById($id);
        $this->render('users/detail', ["user" => $user, 'title' => 'User Detail']);
    }

    public function userToJson(int $id)
    {
        $user = $this->service->getUserById($id);
        $this->json($user);
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $this->service->createUser($data, $_FILES);
            $this->redirect('/users/list');
        } else {
            $this->render('users/create', ['title' => 'Create User']);
        }
    }

    public function update(?int $id = null): void
    {
        if ($id === null) {
            throw new \Exception("Utilisateur inexistant", 404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $this->service->updateUser($id, $data, $_FILES);
            $this->redirect('/users/list');
        } else {
            $user = $this->service->getUserById($id);
            $this->render('users/update', ['title' => 'Update User', 'user' => $user]);
        }
    }

    public function delete(?int $id)
    {
        if ($id === null) {
            throw new \Exception("Utilisateur inexistant", 404);
        }

        $this->service->deleteUser($id);
        $this->redirect('/users/list');
    }

    public function deleteApi(int $id)
    {
        try {
            $this->service->deleteUser($id);

            // Répond avec un JSON valide pour éviter l'erreur JSON.parse
            echo json_encode(["success" => true, "message" => "Utilisateur supprimé"]);
            http_response_code(200);
            exit;
        } catch (Exception $e) {
            echo json_encode(["success" => false, "error" => $e->getMessage()]);
            http_response_code(400);
            exit;
        }
    }


}
