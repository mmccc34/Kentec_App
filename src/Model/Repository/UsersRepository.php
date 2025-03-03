<?php

namespace Sthom\App\Model\Repository;

use Sthom\App\Model\Users;
use Sthom\Kernel\Utils\Repository;

class UsersRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Users::class);
    }

    public function getUsersByRole($role)
    {
        if (!in_array($role, ["ROLE_ADMIN", "ROLE_DEV", "ROLE_CHEF"])) {
            throw new \Exception("Le rôle doit être parmi ['ROLE_ADMIN', 'ROLE_DEV', 'ROLE_CHEF']");
        }
        return $this->getByAttributes(["role" => $role]);
    }
}
