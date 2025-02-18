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
?>
<form action="" method="post" enctype="multipart/form-data" name="additem">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="33%">Item Name </td>
    <td width="67%"><input name="name" type="text" id="name" value="unnamed item" /></td>
  </tr>
  <tr>
    <td>Item Quantity </td>
    <td><input name="qty" type="text" id="qty" value="00" /></td>
  </tr>
  <tr>
    <td>Item Description</td>
    <td><textarea name="desc" id="desc"></textarea>
      |Category: 
        <select name="cat_id">
		<?php
		$result = $db->sql_query("SELECT * FROM " . "$prefix" . "category");
 		while($row = $db->sql_fetch_assoc($result)){
        	print"<option value=\"$row[category_id]\">$row[category_name]</option>";
		}
		?>
      </select></td>
  </tr>
  <tr>
    <td>Item Unit Price </td>
    <td>SGD$
      <label>
      <input name="uprice" type="text" id="uprice" value="00.00" />
      </label></td>
  </tr>
  <tr>
    <td>Item Thumbnail upload<br />
      (portable network graphics,png only) </td>
    <td><input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
    <input name="userfile" type="file" />
    <input name="add" type="hidden" id="add" value="true" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Submit" />
      <input type="reset" name="Reset" value="Reset" /></td>
  </tr>
</table>
</form>
</body>
</html>
