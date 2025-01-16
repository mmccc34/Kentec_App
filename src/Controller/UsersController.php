<?php

namespace Sthom\App\Controller;

use Sthom\App\Model\Repository\UsersRepository;
use Sthom\App\Model\users;
use Sthom\Kernel\Http\AbstractController;


class UsersController extends AbstractController
{


    public function list()
    {
        $repo = new UsersRepository();
        $users = $repo->getAll();
        $this->render('users/list', ["list" => $users, 'title' => 'users list']);
    }

    public function detail(int $id)
    {
        $repo = new UsersRepository();
        $user = $repo->getById($id);
        $this->render('users/detail', ["user" => $user, 'title' => 'user detail']);

    }

    public function userToJson(int $id)
    {
        $repo = new UsersRepository();
        $user = $repo->fetchById($id);
        $this->json($user);
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $data = $_POST;

            // Création d'une nouvelle instance de l'utilisateur
            $user = new users();
            $user->setName($data['name'] ?? null);
            $user->setFirstname($data['firstname'] ?? null);
            $user->setEmail($data['email']);
            $user->setPassword(password_hash($data['password'], PASSWORD_BCRYPT));
            $user->setRole($data['role'] ?? '');

            // Gestion du fichier photo
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                // Répertoire où l'image sera enregistrée
                $uploadDir = __DIR__ . '/../../public/build/images/';

                // Créer un nom unique pour éviter les conflits de fichiers
                $photoFilename = uniqid() . '-' . basename($_FILES['photo']['name']);
                $uploadFile = $uploadDir . $photoFilename;

                // Déplacer le fichier téléchargé vers le répertoire public/build/images
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
                    // Si le fichier est déplacé avec succès, on enregistre le nom de fichier dans l'objet User
                    $user->setPhotoFilename($photoFilename);
                } else {
                    // Gérer l'erreur si le fichier ne peut pas être déplacé
                    // Vous pouvez aussi gérer les erreurs d'upload (taille du fichier, extension, etc.)
                    echo "Erreur lors du téléchargement de l'image.";
                }
            }

            // Sauvegarde de l'utilisateur dans la base de données
            $repo = new UsersRepository();
            $repo->save($user);

            // Redirection vers la liste des utilisateurs
            $this->redirect('/users/list');
        } else {
            // Si la méthode est GET, afficher le formulaire de création
            $this->render('users/create', ['title' => 'Create User']);
        }
    }


//Update user

    public function update(?int $id = null): void
    {
        if ($id === null) {
            throw new \Exception("Utilisateur inexistant", 404);
        }

        $repo = new UsersRepository();

        // Récupération de l'utilisateur à modifier
        $user = $repo->getById($id);

        if (!$user) {
            throw new \Exception("Utilisateur non trouvé", 404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Mise à jour des données uniquement si elles sont fournies
            $user->setName($data['name'] ?? $user->getName());
            $user->setFirstname($data['firstname'] ?? $user->getFirstname());
            $user->setEmail($data['email'] ?? $user->getEmail());

            // Si un mot de passe est fourni, le mettre à jour
            if (!empty($data['password'])) {
                $user->setPassword(password_hash($data['password'], PASSWORD_BCRYPT));
            }

            $user->setRole($data['role'] ?? $user->getRole());

            // Gestion du fichier photo (si un fichier a été téléchargé)
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                // Répertoire où l'image sera enregistrée
                $uploadDir = __DIR__ . '/../../public/build/images/';

                // Créer un nom unique pour éviter les conflits de fichiers
                $photoFilename = uniqid() . '-' . basename($_FILES['photo']['name']);
                $uploadFile = $uploadDir . $photoFilename;

                // Déplacer le fichier téléchargé vers le répertoire public/build/images
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
                    // Si le fichier est déplacé avec succès, on enregistre le nom de fichier dans l'objet User
                    $user->setPhotoFilename($photoFilename);
                } else {
                    // Gérer l'erreur si le fichier ne peut pas être déplacé
                    // Vous pouvez aussi gérer les erreurs d'upload (taille du fichier, extension, etc.)
                    echo "Erreur lors du téléchargement de l'image.";
                }
            }

            // Sauvegarde des modifications
            $repo->save($user);

            $this->redirect('/users/list');
        } else {
            // Envoi des données de l'utilisateur à la vue
            $this->render('users/update', ['title' => 'Update User', 'user' => $user]);
        }
    }

// delete client

    public function delete(?int $id)
    {
        if ($id === null) {
            throw new \Exception("Utilisateur inexistant", 404);
        }

        $repo = new UsersRepository();

        // Récupération de l'utilisateur à supprimer
        $user = $repo->getById($id);

        if (!$user) {
            throw new \Exception("Utilisateur non trouvé", 404);
        }

        // Vérifier si l'utilisateur a une photo et la supprimer
        if ($user->getPhotoFilename()) {
            $photoPath = __DIR__ . '/../../public/build/images/' . $user->getPhotoFilename();

            // Vérifier si le fichier existe et le supprimer
            if (file_exists($photoPath)) {
                unlink($photoPath); // Supprimer le fichier photo
            }
        }

        // Supprimer l'utilisateur de la base de données
        $repo->delete($id);

        // Rediriger vers la liste des utilisateurs après la suppression
        $this->redirect('/users/list');
    }


}