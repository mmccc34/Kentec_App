<?php

namespace Sthom\App\Controller;

use Exception;
use Sthom\App\Model\Project;
use Sthom\Kernel\Utils\AbstractController;
use Sthom\Kernel\Utils\Repository;

class ProjectController extends AbstractController
{
    // Création des clients
    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validation des données reçues
            $requiredFields = ['Etat', 'Projet', 'Client', 'Manager', 'Description', 'StartDate', 'EndDate'];
            foreach ($requiredFields as $field) {
                if (empty($_POST[$field])) {
                    throw new Exception("Le champ '$field' est obligatoire.");
                }
            }
            try {
                $project = new Project();
                $project->setIdState($_POST['Etat']);
                $project->setName($_POST['Projet']);
                $project->setIdClient((int)$_POST['Client']);
                $project->setIdManager((int)$_POST['Manager']);
                $project->setDescription($_POST['Description']);
                $project->setStartDate(new \DateTimeImmutable($_POST['StartDate']));
                $project->setEndDate(new \DateTimeImmutable($_POST['EndDate']));

                // Insertion en base de données
                $projectRepo = new Repository(Project::class);
                $projectRepo->insert($project);

                // Redirection après succès
                $this->redirect('/');
            } catch (Exception $e) {
                // Gestion des erreurs
                $this->render('project/create', [
                    'message' => "Une erreur est survenue : " . $e->getMessage()
                ]);
            }
        } else {
            // Affichage du formulaire si non soumis
            $this->render('project/create');
        }
    }
}
