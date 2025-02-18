<?php
//simple, just dump everything to user
$resource_all=$db->sql_query("SELECT * FROM " . "$prefix" . "cart WHERE cart_id='$cart_id'");
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
<br/>Description:$row[items_desc]<br/><strong>Unit Price:</strong>$row[items_unitprice]<br/>Category:$row_category[category_name]<br/>
      <a href=\"remove_cart.php?items_id=$row[items_id]&cart_id=$cart_id\" target=\"_msg\">Remove from cart?</a></td>";
			if($i == 5){
				print "</tr>";
			}
			$i++;
			
	$total_price=$total_price + $row[items_unitprice];
	}/*end fetching results*/
	print"</tr></table>";
}	
print"<br/>";
print"<div id=\"total\">Total:SGD$" . "$total_price</div>";/*totlal sum*/
?>