﻿<?php header('Content-type: text/html;charset=utf-8');?>
<!DOCTYPE html>
<html>
<head>
	<title>Card Details</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
	<link rel="stylesheet" type="text/css" href="./css/jquery.mobile-1.1.0.min.red.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script type="text/javascript" src="./js/nova_coupon_get.js"></script>
	<script type="text/javascript" src="./js/get_url_param.js"></script>
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
</head>

<body id="body_card">
<div id="card_header"></div>
<div id="card_container">
	<img id="card_body" src="./images/shot.jpg" width="267px" height="159px" style="box-shadow:0 3px 5px rgba(0,0,0,.8); border-radius:5px;">
</div>

<div data-role="page" id="card_home">
	<div data-role="content" id="prom_list">
		<div data-role="collapsible-set" id="promotion_list">
		</div>

		<div data-role="collapsible-set" id="contact_list">
		</div>
	
	</div>
	<!-- <button data-theme="r" >退&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;卡</button> -->
</div>

<script>
var isMember = false;
var xmlHttp;
var mrLock = false;
var id;
var cardid;
var Request = new Object();


Request = GetRequest();
id = Request['id'];
cardid = Request['cardid'];
document.write('<script type="text/javascript" src="get_coupon_details.php?id=' + id + '&cardid='+ cardid + '"><\/script>');
</script>
</body> 
</html>