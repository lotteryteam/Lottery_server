<?php

	$con = mysql_connect("103.9.195.42", "root", "Uhdjs89d");
	//设置字符集为utf8
	mysql_query("SET NAMES 'utf8'");

	if (!$con){
		die(mysql_error());
	}

	mysql_select_db("mydb", $con);
?>
