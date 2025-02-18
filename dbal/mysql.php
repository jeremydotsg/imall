<?php
//database abstraction class(aka wrapper)
//for mysql db
class database{
	//db connection
	function sql_connect($dbhost,$dbuser=null,$dbpass=null){
		$link = mysql_connect($dbhost,$dbuser,$dbpass);
		//check if able to connect to db
		if($link != false){
			return true;
			return $link;
		}
		elseif($link == false){
			$this->sql_error();
			exit;
		}
	}
	//db select
	function sql_select_db($dbname=null){
	 	$db = mysql_select_db($dbname);
        if (!$db) {
			$this->sql_error('true');
            exit;
        } 
	}

	//db query
	function sql_query($sql){
	//!$sql is the STRUCTURED QUERY LANGUAGE used by dbs.
		$result = mysql_query($sql);
		if(eregi('select',$sql)){
			if($result != false){
				return $result;
			}
			else{
				$this->sql_error();
				return false;
				exit;
			}
		}
		else{
			if($result != false){
				return true;
			}
			else{
				$this->sql_error();
				return false;
				exit;
			}
		}
	}
	//db fetch result (assoc array only)
	function sql_fetch_assoc($result){
	//!$result is the resource
		$assocarray = mysql_fetch_assoc($result);
		if($assocarray != false){
			return $assocarray;
		}
		elseif($assocarray == false){
			return false;
		}
	}
	//db fetch result (assoc/num array)
	function sql_fetch_array($result,$resulttype=BOTH){
	//!$result is the resource
		if($resulttype == 'BOTH'){global $resultype; $resultype = MYSQL_BOTH;}
		elseif($resulttype == 'ASSOC'){global $resultype; $resultype = MYSQL_ASSOC;}
		elseif($resulttype == 'NUM'){global $resultype; $resultype = MYSQL_NUM;}
		$assocarray = mysql_fetch_array($result,$resultype);
		if($assocarray != false){
			return $assocarray;
		}
		elseif($assocarray == false){
			return false;
		}
	}
	//db query num rows
	function sql_num_rows($result){
	//!$result is the resource
	//db error handling
		$numrows = mysql_num_rows($result);
		if(is_numeric($numrows)){
			return $numrows;
		}
		else{
			return false;
		}
	}
	function sql_error($critical=null){
		if($critical == true){
			print"Copy the following and alert the Administrator. <br/>";
			die(print('Critical Error:(MySQL says)' . mysql_error() . '<br/>Sql Error:' . mysql_errno()));
			exit;
		}
		else{
			print"Copy the following and alert the Administrator. <br/>";
			die(print('Error:(MySQL says)' . mysql_error() . '<br/>Sql Error:' . mysql_errno()));
			exit;
		}
	}	
	//end db connection
	function sql_close($link_ind=null){
		mysql_close($link_ind);
	}
}
?>