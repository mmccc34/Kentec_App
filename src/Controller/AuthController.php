<?php

namespace Sthom\App\Controller;

use Sthom\App\Model\users;
use Sthom\Kernel\Utils\AbstractController;
use Sthom\Kernel\Utils\Security;

class AuthController extends AbstractController
{
    public function login()
    {
        if (Security::isConnected()) {
            $this->redirect("/");
        } else {
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"], $_POST["password"])) {
                try {
                    Security::authenticate($_POST["email"], $_POST["password"]);
                    $this->redirect("/");
                } catch (\Exception $e) {
                    $message = $e->getMessage();
                    $this->render("auth/login", [
                        "message" => $message,
                    ]);
                }
            }else{
                $this->render("auth/login");
            }
        }
        
    }
    public function logout(){
        Security::disconnect();
        $this->redirect("/login");
    }
}
