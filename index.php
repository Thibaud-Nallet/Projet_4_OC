<?php
session_start();

require("controller.php");

if (isset($_GET["action"])) {
    if ($_GET["action"] == "inscription") 
    {
        inscription();
    } 
    elseif ($_GET["action"] == "login") 
    {
        login();
    } 
    elseif ($_GET["action"] == "homeProfil") 
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            homeProfil();
        }
    } 
    elseif ($_GET["action"] == "deconnectProfil") 
    {
        deconnectProfil();
    }
    elseif ($_GET["action"] == "editProfil")
    {
        editProfil();
    }

} else {
    login();
}