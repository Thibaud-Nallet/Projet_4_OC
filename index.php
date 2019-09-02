<?php
session_start();

require("controller.php");

if(isset($_GET["action"]))
{
    if($_GET["action"] == "inscription")
    {
        inscription();
    }
    if ($_GET["action"] == "login") {
        login();
    }
}

else 
{
    login();
}