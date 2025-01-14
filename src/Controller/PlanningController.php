<?php

namespace Sthom\App\Controller;

use Sthom\App\Model\Repository\UsersRepository;
use Sthom\App\Model\Service\PlanningService;
use Sthom\Kernel\Http\AbstractController;

class PlanningController extends AbstractController{
    public function displayPlanningGlobal(){
        $usersRepo=new UsersRepository();
        $devs=$usersRepo->getUsersByRole("ROLE_DEV");
        $days=PlanningService::getWeekDays();
        $this->render("planning/global",["title"=>"planning global","devs"=>$devs,"days"=>$days]);
    }
}