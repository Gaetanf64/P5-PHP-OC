<?php

namespace App\Models;


class Post
{

    protected $title;
    protected $chapo;
    protected $content;
    protected $date_creation;
    protected $date_update;
    protected $id_article;
    protected $id_user;
    protected $username;


    public function __construct($data = false)
    {

        if (is_array($data)) {
            $this->hydrate($data);
        }
    }

    public function setTitle(String $title)
    {
        if (mb_strlen($title) > 50) {
            $title = substr($title, 0, 50);
        }

        //$title = strtolower($title);
        $this->title = ucfirst($title);
        return $this;
    }

    public function setChapo(String $chapo)
    {
        if (mb_strlen($chapo) > 150) {
            $chapo = substr($chapo, 0, 150);
        }

        $this->chapo = ucfirst($chapo);
        return $this;
    }

    public function setContent(String $content)
    {
        $this->content = $content;
        return $this;
    }

    public function setDate_creation(String $date_creation)
    {
        $this->date_creation = $date_creation;
        return $this;
    }

    public function setDate_update(String $date_update)
    {
        $this->date_update = $date_update;
        return $this;
    }


    public function setId_article(Int $id_article)
    {

        if ($id_article > 0) {
            $this->id_article = $id_article;
        }
        return $this;
    }

    public function setId_user(Int $id_user)
    {
        if ($id_user > 0) {
            $this->id_user = $id_user;
        }
        return $this;
    }

    public function setUsername(String $username)
    {
        $this->username = $username;
        return $this;
    }

    public function getId_user()
    {
        return $this->id_user;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getChapo()
    {
        return $this->chapo;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getDate_creation()
    {
        return $this->date_creation;
    }

    public function getDate_update()
    {
        return $this->date_update;
    }

    public function getId_article()
    {
        return $this->id_article;
    }


    private function hydrate($data)
    {
        // Boucle sur tous les champs et valeurs
        foreach ($data as $key => $value) {
            // Construit le title de la m??thode grace 
            // au title des champs de le DB
            $methodName = 'set' . ucfirst($key);

            // Si la m??thode existe
            if (method_exists($this, $methodName)) {
                // Appel de la m??thode
                $this->$methodName($value);
            }
        }
    }
}
