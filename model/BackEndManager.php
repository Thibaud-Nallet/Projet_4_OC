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

    public function getCommentsAdmin()
    {
        $bdd = $this->dbConnect();
        $pseudoCommentAdmin = $bdd->query('SELECT pseudo, comments.id, id_user, DATE_FORMAT(date_creation, "%d/%m/%Y") AS creation_date_fr, content, id_post
        FROM comments
        INNER JOIN user ON user.id = comments.id_user
        ORDER BY date_creation DESC');

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
}
