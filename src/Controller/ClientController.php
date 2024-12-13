<?php

namespace Sthom\App\Controller;

use Sthom\App\Model\client;
use Sthom\App\Model\state;
use Sthom\Kernel\Utils\AbstractController;
use Sthom\Kernel\Utils\Repository;

class ClientController extends AbstractController
{

    // Création des clients

    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $client = new client();

            $client->setsiren($_POST['siren']);
            $client->setname($_POST['name']);
            $client->setnaf($_POST['naf']);
            $client->setstaff($_POST['staff']);
            $client->setdateCreate(new \DateTimeImmutable($_POST['dateCreate']));

            $clientRepo = new Repository(client::class);

            $clientRepo->insert($client);
            
            $this -> redirect('/');

        }else{
            $this->render('client/createClient');

        }

    }

    //UPdate client

    public function update(?int $id=null){
        if($id===null){
            throw new \Exception("client innexistant", 404);
        }
        
        $clientRepo = new Repository(client::class);

        // Recupération du client à modifier

        $client = $clientRepo->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $client->setsiren($_POST['siren']);
            $client->setname($_POST['name']);
            $client->setnaf($_POST['naf']);
            $client->setstaff($_POST['staff']);
            $client->setdateCreate(new \DateTimeImmutable($_POST['dateCreate']));

            $clientRepo -> update($client);


            $this -> redirect('/');

    } else{
        $this -> render('client/updateClient', ['client' => $client]);

    }


}
}
