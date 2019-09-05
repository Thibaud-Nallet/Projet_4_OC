<?php

require("model/BackEndManager.php");

class BackEndController
{
    public function homeProfilAdmin()
    {
        require("view/homeAdmin.php");
    }

    public function comeBackProfilAdmin()
    {
        header("Location: index.php?action=homeProfilAdmin");
    }

    public function listPostAdmin(){
        require("view/listPostAdmin.php");
    }

    public function writePostAdmin() {
        require("view/writePostAdmin.php");
    }

    public function listCommentsAdmin() {
        require("view/listCommentsAdmin.php");
    }
}
