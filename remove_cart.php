<?php
include('includes.php');
$re = $db->sql_query("SELECT * FROM " . "$prefix" . "particulars WHERE p_cart_id= '$_GET[cart_id]'");
if(empty($_REQUEST[cart_id])/* ||  empty($_REQUEST[items_id])*/){
	print"Empty field(s).";
	exit();
}
elseif($re){
	print"No edits allowed.";
	exit();
}
$result = $db->sql_query("DELETE FROM " . "$prefix" . "cart WHERE cart_id= '$_REQUEST[cart_id]' AND cart_item='$_REQUEST[items_id]'");
if($result){
print"Successfully removed.";
}
else{
print"Error.";
}
?>