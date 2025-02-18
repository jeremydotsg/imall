<?php
//define db
if(isset($dbtype)){
include("$dbtype.php");
}
else{
die("undefined database type");
}
?>