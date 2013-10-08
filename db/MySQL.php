<?php

if (file_exists(dirname(__FILE__).'/../config/settings.inc.php'))
	include_once(dirname(__FILE__).'/../config/settings.inc.php');

class MySQLCore {

	public function connect()
	{
		$dbname = _DB_NAME_;
		$host = _DB_SERVER_;
		$port = _DB_PORT_;
		$user = _DB_USER_;
		$pwd = _DB_PASSWD_;
		$link = @mysql_connect("{$host}:{$port}",$user,$pwd,true);
		if(!$link)
			die("Connect Server Failed: " . mysql_error());

		return $link;
	}

	public function select($link)
	{
		$dbname=_DB_NAME_;
		if(!mysql_select_db($dbname, $link))
			die("Select Database Failed: " . mysql_error($link));
	}

	public function close($link)
	{
		mysql_close($link);
	}

	public function getCouponTableName()
	{
		$table = _DB_TABLE_;
		return $table;
	}

	public function getCardBagTableName()
	{
		$table = _DB_CARD_BAG_TABLE_;
		return $table;
	}
}

?>