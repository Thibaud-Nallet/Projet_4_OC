<?php
//Récupère tout les billets de la BDD
function getPosts()
{
    $db = dbConnect();
    $posts = $db->query('SELECT id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y") AS creation_date_fr 
    FROM post');

    return $posts;
}


//Récupère un billet précis de la BDD
function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr 
    FROM post 
    WHERE id = ?'
    );
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

//Récupère les commentaires d'un billet 
function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT pseudo, comments.id, id_user, id_post, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr 
    FROM comments
    INNER JOIN user ON user.id = comments.id_user 
    WHERE id_post = ? 
    ORDER BY date_creation DESC');
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
