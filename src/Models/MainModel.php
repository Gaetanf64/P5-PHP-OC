<?php

namespace App\Models;

use PDO;


abstract class MainModel
{

    protected $db;

    /**
     * On charge la db
     * 
     */
    public function setDb()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

        //Errors
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        return $this->db;
    }
}
