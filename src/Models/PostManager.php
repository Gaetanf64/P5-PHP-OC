<?php

namespace App\Models;

use App\Models\MainModel;
use PDO;
use App\Models\Post;
use App\Models\User;

require_once ROOT . 'src/Models/MainModel.php';
require_once ROOT . 'src/Models/Post.php';
require_once ROOT . 'src/Models/User.php';

class PostManager extends MainModel
{

    //private  $db;

    public function __construct()
    {
        // $this->db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

        // //Errors
        // $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    }

    public function read($id_article)
    {
        $this->setDb();

        $sql = "SELECT * FROM post,user WHERE id_article = :id_article AND user.id_user = post.id_user";
        $req = $this->db->prepare($sql);
        $req->bindValue('id_article', $id_article, PDO::PARAM_INT);
        $req->execute();

        $data = $req->fetch(PDO::FETCH_ASSOC);
        $post = new Post($data);

        return $post;
    }

    public function readAll()
    {
        $this->setDb();


        // Tableau va recuillir la collection d'objets Clients
        // $posts = [];

        // // Requete SQL et Execution
        // $sql = "SELECT * FROM post ORDER BY date_update desc";
        // $res = $this->db->query($sql);

        // // Boucle sur chaque enregistrement
        // while ($post = $res->fetch()) {
        //     // Ajout d'un nouveau client à la collection
        //     $posts[] = new Post($post);
        // }

        // // Retourne la collection de clients
        // return $posts;

        $posts = [];
        $req = $this->db->prepare(
            'SELECT post.title, post.chapo, SUBSTR(post.content,1,600) as content, post.date_creation, post.date_update, post.id_article, user.id_user, user.username
            FROM post,user 
            WHERE user.id_user = post.id_user 
            ORDER BY post.date_update DESC'
        );
        $req->execute();

        // $posts = $req->fetchAll(PDO::FETCH_ASSOC);

        // return $posts;



        // $posts[] = $req->fetchAll(PDO::FETCH_ASSOC, __NAMESPACE__ . '\Post');

        // return $posts;

        //on crée la variable data qui
        //va cobntenir les données
        while ($post = $req->fetch(PDO::FETCH_ASSOC)) {

            // posts contiendra les données sous forme d'objets
            $posts[] = new Post($post);
            //$posts['username'] = $post['username'];
            //$users[] = new User($post);
        }
        return $posts;
        //return $users;

        $req->closeCursor();
    }

    public function create($post)
    {

        $this->setDb();

        $sql = "INSERT INTO post (title,chapo,content,date_creation,date_update,id_user)
        VALUES (:title,:chapo,:content,:date_creation,:date_update,:id_user)";

        $req = $this->db->prepare($sql);
        $req->bindValue('title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue('chapo', $post->getChapo(), PDO::PARAM_STR);
        $req->bindValue('content', $post->getContent(), PDO::PARAM_STR);
        $req->bindValue('date_creation', $post->getDate_creation(), PDO::PARAM_STR);
        $req->bindValue('date_update', $post->getDate_update(), PDO::PARAM_STR);
        $req->bindValue('id_user', $post->getId_user(), PDO::PARAM_INT);

        $result = $req->execute();
        if ($result) {
            $id_article = $this->db->lastInsertId();
            $post->setId_article($id_article);
        }
    }


    public function update($post)
    {
        $sql = "UPDATE post SET 
                title = :title,
                chapo = :chapo,
                content = :content,
                date_creation = :date_creation,
                date_update = :date_update,
                id_user = :id_user
                WHERE id_article = :id_article
               ";
        $req = $this->db->prepare($sql);
        $req->bindValue('title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue('chapo', $post->getChapo(), PDO::PARAM_STR);
        $req->bindValue('content', $post->getContent(), PDO::PARAM_STR);
        $req->bindValue('date_creation', $post->getDate_creation(), PDO::PARAM_STR);
        $req->bindValue('date_update', $post->getDate_update(), PDO::PARAM_STR);
        $req->bindValue('id_user', $post->getId_user(), PDO::PARAM_INT);
        $req->bindValue('id_article', $post->getId_article(), PDO::PARAM_INT);
        $req->execute();
    }

    public function delete($post)
    {
        $sql = "DELETE FROM post WHERE id_article = :id_article";
        $req = $this->db->prepare($sql);
        $req->bindValue('id_article', $post->getId_article(), PDO::PARAM_INT);

        $req->execute();
    }
}
