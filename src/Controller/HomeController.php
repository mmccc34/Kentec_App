<?php

namespace Sthom\App\Controller;

use Sthom\App\Model\User;
use Sthom\Kernel\Utils\AbstractController;
use Sthom\Kernel\Repository;

class HomeController extends AbstractController
{
    public function index(): void

    {
        $this->render('home/index', ['title' => 'Home']);
    }
}