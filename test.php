<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
#category {
	display:none;
}
#items {
	display:none;
}
#settings {
	display:none;
}
-->
</style>
<script src="prototype.js"></script>
<script language="javascript">
function showlinks(str1){
switch (str1){
case 'category':

$('category').style.display='block';
$('items').style.display='none';
$('settings').style.display='none';
break
case 'items':
$('category').style.display='none';
$('items').style.display='block';
$('settings').style.display='none';
break
case 'settings':
$('category').style.display='none';
$('items').style.display='none';
$('settings').style.display='block';
break
default:
$('category').style.display='block';
$('items').style.display='none';
$('settings').style.display='none';
break
}}
function getpage(str2){
new Ajax.Request(str2,
  {
    method:'get',
    onSuccess: function(transport){
      var response = transport.responseText || "no response text";
	  var d = $('test');
      document.getElementById('test').innerHTML=response;
    },
    onFailure: function(){ alert('Something went wrong...') }
  });
 }
</script>
</head>

<body>
WELCOME TO THE iMALL admin interface.<br />
PLEASE SELECT AN OPTION FROM THE TAGS BELOW.
Please Ensure That Your Browser Supports XMLHTTP request and Javascript.<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="100" scope="col"><img src="button-category.png" width="100" height="50" onclick="showlinks('catagory')"/></th>
    <th width="100" scope="col"><img src="button-items.png" width="100" height="50" onclick="showlinks('items')"/></th>
    <th width="100" scope="col"><img src="button-settings.png" width="100" height="50" onclick="showlinks('settings')"/></th>
    <th width="" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="4" scope="col"><div id="category">Category Menu: Category List | Add Catgory </div>
      <div id="items">Items Menu: Items Manager | Items Search </div>
      <div id="settings">Settings Menu: Config | General Settings </div></th>
  </tr>
</table>
<span class="" onclick="getpage('xxx.php')">TEST</span><br />
<div id="test">Content for  id "test" Goes Here</div>
</body>

</html>
