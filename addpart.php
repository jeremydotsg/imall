<?php
$result=$db->sql_query("SELECT * FROM " . "$prefix" . "particulars WHERE p_cart_id='$_POST[cartid]'");
if($db->sql_num_rows($result) != "0"){
	print"Existing record.Email us if you want to alter your details.";
	exit();
}
elseif(!empty($_POST[address]) && !empty($_POST[name]) && !empty($_POST[email]) && !empty($_POST[contact])){
	$result=$db->sql_query("INSERT INTO " . "$prefix" . "particulars (p_name,p_address,p_cart_id, p_contact_no,p_email) VALUES ('$_POST[name]', '$_POST[address]', '$cart_id', '$_POST[contact]', '$_POST[email]')");
	print"Updated information.";
}
else{
	print"Empty field(s).";
	exit();
}
?>