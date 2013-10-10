<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);

	$cardbag = $mySQLInstance->getCardBagTableName();
	$coupon_list = $mySQLInstance->getCouponTableName();

	$id = trim($_GET["id"]);
	$cardid = trim($_GET["cardid"]);

  	$retval=mysql_query("SELECT cards FROM {$cardbag} WHERE open_id='{$id}'");

	$row=mysql_fetch_array($retval, MYSQL_ASSOC);
	if(!in_array($cardid, explode(',', $row['cards']))){

	  	$retval=mysql_query("SELECT * FROM {$coupon_list} WHERE id={$cardid}");
	  	$row=mysql_fetch_array($retval, MYSQL_ASSOC);	
	  	$owner=$row['user'];
	  	mysql_query("INSERT INTO ${owner} (open_id) VALUES ('{$id}')");
		
		$allcards = $row['cards'];
		$allcards .= ',';
	  	$allcards .= $cardid;
	  	$allcards = trim($allcards,',');
	  	mysql_query("UPDATE ${cardbag} SET cards = '{$allcards}' WHERE open_id='{$id}'");
  	}

	$mySQLInstance->close($link);

?>
