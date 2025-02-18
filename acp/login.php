<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrative Login</title>
</head>

<body>
<?php
$expireTime = 60*60*24*100; // 100 days
session_set_cookie_params($expireTime);
session_name("ACP");
session_start();
include("ums.php");
if($_POST[auth_it]){
	user_login($_POST[username],$_POST[password]);
}
else{
print"
<form action=\"\" method=\"post\">
  <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
    <tr>
      <td width=\"9%\">Username</td>
      <td width=\"91%\"><input name=\"username\" type=\"text\" id=\"username\" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input name=\"password\" type=\"password\" id=\"password\" />
      <input name=\"auth_it\" type=\"hidden\" id=\"auth_it\" value=\"true\" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type=\"submit\" name=\"Submit\" value=\"Submit\" />
      <input type=\"reset\" name=\"Reset\" value=\"Reset\" /></td>
    </tr>
  </table>
</form>";
}?>
</body>
</html>
