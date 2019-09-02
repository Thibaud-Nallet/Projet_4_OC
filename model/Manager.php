<?php

class Manager
{
    private $_dbHost = "localhost";
    private $_dbName = "jeanForteroche";
    private $_dbUsername = "root";
    private $_dbUserpassword = "root";

    private $_db = null;

    protected function dbConnect()
    {
        if($this->_db == null){
            try {
                $this->_db = new PDO('mysql:host=' . $this->_dbHost .';dbname=' . $this->_dbName .';charset=utf8', $this->_dbUsername, $this->_dbUserpassword);
                $this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                
            } catch (PDOException $e) {
                echo ('La base de donnée n\'est pas disponible pour le moment. <br />');
                echo ('ERREUR' . $e->getMessage() . '<br />');
                echo ('Ligne : ' . $e->getLine());
            }
        }
        return $this->_db;
    }
}
