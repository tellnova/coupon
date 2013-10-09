<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);

	$cardbag = $mySQLInstance->getCardBagTableName();

	$id = $_GET["id"];
	
  	$retval=mysql_query("SELECT open_id FROM {$cardbag} WHERE open_id='{$id}'");

  	if(mysql_num_rows($retval)==0){
  		// echo "false";
  		mysql_query("INSERT INTO ${cardbag} (open_id) VALUES ('{$id}')");
  	}else{
  		// echo "true";
  	}

	$mySQLInstance->close($link);

?>