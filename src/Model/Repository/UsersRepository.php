<?php

namespace Sthom\App\Model\Repository;

use Sthom\App\Model\users;
use Sthom\Kernel\Utils\Repository;

class UsersRepository extends Repository{

    public function __construct() {
        parent::__construct(users::class);
    }

    public function getUsersByRole($role){
        if(in_array($role,["ROLE_ADMIN","ROLE_DEV","ROLE_CHEF"])){
            return $this->getByAttributes(["role"=>$role]);
        }
        else throw new \Exception("le role en parametre de UsersRepository->getUsersByRole) doit être dans ['ROLE_ADMIN','ROLE_DEV','ROLE_CHEF']");
    }

   

}