<?php 

require("../model/model.php");

$statement = Manager::connect();

require("../view/front-end/blog.php");