<?php

function connectDb()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=jeanForteroche', 'root', 'root');
    } catch (PDOException $e) {
        echo ('ERREUR' . $e->getMessage());
    }
    return $bdd;
}

function getPosts()
{
    $bdd = connectDb();
    $posts = $bdd->query('SELECT id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y") AS creation_date_fr 
    FROM post');

    return $posts;
}

//Récupère un billet précis de la BDD
function getPost($postId)
{
    $bdd = connectDb();
    $req = $bdd->prepare(
        'SELECT id, id_author, title, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr 
    FROM post 
    WHERE id = ?'
    );
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}
function getComments($postId)
{
    $bdd = connectDb();
    $comments = $bdd->prepare('SELECT pseudo, comments.id, id_user, id_post, content, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr 
    FROM comments
    INNER JOIN user ON user.id = comments.id_user 
    WHERE id_post = ? 
    ORDER BY date_creation DESC');
    $comments->execute(array($postId));

    return $comments;
}
function verifMailDb()
{
    $bdd = connectDb();
    $reqmail = $bdd->prepare("SELECT email FROM user WHERE email = ?");
    $reqmail->execute(array($_POST["inputMail"]));
    $mailexist = $reqmail->rowCount();

    return $mailexist;
}

function insertUserDb()
{
    $bdd = connectDb();
    $insertMember = $bdd->prepare("INSERT INTO user(pseudo, email, pass, date_inscription) VALUES(?, ?, ?, NOW())");
    $insertMember->execute(array($_POST["inputPseudo"], $_POST["inputMail"], $_POST["inputPassword"]));

    return $insertMember;
}

function userConnect()
{
    $bdd = connectDb();
    $reqUser = $bdd->prepare("SELECT * FROM user WHERE email = ? AND pass = ?");
    $reqUser->execute(array($_POST["mailConnect"], $_POST["passwordConnect"]));

    return $reqUser;
}

function checkUserDb()
{
    $reqUser = userConnect();
    $userExist = $reqUser->rowCount();

    return $userExist;
}

function userConnected()
{
    $reqUser = userConnect();
    $userInfo = $reqUser->fetch();

    return $userInfo;
}

function viewProfil()
{
    $bdd = connectDb();
    $getId = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
    $requser->execute(array($getId));
    $userInfo = $requser->fetch();

    return $userInfo;
}

function checkUser()
{
    $bdd = connectDb();
    $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    return $user;
}

function upPseudo()
{
    $bdd = connectDb();
    $insertPseudo = $bdd->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
    $insertPseudo->execute(array($_POST['input_NewPseudo'], $_SESSION['id']));

    return $insertPseudo;
}

function upMail()
{
    $bdd = connectDb();
    $insertMail = $bdd->prepare("UPDATE user SET email = ? WHERE id = ?");
    $insertMail->execute(array($_POST['input_NewMail'], $_SESSION['id']));

    return $insertMail;
}

function upPassword()
{
    $bdd = connectDb();
    $insertPassword = $bdd->prepare("UPDATE user SET pass = ? WHERE id = ?");
    $insertPassword->execute(array($_POST['input_NewPassword'], $_SESSION['id']));

    return $insertPassword;
}

function postComment($postId)
{
    $bdd = connectDb();
    $comments = $bdd->prepare('INSERT INTO comments(content, id_user, id_post, date_creation) 
    VALUES(?, ?, ?, NOW())');
    $comment = $comments->execute(array($_POST['textComment'], $_SESSION['id'], $postId));

    return $comment;
}
