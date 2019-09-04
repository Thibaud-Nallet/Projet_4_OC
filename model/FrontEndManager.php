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

    public function verifMailDb()
    {
        $bdd = $this->dbConnect();
        $reqmail = $bdd->prepare("SELECT email FROM user WHERE email = ?");
        $reqmail->execute(array($_POST["inputMail"]));
        $mailexist = $reqmail->rowCount();

        return $mailexist;
    }

    public function insertUserDb()
    {
        $bdd = $this->dbConnect();
        $insertMember = $bdd->prepare("INSERT INTO user(pseudo, email, pass, date_inscription) VALUES(?, ?, ?, NOW())");
        $insertMember->execute(array($_POST["inputPseudo"], $_POST["inputMail"], $_POST["inputPassword"]));

        return $insertMember;
    }

    public function userConnect()
    {
        $bdd = $this->dbConnect();
        $reqUser = $bdd->prepare("SELECT * FROM user WHERE email = ? AND pass = ?");
        $reqUser->execute(array($_POST["mailConnect"], $_POST["passwordConnect"]));

        return $reqUser;
    }

    public function checkUserDb()
    {
        $reqUserManager = new FrontEndManager;
        $reqUser = $reqUserManager->userConnect();
        $userExist = $reqUser->rowCount();

        return $userExist;
    }

    public function userConnected()
    {
        $reqUserManager = new FrontEndManager;
        $reqUser = $reqUserManager->userConnect();
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

    public function checkUser()
    {
        $bdd = $this->dbConnect();
        $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
        $requser->execute(array($_SESSION['userId']));
        $user = $requser->fetch();

        return $user;
    }

    public function upPseudo()
    {
        $bdd = $this->dbConnect();
        $insertPseudo = $bdd->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
        $insertPseudo->execute(array($_POST['input_NewPseudo'], $_SESSION['id']));

        return $insertPseudo;
    }

    public function upMail()
    {
        $bdd = $this->dbConnect();
        $insertMail = $bdd->prepare("UPDATE user SET email = ? WHERE id = ?");
        $insertMail->execute(array($_POST['input_NewMail'], $_SESSION['id']));

        return $insertMail;
    }

    public function upPassword()
    {
        $bdd = $this->dbConnect();
        $insertPassword = $bdd->prepare("UPDATE user SET pass = ? WHERE id = ?");
        $insertPassword->execute(array($_POST['input_NewPassword'], $_SESSION['id']));

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