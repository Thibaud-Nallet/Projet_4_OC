<?php
require_once("model/Manager.php");

class FrontEndManager extends Manager {
    //RECUPERATION DE TOUS LES ARTICLES 
    public function getPosts()
    {
        $bdd = $this->dbConnect();
        $posts = $bdd->query('SELECT id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y") AS creation_date_fr 
    FROM post');

        return $posts;
    }
    //RECUPERE L'ARTICLE DE L'ID SELECTIONNE
    public function getPost($postId)
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
    //RECUPERE LES COMMENTAIRES DE L'ARTICLE SELECTIONNE
    function getComments($postId)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('SELECT pseudo, comments.id, id_user, id_post, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr 
    FROM comments
    INNER JOIN user ON user.id = comments.id_user 
    WHERE id_post = ? 
    ORDER BY date_creation DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function verifMailDb($inputMail)
    {
        $bdd = $this->dbConnect();
        $reqmail = $bdd->prepare("SELECT email FROM user WHERE email = ?");
        $reqmail->execute(array($inputMail));
        $mailexist = $reqmail->rowCount();

        return $mailexist;
    }

    public function insertUserDb($inputPseudo, $inputMail, $inputPassword)
    {
        $bdd = $this->dbConnect();
        $insertMember = $bdd->prepare("INSERT INTO user(pseudo, email, pass, date_inscription) VALUES(?, ?, ?, NOW())");
        $insertMember->execute(array($inputPseudo, $inputMail, $inputPassword));

        return $insertMember;
    }

    public function userConnect($mailConnect, $passwordConnect)
    {
        $bdd = $this->dbConnect();
        $reqUser = $bdd->prepare("SELECT * FROM user WHERE email = ? AND pass = ?");
        $reqUser->execute(array($mailConnect, $passwordConnect));

        return $reqUser;
    }

    public function checkUserDb($mailConnect, $passwordConnect)
    {
        $reqUserManager = new FrontEndManager;
        $reqUser = $reqUserManager->userConnect($mailConnect, $passwordConnect);
        $userExist = $reqUser->rowCount();

        return $userExist;
    }

    public function userConnected($mailConnect, $passwordConnect)
    {
        $reqUserManager = new FrontEndManager;
        $reqUser = $reqUserManager->userConnect($mailConnect, $passwordConnect);
        $userInfo = $reqUser->fetch();

        return $userInfo;
    }

    public function viewProfil()
    {
        $bdd = $this->dbConnect();
        $getId = intval($_GET['id']);
        $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
        $requser->execute(array($getId));
        $userInfo = $requser->fetch();

        return $userInfo;
    }

    public function checkUser($userId)
    {
        $bdd = $this->dbConnect();
        $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
        $requser->execute(array($userId));
        $user = $requser->fetch();

        return $user;
    }

    public function upPseudo($input_NewPseudo, $id)
    {
        $bdd = $this->dbConnect();
        $insertPseudo = $bdd->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
        $insertPseudo->execute(array($input_NewPseudo, $id));

        return $insertPseudo;
    }

    public function upMail($input_NewMail, $id)
    {
        $bdd = $this->dbConnect();
        $insertMail = $bdd->prepare("UPDATE user SET email = ? WHERE id = ?");
        $insertMail->execute(array($input_NewMail, $id));

        return $insertMail;
    }

    public function upPassword($input_NewPassword, $id)
    {
        $bdd = $this->dbConnect();
        $insertPassword = $bdd->prepare("UPDATE user SET pass = ? WHERE id = ?");
        $insertPassword->execute(array($input_NewPassword, $id));

        return $insertPassword;
    }

    public function postComment($content, $id, $postId)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('INSERT INTO comments(content, id_user, id_post, date_creation) 
    VALUES(?, ?, ?, NOW())');
        $comment = $comments->execute(array($content, $id, $postId));

        return $comment;
    }

}//-- class --