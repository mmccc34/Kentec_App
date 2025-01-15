<?php

namespace Sthom\App\Controller;

use Exception;
use Sthom\App\Service\ClientService;
use Sthom\Kernel\Http\AbstractController;


class ClientController extends AbstractController
{
    private ClientService $clientService;

    public function __construct()
    {
        $this->clientService = new ClientService();
    }

    // create client

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->clientService->createClient($_POST);
            $this->redirect('/client/list');
        } else {
            $this->render('client/create');
        }
    }

    // update client

    public function update(?int $id)
    {
        if ($id === null) {
            $this->redirect('/client/list');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedClient = $this->clientService->updateClient($id, $_POST);
            if ($updatedClient === null) {
                $this->redirect('/client/list');
            }
            $this->redirect('/client/list');
        } else {
            $client = $this->clientService->getClientById($id);
            if ($client === null) {
                $this->redirect('/client/list');
            }
            $this->render('client/update', ['client' => $client]);
        }
    }

    // liste des clients

    public function list()
    {
        $clientList = $this->clientService->getClientList();
        if (empty($clientList)) {
            $this->render('client/list', [
                'message' => 'Aucun client trouvé.',
                'title' => 'Liste des clients'
            ]);
        } else {
            $this->render('client/list', [
                'clients' => $clientList,
                'title' => 'Liste des clients'
            ]);
        }
    }

    // deatils du client

    public function detail(int $id)
    {
        $client = $this->clientService->getClientById($id);
        $this->render('client/detail', ["client" => $client, 'title' => 'Détail du client']);
    }

    // delete client

    public function delete(?int $id)
    {
        if ($id === null) {
            throw new Exception("Client inexistant", 404);
        }
        $this->clientService->deleteClient($id);
        $this->json(["message" => "Succès"]);
    }
}
