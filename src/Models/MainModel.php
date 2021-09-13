<?php

namespace App\Models;

use PDO;
//use App\Models\Post;

//require_once ROOT . 'src/Models/Post.php';

abstract class MainModel
{

    protected $db;
    /*
    private static function setDb()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
     */
    public function setDb()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

        //Errors
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        return $this->db;
    }
}
