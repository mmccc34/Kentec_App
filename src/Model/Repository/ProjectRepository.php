<?php

namespace Sthom\App\Model\Repository;

use Sthom\App\Model\Project;
use Sthom\Kernel\Database\Database;
use Sthom\Kernel\Utils\Repository;

class ProjectRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(project::class);
    }

    public function getFullProjectById(int $id)
{
    $sql = "SELECT 
        p.id AS projectId, 
        p.name AS projectName, 
        p.description AS projectDescription, 
        p.startDate AS projectStartDate, 
        p.endDate AS projectEndDate, 
        s.name AS stateName, 
        pm.name AS managerName, 
        pm.firstname AS managerFirstname, 
        c.name AS clientName 
    FROM project p
    JOIN state s ON s.id = p.idState
    JOIN users pm ON pm.id = p.idManager
    JOIN client c ON c.id = p.idClient
    WHERE p.id = :id";
    
    $result = $this->customQuery($sql, [":id" => $id]);

    return $result ? $result[0] : null; // Retourne null si aucun projet n'est trouvé
}


    public function getAllProjectsWithDetails()
{
    $sql = "SELECT 
        p.id AS projectId, 
        p.name AS projectName, 
        p.description AS projectDescription, 
        p.startDate AS projectStartDate, 
        p.endDate AS projectEndDate, 
        s.id AS stateId, 
        s.name AS stateName, 
        pm.id AS managerId, 
        pm.name AS managerName, 
        pm.firstname AS managerFirstname, 
        pm.email AS managerEmail, 
        c.id AS clientId, 
        c.name AS clientName 
    FROM project p
    JOIN state s ON s.id = p.idState
    JOIN users pm ON pm.id = p.idManager
    JOIN client c ON c.id = p.idClient
    ORDER BY p.id DESC";
    
    return $this->customQuery($sql);
}


    public function getProjectsByClientId(int $clientId)
    {
        $sql = "
        SELECT 
            p.id AS projectId, 
            p.name AS projectName, 
            p.description AS projectDescription, 
            p.startDate AS projectStartDate, 
            p.endDate AS projectEndDate, 
            s.id AS stateId, 
            s.name AS stateName, 
            pm.id AS managerId, 
            pm.name AS managerName, 
            pm.firstname AS managerFirstname, 
            pm.email AS managerEmail, 
            c.id AS clientId, 
            c.name AS clientName, 
            c.siren AS clientSiren, 
            c.naf AS clientNaf, 
            c.staff AS clientStaff, 
            c.dateCreate AS clientDateCreate
        FROM project p
        JOIN state s ON s.id = p.idState
        JOIN users pm ON pm.id = p.idManager
        JOIN client c ON c.id = p.idClient
        WHERE p.idClient = :clientId
        ";

        // Utilisation de customQuery avec liaison de paramètres pour éviter les injections SQL
        return $this->customQuery($sql, [":clientId" => $clientId]);
    }
    public function deleteCascade(int $projectId)
    {
        // Démarrer une transaction pour garantir l'intégrité des données
        Database::getConnexion()->beginTransaction();

        try {
            // Supprimer les tâches associées au projet
            $sqlTasks = "DELETE FROM task WHERE idProject = :projectId";
            $this->customQuery($sqlTasks, [":projectId" => $projectId]);

            // Supprimer les contributions des développeurs associées au projet
            $sqlContribute = "DELETE FROM contribute WHERE idProject = :projectId";
            $this->customQuery($sqlContribute, [":projectId" => $projectId]);

            // Supprimer le projet (table project)
            $sqlProject = "DELETE FROM project WHERE id = :projectId";
            $this->customQuery($sqlProject, [":projectId" => $projectId]);

            // Si toutes les suppressions sont réussies, on valide la transaction
            Database::getConnexion()->commit();

            return true;
        } catch (\Exception $e) {
            // Si une erreur survient, on annule la transaction
            Database::getConnexion()->rollBack();
            throw $e;
        }
    }
}
