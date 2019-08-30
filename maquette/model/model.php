<?php
require("Manager.php");

$statement = $db->query("SELECT * FROM post");

return $statement;
