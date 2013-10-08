<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
<meta name="format-detection" content="telephone=no">
<title>Coupon List</title>

<link rel="stylesheet" type="text/css" href="./css/style.css">
<script type="text/javascript" src="./js/nova_coupon_get.js"></script>
<script type="text/javascript" src="./js/get_url_param.js"></script>
<style>abbr,article,aside,audio,canvas,datalist,details,dialog,eventsource,figure,figcaption,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,small,time,video,legend{display:block;}
</style>
</head>
<body id="majorclients">

<ul id="mc_cards" class="mcList">
	<h1 id="empty_bag" style="display:none">Go get some cards first!</h1>
</ul>

<div class="footNav">
	<div class="center box">
		<a id="home_list">首页</a>
		<a class="cur" id="my_cards">卡包</a>
	</div>
</div>

<script>
var isMember = false;
var xmlHttp;
var id;
var Request = new Object();

Request = GetRequest();
id = Request['id'];
document.write('<script type="text/javascript" src="get_coupons.php?id=' + id + '&mycards=1"><\/script>');
document.getElementById("home_list").setAttribute('href',"./index.php?id=" + id);
document.getElementById("my_cards").setAttribute('href',"./my_cards.php?id=" + id);

function gotourl(cardid)
{
	var url="./card_details?id=" + id + "&cardid=" + cardid;
	window.location.href = url;
}
</script>
</body>
</html>