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
        $req = new BackEndManager;
        $postsAdmin = $req->getPostsAdmin();
        require("view/listPostAdmin.php");
    }

    public function writePostAdmin() {
        require("view/writePostAdmin.php");
    }

    public function listCommentsAdmin() {
        $req = new BackEndManager;
        $pseudoCommentAdmin = $req->getCommentsAdmin();
        $titleCommentAdmin = $req->regetCommentsAdmin();
        require("view/listCommentsAdmin.php");
    }
}
