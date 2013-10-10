<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);

	$open_id = $_GET["id"];
	$isMyCard = $_GET["mycards"];
	
	$user = "jumei";
	$user_prom = $user . "_prom";

	$coupon_list = $mySQLInstance->getCouponTableName();

	mysql_query('set names utf8');

  	$retval=mysql_query("SELECT * FROM {$user} WHERE open_id='{$open_id}'");
  	$customer=mysql_fetch_row($retval);

  	$card_num = $customer[2];
	$json_string = json_encode($card_num);
	echo "CreateCardNum($json_string);";

  	$i=4;
	
  	$retval=mysql_query("SELECT * FROM {$user_prom}");
  	while($row=mysql_fetch_array($retval, MYSQL_ASSOC)){
  		if($row['promotion_status'] == "2"){
	  		$points = array(
	  				'id'=>$row['id'],
	  				'prom_title'=>$row['promotion_title'],
	  				'prom_body'=>$row['promotion_body'],
	  				'prom_duration'=>$row['promotion_duration'],
	  				'prom_status'=>$customer[$i]
	  		);
	  		$json_string = json_encode($points);
			echo "CreatePromotionBody($json_string);";
		}
		$i++;
  	}

  	$retval=mysql_query("SELECT * FROM {$coupon_list} WHERE user = '{$user}'");
  	$row=mysql_fetch_array($retval, MYSQL_ASSOC);
	$points = array(
		'card_info'=>$row['card_info'],
		'contact'=>$row['contact']
	);
	$json_string = json_encode($points);
	echo "CreateContactBody($json_string);";

	$mySQLInstance->close($link);

?>