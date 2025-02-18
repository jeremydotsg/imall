<?php
//includes.php
include("config.php");
include("dbal/dbselect.php");
$db = new database;//start the class
$db->sql_connect("$dbhost","$dbuser","$dbpass");
$db->sql_select_db("$dbname");
?>