<?php 
require_once("model/Manager.php");

class Inscription extends Manager {
    //Insére le nouvel utilisateur dans la bdd
    public function newUser($pseud, $pas, $mail) 
    {
    $db = $this->dbConnect();
    $user = $db->prepare('INSERT INTO user (pseudo, pass, email, date_inscription) VALUES (:pseud, :pas, :mail, CURDATE()');
    $user->execute(array(
        'pseudo' => $pseud,
        'pass' => $pas,
        'email' => $mail
    ));
    return $user;
    }
}
