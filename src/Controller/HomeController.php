<?php

namespace Sthom\App\Controller;

use Sthom\Kernel\Utils\AbstractController;

class HomeController extends AbstractController
{
        public function index(): void

    {
        
        $this->render('home/index', ['title' => 'Home']);
    }
}