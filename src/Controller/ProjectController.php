<?php

namespace Sthom\App\Controller;

use Exception;
use Sthom\App\Model\project;
use Sthom\App\Model\Repository\ClientRepository;
use Sthom\App\Model\Repository\ProjectRepository;
use Sthom\App\Model\Repository\UsersRepository;
use Sthom\Kernel\Http\AbstractController;
use Sthom\Kernel\Utils\Repository;

class ProjectController extends AbstractController
{

    // Création des Projets

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
                $projectRepo = new ProjectRepository;
                $projectRepo->insert($project);

                // Redirection après succès
                $this->redirect('/project/list');
            } catch (Exception $e) {
                // Gestion des erreurs
                $this->render('project/create', [
                    'message' => "Une erreur est survenue : " . $e->getMessage()
                ]);
            }
        } else {
            // Affichage du formulaire si non soumis
            $clientsrepo = new ClientRepository();
            $clientsList = $clientsrepo->getAll();

            $managerrepo = new UsersRepository();
            $manager = $managerrepo->getUsersByRole("ROLE_CHEF");

            $this->render('/project/create', [
                "clients" => $clientsList,
                "managers" => $manager,
                'title' => 'Création de Projet'
            ]);
        }
    }
    // Affichage des projets
    public function list()
    {
        $repo = new ProjectRepository();
        $projectList = $repo->getAllProjectsWithDetails();

        // Vérification si la liste est vide
        if (empty($projectList)) {
            throw new Exception("Vous n'avez pas de projets en cours");
        }

        // Render si des projets existent
        $this->render('project/list', [
            "projects" => $projectList,
            'title' => 'Liste des projets'
        ]);
    }


    // MAJ des projets
    public function update(?int $id = null)
    {
        if ($id === null) {
            throw new Exception("Projet inexistant", 404);
        }

        $projectRepo = new ProjectRepository();

        // Récupération du projet à modifier avec tous les détails
        $project = $projectRepo->getFullProjectById($id);

        if (!$project) {
            throw new Exception("Projet non trouvé", 404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Validation des données reçues
                $requiredFields = ['Etat', 'Projet', 'Client', 'Manager', 'Description', 'StartDate', 'EndDate'];
                foreach ($requiredFields as $field) {
                    if (empty($_POST[$field])) {
                        throw new Exception("Le champ '$field' est obligatoire.");
                    }
                }

                // Création d'un nouvel objet Project avec les données mises à jour
                $updatedProject = new Project();
                $updatedProject->setId($id);
                $updatedProject->setIdState($_POST['Etat']);
                $updatedProject->setName($_POST['Projet']);
                $updatedProject->setIdClient((int)$_POST['Client']);
                $updatedProject->setIdManager((int)$_POST['Manager']);
                $updatedProject->setDescription($_POST['Description']);
                $updatedProject->setStartDate(new \DateTimeImmutable($_POST['StartDate']));
                $updatedProject->setEndDate(new \DateTimeImmutable($_POST['EndDate']));

                $startDate = new \DateTimeImmutable($_POST['StartDate']);
                $endDate = new \DateTimeImmutable($_POST['EndDate']);

                // Vérification des dates
                if ($endDate < $startDate) {
                    throw new Exception("La date de fin ne peut pas être antérieure à la date de début.");
                }

                // Mise à jour dans la base de données
                $projectRepo->update($updatedProject);

                // Redirection après la mise à jour
                $this->redirect('/project/list');
            } catch (Exception $e) {
                // En cas d'erreur, on réaffiche le formulaire avec le message d'erreur
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

    public function detail(int $id)
    {
        $repo = new ProjectRepository();
        $project = $repo->getFullProjectById($id);

        if (!$project) {
            throw new Exception("Projet introuvable", 404);
        }

        $this->render('project/detail', [
            "project" => $project,
            "title" => "Détail du Projet"
        ]);
    }

    public function delete(?int $id){
        if($id === null){
            throw new Exception("Projet inexistant", 404);
        }
        $repo = new UsersRepository();

        $repo -> delete($id);

        $this -> redirect('/project/list');


    }
};
