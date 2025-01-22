<?php 

namespace Sthom\App\Service;

use Exception;
use Sthom\App\Model\client;
use Sthom\App\Model\Repository\ClientRepository;

class ClientService
{
    private ClientRepository $clientRepository;


    public function __construct()
    {
        $this->clientRepository = new ClientRepository();
    }

    // create client

    public function createClient(array $data): void
    {
        $client = new client();
        $client->setsiren($data['siren']);
        $client->setname($data['name']);
        $client->setnaf($data['naf']);
        $client->setstaff($data['staff']);
        $client->setdateCreate(new \DateTimeImmutable($data['dateCreate']));

        $this->clientRepository->insert($client);
    }

    //update client

    public function updateClient(int $id, array $data): ?client
    {
        $client = $this->clientRepository->getById($id);
        if ($client === null) {
            return null;
        }

        $client->setsiren($data['siren']);
        $client->setname($data['name']);
        $client->setnaf($data['naf']);
        $client->setstaff($data['staff']);
        $client->setdateCreate(new \DateTimeImmutable($data['dateCreate']));

        $this->clientRepository->update($client);
        return $client;
    }

    // liste des clients

    public function getClientList(): array
    {
        return $this->clientRepository->getAll();
    }

    // details client

    public function getClientById(int $id): ?client
    {
        return $this->clientRepository->getById($id);
    }

    // delete client

    public function deleteClient(int $id): void
    {
        $this->clientRepository->delete($id);
    }


}




