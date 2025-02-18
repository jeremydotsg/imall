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
<style type="text/css">
<!--
@import url("style.css");
-->
</style>
</head>

<body>
<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
  <tr class="style8">
    <td>id</td>
    <td>name</td>
    <td>address </td>
    <td>cart id<sup>1</sup></td>
    <td>contact number</td>
    <td>email</td>
    <td>order<sup>2</sup></td>
    <td>functions</td>
  </tr>
<?php
$resource_all=$db->sql_query("SELECT * FROM " . "$prefix" . "particulars");
while($row = $db->sql_fetch_assoc($resource_all)){
	$row_category=$db->sql_fetch_assoc($db->sql_query("SELECT * FROM " . "$prefix" . "category WHERE category_id='$row[items_cat_id]' "));
	$thumbnail = "$uploadurl" . "$row[items_thumbnail]";
	print"  
	  <tr class=\"style9\">
		<td>$row[p_id]</td>
		<td>$row[p_name]</td>
		<td>$row[p_address]</td>
		<td>$row[p_cart_id]</td>
		<td>$row[p_contact_no]</td>
		<td>$row[p_email]</td>
		<td>$row[p_order]</td>
		<td><a href=\"view_orders.php?id=$row[p_cart_id]\">View order</a>|<a href=\"orders_do.php?do=done&amp;id=$row[p_cart_id]\">Mark as done</a> </td>
	  </tr>";
}
?>
</table>
<br/>
<span class="style7"><sup>1</sup>:Cart ID of the order.<br/><sup>2</sup>:1=Fulfiled.</span>
</body>
</html>
