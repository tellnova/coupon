<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);

	$cardbag = $mySQLInstance->getCardBagTableName();

	$id = $_GET["id"];
	
  	$retval=mysql_query("INSERT INTO `couponlist`.`user_bag` (`id`, `name`, `open_id`, `cards`, `phone`, `email`) VALUES (NULL, '', {$id}, '', '', '');");

	$mySQLInstance->close($link);

?>