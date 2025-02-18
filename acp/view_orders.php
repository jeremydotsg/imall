<?php
$expireTime = 60*60*24*100; // 100 days
session_set_cookie_params($expireTime);
session_name("ACP");
session_start();
include("ums.php");
$check = user_login_check();
//simple, just dump everything to user
$resource_all=$db->sql_query("SELECT * FROM " . "$prefix" . "cart WHERE cart_id= '$_GET[id]'");
if($db->sql_num_rows($resource_all) == "0"){
	print"No items to display.";
}
else{
	print"<table width=\"80%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"items\" align=\"center\">";
	/*begin fetching results*/
	while($row_cart = $db->sql_fetch_assoc($resource_all)){
		$row=$db->sql_fetch_assoc($db->sql_query("SELECT * FROM " . "$prefix" . "items WHERE items_id='$row_cart[cart_item]' "));
		$row_category=$db->sql_fetch_assoc($db->sql_query("SELECT * FROM " . "$prefix" . "category WHERE category_id='$row[items_cat_id]' "));
		$thumbnail = "$uploadurl" . "$row[items_thumbnail]";
		if($i == 5){
				$i = 1;
				print "<tr>";
			}
			print "<td><img src=\"$thumbnail\" width=\"100\" height=\"100\" alt=\"$row[items_desc]\"/><br/>
$row[items_name]
<br/>Description:$row[items_desc]<br/><strong>Unit Price:</strong>$row[items_unitprice]<br/>Category:$row_category[category_name]<br/>";
			if($i == 5){
				print "</tr>";
			}
			$i++;
			
	$total_price=$total_price + $row[items_unitprice];
	}/*end fetching results*/
	print"</tr></table><br/>
	<a href=\"orders_do.php?do=done&amp;id=$row[p_cart_id]\">Mark as done</a";
}	
print"<br/>";
print"<div id=\"total\">Total:SGD$" . "$total_price</div>";/*totlal sum*/
?>