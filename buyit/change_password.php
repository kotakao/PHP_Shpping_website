<!doctype html>
<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>密碼更改</title>
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
  <div class="all_commodity">
	  <br><br>
	  <h2>密碼更改</h2>
  <form action="change_password.php" method="post" id="form1" name="form1">
			原本密碼<br><input type="password" name="password1" required minlength="6" maxlength="20" id="password1"   pattern="[a-zA-Z0-9]+" ><br><br>
			確認密碼<br><input type="password" name="password2" required minlength="6" maxlength="20" id="password2"   pattern="[a-zA-Z0-9]+" ><br><br>
	  		更改密碼<br><input type="password" name="change_password" required minlength="6" maxlength="20" id="change_password"   pattern="[a-zA-Z0-9]+" ><br><br>
			<input type="submit" value="確認更改"  name='go'/><br><br>
		</form>
  
<?php
	session_start();
	include("connect.php");
	if(!isset($_COOKIE['member']))
	{
			echo "<script>alert('偵測到會員尚未登入，將回到登入畫面。')</script>";
			header('Refresh:0;url=./member_login.php');
			return;
	}
	  
	if(isset($_POST['password1']))
	{
	$cheak=0;
	$password1=$_POST['password1'];
	$password2=$_POST['password2'];
	$password3=$_POST['change_password'];
	$account=$_COOKIE['member'];
		
	$sql_query3="SELECT `password` FROM `account`";//sql指令 
	$result3=mysqli_query($db_link,$sql_query3);//指定資料庫連結,打進去的指令
	
	while($row_result3=mysqli_fetch_row($result3))//電話確認
		{
			foreach($row_result3 as $item3 => $value3)
			{
				if($value3==$password1)
				{
					if($password1==$password2)
					{
						$cheak=1;
					}
					elseif($password1!=$password2)
					{
						echo "原本密碼以及確認密碼不同，請重新填寫。";
						return;
					}
					
				}
			}
		}
		
		if($cheak==0)
		{
			echo "原本密碼錯誤，請重新填寫。";
			return;
		}

	$sql_account="'".$account."'";
	$sql_password="'".$password3."'";
	
	$sql_query3="UPDATE `account` SET `password` = $sql_password WHERE `account`.`account` = $sql_account;";//sql指令
	$result3=mysqli_query($db_link,$sql_query3);
	echo "密碼更改成功。";
	}
	?>
	</div>
</div>
	
</body>
</html>