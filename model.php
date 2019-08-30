<?php
function getPosts()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=jeanForteroche;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $bdd->query('SELECT * FROM post');

    return $req;
}
