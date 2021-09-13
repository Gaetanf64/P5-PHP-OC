<?php

namespace App\Models;


class User
{

    protected $email;
    protected $username;
    public $password;
    public $is_admin;
    protected $date_creation;
    protected $date_update;
    protected $id_user;


    public function __construct($data = false)
    {

        if (is_array($data)) {
            $this->hydrate($data);
        }
    }

    public function setEmail(String $email)
    {
        if (mb_strlen($email) > 50) {
            $email = substr($email, 0, 50);
        }

        $email = strtolower($email);
        $this->email = ucfirst($email);
        return $this;
    }

    public function setUsername(String $username)
    {
        if (mb_strlen($username) > 50) {
            $username = substr($username, 0, 50);
        }

        $this->username = $username;
        //$this->username = ucfirst($username);
        return $this->username;
    }

    public function setPassword(String $password)
    {
        if (mb_strlen($password) > 255) {
            $password = substr($password, 0, 255);
        }

        $this->password = $password;
        // $this->password = ucfirst($password);
        return $this->password;
    }

    public function setIs_admin(Int $is_admin)
    {
        /*if (mb_strlen($content) > 20) {
            $content = substr($content, 0, 20);
        }*/

        //$is_admin = strtolower($is_admin);
        $this->is_admin = $is_admin;
        return $this->is_admin;
    }

    public function setDate_creation(String $date_creation)
    {
        /*if (mb_strlen($date_creation) > 30) {
            $date_creation = substr($date_creation, 0, 30);
        }
        
        $date_creation = strtolower($date_creation);*/
        $this->date_creation = $date_creation;
        return $this;
    }

    public function setDate_update(String $date_update)
    {
        /*if (mb_strlen($date_update) > 30) {
            $date_update = substr($date_update, 0, 30);
        }

        $date_update = strtolower($date_update);*/
        $this->date_update = $date_update;
        return $this;
    }


    public function setId_user(Int $id_user)
    {

        if ($id_user > 0) {
            $this->id_user = $id_user;
        }
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getIs_admin()
    {
        return $this->is_admin;
    }

    public function getDate_creation()
    {
        return $this->date_creation;
    }

    public function getDate_update()
    {
        return $this->date_update;
    }

    public function getId_user()
    {
        return $this->id_user;
    }


    private function hydrate($data)
    {
        // Boucle sur tous les champs et valeurs
        foreach ($data as $key => $value) {
            // Construit le title de la méthode grace 
            // au title des champs de le DB
            $methodName = 'set' . ucfirst($key);

            // Si la méthode existe
            if (method_exists($this, $methodName)) {
                // Appel de la méthode
                $this->$methodName($value);
            }
        }
    }
}
