<?php
//Récupère tout les billets de la BDD
function getPosts()
{
    $db = dbConnect();
    $posts = $db->query('SELECT * FROM post');

    return $posts;
}


//Récupère un billet précis de la BDD
function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM post WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

//Récupère les commentaires d'un billet 
function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT * FROM comments WHERE id_post = ? ORDER BY date_creation DESC');
    $comments->execute(array($postId));

    return $comments;
}

function dbConnect()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=jeanForteroche;charset=utf8', 'root', 'root');
        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/*DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr*/
