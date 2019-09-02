<?php
require_once("model/manager.php");

class Connection extends Manager {
    public function connectUser(){
        $db = $this->dbConnect();
        $reqUser = $db->prepare("SELECT * FROM user WHERE email = ? AND pass = ?");
        $reqUser->execute(array($_POST['mailConnect'], $_POST['passwordConnect']));
        $userExist = $reqUser->rowCount();

        return $userExist;

       
    }
    public function dddUser(){
        $userInfo = $reqUser->fetch();
        return $userInfo;
    }
}