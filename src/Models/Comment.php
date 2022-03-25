<?php

namespace App\Models;


class Comment
{

    protected $content_comment;
    protected $is_actived;
    protected $date_creation;
    protected $date_update;
    protected $id_comment;
    protected $id_user;
    protected $username;
    protected $id_article;


    public function __construct($data = false)
    {

        if (is_array($data)) {
            $this->hydrate($data);
        }
    }

    public function setContent_comment(String $content_comment)
    {
        if (mb_strlen($content_comment) > 50) {
            $content_comment = substr($content_comment, 0, 50);
        }

        $this->content_comment = ucfirst($content_comment);
        return $this;
    }

    public function setIs_actived(Int $is_actived)
    {
        $this->is_actived = $is_actived;
        return $this->is_actived;
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


    public function setId_comment(Int $id_comment)
    {

        if ($id_comment > 0) {
            $this->id_comment = $id_comment;
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

    public function setId_article(Int $id_article)
    {
        if ($id_article > 0) {
            $this->id_article = $id_article;
        }
        return $this;
    }

    public function setUsername(String $username)
    {
        $this->username = $username;
        return $this;
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function getId_article()
    {
        return $this->id_article;
    }

    public function getId_user()
    {
        return $this->id_user;
    }

    public function getContent_comment()
    {
        return $this->content_comment;
    }

    public function getIs_actived()
    {
        return $this->is_actived;
    }

    public function getDate_creation()
    {
        return $this->date_creation;
    }

    public function getDate_update()
    {
        return $this->date_update;
    }

    public function getId_comment()
    {
        return $this->id_comment;
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
