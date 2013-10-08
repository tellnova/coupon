<!DOCTYPE html>
<html>
<head>
	<title>jQuery Mobile Demo</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
</head>

<body>

<div data-role="page" id="home">

	<div data-role="content">
		
		<div data-role="collapsible" data-theme="e">
			<h3>标题部分</h3>
			<p>主体内容部分，默认会在本页折叠</p>
		</div>

		
		<h3>两栏布局应用于按钮组件</h3>
		
		<fieldset class="ui-grid-a">
			<div class="ui-block-a"><button type="submit" data-theme="e">Cancel</button></div>
			<div class="ui-block-b"><button type="submit" data-theme="r">Submit</button></div>	   
		</fieldset>

	</div>

	<footer data-role="footer">
		<h2>Demo By <a href="http://kayosite.com" target="_blank" style="text-decoration: none; ">Kayo</a></h2>
	</footer>

</div>

<div data-role="page" id="page2">

	<header data-role="header">
		<h1>jQuery Mobile Demo</h1>
	</header>

	<div data-role="content">
		<ul data-role="listview" data-inset="true">
			<li><a href="#home">回到首页</a></li>
			<li><a href="#home">回到首页</a></li>
			<li><a href="#home">回到首页</a></li>
		</ul>
	</div>

	<footer data-role="footer">
		<h2>Demo By <a href="http://kayosite.com" target="_blank" style="text-decoration: none; ">Kayo</a></h2>
	</footer>

</div>

</body> 
</html>