<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);

	$cardbag = $mySQLInstance->getCardBagTableName();

	$id = trim($_GET["id"]);
	$cardid = trim($_GET["cardid"]);
	
  	$retval=mysql_query("SELECT cards FROM {$cardbag} WHERE open_id='{$id}'");

	$row=mysql_fetch_array($retval, MYSQL_ASSOC);
	if(!in_array($cardid, explode(',', $row['cards']))){
		$allcards = $row['cards'];
		$allcards .= ',';
	  	$allcards .= $cardid;
	  	$allcards = trim($allcards,',');
	  	mysql_query("UPDATE ${cardbag} SET cards = '{$allcards}' WHERE open_id='{$id}'");
  	}

	$mySQLInstance->close($link);

?>
