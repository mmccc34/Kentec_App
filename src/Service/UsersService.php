<?php

namespace Sthom\App\Service;

use Sthom\App\Model\Repository\UsersRepository;
use Sthom\App\Model\users;

class UsersService
{
    private $usersRepository;
public function __construct() {
$this->usersRepository = new usersRepository();
}
}