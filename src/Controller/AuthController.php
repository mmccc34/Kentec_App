<?php

namespace Sthom\App\Controller;

use Sthom\App\Model\users;
use Sthom\Kernel\Utils\AbstractController;
use Sthom\Kernel\Utils\Repository;
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
            } else {
                $this->render("auth/login");
            }
        }
    }
    public function logout()
    {
        Security::disconnect();
        $this->redirect("/login");
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['password'] === $_POST['confirm_password']) {
                $user = new users;
                $repo = new Repository(users::class);

                $user->setName($_POST['name']);
                $user->setFirstname($_POST['firstname']);
                $user->addRole($_POST['role']);
                $user->setEmail($_POST['email']);
                //attention que le mot de passe soit conforme (robustesse) 12 caractères, majuscules, etc...

                $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->setPassword($hashPassword);

                $repo->insert($user);
                $this->redirect("/login");
            }
            else{
                $message='mots de passe non-identiques';
                $this->render('auth/register',[
                    'message'=>$message,
                ]);
            }
        }
        $this->render('auth/register');
    }
}
