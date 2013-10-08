<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);

	$cardstable = $mySQLInstance->getCouponTableName();
	$cardbag = $mySQLInstance->getCardBagTableName();

	$open_id = $_GET["id"];
	// $isMyCard = intval($_GET["mycards"]);
	$isMyCard = $_GET["mycards"];

	mysql_query('set names utf8');
	$retval=mysql_query("SELECT cards FROM {$cardbag} WHERE open_id='{$open_id}'");
	$row=mysql_fetch_array($retval, MYSQL_ASSOC);
	$mycards = explode(',', $row['cards']);
	
	if(!$isMyCard){
	  	$retval=mysql_query("SELECT * FROM {$cardstable} ORDER BY privilege");
	  	while($row=mysql_fetch_array($retval, MYSQL_ASSOC)){
	  		$points = array(
		       'name'=> $row['name'],
		       'des' => $row['short_des'],
		       'id' => $row['id'],
		       'inbag' => 0,
		       'mycards' => 0
		    );
	  		if(in_array($points['id'], $mycards))
	  			$points['inbag'] = "1";
	  		$json_string = json_encode($points);
			echo "CreateListBody($json_string);";
			//echo "CreateListBody($points);"
		}
	}else{
		if($mycards[0]==NULL){
			echo "EmptyBag();";
		}else{
			foreach($mycards as $value => $key){
				$retval=mysql_query("SELECT * FROM {$cardstable} WHERE id='{$key}'");
				$row=mysql_fetch_array($retval, MYSQL_ASSOC);
				$points = array(
			        'name'=> $row['name'],
			        'des' => $row['short_des'],
			        'id' => $row['id'],
			        'inbag' => 1,
			        'mycards' => 1
		        );
		        $json_string = json_encode($points);
				echo "CreateListBody($json_string);";
			}
		}
	}

	$mySQLInstance->close($link);

?>
