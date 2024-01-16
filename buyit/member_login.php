<!doctype html>
<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>會員登入</title>
<style type="text/css">
.home {
	font-family: "微軟正黑體", Arial;
	margin-left: auto;
	margin-right: auto;
	margin-top: auto;
	height: 900px;
	width: 1040px;
	border-style: solid;
	text-align: left;
}
.head_home {
	font-family: "微軟正黑體", Arial;
	height: 100px;
	width: 1800px;
	padding-top: 20px;
	padding-left: 20px;
	padding-right: 20px;
	margin-top: auto;
	margin-left: auto;
	margin-right: auto;
	border-style: solid;
	background-image: url(image/try.jpg);	
}
.all_commodity {
	height: 2000px;
	font-family: "微軟正黑體", Arial;
	padding-top: 20px;
	padding-left: 20px;
	padding-right: 20px;
	margin-top: auto;
	margin-left: auto;
	margin-right: auto;
	height: auto;
	text-align: center;
}
.commodity_box {
	font-family: "微軟正黑體", Arial;
	margin-top: auto;
	margin-left: auto;
	margin-right: auto;
	height: 250px;
	width: 200px;
	padding-top: 20px;
	padding-left: 20px;
	padding-right: 20px;
	float: left;
	text-align: center;
	top: auto;
	left: auto;
	right: auto;
	bottom: auto;
}
	.text_commodity
	{
	color: #000000;
	font-family: "微軟正黑體", Arial;
	text-align:center;
		
	}.text_commodity2
	{
	color: #000000;
	font-family: "微軟正黑體", Arial;
	text-align:center;
	font-size: 15px;
	}
.detailed {
	font-family: "微軟正黑體", Arial;
	margin-top: auto;
	margin-left: auto;
	margin-right: auto;
	height: 500px;
	width: 450px;
	padding-top: 20px;
	padding-left: 20px;
	padding-right: 20px;
	float: left;
	top: auto;
	left: auto;
	right: auto;
	bottom: auto;
}
	
.detailed2 {
	font-family: "微軟正黑體", Arial;
	margin-top: auto;
	margin-left: auto;
	margin-right: auto;
	height: 250px;
	width: 450px;
	padding-top: 20px;
	padding-left: 20px;
	padding-right: 20px;
	float: left;
	top: auto;
	left: auto;
	right: auto;
	bottom: auto;
}
.div3 {
	font-family: "微軟正黑體", Arial;
	font-size: 18px;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: auto;
	padding: auto;
	text-align: right;
	width: 300px;
}
</style>
</head>

<body>
<div class="head_home"></div>
	
<div class="home">
	<div align="center">
	<table width="740" border="0">
  <tbody>
    <tr>
      <td><form action="member_login.php" method="post" id="form1" name="form1" style="width: 253px;height:70px;">
		<input type="submit" value="會員中心"  name='member' style="width: 253px;height:70px;"/>
		</form></td>
      <td><form action="home.php" method="post" id="form1" name="form1" style="width: 253px;height:70px;">
		<input type="submit" value="商品總覽"  name='all'/ style="width: 253px;height:70px;">
		</form></td>
      <td><form action="search.php" method="post" id="form1" name="form1" style="width: 253px;height:70px;">
		<input type="submit" value="搜尋商品"  name='search' style="width: 253px;height:70px;"/>
		</form></td>
      <td><form action="shop_car.php" method="post" id="form1" name="form1" style="width: 253px;height:70px;">
		<input type="submit" value="購物車"  name='shopping cart' style="width: 253px;height:70px;"/>
		</form></td>
    </tr>
  </tbody>
</table>
		</div>
	<?php
		session_start();
		include("connect.php");
		ob_start();
		$root=0;
		if(isset($_POST['out']))
		{
			if(isset($_COOKIE['root']))
			{ 
				setcookie("root",$_COOKIE['root'],time()-3600);
			}
			
			if(isset($_COOKIE['member']))
			{
				setcookie("member",$_COOKIE['member'],time()-3600);
				unset($_SESSION['login']); 
				unset($_SESSION['account_record']);
				unset($_SESSION['password_record']);
				unset($_SESSION['out']);
			}
		}
		
	if(!isset($_POST['out']))
	{
		if(isset($_COOKIE['root']))
			{ 
				header('Refresh:0;url=./super_center.php');
				return;
			}
	
		if(isset($_COOKIE['member']))
			{ 
				header('Refresh:0;url=./member_login_complete.php');
				return;
		}
	}
	ob_end_flush();
		?>
  <div class="all_commodity">
	   	
	  <br><br>
	  <h2>會員登入</h2>
  <form action="member_login_complete.php" method="post" id="form1" name="form1">
			帳號<br><input type="text" name="account" required  id="account"   pattern="[a-zA-Z0-9]+" ><br><br>
			密碼<br><input type="password" name="password" required  id="password"   pattern="[a-zA-Z0-9]+" ><br><br>
			<input type="submit" value="登入"  name='go'/>
		</form>
		<form action="member_register.php" method="post" id="form1" name="form1">
			<input type="submit" value="註冊帳號"  name='go'/>
		</form>
  </div>

	
</div>
	
</body>
</html>