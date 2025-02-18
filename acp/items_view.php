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
    <td>description </td>
    <td>quantity<sup>1</sup></td>
    <td>unit price </td>
    <td>thumbnail</td>
    <td>category</td>
    <td>status</td>
    <td>functions<sup>2</sup></td>
  </tr>
<?php
$resource_all=$db->sql_query("SELECT * FROM " . "$prefix" . "items");
while($row = $db->sql_fetch_assoc($resource_all)){
	$row_category=$db->sql_fetch_assoc($db->sql_query("SELECT * FROM " . "$prefix" . "category WHERE category_id='$row[items_cat_id]' "));
	$thumbnail = "$uploadurl" . "$row[items_thumbnail]";
	print"  
	  <tr class=\"style9\">
		<td>$row[items_id]</td>
		<td>$row[items_name]</td>
		<td>$row[items_desc]</td>
		<td>$row[items_qty]</td>
		<td>$row[items_unitprice]</td>
		<td><img src=\"$thumbnail\" width=\"100\" height=\"100\" alt=\"$row[items_desc]\"/></td>
		<td>$row_category[category_name]</td>
		<td>$row[items_published]</td>
		<td><a href=\"items_manager.php?do=edit&amp;id=$row[items_id]\">EDIT</a> | <a href=\"items_manager.php?do=remove&amp;id=$row[items_id]\">REMOVE</a> </td>
	  </tr>";
}
?>
</table>
<br/>
<span class="style7"><sup>1</sup>:Quantity before orders are being fufilled.<br/><sup>2</sup>:Null or zero the quantity to remove the item from viewable list.</span>
</body>
</html>
