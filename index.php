<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=jeanForteroche;charset=utf8', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e) {
    die("ERROR : " . $e->getMessage());
}

$results = $db->query('SELECT * FROM post');
   
while($row = $results->fetch()){
     echo $row['date_creation'] . " " . "<br/>" .$row['content'] . "<br/> <br/>";
}
    