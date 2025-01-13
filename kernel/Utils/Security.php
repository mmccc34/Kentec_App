<?php

namespace Sthom\Kernel\Utils;

use Sthom\App\Model\users;
use Sthom\Kernel\Utils\Repository;

/**
 * Class Security
 * Cette classe fournit des fonctionnalités de sécurité pour la gestion de l'authentification utilisateur.
 * Elle permet de vérifier si un utilisateur est connecté, de le connecter ou de le déconnecter.
 */
class Security
{

    /**
     * Vérifie si l'utilisateur est connecté.
     *
     * Cette méthode examine la session pour voir si la clé `IS_AUTHENTICATED` est définie
     * et si sa valeur est `true`. Si c'est le cas, elle retourne `true`.
     * Sinon, elle retourne `false`.
     *
     * @return bool `true` si l'utilisateur est connecté, sinon `false`.
     *
     * Exemple d'utilisation :
     * ```php
     * if (Security::isConnected()) {
     *     echo "L'utilisateur est connecté.";
     * } else {
     *     echo "L'utilisateur n'est pas connecté.";
     * }
     * ```
     */
    public static final function isConnected(): bool
    {
        // Vérifie si la clé IS_AUTHENTICATED existe dans la session et si sa valeur est `true`.
        if (isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] === true) {
            return true;
        }

        // Si les conditions ne sont pas remplies, retourne `false`.
        return false;
    }

    /**
     * Déconnecte l'utilisateur.
     *
     * Cette méthode modifie la clé `IS_AUTHENTICATED` de la session pour la définir sur `false`.
     * Cela indique que l'utilisateur n'est plus connecté.
     *
     * @return void
     *
     * Exemple d'utilisation :
     * ```php
     * Security::disconnect();
     * echo "L'utilisateur a été déconnecté.";
     * ```
     */
    public static final function disconnect(): void
    {
        // Définit la clé IS_AUTHENTICATED à `false` dans la session.
        session_unset();
        $_SESSION['IS_AUTHENTICATED'] = false;
    }

    /**
     * Authentifie un utilisateur.
     *
     * Cette méthode vérifie si un utilisateur existe dans la base de données et si le mot de passe fourni est correct.
     * Si les deux conditions sont satisfaites, l'utilisateur est connecté et la clé `IS_AUTHENTICATED` est définie à `true`.
     * Sinon, une exception est levée avec un message d'erreur approprié.
     *
     * @param Repository $repository Le repository du modèle contenant les données utilisateur (ex: `new Repository(User::class)`).
     * @param string $column La colonne à utiliser pour vérifier l'utilisateur (ex: `username`).
     * @param string $username La valeur à chercher dans la colonne (ex: `admin`).
     * @param string $password Le mot de passe à vérifier.
     * @return void
     * @throws \Exception Si l'utilisateur n'existe pas ou si le mot de passe est incorrect.
     *
     * Exemple d'utilisation :
     * ```php
     * $repository = new Repository(User::class);
     * try {
     *     Security::authenticate($repository, 'username', 'admin', 'password123');
     *     echo "Authentification réussie.";
     * } catch (\Exception $e) {
     *     echo "Erreur : " . $e->getMessage();
     * }
     * ```
     */
    public static final function authenticate(string $username, string $password): void
    {
        /**
         * Étape 1 : Recherche l'utilisateur dans la base de données.
         * - Utilise le repository pour récupérer un utilisateur où `$column` correspond à `$username`.
         * - `$column` peut être `username`, `email`, ou tout autre champ unique d'authentification.
         */
        $repository=new Repository(users::class);
        $result = $repository->getByAttributes(["email" => $username],false);

        /**
         * Étape 2 : Si un utilisateur est trouvé, vérifier le mot de passe.
         * - Utilise `password_verify` pour comparer le mot de passe fourni avec celui stocké dans la base de données.
         */
        if ($result) {
            if (password_verify($password, $result->getPassword())) {
                // Si le mot de passe est correct, connecter l'utilisateur.
                $_SESSION['IS_AUTHENTICATED'] = true;
                $_SESSION['ROLE']=$result->getRole();
                $_SESSION['USER']=$result;
            } else {
                // Si le mot de passe est incorrect, lever une exception.
                throw new \Exception('Mot de passe ou adresse email incorrect');
            }
        } else {
            // Si aucun utilisateur n'est trouvé, lever une exception.
            throw new \Exception("Mot de passe ou adresse email incorrecte");
        }
    }
    public static function isStrongPassword(string $password): bool
{
    // Vérifier que le mot de passe contient au moins 12 caractères
    if (strlen($password) < 12) {
        return false;
    }

    // Vérifier qu'il contient au moins une lettre majuscule
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }

    // Vérifier qu'il contient au moins une lettre minuscule
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }

    // Vérifier qu'il contient au moins un chiffre
    if (!preg_match('/\d/', $password)) {
        return false;
    }

    // Vérifier qu'il contient au moins un caractère spécial (par exemple @, #, $, %, etc.)
    if (!preg_match('/[\W_]/', $password)) {
        return false;
    }

    // Si toutes les vérifications passent, le mot de passe est considéré comme fort
    return true;
}
public static function hasRole(array $roles): bool
    {
        if (isset($_SESSION['ROLE'])) {
            return in_array($_SESSION['ROLE'],$roles);
        }
        return false;
    }

}
