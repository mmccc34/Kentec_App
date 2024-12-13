<?php

namespace Sthom\App\Controller;

use Sthom\App\Model\client;
use Sthom\Kernel\Utils\AbstractController;
use Sthom\Kernel\Utils\Repository;

class ClientController extends AbstractController
{

    // Création des clients

    public function createClient()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $client = new client();

            $client->setsiren($_POST['siren']);
            $client->setnaf($_POST['naf']);
            $client->setstaff($_POST['staff']);
            $client->setdateCreate($_POST['dateCreate']);

            $clientRepo = new Repository(client::class);

            $clientRepo->insert($client);
            
            $this -> redirect('/');

        }else{
            $this->render('client/createClient');

        }

    }

    //UPdate client

    public function clientUpDate(){

        $clientRepo = new Repository(client::class);
        $client = $clientRepo->find($id);



    }


}
