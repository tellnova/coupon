<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);

	$cardstable = $mySQLInstance->getCouponTableName();
	$cardbag = $mySQLInstance->getCardBagTableName();

	$open_id = $_GET["id"];

	$retval=mysql_query("SELECT cards FROM {$cardbag} WHERE open_id='{$open_id}'");
	$row=mysql_fetch_array($retval, MYSQL_ASSOC);
	$mycards = explode(',', $row['cards']);
	
  	$retval=mysql_query("SELECT * FROM {$cardstable}");
  	while($row=mysql_fetch_array($retval, MYSQL_ASSOC)){
  		$points = array(
	       'name'=> $row['name'],
	       'des' => $row['des'],
	       'id' => $row['id'],
	       'inbag' => 0
	       );
  		if(in_array($points['id'], $mycards))
  			$points['inbag'] = "1";
  		$json_string = json_encode($points);
		echo "CreateDiv($json_string);";
	}

	$mySQLInstance->close($link);

?>