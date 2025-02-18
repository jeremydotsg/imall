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
<br />
<span class="style7">Navigation<br />
</span>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="style8"><div align="center" class="style8">Home</span></div></td>
  </tr>
  <tr>
    <td class="style9"><div align="center" class="style9"><a href="../index.php" target="_parent">iMall Front </a></div></td>
  </tr>
  <tr>
    <td class="style9"><div align="center" class="style9"><a href="/admin.php" target="right">ACP</a></div></td>
  </tr>
  <tr>
    <td class="style8"><div align="center" class="style8">Item Management </div></td>
  </tr>
  <tr>
    <td class="style9"><div align="center" class="style9"><a href="additem.php" target="right">Add Item</a> </div></td>
  </tr>
  
  <tr>
    <td class="style9"><div align="center" class="style9"><a href="items_view.php" target="right">View List</a> </div></td>
  </tr>
  <tr>
    <td class="style8"><div align="center" class="style8">Orders</div></td>
  </tr>
  <tr>
    <td class="style9"><div align="center"><a href="orders.php?do=all" target="right">All</a></div></td>
  </tr>
</table>
</body>
</html>
