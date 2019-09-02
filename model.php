<?php

function connectDb()
{
    $bdd = new PDO('mysql:host=localhost;dbname=jeanForteroche', 'root', 'root');
    return $bdd;
}

function verifMailDb(){
   $bdd = connectDb();
    $reqmail = $bdd->prepare("SELECT email FROM user WHERE email = ?");
    $reqmail->execute(array($_POST["inputMail"]));
    $mailexist = $reqmail->rowCount();

    return $mailexist;
}

function insertUserDb()
{
    $bdd = connectDb();
    $insertMember = $bdd->prepare("INSERT INTO user(pseudo, email, pass, date_inscription) VALUES(?, ?, ?, CURDATE())");
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