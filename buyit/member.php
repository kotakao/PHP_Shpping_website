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
	.div3 {
	font-family: "微軟正黑體", Arial;
	font-size: 18px;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: auto;
	padding: auto;
	text-align: left;
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
	  <br><br>
	  <h2>會員資料</h2>
	 <?php
	 session_start();
	include("connect.php");
	  if(isset($_COOKIE['member']))
	  {
		  	$account=$_COOKIE['member'];
			$sql_account="'".$account."'";
	  }
	  elseif(!isset($_COOKIE['member']))
	  {
		  echo  "<script>alert('系統已偵測到會員尚未登入，將回到登入頁面進行登入。')</script>";
		  header('Refresh:0;url=./member_login.php');
		  return;
	  }
	  
	$sql_query3="SELECT * FROM `account` WHERE `account` LIKE $sql_account";//sql指令 
	$result3=mysqli_query($db_link,$sql_query3);//指定資料庫連結,打進去的指令
	
	while($row_result=mysqli_fetch_array($result3))//電話確認
		{
			foreach($row_result as $item3 => $value3)
			{
	?>
    <div class="div3">
		  <?php
		  echo "用戶名稱：".$row_result["name"]."<br>"; 
				?>
		  </div>
    <div class="div3">
		  <?php
		  echo "帳號名稱：".$row_result["account"]."<br>";
				?>
		  </div>
    <div class="div3">
		  <?php
		 echo "性別：".$row_result["gender"]."<br>";
				?>
		  </div>
    <div class="div3">
		  <?php
		 echo "手機號碼：".$row_result["phone"]."<br>";
				?>
		  </div>
    <div class="div3">
		  <?php
		  echo "電子信箱：".$row_result["Email"]."<br>";
					return;
			}
		}
				?>
		  </div>
				
				
				
				
				
			
	  
  </div>

</div>
	
</body>
</html>