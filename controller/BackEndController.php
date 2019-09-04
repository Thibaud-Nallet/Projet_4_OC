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
}
