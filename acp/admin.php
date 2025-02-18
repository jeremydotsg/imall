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

</p>
<p><span class="style7">Welcome  to iMall Admin Control Panel.</span><br />
    <br />
<span class="style7">&gt;To begin, choose any item on the left.</span><span class="style7"><br />
</span><br />
</p>
</body>
</html>
