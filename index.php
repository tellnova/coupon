<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
<meta name="format-detection" content="telephone=no">
<title>Coupon List</title>

<link rel="stylesheet" type="text/css" href="./css/style.css">
<script type="text/javascript" src="./js/nova_coupon_get.js"></script>
<script type="text/javascript" src="./js/get_url_param.js"></script>
<script type="text/javascript" src="./js/nova_webapp_common.js"></script>
<style>abbr,article,aside,audio,canvas,datalist,details,dialog,eventsource,figure,figcaption,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,small,time,video,legend{display:block;}
</style>
</head>
<body id="majorclients">

<ul id="mc_list" class="mcList">
</ul>

<a href="javascript:void(0);" id="mc_more" class="mc_more" style="opacity:0">正在加载更多会员卡...</a>

<div class="footNav">
	<div class="center box">
		<a class="cur" id="home_list">首页</a>
		<a id="my_cards">卡包</a>
	</div>
</div>

<script>
var isMember = false;
var xmlHttp;
var mrLock = false;
var id;
var Request = new Object();

Request = GetRequest();
id = Request['id'];
document.write('<script type="text/javascript" src="get_coupons.php?id=' + id + '&mycards=0"><\/script>');
document.getElementById("home_list").setAttribute('href',"./index.php?id=" + id);
document.getElementById("my_cards").setAttribute('href',"./my_cards.php?id=" + id);
        
document.addEventListener('scroll', function(evt) {
	    var moreDom = _q('#mc_more');
        var moreR = moreDom.getClientRects()[0];
        var rtnR = _q('#footReturn') ? _q('#footReturn').getClientRects()[0] : {height:0};
        var thisFunc = arguments.callee;
        if(mrLock) return;
        if (moreR.top + rtnR.height + .5*moreR.height <= window.innerHeight){
        	moreDom.style.opacity = 100;
        	mrLock = true; 
        	// document.getElementById("mc_list").setAttribute('style',"display:none");
    	}
});

function stateChanged() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		isMember = true;
	} 
}

function checkJoinMember(id)
{ 
	xmlHttp=new XMLHttpRequest();
	var url="./add_user.php";
	url=url+"?id="+id;
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return true;
}

function unmask(cardid)
{
	document.getElementById(cardid).style.display="none";
    document.getElementById(cardid+'@').style.display="block";
    document.getElementById("card"+cardid).setAttribute('onclick',"gotourl(" + cardid + ")");
}

function addCard(id, cardid)
{
	xmlHttp=new XMLHttpRequest();
	var url="./add_card.php";
	url=url+"?id="+id;
	url=url+"&cardid="+cardid;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function addToCardBag(cardid)
{
	if(!isMember){
		checkJoinMember(id);
	}
	addCard(id, cardid);
	unmask(cardid);
}

function gotourl(cardid)
{
	var url="./card_details?id=" + id + "&cardid=" + cardid;
	window.location.href = url;
}

</script>
</body>
</html>