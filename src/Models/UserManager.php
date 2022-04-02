<?php


namespace App\Models;

use App\Models\MainModel;
use App\Models\user;
use PDO;

require_once ROOT . 'src/Models/MainModel.php';
require_once ROOT . 'src/Models/User.php';


class UserManager extends MainModel
{
    /**
     * Permet de sélectionner le user recherché
     * 
     */
    public function getByUsername($username)
    {
        $this->setDb();

        $sql = "SELECT * FROM user WHERE username = :username";
        $req = $this->db->prepare($sql);
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    /**
     * Permet de sélectionner l'email d'un utilisateur
     * 
     */
    public function getByEmail($email)
    {

        $this->setDb();

        $sql = "SELECT * FROM user WHERE email = :email";
        $req = $this->db->prepare($sql);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    /**
     * Met à jour le token pour le mot de passe oublié et la confirmation du compte
     * 
     */
    public function generateToken($token, $email)
    {
        $this->setDb();

        $sql = "UPDATE user SET token = :token WHERE email = :email";
        $req = $this->db->prepare($sql);
        $req->bindValue(':token', $token->getToken(), PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
    }

    /**
     * Met à jour le nouveau mot de passe et le token
     * 
     */
    public function newPassword($token, $newPassword)
    {
        $this->setDb();

        $sql = "UPDATE user SET password = :password, date_update = :date_update WHERE token = :token";
        $req = $this->db->prepare($sql);
        $req->bindValue(':password', $newPassword->getPassword(), PDO::PARAM_STR);
        $req->bindValue(':token', $token, PDO::PARAM_STR);
        $req->bindValue(':date_update', $newPassword->getDate_update(), PDO::PARAM_STR);
        $req->execute();


        $sql2 = "UPDATE user SET token = :token WHERE password = :password";
        $req2 = $this->db->prepare($sql2);
        $req2->bindValue(':token', NULL, PDO::PARAM_STR);
        $req2->bindValue(':password', $newPassword->getPassword(), PDO::PARAM_STR);
        $req2->execute();
    }

    /**
     * Valide le compte du nouveau user
     * 
     */
    public function confirmDefinitive($token, $newUser)
    {
        $this->setDb();

        $sql = "UPDATE user SET is_activated = :is_activated, date_update = :date_update WHERE token = :token";
        $req = $this->db->prepare($sql);
        $req->bindValue(':is_activated', $newUser->getIs_activated(), PDO::PARAM_STR);
        $req->bindValue(':token', $token, PDO::PARAM_STR);
        $req->bindValue(':date_update', $newUser->getDate_update(), PDO::PARAM_STR);
        $req->execute();

        $sql2 = "UPDATE user SET token = :token WHERE username = :username";
        $req2 = $this->db->prepare($sql2);
        $req2->bindValue(':token', NULL, PDO::PARAM_STR);
        $req2->bindValue(':username', $newUser->getUsername(), PDO::PARAM_STR);
        $req2->execute();
    }

    /**
     * Permet de vérifier qu'un user existe déjà
     * 
     */
    public function verifyUser($username, $email)
    {
        $this->setDb();

        $sql = "SELECT COUNT(*) AS nbLogin FROM user WHERE username = :username OR email = :email";
        $req = $this->db->prepare($sql);
        $req->bindValue('username', $username, PDO::PARAM_STR);
        $req->bindValue('email', $email, PDO::PARAM_STR);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * Créer un nouvel utilisateur
     * 
     */
    public function newUser($user)
    {
        $this->setDb();

        $sql = "INSERT INTO user (email,username,password,token,is_admin,date_creation,date_update,is_activated)
        VALUES (:email,:username,:password,:token,:is_admin,:date_creation,:date_update,:is_activated)";

        $req = $this->db->prepare($sql);
        $req->bindValue('email', $user->getEmail(), PDO::PARAM_STR);
        $req->bindValue('username', $user->getUsername(), PDO::PARAM_STR);
        $req->bindValue('password', $user->getPassword(), PDO::PARAM_STR);
        $req->bindValue('token', NULL, PDO::PARAM_STR);
        $req->bindValue('is_admin', 0, PDO::PARAM_INT);
        $req->bindValue('date_creation', $user->getDate_creation(), PDO::PARAM_STR);
        $req->bindValue('date_update', $user->getDate_update(), PDO::PARAM_STR);
        $req->bindValue('is_activated', 0, PDO::PARAM_INT);

        $result = $req->execute();
        if ($result) {
            $id_user = $this->db->lastInsertId();
            $user->setId_user($id_user);
        }
    }

    /**
     * Lire par utilisateur pour la page profil
     * 
     */
    public function readByUser($id_user)
    {
        $this->setDb();

        $sql = "SELECT * FROM user WHERE id_user = :id_user";
        $req = $this->db->prepare($sql);
        $req->bindValue('id_user', $id_user, PDO::PARAM_INT);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        $user = new User($data);

        return $user;
    }

    /**
     * Met à jour les données du user pour la page profil
     * 
     */
    public function updateForUser($user)
    {
        $sql = "UPDATE user SET 
                email = :email,
                username = :username,
                password = :password,
                token = :token,
                is_admin = :is_admin,
                date_creation = :date_creation,
                date_update = :date_update
                WHERE id_user = :id_user
               ";
        $req = $this->db->prepare($sql);
        $req->bindValue('email', $user->getEmail(), PDO::PARAM_STR);
        $req->bindValue('username', $user->getUsername(), PDO::PARAM_STR);
        $req->bindValue('password', $user->getPassword(), PDO::PARAM_STR);
        $req->bindValue('token', $user->getToken(), PDO::PARAM_STR);
        $req->bindValue('is_admin', $user->getIs_admin(), PDO::PARAM_INT);
        $req->bindValue('date_creation', $user->getDate_creation(), PDO::PARAM_STR);
        $req->bindValue('date_update', $user->getDate_update(), PDO::PARAM_STR);
        $req->bindValue('id_user', $user->getId_user(), PDO::PARAM_INT);
        $req->execute();
    }
}
