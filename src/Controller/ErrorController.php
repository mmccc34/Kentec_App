<?php

namespace Sthom\App\Controller;

use Sthom\Kernel\Http\AbstractController;

class ErrorController extends AbstractController{
    public function displayError(\Exception $error){
        $this->render("errors/error",[
            "errorType"=>"Error : " . $error->getCode(),
            "errorMessage"=>$error->getMessage(),
            "title"=>"Error"
        ]);
    }
}