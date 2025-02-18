<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php //get_title("main");?></title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	font-size: 24px;
	font-weight: bold;
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
body,td,th {
	font-family: Courier New, Courier, monospace;
}
a:link {
	color: #F78F1E;
	text-decoration: none;
}
a:visited {
	color: #FFEC94;
	text-decoration: none;
}
a:hover {
	color: #000000;
	text-decoration: none;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.table_menu{
	background-color: #B5E6FD;
	}
.table_footer{
	background-color: #B5E6FD;
	}
-->
</style>
<script src="prototype.js"></script>
<script language="javascript">
function getpage(str2){
new Ajax.Request(str2,
  {
    method:'get',
    onSuccess: function(transport){
      var response = transport.responseText || "no response text";
      $('view_area').innerHTML=response;
    },
    onFailure: function(){ alert('Something went wrong...') }
  });
 }
 </script>
</head>

<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr class="table_menu">
    <th height="13" scope="col"><a href="#" onclick="getpage('view_cart.php');"></a></th>
  </tr>
  <tr>
    <th height="494" scope="row"><div id="view_area">
      <p>
        <img src="nmalogo_final.gif" alt="NMA LOGO" width="308" height="138" /></p>
      <p><a href="imall.php">Click here to proceed to the iMall interface. </a></p>
    </div></th>
  </tr>
  <tr>
    <th scope="row" class="table_footer">&copy; MMVI New Media Arts.</th>
  </tr>
</table>
</body>
</html>