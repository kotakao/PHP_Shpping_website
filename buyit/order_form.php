<!doctype html>
<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>訂單查詢</title>
<style type="text/css">
.home {
	font-family: "微軟正黑體", Arial;
	margin-left: auto;
	margin-right: auto;
	margin-top: auto;
	height: 100%;
	width: 1040px;
	border-style: solid;
	text-align: center;
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

.detailed {
	font-family: "微軟正黑體", Arial;
	margin-top: auto;
	margin-left: auto;
	margin-right: auto;
	height: 100%;
	width: 910px;

	top: auto;
	left: auto;
	right: auto;
}
.del
	{
	width: 700px;
	height: 20px;
	float: left;
	border-width: thin;
	border-style: solid;
	text-align: left;
	padding: 5px;
	}
	
.account
	{
	width: 270px;
	height: 20px;
	float: left;
	border-width: thin;
	border-style: solid;
	text-align: left;
	padding: 5px;
	}
.name
	{
	width: 100px;
	height: 20px;
	float: left;
	border-width: thin;
	border-style: solid;
	text-align: left;
	padding: 5px;
	}
</style>
</head>

<body>
	<a id="top"></a>
<div class="head_home"></div>
	
<div class="home">
	<div align="center">
	<table width="740" border="0">
  <tbody>
    <tr>
      <td><form action="super_center.php" method="post" id="form1" name="form1" style="width: 253px;height:70px;">
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
	  <div class="detailed">
		  <form method="post" id="form1" name="form1">
		  <p>
		  <div class="del" style="float: none;border-style: none;">
			  查看訂單(查詢編號)：
			  <input type="text"  name='del_account' required/ >
				<input type="submit" value="查詢"  name='del'  style="width: 50px;height:30px;"/>
			  
		</form>
		  <?php 
			  include("connect.php");
			  session_start();
			  $delch=0;
			  
	if(!isset($_COOKIE['root']))
	  {
		  echo  "<script>alert('系統已偵測到管理員尚未登入，將回到登入頁面進行登入。')</script>";
		  header('Refresh:0;url=./member_login.php');
		  return;
	  }
			  
		if(isset($_POST['del_account']))
	{
		$acc="'".$_POST['del_account']."'";
		
		$sql_query="SELECT `commodity` FROM `order_detail` WHERE `order_id` = $acc";//sql指令 帳號
		$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
		
		while($row_result=mysqli_fetch_row($result))//帳號確認
		{
			foreach($row_result as $item => $value)
			{
				$sql_value="'".$value."'";
				
				$sql_query2="SELECT `amoug` FROM `order_detail` WHERE `order_id` = $acc AND `commodity` = $sql_value";//sql指令 帳號
				$result2=mysqli_query($db_link,$sql_query2);//指定資料庫連結,打進去的指令
				while($row_result2=mysqli_fetch_row($result2))//帳號確認
				{
					foreach($row_result2 as $item2 => $value2)
					{
						
					}
				}
				$sql_query3="SELECT `price` FROM `order_detail` WHERE `order_id` = $acc AND `commodity` = $sql_value";//sql指令 帳號
				$result3=mysqli_query($db_link,$sql_query3);//指定資料庫連結,打進去的指令
				while($row_result3=mysqli_fetch_row($result3))//帳號確認
				{
					foreach($row_result3 as $item3 => $value3)
					{

					}
				}
				$sql_query4="SELECT `total` FROM `order_detail` WHERE `order_id` = $acc AND `commodity` = $sql_value";//sql指令 帳號
				$result4=mysqli_query($db_link,$sql_query4);//指定資料庫連結,打進去的指令
				while($row_result4=mysqli_fetch_row($result4))//帳號確認
				{
					foreach($row_result4 as $item4 => $value4)
					{
						echo "<script>alert(' 訂購名單：商品名：".$value."，訂購數：".$value2."，單價：".$value3."，總價：".$value4."')</script>";
						$delch=1;
					}
				}
				
			}
		}
			
			
			if($delch=="0")
			{
				echo "<script>alert('未查詢到該訂單。')</script>";
			}
		
		unset($_POST['del_account']);

	}
	
			  ?>
		  </div>
		  </p>
	<div class="name">流水號</div>
	    <div class="account">訂購帳號</div>
		  <div class="name">訂單編號</div>
	<div class="name">訂單總價</div>
		  <div class="account">地址</div>
	<br>
<?php 
	  	$sql_query="SELECT ID FROM `order_form`";//sql指令
		$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
	  
		while($row_result=mysqli_fetch_row($result))
					{
						foreach($row_result as $item => $value)
						{
							echo "<div class=".  "'"."name"."'"  .">".$value."</div>";
							
							$sql_NAME="SELECT order_account FROM `order_form` WHERE ID = $value";//sql指令　姓名
							$result_NAME=mysqli_query($db_link,$sql_NAME);//指定資料庫連結,打進去的指令
					
							while($row_result_NAME=mysqli_fetch_row($result_NAME))
								{
								foreach($row_result_NAME as $item_NAME => $NAME)
									{
									echo "<div class=".  "'"."account"."'"  .">".$NAME.""."</div>";
									}
								}
							
							$sql_cash="SELECT order_id FROM `order_form` WHERE ID = $value";//sql指令　訂單編號
							$result_cash=mysqli_query($db_link,$sql_cash);//指定資料庫連結,打進去的指令
					
							while($row_result_cash=mysqli_fetch_row($result_cash))
								{
								foreach($row_result_cash as $item_cash => $cash)
									{
									echo "<div class=".  "'"."name"."'"  .">".$cash."</div>";
									}
								}
							
							$sql_EMAIL="SELECT order_cash FROM `order_form` WHERE ID = $value";//sql指令　信箱
							$result_EMAIL=mysqli_query($db_link,$sql_EMAIL);//指定資料庫連結,打進去的指令
					
							while($row_result_EMAIL=mysqli_fetch_row($result_EMAIL))
								{
								foreach($row_result_EMAIL as $item_EMAIL => $EMAIL)
									{
									echo "<div class=".  "'"."name"."'"  .">".$EMAIL."</div>";
									}
								}
							
							$sql_phone="SELECT map FROM `order_form` WHERE ID = $value";//sql指令　
							$result_phone=mysqli_query($db_link,$sql_phone);//指定資料庫連結,打進去的指令
					
							while($row_result_phone=mysqli_fetch_row($result_phone))
								{
								foreach($row_result_phone as $item_phone => $phone)
									{
									echo "<div class=".  "'"."account"."'"  .">".$phone."</div><br>";
									}
								}
						}
					}
	  
	  
	  ?>
	<br>
	<br>
	<p><a href="#top">
	<input type="button" value="回到頂端"  name='out account'  style="width: 100px;height:50px;"/></a></p>
  </div>

  </div>

	
	
</body>
</html>