<?php
include("includes.php");
$title = "Viewing Item $_GET[id]";
include("header.php");
$imall_display_option = $_GET[display_option];
if(empty($imall_display_option)){
	$imall_display_option = all;
}
if($imall_display_option == "all"){
		$resource_all=$db->sql_query("SELECT * FROM " . "$prefix" . "items WHERE items_id=$_GET[id]");
		while($row = $db->sql_fetch_assoc($resource_all)){
			$row_category=$db->sql_fetch_assoc($db->sql_query("SELECT * FROM " . "$prefix" . "category WHERE category_id='$row[items_cat_id]' "));
			$thumbnail = "$uploadurl" . "$row[items_thumbnail]";
			print"<table width=\"80%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"item$row[items_id]\" align=\"center\">
    <tr>
    <img src=\"$thumbnail\" width=\"100\" height=\"100\" alt=\"$row[items_desc]\"/><br/>
$row[items_name]
<br/>Description:$row[items_desc]<br/><strong>Unit Price:</strong>$row[items_unitprice]<br/>Category:$row_category[category_name]<br/>
      <a href=\"add_cart.php?items_id=$row[items_id]&cart_id=$_GET[cart_id]\" target=\"_msg\">Add to cart?</a>
  </tr>
</table>
<br/>
";
	}
}
else{
print"error['imall_undefined_error']";
}
include("footer.php");
?>
