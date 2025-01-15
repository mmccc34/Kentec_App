<?php

namespace Sthom\App\Controller;

use DateTime;
use Sthom\App\Model\Repository\UsersRepository;
use Sthom\App\Service\PlanningService;
use Sthom\Kernel\Http\AbstractController;

class PlanningController extends AbstractController{
    public function displayPlanningGlobal(?string $date=null){
        if($date===null){
            $date=new DateTime();
        }
        else $date= new DateTime($date);
        $usersRepo=new UsersRepository();

        if($_SESSION["ROLE"]=="ROLE_DEV")$devs=[$_SESSION["USER"]];
        else $devs=$usersRepo->getUsersByRole("ROLE_DEV");
        $days=PlanningService::getWeekDays($date);
        $sortedTasks=[];
        if($devs)$sortedTasks=PlanningService::loadTask($devs,$days);
        
        //dd($sortedTasks);

        $this->render("planning/global",["title"=>"planning global","devs"=>$devs,"days"=>$days,"sortedTasks"=>$sortedTasks]);
    }
}