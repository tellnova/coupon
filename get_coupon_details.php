<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);
	
	$user = "jumei";
	$user_prom = $user . "_prom";

	mysql_query('set names utf8');
	
  	$retval=mysql_query("SELECT * FROM {$user_prom}");
  	while($row=mysql_fetch_array($retval, MYSQL_ASSOC)){
  		if($row['promotion_status'] == "2"){
	  		$points = array(
	  				'id'=>$row['id'],
	  				'prom_title'=>$row['promotion_title'],
	  				'prom_body'=>$row['promotion_body'],
	  				'prom_duration'=>$row['promotion_duration']
	  		);
	  		$json_string = json_encode($points);
			echo "CreatePromotionBody($json_string);";
		}
  	}
	$mySQLInstance->close($link);

	echo "CreateContactBody();";

?>