<?php
	$hostname = "andoni282.startlogicmysql.com";
	$username = "andoni";
	$password = "1234";
	$database = "finanzas_online";

	$link = mysql_connect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR);
	
	mysql_select_db($database, $link);
?>
