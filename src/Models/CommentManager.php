<?php

namespace App\Models;

use App\Models\MainModel;
use PDO;
use App\Models\Comment;


require_once ROOT . 'src/Models/MainModel.php';
require_once ROOT . 'src/Models/Comment.php';


class CommentManager extends MainModel
{

    //private  $db;

    public function __construct()
    {
        // $this->db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

        // //Errors
        // $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    }

    // public function read($id_comment)
    // {
    //     return $this->readOne('comment', 'App\Models\Comment', $id_comment);
    // }

    public function readAll($id_article) //readById
    {
        $this->setDb();

        $comments = [];
        $req = $this->db->prepare(
            "SELECT *
            FROM comment
            WHERE id_article = :id_article
            ORDER BY date_update DESC"
        );
        $req->bindValue('id_article', $id_article, PDO::PARAM_INT);
        $req->execute();

        //on crée la variable data qui
        //va cobntenir les données
        while ($comment = $req->fetch(PDO::FETCH_ASSOC)) {
            // comments contiendra les données sous forme d'objets
            $comments[] = new Comment($comment);
        }
        return $comments;

        $req->closeCursor();
    }
}
