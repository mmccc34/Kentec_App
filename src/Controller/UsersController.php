<?php

namespace Sthom\App\Controller;

use Sthom\App\Model\users;
use Sthom\Kernel\Utils\AbstractController;
use Sthom\Kernel\Utils\Repository;

class UsersController extends AbstractController{



    
    public function list(){
        $repo=new Repository(users::class);
        $users=$repo->getAll();
        $this->render('users/list',["list"=>$users,'title'=>'users list']);
    }
    public function detail(int $id){
        $repo=new Repository(users::class);
        $user=$repo->getById($id);
        $this->render('users/detail',["user"=>$user,'title'=>'user detail']);

    }
    
    public function userToJson(int $id){
        $repo=new Repository(users::class);
        $user=$repo->fetchById($id);
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

}