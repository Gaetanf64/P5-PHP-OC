<?php


namespace App\Models;

use App\Models\MainModel;
use App\Models\user;
use PDO;

require_once ROOT . 'src/Models/MainModel.php';
require_once ROOT . 'src/Models/User.php';


class UserManager extends MainModel
{
    public function getByUsername(string $username)
    {

        $this->setDb();

        $sql = "SELECT * FROM user WHERE username = :username";
        $req = $this->db->prepare($sql);
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        //$user = new User($data);

        // $mdp = $user->password;

        // $is_admin = $user->is_admin;

        // return $mdp;
        // return $is_admin;


        return $data;
    }

    public function forgotPassword($token, $email)
    {
        $this->setDb();

        $sql = "UPDATE user SET token = :token WHERE email = :email";
        $req = $this->db->prepare($sql);
        $req->bindValue(':token', $token, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();

        // $data = $req->fetch(PDO::FETCH_ASSOC);

        // return $data;
    }

    public function newPassword($user)
    {
        $this->setDb();

        $sql = "UPDATE user SET password = :password WHERE email = :email";
        $req = $this->db->prepare($sql);
        $req->bindValue('password', $user->getPassword(), PDO::PARAM_STR);
        $req->bindValue('chapo', $user->getEmail(), PDO::PARAM_STR);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}
