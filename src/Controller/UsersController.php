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
}