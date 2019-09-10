<?php
require_once("model/Manager.php");

class FrontEndManager extends Manager
{

    /* ----------------------------------------------------------------- */
    /* --                     PAGE BLOG + POST                        -- */
    /* ----------------------------------------------------------------- */

    public function getPosts()
    {
        $bdd = $this->dbConnect();
        $posts = $bdd->query('SELECT id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y") AS creation_date_fr FROM post');
        return $posts;
    }

    /* --------------------- ARTICLE SELECTIONNE -------------------- */
    public function getPost($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            'SELECT id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM post WHERE id = ?'
        );
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    /* --------------------- URL VERIF MAX POST -------------------- */
    public function maxPost()
    {
        $bdd = $this->dbConnect();
        $total = $bdd->query('SELECT COUNT(*) AS total FROM post');
        $post_total = $total->fetch();
        $maxPost = $post_total['total'];
        return $maxPost;
    }

    /* -------------------- COMMENTAIRES ARTICLE -------------------- */
    function getComments($postId, $premiereEntree, $messagesParPage)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('SELECT pseudo, comments.id, id_user, id_post, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr, alert
    FROM comments
    INNER JOIN user ON user.id = comments.id_user 
    WHERE id_post = ? 
    ORDER BY date_creation DESC
    LIMIT ' . $premiereEntree . ', ' . $messagesParPage . '');
        $comments->execute(array($postId));
        return $comments;
    }

    /* ----------------- TOTAL COMMENTAIRES ARTICLE ------------------ */
    public function totalComment($postId)
    {
        $bdd = $this->dbConnect();
        $total = $bdd->prepare('SELECT COUNT(id) AS nb_lignes FROM comments WHERE id_post = ?');
        $total->execute(array($postId));
        $result = $total->fetch();
        return $result;
    }

    /* ------------------- POSTE UN COMMENTAIRE --------------------- */
    public function postComment($content, $id_user, $id_post)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('INSERT INTO comments(content, id_user, id_post, date_creation) 
    VALUES(?, ?, ?, NOW())');
        $comment = $comments->execute(array($content, $id_user, $id_post));
        return $comment;
    }

    /* ------------------- PAGINATION COMMENTAIRES -------------------- */
    public function retourMessages($premiereEntree, $messagesParPage)
    {
        $bdd = $this->dbConnect();
        $retour_messages = $bdd->query('SELECT * FROM comments ORDER BY id DESC LIMIT ' . $premiereEntree . ', ' . $messagesParPage . '');
        return $retour_messages;
    }

    /* ------------------ SIGNALEMENT COMMENTAIRES -------------------- */
    public function signalComment($idSignal)
    {
        $bdd = $this->dbConnect();
        $signalAlert = $bdd->prepare('UPDATE comments SET alert = "true" WHERE id = ?');
        $signalAlert->execute(array($idSignal));
        return $signalAlert;
    }

    /* ----------------------------------------------------------------- */
    /* --                      CONNEXION USER                         -- */
    /* ----------------------------------------------------------------- */

    public function userConnect($mailConnect)
    {
        $bdd = $this->dbConnect();
        $reqUser = $bdd->prepare("SELECT * FROM user WHERE email = ?");
        $reqUser->execute(array($mailConnect));
        return $reqUser;
    }

    /* ------------------ VERIF SI USER DANS BDD -------------------- */
    public function checkUserDb($mailConnect)
    {
        $reqUserManager = new FrontEndManager;
        $reqUser = $reqUserManager->userConnect($mailConnect);
        $userExist = $reqUser->rowCount();
        return $userExist;
    }

    /* --------------------- LANCE LA SESSION ----------------------- */
    public function userConnected($mailConnect)
    {
        $reqUserManager = new FrontEndManager;
        $reqUser = $reqUserManager->userConnect($mailConnect);
        $userInfo = $reqUser->fetch();
        return $userInfo;
    }

    /* ----------------------------------------------------------------- */
    /* --                    INSCRIPTION USER                         -- */
    /* ----------------------------------------------------------------- */

    /* ------------------ VERIF SI MAIL DANS BDD -------------------- */
    public function verifMailDb($inputMail)
    {
        $bdd = $this->dbConnect();
        $reqmail = $bdd->prepare("SELECT email FROM user WHERE email = ?");
        $reqmail->execute(array($inputMail));
        $mailexist = $reqmail->rowCount();
        return $mailexist;
    }

    /* ------------------- INSERE USER DANS BDD ---------------------- */
    public function insertUserDb($inputPseudo, $inputMail, $inputPassword)
    {
        $bdd = $this->dbConnect();
        $insertMember = $bdd->prepare("INSERT INTO user(pseudo, email, pass, date_inscription) VALUES(?, ?, ?, NOW())");
        $insertMember->execute(array($inputPseudo, $inputMail, $inputPassword));
        return $insertMember;
    }

    /* ----------------------------------------------------------------- */
    /* --                PAGE DE GESTION DE PROFIL                    -- */
    /* ----------------------------------------------------------------- */

    /* ------------------- VERIF URL PAGE ---------------------- */
    public function maxProfil()
    {
        $bdd = $this->dbConnect();
        $total = $bdd->query('SELECT COUNT(*) AS total FROM user');
        $post_total = $total->fetch();
        $maxProfil = $post_total['total'];
        return $maxProfil;
    }

    /* ------------------- VERIF URL PAGE ---------------------- */
    public function viewProfil()
    {
        $bdd = $this->dbConnect();
        $getId = intval($_GET['id']);
        $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
        $requser->execute(array($getId));
        $userInfo = $requser->fetch();

        return $userInfo;
    }

    /* ----------------------------------------------------------------- */
    /* --                  PAGE EDITION DE PROFIL                     -- */
    /* ----------------------------------------------------------------- */

    public function checkUser($userId)
    {
        $bdd = $this->dbConnect();
        $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
        $requser->execute(array($userId));
        $user = $requser->fetch();
        return $user;
    }

    /* ------------------- MODIFIE PSEUDO ---------------------- */
    public function upPseudo($input_NewPseudo, $id)
    {
        $bdd = $this->dbConnect();
        $insertPseudo = $bdd->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
        $insertPseudo->execute(array($input_NewPseudo, $id));
        return $insertPseudo;
    }

    /* -------------------- MODIFIE MAIL ------------------------ */
    public function upMail($input_NewMail, $id)
    {
        $bdd = $this->dbConnect();
        $insertMail = $bdd->prepare("UPDATE user SET email = ? WHERE id = ?");
        $insertMail->execute(array($input_NewMail, $id));
        return $insertMail;
    }

    /* ------------------ MODIFIE PASSWORD --------------------- */
    public function upPassword($input_NewPassword, $id)
    {
        $bdd = $this->dbConnect();
        $insertPassword = $bdd->prepare("UPDATE user SET pass = ? WHERE id = ?");
        $insertPassword->execute(array($input_NewPassword, $id));
        return $insertPassword;
    }
}//-- class --
