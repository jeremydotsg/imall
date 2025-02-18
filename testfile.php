<?php
//example
$dbtype = mysql;
include("dbselect.php");
$db = new database;//start the class
$db->sql_connect(localhost,root);//establish connection to db server
$db->sql_select_db(lwqdb1);//connect to db
$sql = "SELECT * FROM lwq_blog";//sql query
$result = $db->sql_query($sql);//query
//print"ASSOCIATIVE ARRAY/NUM ARRAY RESULT";
//ASSOC for ASSOCIATIVE ARRAY
//NUM for NUMERIC ARRAY
//BOTH or blank for BOTH TYPES
/*while($row = $db->sql_fetch_array($result,ASSOC)){//fetch array example with assoc
print_r($row);
print"<br/><br>";
}
empty($row);*/
print"ASSOCIATIVE ARRAY RESULT<br/>";
while($row = $db->sql_fetch_assoc($result)){//fetch assoc example
print_r($row);
print"<br/><br>";
}
print('Num rows:' . $db->sql_num_rows($result));
?>