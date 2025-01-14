<?php

namespace Sthom\App\Controller;

use Exception;
use Sthom\App\Model\client;
use Sthom\Kernel\Http\AbstractController;
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

            
            $this -> redirect('/client/list');

        } else {
            $this->render('client/create');
        }
    }

    //UPdate client


    public function update(?int $id){
        if($id===null){
            $this -> redirect('client/list');

    
        }

        $clientRepo = new Repository(client::class);

        // Recupération du client à modifier

        $client = $clientRepo->getById($id);
        if ($client === null){
            $this -> redirect ('client/list');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $client->setsiren($_POST['siren']);
            $client->setname($_POST['name']);
            $client->setnaf($_POST['naf']);
            $client->setstaff($_POST['staff']);
            $client->setdateCreate(new \DateTimeImmutable($_POST['dateCreate']));

            $clientRepo->update($client);
          
            $this -> redirect('list');

    } else{
        $this -> render('client/update', ['client' => $client]);

    }

}


// Affichage de la liste des clients

public function list(){
    $repo=new Repository(client::class);
    $clientList=$repo->getAll();
    // Vérifie si la liste est vide

    if (empty($clientList)) {
        // Rend un message uniquement

        $this->render('client/list', [
            'message' => 'Aucun client trouvé.',
            'title' => 'Liste des clients'
        ]);
    } else {
        // Rend la liste des clients
        $this->render('client/list', [
            'clients' => $clientList,
            'title' => 'Liste des clients'
        ]);
    }
}

// Detail du client

    public function detail(int $id){
        $repo=new Repository(client::class);
        $client=$repo->getById($id);
        $this->render('client/detail',["client"=>$client,'title'=>' detail du client']);
    }

    public function delete(?int $id)
    {
        if ($id === null) {
            throw new Exception("client innexistant", 404);
        }
        $clientRepo = new Repository(client::class);


        $clientRepo->delete($id);

        $this->redirect('/client/list');
    }

}