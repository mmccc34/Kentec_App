<?php

namespace Sthom\App\Model\Repository;

use Sthom\App\Model\client;
use Sthom\Kernel\Utils\Repository;

class ClientRepository extends Repository{
    public function __construct() {
        parent::__construct(client::class);
    }
}