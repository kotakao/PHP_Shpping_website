<!doctype html>
<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>商品詳細資料</title>
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
	height: 400px;
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
.detailed3 {
	font-family: "微軟正黑體", Arial;
	margin-top: auto;
	margin-left: auto;
	margin-right: auto;
	height: 100px;
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
		ob_start();
	  
	  if(isset($_POST['commodity_ID']))
	{
		$_SESSION['commodity_ID']=$_POST['commodity_ID'];
		$commodity_ID="'".$_POST['commodity_ID']."'";
		$ID=$_POST['commodity_ID'];
	}
	elseif(isset($_SESSION['commodity_ID']))
	{
		$commodity_ID="'".$_SESSION['commodity_ID']."'";
		$ID=$_SESSION['commodity_ID'];
	}
	else
	{
		echo $commodity_ID="查無資料，請回到商品列表選擇商品。";
		$ID="";
		return;
	}
	  ?>
    <div class="detailed" text-align="center"> 
		<?php 
		
		if($ID!="")
		{
			$ima=$ID;
		}
		
		echo "<img src="."image/".$ima.".jpg  width=100% height=100%/>" ?></div>
    <div class="detailed2">  
		<?php
	if($ID!="")
	{
		$sql_NAME="SELECT commodity_name FROM `commodity` WHERE  commodity_number = $ID";//sql指令　
		$result_NAME=mysqli_query($db_link,$sql_NAME);//指定資料庫連結,打進去的指令
					
			  while($row_result_NAME=mysqli_fetch_row($result_NAME))
			  {
				  foreach($row_result_NAME as $item_NAME => $NAME)
				  {
					  echo "<h1>".$NAME."</h1>";
					  
					 $sql_price="SELECT price FROM `commodity` WHERE  commodity_number = $ID";//sql指令　
					  $result_price=mysqli_query($db_link,$sql_price);//指定資料庫連結,打進去的指令
					
 					while($row_result_price=mysqli_fetch_row($result_price))
					{
						foreach($row_result_price as $item_price => $price)
						{
							  echo "<h3>NT$".$price."</h3>";
						}
					}
				  }
				  
				  $sql_intro="SELECT commodity_introduce FROM `commodity` WHERE  commodity_number = $ID";//sql指令　	
				  $result_intro=mysqli_query($db_link,$sql_intro);//指定資料庫連結,打進去的指令
					
 					while($row_result_intro=mysqli_fetch_row($result_intro))
					{
						foreach($row_result_intro as $item_intro => $intro)
						{
							  echo "<h3>商品敘述：<br>".$intro."</h3><br>";
						}
			  }
			  }
	}
		?>
    </div>
	  <div class="detailed3">  
		  <form action="commodity.php" method="post" id="cart" name="cart" >
			  <input type="hidden" <?php echo "value=".$ima ?> name='add_ID' id="add_ID" >
			  <input type="number" value="1" required min='1' name='add_among' id="add_among" pattern="[1-9]+" >
			  <input type="submit" value="加入購物車"  name='add' id="add" >
		</form>
		  <?php
		  if(isset($_POST['add_ID']))
		  {
			  if(isset($_COOKIE['root']))
			  {
				  echo "<script>alert('請管理員使用會員帳號進行購物車測試。')</script>";
				  return;
			  }
			  
			  $add_id=$_POST['add_ID'];//商品id
			  if(isset($_COOKIE['member']))
			  {
				  $member=$_COOKIE['member'];//會員
				  
			  }
			  elseif(!isset($_COOKIE['member']))
			  {
				    echo  "<script>alert('請您註冊會員並登入後再使用購物車功能。')</script>";
				  return;
			  }
			  
			  $among=$_POST['add_among'];//數量
			  $price;//價格
			  
			  $sql_add_id="'".$add_id."'";
			  $sql_member="'".$member."'";
			  $sql_among="'".$among."'";
			  $sql_price="'".$price."'";
			  
			  $sql_total="SELECT total_amount FROM `commodity` WHERE commodity_number = $add_id";//sql指令　總數	
			  $result_total=mysqli_query($db_link,$sql_total);//指定資料庫連結,打進去的指令
					
			  while($row_result_total=mysqli_fetch_row($result_total))
			  {
				  foreach($row_result_total as $item_total => $total)
				  {
					  
				  }
			  }
			  
			  $sql_car_id="SELECT commodity_number FROM `shop_car` WHERE  `account` = $sql_member";//sql指令　	確認帳戶購物車有沒有這商品
			  $result_car_id=mysqli_query($db_link,$sql_car_id);//指定資料庫連結,打進去的指令
					
			  while($row_result_car_id=mysqli_fetch_row($result_car_id))
			  {
				  foreach($row_result_car_id as $item_car_id => $car_id)
						{
							  if($add_id==$car_id)//如果這商品有在購物車裡
							  {
								  $sql_car_among="SELECT among FROM `shop_car` WHERE  `account` = $sql_memberr AND `commodity_number` = $car_id";//sql指令　確認這商品的數量
								  $result_car_among=mysqli_query($db_link,$sql_car_among);//指定資料庫連結,打進去的指令
					
								  while($row_result_car_among=mysqli_fetch_row($result_car_among))
								  {
									  foreach($row_result_car_among as $item_car_among => $car_among)
									  {
										  $cost=$car_among+$among;
										  $sql_among_up="'".$cost."'";
										  
										   if($cost>$total)
										   	{
											   	echo  "<script>alert('此商品剩餘數量為".$total."，總訂購商品超過剩餘商品數量，已將購買商品設為剩餘商品數。')</script>";
											   $cost=$total;
											   $sql_among_up="'".$cost."'";
											   $sql_car_up="UPDATE `shop_car` SET `among` = $sql_among_up WHERE `commodity_number` = $car_id;";
										  		$result_car_up=mysqli_query($db_link,$sql_car_up);//指定資料庫連結,打進去的指令
											   return;
										   	}
										  echo  "<script>alert('已增加購物車內".$NAME."數量至".$cost."')"."</script>";
										  
										  $sql_car_up="UPDATE `shop_car` SET `among` = $sql_among_up WHERE `commodity_number` = $car_id;";
										  $result_car_up=mysqli_query($db_link,$sql_car_up);//指定資料庫連結,打進去的指令
										  return;
									  }
								  }
							  }
						}
			  }
			  
			  
			  $sql_total="SELECT total_amount FROM `commodity` WHERE commodity_number = $add_id";//sql指令　總數	
			  $result_total=mysqli_query($db_link,$sql_total);//指定資料庫連結,打進去的指令
					
			  while($row_result_total=mysqli_fetch_row($result_total))
			  {
				  foreach($row_result_total as $item_total => $total)
				  {
					  if($among>$total)
					  {
						  echo  "<script>alert('此商品剩餘數量為".$total."，訂購商品超過剩餘商品數量，無法加入購物車。')</script>";
						  return;  
					  }	 
				  }
			  }
			  
			 // UPDATE `shop_car` SET `among` = '2' WHERE `shop_car`.`account` = $member;
			  
			  $sql_NAME="INSERT INTO `shop_car` (`ID`, `account`, `commodity_number`, `among`, `price`) VALUES (NULL,$sql_member, $sql_add_id, $sql_among, $sql_price);";//sql指令　
			  $result_NAME=mysqli_query($db_link,$sql_NAME);//指定資料庫連結,打進去的指令
			  echo  "<script>alert('已將".$NAME."加入至購物車')</script>";
		  }
		  else
		  {
			  
		  }
		  
		  ob_end_flush();
		  ?>
		  
    </div>
  </div>
</div>
	
</body>
</html>