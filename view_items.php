<table width="200" border="0" cellspacing="0" cellpadding="0" align="center">
<?php
$imall_display_option = $_GET[display_option];
if(empty($imall_display_option)){
	$imall_display_option = all;
}
if($imall_display_option == "all"){
		$resource_all=$db->sql_query("SELECT * FROM " . "$prefix" . "items WHERE items_published=1 AND items_qty>0");
		while($row = $db->sql_fetch_assoc($resource_all)){
			$row_category=$db->sql_fetch_assoc($db->sql_query("SELECT * FROM " . "$prefix" . "category WHERE category_id='$row[items_cat_id]' "));
			$thumbnail = "$uploadurl" . "$row[items_thumbnail]";
			if($i == 5){
				$i = 1;
				print "<tr>";
			}
			print "<td><a href=\"view_item_full.php?id=$row[items_id]&cart_id=$cart_id\" target=\"_msg\"><img src=\"$thumbnail\" width=\"100\" height=\"100\" alt=\"$row[items_desc]\"/><br/><br/>$row[items_name]</a></td>";
			if($i == 5){
				print "</tr>";
			}
			$i++;
	}
	print "</tr></table><br/>";
}
else{
print"error['imall_undefined_error']";
}
?>