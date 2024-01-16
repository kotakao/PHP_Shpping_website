<!doctype html>
<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>確認結帳</title>
<style type="text/css">
.home {
	font-family: "微軟正黑體", Arial;
	margin-left: auto;
	margin-right: auto;
	margin-top: auto;
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
	height: 1000px;
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
	
	.shop_title
	{
	width: 247px;
	height: 20px;
	float: left;
	border-width: 2px;
	border-style: solid;
	text-align: left;
	padding: 5px;
	font-style: normal;
	line-height:20px;
	}
	
	.shop_in
	{
	width: 247px;
	height: 30px;
	float: left;
	border-width: 2px;
	border-style: solid;
	text-align: center;
	padding: 5px;
	font-style: normal;
	line-height:30px;
	}
	
	.shop_no
	{
	width: 980px;
	height: 140px;
	float: left;
	border-width: 2px;
	border-style: solid;
	text-align: center;
	padding: 5px;
	font-style: normal;
	line-height:140px;
	}
	
	.shop_last
	{
	width: 965px;
	height: 100px;
	border-width: 2px;
	border-style: solid;
	text-align: center;
	padding: 5px;
		float: left;
	font-style: normal;
	}
	
	.all_shop
	{
	width: 980px;
	float: none;
	border-width: thin;
	border-style: solid;
	text-align: left;
	padding: 10px;
	font-style: normal;
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
	
	<?php 
	include("connect.php");
	session_start();
	ob_start();
	$i=0;
	if(isset($_COOKIE['member']))
	{
		$member=$_COOKIE['member'];
		$sql_member="'".$member."'";
		$sql_ID="SELECT * FROM `shop_car` WHERE `account` = $sql_member";//sql指令
		$result_ID=mysqli_query($db_link,$sql_ID);//指定資料庫連結,打進去的指令
					
		while($row_result_ID=mysqli_fetch_row($result_ID))
		{
		  foreach($row_result_ID as $item_ID => $ID)
		  {
			  $i=$i+1;
		  }
		}
		$home=0;
		$i=$i/4;
		$i=ceil($i)*150+300;
		$home=$i+150;
	}
	else
	{
		$i=550;
		$home=700;
	}
	

	
	?>
<div class="home" <?php echo "style=height:".$home."px;"?>>
	<div align="center">
	<table width="740" border="0">
  <tbody>
    <tr>
      <td><form action="member_login.php" method="post" id="form1" name="form1" style="width: 253px;height:70px;">
		<input type="submit" value="會員中心"  name='member' style="width: 253px;height:70px;"/>
		</form></td>
      <td><form action="home.php" method="post" id="form1" name="form1" style="width: 253px;height:70px;">
		<input type="submit" value="商品總覽"  name='all' style="width: 253px;height:70px;"/>
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
  <div class="all_commodity" >
	   
	  <?php
	  if(!isset($_COOKIE['member']))
	  {
		  echo "<div class=". "'"."shop_no". "'".">";
		  echo "請先登入會員再使用購物車服務。"; 
		  echo "</div>";
		  return;
	  }
	  
	  ?>
	  <div class="all_shop" <?php echo "style=height:".$i."px;"?>>
	  	<div class="shop_title"><b>品名</b></div>
		<div class="shop_title"><b>單價</b></div>
   	 	<div class="shop_title"><b>數量</b></div>
  		<div class="shop_title" style="width: 180px;"><b>小計</b></div><br>

		  <?php 
	//SELECT commodity_number FROM `shop_car` WHERE `account` = $member
	if(isset($_POST['bool']))
	{
	$sql_COM_ID="SELECT commodity_number FROM `shop_car` WHERE `account` = $sql_member";//sql指令 尋找對應帳號購買物
	$result_COM_ID=mysqli_query($db_link,$sql_COM_ID);//指定資料庫連結,打進去的指令
	 $all_cost=0;
	 while($row_result_COM_ID=mysqli_fetch_row($result_COM_ID))
	 {
		 foreach($row_result_COM_ID as $item_COM_ID => $COM_ID)
		 {
			  $COM_ID;//商品號碼
				  //"style=". "'"."width: 180px;". "'".
				  
			 $sql_NAME="SELECT commodity_name FROM `commodity` WHERE commodity_number = $COM_ID ";//sql指令　名稱
			 $result_NAME=mysqli_query($db_link,$sql_NAME);//指定資料庫連結,打進去的指令
					
			 while($row_result_NAME=mysqli_fetch_row($result_NAME))
			 {
				 foreach($row_result_NAME as $item_NAME => $NAME)
				 {
							echo "<div class=". "'"."shop_in"."'" .">".$NAME.""."</div>";
				 }
	 		}
			 
			 
			 $sql_price="SELECT price FROM `commodity` WHERE commodity_number = $COM_ID";//sql指令　
			 $result_price=mysqli_query($db_link,$sql_price);//指定資料庫連結,打進去的指令
					
			 while($row_result_price=mysqli_fetch_row($result_price))
			 {
				 foreach($row_result_price as $item_price => $price)
				 {
							echo "<div class=". "'"."shop_in"."'" .">". $price.""."</div>";
				 }
	 		}
			 
			$sql_among="SELECT among FROM `shop_car` WHERE commodity_number = $COM_ID AND `account` = $sql_member";//sql指令 數量
			$result_among=mysqli_query($db_link,$sql_among);//指定資料庫連結,打進去的指令
	 
	 		while($row_result_among=mysqli_fetch_row($result_among))
				{
					foreach($row_result_among as $item_among => $among)
						{
							echo "<div class=". "'"."shop_in"."'" .">".$among.""."</div>";
						}
	 		}
			 ?>
		  <input type="hidden" <?php echo "value=".$COM_ID ?> name='del_ID' id="del_ID" >
		  <?php
				 $dis_cost=0;
				 if(isset($_POST['dis']))
				 {
					$dis_cost=$_POST['dis'];
				 }
		 }
			
			 $cost=$price*$among;
			 
			 $all_cost=$all_cost+$cost;
			 echo "<div class=". "'"."shop_in"."'" ."style=". "'"."width: 180px;". "'".">".$cost.""."</div><br>";
		 	}
	 $all_cost=$all_cost-$dis_cost;
		  
		  ?>
		  
	    <div class="shop_no" style="width: 965px;text-align: left;"> 
			 <div class="shop_title" style="width: 500px;height: 150px;text-align: right;	border-width: 0px;line-height:130px;">
			  <?php
			 echo "商品價錢總計：".$all_cost."　折扣：".$dis_cost."　";
			 ?>
				</div>
			<br>
			 </div>
		  <div class="shop_last"> 
			  <div class="div3" style="width: 500px;">
			<form action="shop_car_end.php" method="post" id="form1" name="form1" >
				付款方式：
				<input name="money" type="radio"  value="cash" checked/>
          貨到付款：
          <input name="money" type="radio" value="card"/>
          信用卡/金融卡<br>
				地址：<input name="map"  required type="text" style="width: 400px;"/><br>
				 <input type="hidden" <?php echo "value=".$all_cost ?> name='cost' id="cost" >
				<input type="hidden" name='bool2'>
		<input type="submit" value="完成結帳"  name='member'/>
		</form>
				</div>
				  </div>
		<div class="shop_last"> 
		<?php
	$account=$_COOKIE['member'];
	$sql_account="'".$account."'";
	  
	$sql_query3="SELECT * FROM `account` WHERE `account` = $sql_account";//sql指令 
	$result3=mysqli_query($db_link,$sql_query3);//指定資料庫連結,打進去的指令
	
	while($row_result=mysqli_fetch_array($result3))//電話確認
		{
			foreach($row_result as $item3 => $value3)
			{
	?>
    <div class="div3">
		  <?php
		  echo "訂購人名稱：".$row_result["name"]."<br>"; 
				?>
		  </div>
    <div class="div3">
		  <?php
		  echo "帳號名稱：".$row_result["account"]."<br>";
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
	}
	else
	{
		echo  "<script>alert('系統已偵測到會員已非正常方式進入頁面，將回到購物車畫面。')</script>";
		  header('Refresh:0;url=./shop_car.php');
		  return;
	}
		   ob_end_flush();
				?>
		</form>
      </div>
			   
		  </div>
		 
  </div>
</div>
	
</body>
</html>