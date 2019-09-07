<?php

class BackEndManager extends Manager
{

    public function getPostsAdmin()
    {
        $bdd = $this->dbConnect();
        $postsAdmin = $bdd->query('SELECT pseudo, post.id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y") AS creation_date_fr 
    FROM post
    INNER JOIN user ON user.id = post.id_author');

        return $postsAdmin;
    }

    public function getPostAdmin($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            'SELECT id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr 
    FROM post 
    WHERE id = ?'
        );
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getCommentsAdmin($premiereEntree, $messagesParPage)
    {
        $bdd = $this->dbConnect();
        $pseudoCommentAdmin = $bdd->query(
            'SELECT pseudo, comments.id, id_user, DATE_FORMAT(date_creation, "%d/%m/%Y") AS creation_date_fr, content, id_post
        FROM comments
        INNER JOIN user ON user.id = comments.id_user
        ORDER BY date_creation DESC
        LIMIT ' . $premiereEntree . ', ' . $messagesParPage . '');

        return $pseudoCommentAdmin;
    }
    public function regetCommentsAdmin()
    {
        $bdd = $this->dbConnect();
        $titleCommentAdmin = $bdd->query('SELECT title, id_post
            FROM comments
            INNER JOIN post ON post.id = comments.id_post');

        return $titleCommentAdmin;
    }

    public function totalComment() {
        $bdd = $this->dbConnect();
        $retour_total = $bdd->query('SELECT COUNT(*) AS total FROM comments');
        $donnees_total = $retour_total->fetch();
        $total = $donnees_total['total'];

        return $total;
    }

    public function retourMessages($premiereEntree, $messagesParPage) {
        $bdd = $this->dbConnect();
        $retour_messages = $bdd->query('SELECT * FROM comments ORDER BY id DESC LIMIT ' . $premiereEntree . ', ' . $messagesParPage . '');
        
        return $retour_messages;
    }
   
    public function deletePost($postId) {
        $bdd = $this->dbConnect();
        $delete_post = $bdd->prepare('DELETE FROM post WHERE id = ?');
        $delete_post->execute(array($postId));

        return $delete_post;
    }

    public function deleteCommentsPost($postId) {
        $bdd = $this->dbConnect();
        $delete_post_comments = $bdd->prepare('DELETE FROM comments WHERE id_post = ?');
        $delete_post_comments->execute(array($postId));
        return $delete_post_comments;
    }

    public function deleteComment($id) {
        $bdd = $this->dbConnect();
        $delete_comment = $bdd->prepare('DELETE FROM comments WHERE id = ?');
        $delete_comment->execute(array($id));
        return $delete_comment;
    }

    public function editPost($input_NewTitle, $input_NewContent, $id){
        $bdd = $this->dbConnect();
        $update_post = $bdd->prepare('UPDATE post SET title = ?, content = ?  WHERE id = ?');
        $update_post->execute(array($input_NewTitle, $input_NewContent, $id));

        return $update_post ;
    }

    public function writePost($idAuthor, $title, $content) {
        $bdd = $this->dbConnect();
        $write_post = $bdd->prepare('INSERT INTO post (date_creation, id_author, title, content) VALUES (NOW(), ?, ?, ?)');
        $write_post->execute(array($idAuthor, $title, $content));
        return $write_post;
    }

}
