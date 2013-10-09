<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);

	$cardbag = $mySQLInstance->getCardBagTableName();

	$id = $_GET["id"];
	
  	$retval=mysql_query("SELECT open_id FROM {$cardbag} WHERE open_id={$id}");

  	if(mysql_num_rows($retval)==0){
  		mysql_query("INSERT INTO {$cardbag} (`id`, `name`, `open_id`, `cards`, `phone`, `email`) VALUES (NULL, '', {$id}, '', '', '');");
  	}

	$mySQLInstance->close($link);

?>