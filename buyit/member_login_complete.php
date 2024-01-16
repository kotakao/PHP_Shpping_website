<!doctype html>
<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>會員中心</title>
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
  <div class="all_commodity">
  <?php
		include("connect.php");
	   session_start();
		$login=0;
		$acc_login=0;

	  
		$seldb=@mysqli_select_db($db_link,"account");//取得資料表
	  
		if(isset($_POST['account']))
		{
			$account=$_POST['account'];
			$password=$_POST['password'];
			$_SESSION['account_record']=$_POST['account'];
			$_SESSION['password_record']=$_POST['password'];
		}
	  else if(isset($_COOKIE['root']))
		{
			header('Refresh:0;url=./super_center.php');
			return;
		}
		else if(isset($_COOKIE['member']))
		{
			header('Refresh:0;url=./member_center.php');
			return;
		}
		else if(!isset($_POST['account']))
		{
			echo "無登入資料，<br>請回到登入頁面再次填寫資料。";
			return;
		}
	  
	  	  	if(isset($_COOKIE['root']))
		 {
			 header('Refresh:0;url=./super_center.php');
		 }
	  //管理員帳號-----------------------------------
		$sql_account="'".$account."'";
	  	$sql_query="SELECT `super_account` FROM `super`";//sql指令 管理員帳號
		$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
	  
	  	while($row_result=mysqli_fetch_row($result))
		{
			foreach($row_result as $item => $value)
			{
	  			if($value==$account)
				{
					$sql_query="SELECT * FROM `super` WHERE `password` = $password";//sql指令  管理員密碼
					$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
					
					while($row_result=mysqli_fetch_row($result))
					{
						foreach($row_result as $item => $value)
						{
							if($value==$password)
							{
								setcookie("root","root");
								header('Refresh:0;url=./super_center.php');
								return;
							}
						}
					}
				}
			}
		}
	   //管理員帳號-----------------------------------
	  
	   //正常帳號-----------------------------------
		$sql_query="SELECT account FROM `account`";//sql指令 正常會員
		$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
		
		while($row_result=mysqli_fetch_row($result))
		{
			foreach($row_result as $item => $value)
			{
				if($value==$account)//查看有沒有這帳號
				{	
					$acc_login=1;//布林確認有
					$sql_query="SELECT `password` FROM `account` WHERE account=$sql_account";//sql指令
					$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
					
					while($row_result=mysqli_fetch_row($result))
					{
						foreach($row_result as $item => $value)
						{
							if($value==$password)
							{
								$login=1;
								setcookie("member",$_POST['account']);
								$_SESSION['account']=$_POST['account'];
								header('Refresh:0;url=./member_center.php');
								return;
							}
						}
					}
				}
			}
		}
		
		if($acc_login!=1)
				{
					echo "查無此帳號，請先註冊帳號。";
					echo "三秒後將回到登入畫面。";
					header('Refresh:3;url=./member_login.php');
					return;
				}
		if($login!=1)
				{
					echo "密碼錯誤，請重新填寫密碼。";
					echo "三秒後將回到登入畫面。";
					header('Refresh:3;url=./member_login.php');
					return;
				}
		?>
  </div>

</div>
	
</body>
</html>