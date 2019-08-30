<?php

class Database {

    private static $dbHost = "localhost";
    private static $dbName = "jeanForteroche";
    private static $dbUser = "root";
    private static $dbUserPassword = "root";
    private static $db = null;

    public static function connect() {
        try {
        self::$db = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName . ";charset=utf8", self::$dbUser, self::$dbUserPassword);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
            die("ERROR : " . $e->getMessage());
        }
        return self::$db;
    }
    
    public static function disconnect() {
        self::$db = null;
    }

}












//$results = $db->query('SELECT * FROM post');
   
//while($row = $results->fetch()){
//     echo $row['date_creation'] . " " . "<br/>" .$row['content'] . "<br/> <br/>";
//}
 


    