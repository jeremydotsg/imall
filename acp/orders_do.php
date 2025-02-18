<?php
$expireTime = 60*60*24*100; // 100 days
session_set_cookie_params($expireTime);
session_name("ACP");
session_start();
include("ums.php");
$check = user_login_check();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
if($_GET['do'] == 'done'){
		/*$resource_cart=$db->sql_query("SELECT * FROM " . "$prefix" . "cart WHERE cart_id= '$_REQUEST[id]'");
		while($row = $db->sql_fetch_assoc($resource_cart)){
			$id_remove = $row[cart_item];
			$resource_item=$db->sql_query("SELECT * FROM " . "$prefix" . "items WHERE items_id='$id_remove'");
			while($rowitem = $db->sql_fetch_assoc($resource_item)){
				$old_item_qty = $row[items_qty];
				$new_item_qty = --$old_item_qty;
			}
			$resource_itemtoo=$db->sql_query("UPDATE " . "$prefix" . "items SET items_qty=$new_item_qty WHERE items_id='$id_remove'");
		}*/
		$resource_all=$db->sql_query("UPDATE " . "$prefix" . "particulars SET p_order='1' WHERE p_cart_id='$_REQUEST[id]'");		
		print"Successfully updated.";
		print"<meta http-equiv=\"refresh\" content=\"5;url=admin.php\"/>";

}
?>
	</body>
	</html>