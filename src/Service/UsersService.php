<?php

namespace Sthom\App\Service;

use Sthom\App\Model\Repository\UsersRepository;
use Sthom\App\Model\Users;

class UsersService
{
    private UsersRepository $repository;

    public function __construct()
    {
        $this->repository = new UsersRepository();
    }

    public function getAllUsers(): array
    {
        return $this->repository->getAll();
    }

    public function getUserById(int $id): ?Users
    {
        return $this->repository->getById($id);
    }

    public function createUser(array $data, ?array $file = null): Users
    {
        $user = new Users();
        $user->setName($data['name'] ?? null);
        $user->setFirstname($data['firstname'] ?? null);
        $user->setEmail($data['email']);
        $user->setPassword(password_hash($data['password'], PASSWORD_BCRYPT));
        $user->setRole($data['role'] ?? '');

        if ($file && isset($file['photo']) && $file['photo']['error'] === UPLOAD_ERR_OK) {
            $photoFilename = $this->handleFileUpload($file['photo']);
            $user->setPhotoFilename($photoFilename);
        }

        $this->repository->save($user);
        return $user;
    }

    public function updateUser(int $id, array $data, ?array $file = null): ?Users
    {
        $user = $this->repository->getById($id);
        if (!$user) {
            throw new \Exception("Utilisateur non trouvé", 404);
        }

        $user->setName($data['name'] ?? $user->getName());
        $user->setFirstname($data['firstname'] ?? $user->getFirstname());
        $user->setEmail($data['email'] ?? $user->getEmail());

        if (!empty($data['password'])) {
            $user->setPassword(password_hash($data['password'], PASSWORD_BCRYPT));
        }

        $user->setRole($data['role'] ?? $user->getRole());

        if ($file && isset($file['photo']) && $file['photo']['error'] === UPLOAD_ERR_OK) {
            $photoFilename = $this->handleFileUpload($file['photo']);
            $user->setPhotoFilename($photoFilename);
        }

        $this->repository->save($user);
        return $user;
    }

    public function deleteUser(int $id): void
    {
        $user = $this->repository->getById($id);
        if (!$user) {
            throw new \Exception("Utilisateur non trouvé", 404);
        }

        if ($user->getPhotoFilename()) {
            $this->deleteFile($user->getPhotoFilename());
        }

        $this->repository->delete($id);
    }

    private function handleFileUpload(array $file): string
    {
        $uploadDir = __DIR__ . '/../../public/build/images/';
        $photoFilename = uniqid() . '-' . basename($file['name']);
        $uploadFile = $uploadDir . $photoFilename;

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            return $photoFilename;
        } else {
            throw new \Exception("Erreur lors du téléchargement de l'image.");
        }
    }

    private function deleteFile(string $filename): void
    {
        $photoPath = __DIR__ . '/../../public/build/images/' . $filename;
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
    }
}
