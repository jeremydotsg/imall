<?php
include("../config.php");
include("../dbal/dbselect.php");
$db = new database;//start the class
$db->sql_connect("$dbhost","$dbuser","$dbpass");
$db->sql_select_db("$dbname");
function user_login_check(){
	global $_SESSION;
	
	if($_SESSION['user_auth']){
		//allow user to pass through
	}
	elseif(empty($_SESSION['user_auth']) || !$_SESSION['user_auth']){
		die("User not allowed");
		exit();
	}
}
function user_login($USERNAME,$PASSWORD){
	global $db,$prefix;
	$resource=$db->sql_query("SELECT * FROM " . "$prefix" . "users WHERE user_username='$USERNAME' AND user_active=1");
	if(!$resource){
		print" Unknown user";
		return false;
	}
	elseif($resource){
		$md5pass= md5($PASSWORD);
		while($row = $db->sql_fetch_assoc($resource)){
			if($row[user_password] == $md5pass){
				print"User authenicated";
				$_SESSION['user_auth'] = true;
				$_SESSION['user_username'] = $USERNAME;
				session_write_close ();
				print" <meta http-equiv=\"refresh\" content=\"10;url=index.php\"/>";
				return true;
			}
			else{
				print"Bad password";
				return false;
			}
		}
	}
}
?>		