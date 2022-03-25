<?php

namespace App\Models;

use App\Models\MainModel;
use PDO;
use App\Models\Comment;


require_once ROOT . 'src/Models/MainModel.php';
require_once ROOT . 'src/Models/Comment.php';


class CommentManager extends MainModel
{
    /**
     * Permet de lire les commentaires d'un article
     */
    public function readComment($id_article)
    {
        $this->setDb();

        $comments = [];
        $req = $this->db->prepare(
            "SELECT *
            FROM comment,user
            WHERE id_article = :id_article AND user.id_user = comment.id_user
            ORDER BY comment.date_update DESC"
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
    }

    /**
     * Ajoute un commentaire
     */
    public function addComment($comment)
    {
        $this->setDb();

        $sql = "INSERT INTO comment (content_comment,is_actived,date_creation,date_update,id_user,id_article)
        VALUES (:content_comment,:is_actived,:date_creation,:date_update,:id_user,:id_article)";

        $req = $this->db->prepare($sql);
        $req->bindValue('content_comment', $comment->getContent_comment(), PDO::PARAM_STR);
        $req->bindValue('is_actived', 1, PDO::PARAM_STR);
        $req->bindValue('date_creation', $comment->getDate_creation(), PDO::PARAM_STR);
        $req->bindValue('date_update', $comment->getDate_update(), PDO::PARAM_STR);
        $req->bindValue('id_user', $comment->getId_user(), PDO::PARAM_INT);
        $req->bindValue('id_article', $comment->getId_article(), PDO::PARAM_INT);

        $result = $req->execute();
        if ($result) {
            $id_comment = $this->db->lastInsertId();
            $comment->setId_article($id_comment);
        }
    }
}
