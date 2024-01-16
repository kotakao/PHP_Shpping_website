<!doctype html>
<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>會員註冊</title>
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
.div4 {
	font-family: "微軟正黑體", Arial;
	font-size: 18px;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: auto;
	padding: auto;
	text-align: center;
	width: 300px;
	}
</style>
</head>

<body>
	
<div class="head_home"></div>
		<?php
	session_start();
	$char=1;	
	
	if(isset($_SESSION['name']))
	{
		$name=$_SESSION['name'];
		$account=$_SESSION['account'];
		$phone=$_SESSION['phone'];
		$email=$_SESSION['email'];
	}
	else
	{
		$name="";
		$account="";
		$phone="";
		$email="";
	}
	?>
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
	  
  <?php
		include("connect.php");
		
		if(isset($_COOKIE['member']))
	{
			echo "<script>alert('您已登入，將回到商品總覽頁面。')</script>";
			header('Refresh:0;url=./home.php');
			return;
	}
	    if(isset($_COOKIE['root']))
	  {
		  echo  "<script>alert('系統已偵測到管理員已登入，如要進行測試請退出帳號。')</script>";
		  header('Refresh:0;url=./member_login.php');
		  return;
	  }

		
		function head()
		{
			echo "<br>將在3秒後回到註冊頁面，重新註冊。";
			header('Refresh:3;url=./member_register.php');
		}
		
		
		$seldb=@mysqli_select_db($db_link,"account");//取得資料表
		if(isset($_POST['account']))
		{
			$account=$_POST['account'];
			$password=$_POST['password'];
			$password2=$_POST['password2'];
			$name=$_POST['name'];
			$phone=$_POST['phone'];
			$Email=$_POST['Email'];
			$gender=$_POST['gender'];
	
			$_SESSION['name'] = $name;
			$_SESSION['account'] = $account;
			$_SESSION['phone'] =$phone;
			$_SESSION['email'] = $Email;
		}
		else
		{
			echo "無註冊資料，<br>請回到註冊頁面再次填寫資料。";
			head();
			return;
		}
		
		if($password!=$password2)
		{
			echo "密碼輸入不一致，請重新輸入密碼。";
			head();
			return;
		}
		
		$sql_query3="SELECT `phone` FROM `account`";//sql指令 電話檢查
		$result3=mysqli_query($db_link,$sql_query3);//指定資料庫連結,打進去的指令
		while($row_result3=mysqli_fetch_row($result3))//電話確認
		{
			foreach($row_result3 as $item3 => $value3)
			{
				if($value3==$phone)
				{
					echo "此號碼已使用，請勿重複註冊。";
					head();
					return;
				}
			}
		}
		
		$sql_query2="SELECT `Email` FROM `account`";//sql指令 信箱
		$result2=mysqli_query($db_link,$sql_query2);//指定資料庫連結,打進去的指令
		
		while($row_result2=mysqli_fetch_row($result2))//信箱確認
		{
			foreach($row_result2 as $item2 => $value2)
			{
				if($value2==$Email)
				{
					echo "此信箱已使用，請勿重複註冊。";
					head();
					return;
				}
			}
		}
		
		$sql_query="SELECT `account` FROM `account`";//sql指令 帳號
		$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
		
		while($row_result=mysqli_fetch_row($result))//帳號確認
		{
			foreach($row_result as $item => $value)
			{
				if($value==$account)
				{
					echo "此帳號已經有人使用，請使用別的帳號名稱。";
					head();
					return;
				}
			}
		}
	  
	  $sql_query="SELECT `super_account` FROM `super`";//sql指令 超級帳號
		$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
		
		while($row_result=mysqli_fetch_row($result))//帳號確認
		{
			foreach($row_result as $item => $value)
			{
				if($value==$account)
				{
					echo "此帳號已經有人使用，請使用別的帳號名稱。";
					head();
					return;
				}
			}
		}
		
		echo "恭喜註冊成功！！<br>";
		echo "請記得你的帳號以及密碼！<br>";
		echo "畫面將在3秒後跳轉至登入畫面！";
		//ans INSERT INTO `account` (`ID`, `account`, `password`, `name`, `SEX`, `PHONE`, `E-mail`) VALUES (NULL, '12', '12', '12', '12', '12', '12');
		$sql_name="'".$name."'";
		$sql_gender="'".$gender."'";
		$sql_phone="'".$phone."'";
		$sql_Email="'".$Email."'";
	  	$sql_query= "INSERT INTO `account` (`account`, `password`, `name`, `gender`, `phone`, `Email`) VALUES ($account,$password,$sql_name,$sql_gender,$sql_phone,$sql_Email);";
		//$sql_query="INSERT INTO  `account` (`account`, `password`, `name`, `gender`, `phone`, `Email`) VALUES($account,$password,$sql_name,$sql_gender,$sql_phone,$sql_Email)";   //sql指令
		$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
		
			$_SESSION['name'] = "";
			$_SESSION['account'] =  "";
			$_SESSION['phone'] = "";
			$_SESSION['email'] =  "";
		header('Refresh:3;url=./member_login.php');
		?>
  </div>

</div>
	
</body>
</html>