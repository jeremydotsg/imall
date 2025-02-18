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
<p>
  <?php
if(empty($_GET['do'])){
	//display list
	print"<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
			  <tr class=\"style8\">
				<td>id</td>
				<td>name</td>
				<td>description</td>
				<td>item limit<sup>1</sup></td>
				<td>icon<sup>1</sup></td>
				<td>functions</td>
			  </tr>";
	$resource_all=$db->sql_query("SELECT * FROM " . "$prefix" . "category");
	while($row = $db->sql_fetch_assoc($resource_all)){
		print"<tr class=\"style9\">
				<td>$row[category_id]</td>
				<td>$row[category_name]</td>
				<td>$row[category_desc]</td>
				<td>$row[category_item_limit]</td>
				<td>$row[category_icon]</td>
				<td><a href=\"category.php?do=edit&id=$row[category_id]\">edit</a> | <a href=\"category.php?do=remove&id=$row[category_id]\">remove </a></td>
			  </tr>";
	}
	print"</table><p><br/>
		<span class=\"style7\"><sup>1</sup>:Ignore these fields. </span></p>";
}
elseif($_GET['do'] == 'edit'){
	//edit category
	print"<form action=\"category.php?do=edit\" enctype=\"multipart/form-data\" method=\"post\">
		<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
		  <tr>
			<td width=\"19%\">Category Name </td>
			<td width=\"81%\"><input name=\"name\" type=\"text\" id=\"name\" /></td>
		  </tr>
		  <tr>
			<td>Category Description </td>
			<td><textarea name=\"desc\" id=\"desc\"></textarea></td>
		  </tr>
		  <tr>
			<td>Category Item Limit<br />
			(-1 for no limit) </td>
			<td><input name=\"itemlimit\" type=\"text\" id=\"itemlimit\" /></td>
		  </tr>
		  <tr>
			<td>Category Icon</td>
			<td><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"30000\" />
			  <!-- Name of input element determines name in $_FILES array -->
			   <input name=\"userfile\" type=\"file\" /><input type=\"hidden\" name=\"add\" value=\"true\" /><input name=\"updatefile\" type=\"checkbox\" value=\"true\" /></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td><input type=\"submit\" name=\"Submit\" value=\"Submit\" />
			  <input name=\"Reset\" type=\"reset\" id=\"Reset\" value=\"Reset\" /></td>
		  </tr>
		</table>
		</form>";
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
			$result = $db->sql_query("UPDATE " . "$prefix" . "category SET category_name='$_POST[name]',items_desc='$_POST[desc]',items_cat_id='$_POST[cat_id]',items_qty='$_POST[qty]',items_unitprice='$_POST[uprice]',items_thumbnail='$filename' WHERE items_id =$_POST[id]");
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
}
elseif($_GET['do'] == 'add'){
	//add category
	print"<form action=\"category.php?do=add\" enctype=\"multipart/form-data\" method=\"post\">
		<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
		  <tr>
			<td width=\"19%\">Category Name </td>
			<td width=\"81%\"><input name=\"name\" type=\"text\" id=\"name\" /></td>
		  </tr>
		  <tr>
			<td>Category Description </td>
			<td><textarea name=\"desc\" id=\"desc\"></textarea></td>
		  </tr>
		  <tr>
			<td>Category Item Limit<br />
			(-1 for no limit) </td>
			<td><input name=\"itemlimit\" type=\"text\" id=\"itemlimit\" /></td>
		  </tr>
		  <tr>
			<td>Category Icon</td>
			<td><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"30000\" />
			  <!-- Name of input element determines name in $_FILES array -->
			  <input name=\"userfile\" type=\"file\" /><input type=\"hidden\" name=\"add\" value=\"true\" /></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td><input type=\"submit\" name=\"Submit\" value=\"Submit\" />
			  <input name=\"Reset\" type=\"reset\" id=\"Reset\" value=\"Reset\" /></td>
		  </tr>
		</table>
		</form>";
if($_POST['add']){
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
		$result = $db->sql_query("INSERT INTO " . "$prefix" . "items (items_name,items_desc,	items_cat_id,items_qty,items_unitprice,items_thumbnail,items_published)VALUES ('$_POST[name]', '$_POST[qty]','$_POST[desc]','$_POST[cat_id]','$_POST[uprice]','$filename','1')");
		if($result){
		print"Successfully added.";
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
}
elseif($_GET['do'] == 'remove'){
	//remove category
}
?>
</p>


</body>
</html>