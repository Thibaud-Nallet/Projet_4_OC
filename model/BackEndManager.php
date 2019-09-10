<?php

class BackEndManager extends Manager
{
    /* ----------------------------------------------------------------- */
    /* --               LISTE DE TOUS LES ARTICLES                    -- */
    /* ----------------------------------------------------------------- */
    public function getPostsAdmin()
    {
        $bdd = $this->dbConnect();
        $postsAdmin = $bdd->query('SELECT pseudo, post.id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y") AS creation_date_fr 
    FROM post
    INNER JOIN user ON user.id = post.id_author');
        return $postsAdmin;
    }

    /* --------------- SELECTIONNE LE POST DESIRE -------------------- */
    public function getPostAdmin($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            'SELECT id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM post WHERE id = ?'
        );
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    /* --------------- EDITER LE POST DESIRE ----------------------- */
    public function editPost($input_NewTitle, $input_NewContent, $id)
    {
        $bdd = $this->dbConnect();
        $update_post = $bdd->prepare('UPDATE post SET title = ?, content = ?  WHERE id = ?');
        $update_post->execute(array($input_NewTitle, $input_NewContent, $id));
        return $update_post;
    }

    /* ---------------- SUPPRIME LE POST DESIRE --------------------- */
    public function deletePost($postId)
    {
        $bdd = $this->dbConnect();
        $delete_post = $bdd->prepare('DELETE FROM post WHERE id = ?');
        $delete_post->execute(array($postId));
        return $delete_post;
    }

    /* -------- SUPPRESSION DES COMMENTAIRES LIES AU POST ---------- */
    public function deleteCommentsPost($postId)
    {
        $bdd = $this->dbConnect();
        $delete_post_comments = $bdd->prepare('DELETE FROM comments WHERE id_post = ?');
        $delete_post_comments->execute(array($postId));
        return $delete_post_comments;
    }

    /* ----------------------------------------------------------------- */
    /* --               REDIGER UN NOUVEAU ARTICLE                    -- */
    /* ----------------------------------------------------------------- */

    public function writePost($idAuthor, $title, $content)
    {
        $bdd = $this->dbConnect();
        $write_post = $bdd->prepare('INSERT INTO post (date_creation, id_author, title, content) VALUES (NOW(), ?, ?, ?)');
        $write_post->execute(array($idAuthor, $title, $content));
        return $write_post;
    }

    /* ----------------------------------------------------------------- */
    /* --             LISTE DE TOUS LES COMMENTAIRES                  -- */
    /* ----------------------------------------------------------------- */

    public function getCommentsAdmin($premiereEntree, $messagesParPage)
    {
        $bdd = $this->dbConnect();
        $pseudoCommentAdmin = $bdd->query(
            'SELECT pseudo, title, comments.id, id_user, DATE_FORMAT(comments.date_creation, "%d/%m/%Y") AS creation_date_fr, comments.content, id_post, alert
        FROM comments
        INNER JOIN user ON user.id = comments.id_user
        INNER JOIN post ON post.id = comments.id_post
        ORDER BY alert DESC
        LIMIT ' . $premiereEntree . ', ' . $messagesParPage . ''
        );
        return $pseudoCommentAdmin;
    }

    /* ------------- REQUETE POUR LE 2 INNERJOIN --------------------- 
    public function regetCommentsAdmin()
    {
        $bdd = $this->dbConnect();
        $titleCommentAdmin = $bdd->query('SELECT title, id_post, alert
            FROM comments
            INNER JOIN post ON post.id = comments.id_post');
        return $titleCommentAdmin;
    }*/

    /* --------------- TOTAL POUR LA PAGINATION --------------------- */
    public function totalComment()
    {
        $bdd = $this->dbConnect();
        $retour_total = $bdd->query('SELECT COUNT(*) AS total FROM comments');
        $donnees_total = $retour_total->fetch();
        $total = $donnees_total['total'];
        return $total;
    }

    public function retourMessages($premiereEntree, $messagesParPage)
    {
        $bdd = $this->dbConnect();
        $retour_messages = $bdd->query('SELECT * FROM comments ORDER BY id DESC LIMIT ' . $premiereEntree . ', ' . $messagesParPage . '');
        return $retour_messages;
    }

 /* -------------- SUPPRESSION DU COMMENTAIRE DESIRE ------------------ */
    public function deleteComment($id)
    {
        $bdd = $this->dbConnect();
        $delete_comment = $bdd->prepare('DELETE FROM comments WHERE id = ?');
        $delete_comment->execute(array($id));
        return $delete_comment;
    }
}
