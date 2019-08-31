<?php
class CommentManager
{
    //Récupère les commentaires d'un billet 
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT pseudo, comments.id, id_user, id_post, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr 
    FROM comments
    INNER JOIN user ON user.id = comments.id_user 
    WHERE id_post = ? 
    ORDER BY date_creation DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    /*
    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    */

    private function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=jeanForteroche;charset=utf8', 'root', 'root');
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
