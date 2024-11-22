<?php

namespace Sthom\App\Controller;

use Sthom\App\Model\state;
use Sthom\Kernel\AbstractController;
use Sthom\Kernel\Repository;

class StateController extends AbstractController{
    public function list(){
        $stateRepo=new Repository(state::class);
        $stateList=$stateRepo->getAll();
        $this->render('state/list',['list'=>$stateList,'title'=>'state list']);
    }
}