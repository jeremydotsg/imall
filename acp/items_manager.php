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
if($_GET['do'] == 'edit'){
$resource_all=$db->sql_query("SELECT * FROM " . "$prefix" . "items WHERE items_id='$_REQUEST[id]'");
while($row = $db->sql_fetch_assoc($resource_all)){
	$row_category=$db->sql_fetch_assoc($db->sql_query("SELECT * FROM " . "$prefix" . "category WHERE category_id='$row[items_cat_id]' "));
	$thumbnail = "$uploadurl" . "$row[items_thumbnail]";
print"<form id=\"form1\" name=\"form1\" enctype=\"multipart/form-data\" method=\"post\" action=\"?do=\" >
	<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
	  <tr>
		<td width=212>Item Name </td>
		<td width=482 colspan=\"2\"><input name=\"name\" type=\"text\" id=\"name\" value=\"$row[items_name]\" /></td>
	  </tr>
	  <tr>
		<td>Item Quantity </td>
		<td colspan=\"2\"><input name=\"qty\" type=\"text\" id=\"qty\" value=\"$row[items_qty]\" /></td>
	  </tr>
	  <tr>
		<td>Item Description </td>
		<td colspan=\"2\"><textarea name=\"desc\" id=\"desc\">$row[items_desc]</textarea>|Category: 
        <select name=\"cat_id\">";
		$result = $db->sql_query("SELECT * FROM " . "$prefix" . "category");
		print"<option value=\"$row[category_id]\">$row_category[category_name] - Old Category</option>";
 		while($row_cat = $db->sql_fetch_assoc($result)){
        	print"<option value=\"$row_cat[category_id]\">$row_cat[category_name]</option>";
		}
		print"</select></td>
	  </tr>
	  <tr>
		<td>Item Unit Price </td>
		<td colspan=\"2\">SGD$
		  <label>
			<input name=\"uprice\" type=\"text\" id=\"uprice\" value=\"$row[items_unitprice]\" />
		  </label></td>
	  </tr>
	  <tr>
		<td>Item Thumbnail upload<br />
		  (portable network graphics,png only) </td>
		<td><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"30000\" />
			<!-- Name of input element determines name in $_FILES array -->
			<input name=\"userfile\" type=\"file\" />
			<input type=\"checkbox\" name=\"updatefile\" value=\"true\" /><input name=\"id\" type=\"hidden\" id=\"id\" value=\"$_REQUEST[id]\" />
			<input name=\"add\" type=\"hidden\" id=\"add\" value=\"true\" /></td>
		<td width=\"100px\"><img src=\"$thumbnail\" width=\"100\" height=\"100\" alt=\"$row[items_desc]\"/>&nbsp;</td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td colspan=\"2\"><input type=\"submit\" name=\"Submit\" value=\"Submit\" />
			<input type=\"reset\" name=\"Reset\" value=\"Reset\" /></td>
	  </tr>
	</table>
	
	</form>
";
}
}
if($_POST['add']){
	if($_POST['updatefile']){
		if(eregi('.png',$_FILES['userfile']['name'])){
			$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
			echo '<pre>';
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
			print "</pre>";
			$filename = basename($_FILES['userfile']['name']);
			$result = $db->sql_query("UPDATE " . "$prefix" . "items SET items_name='$_POST[name]',items_desc='$_POST[desc]',items_cat_id='$_POST[cat_id]',items_qty='$_POST[qty]',items_unitprice='$_POST[uprice]',items_thumbnail='$filename' WHERE items_id =$_POST[id]");
			if($result){
				print"Successfully edited.";
				print"<meta http-equiv=\"refresh\" content=\"5;url=admin.php\"/>";
			}
			else{
				print"Error.";
			}
		}
		elseif(!eregi('.png',$_FILES['userfile']['name'])){
			print"Non png file.";
			exit();
		}
	}
	elseif(!$_POST['updatefile']){
		$result = $db->sql_query("UPDATE " . "$prefix" . "items SET items_name='$_POST[name]',items_desc='$_POST[desc]',items_cat_id='$_POST[cat_id]',items_qty='$_POST[qty]',items_unitprice='$_POST[uprice]' WHERE items_id =$_POST[id]");
		if($result){
			print"Successfully edited.";
			print"<meta http-equiv=\"refresh\" content=\"5;url=admin.php\"/>";
		}
		else{
			print"Error.";
		}
	}
}
?>
	</body>
	</html>
