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
                $startDate = new \DateTimeImmutable($_POST['StartDate']);
                $endDate = new \DateTimeImmutable($_POST['EndDate']);
                // Vérification des dates
                if ($endDate < $startDate) {
                    throw new Exception("La date de fin ne peut pas être antérieure à la date de début.");
                }

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
    // Affichage des projets 
    public function list()
    {
        $repo = new Repository(project::class);
        $projectList = $repo->getAll();
        $this->render('project/list', ["project" => $projectList, 'title' => 'liste des projets']);
    }
    // MAJ des projets
    public function update(?int $id = null)
    {
        if ($id === null) {
            throw new Exception("Projet inexistant", 404);
        }

        $projectRepo = new Repository(Project::class);

        // Récupération du projet à modifier
        $project = $projectRepo->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $startDate = new \DateTimeImmutable($_POST['StartDate']);
                $endDate = new \DateTimeImmutable($_POST['EndDate']);

                // Vérification des dates
                if ($endDate < $startDate) {
                    throw new Exception("La date de fin ne peut pas être antérieure à la date de début.");
                }

                // Mise à jour des données du projet
                $project->setIdState($_POST['Etat']);
                $project->setName($_POST['Projet']);
                $project->setIdClient((int)$_POST['Client']);
                $project->setIdManager((int)$_POST['Manager']);
                $project->setDescription($_POST['Description']);
                $project->setStartDate($startDate);
                $project->setEndDate($endDate);

                $projectRepo->update($project);

                // Redirection après la mise à jour
                $this->redirect('/project/list');
            } catch (Exception $e) {
                $this->render('project/update', [
                    'project' => $project,
                    'message' => "Erreur : " . $e->getMessage(),
                ]);
            }
        } else {
            // Affichage du formulaire avec les données actuelles du projet
            $this->render('project/update', ['project' => $project]);
        }
    }
};
