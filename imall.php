<?php
$expireTime = 60*60*24*100; // 100 days
session_set_cookie_params($expireTime);
session_name("ID");
session_start();
include("includes.php");
if(empty($_REQUEST[cart_id])){
	$cart_id = session_id();
}
if(empty($_REQUEST[page]) || $_REQUEST[page]=="index" || $_REQUEST[page]=="view_items"){
	$page = 'view_items.php';
	$title = 'Mall Front';
}
elseif($_REQUEST[page] == "view_cart"){
	$page = 'view_cart.php';
	$title = 'View Cart';
}
elseif($_REQUEST[page] == "checkout"){
	$page = 'checkout.php';
	$title = 'Checkout';
}
elseif($_REQUEST[page] == "addpart"){
	$page = 'addpart.php';
	$title = 'Updating...';
}
include("header.php");print"<br/>";
include("$page");print"<br/>";
include("footer.php");
?>