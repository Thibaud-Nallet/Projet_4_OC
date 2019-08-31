<?php

require_once("model/Manager.php"); 

class PostManager extends Manager
{
    //Récupère tout les billets de la BDD
    public function getPosts()
    {
        $db = $this->dbConnect();
        $posts = $db->query('SELECT id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y") AS creation_date_fr 
    FROM post');

        return $posts;
    }


    //Récupère un billet précis de la BDD
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'SELECT id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr 
    FROM post 
    WHERE id = ?'
        );
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

}
