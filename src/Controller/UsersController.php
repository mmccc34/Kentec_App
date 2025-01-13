<?php

namespace Sthom\App\Controller;

use Sthom\App\Model\users;
use Sthom\Kernel\Utils\AbstractController;
use Sthom\Kernel\Utils\Repository;

class UsersController extends AbstractController
{


    public function list()
    {
        $repo = new Repository(users::class);
        $users = $repo->getAll();
        $this->render('users/list', ["list" => $users, 'title' => 'users list']);
    }

    public function detail(int $id)
    {
        $repo = new Repository(users::class);
        $user = $repo->getById($id);
        $this->render('users/detail', ["user" => $user, 'title' => 'user detail']);

    }

    public function userToJson(int $id)
    {
        $repo = new Repository(users::class);
        $user = $repo->fetchById($id);
        $this->json($user);
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            $user = new users();
            $user->setName($data['name'] ?? null);
            $user->setFirstname($data['firstname'] ?? null);
            $user->setEmail($data['email']);
            $user->setPassword(password_hash($data['password'], PASSWORD_BCRYPT));
            $user->setRole($data['role'] ?? '');

            $repo = new Repository(users::class);
            $repo->save($user);

            $this->redirect('/users/list');
        } else {
            $this->render('users/create', ['title' => 'Create User']);
        }
    }

//Update user

    public function update(?int $id = null): void
    {
        if ($id === null) {
            throw new \Exception("Utilisateur inexistant", 404);
        }

        $userRepo = new Repository(users::class);

        // Récupération de l'utilisateur à modifier
        $user = $userRepo->getById($id);

        if (!$user) {
            throw new \Exception("Utilisateur non trouvé", 404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Mise à jour des données uniquement si elles sont fournies
            $user->setName($data['name'] ?? $user->getName());
            $user->setFirstname($data['firstname'] ?? $user->getFirstname());
            $user->setEmail($data['email'] ?? $user->getEmail());

            // Si un mot de passe est fourni, le mettre à jour
            if (!empty($data['password'])) {
                $user->setPassword(password_hash($data['password'], PASSWORD_BCRYPT));
            }

            $user->setRole($data['role'] ?? $user->getRole());

            // Sauvegarde des modifications
            $userRepo->save($user);

            $this->redirect('/users/list');
        } else {
            // Envoi des données de l'utilisateur à la vue
            $this->render('users/update', ['title' => 'Update User', 'user' => $user]);
        }
    }
// delete client

    public function delete(?int $id){
        if($id === null){
            throw new \Exception("Utilisateur inexistant", 404);
        }
        $userRepo = new Repository( users::class);

        $userRepo -> delete($id);

        $this -> redirect('list');


    }

}