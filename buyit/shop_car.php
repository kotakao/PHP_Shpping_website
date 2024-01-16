<!doctype html>
<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>購物車</title>
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
	width: 182px;
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
	width: 182px;
	height: 140px;
	float: left;
	border-width: 2px;
	border-style: solid;
	text-align: center;
	padding: 5px;
	font-style: normal;
	line-height:140px;
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

</style>
</head>

<body>
<div class="head_home"></div>
	
	<?php 
	include("connect.php");
	session_start();
	$i=0;
	$dis_cost=0;
	$home=700;
	if(isset($_COOKIE['member']))
	{
		$member=$_COOKIE['member'];
		$sql_member="'".$member."'";
		$sql_ID="SELECT * FROM `shop_car` WHERE `account` = $sql_member";//sql指令
		$result_ID=mysqli_query($db_link,$sql_ID);//指定資料庫連結,打進去的指令
		
		if($result_ID!="")
		{
			
			while($row_result_ID=mysqli_fetch_row($result_ID))
		{
		  foreach($row_result_ID as $item_ID => $ID)
		  {
			  $i=$i+1;
		  }
		}
		$home=0;
		$i=$i/4;
		$i=ceil($i)*150+420;
		$home=$i+150;
		}
		else
	{
		$i=550;
	}
		
	}
	else
	{
		$i=550;
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
  <div class="all_commodity" <?php echo "style=height:".$home."px;"?> >
	   
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
		  <div class="shop_title"><b></b></div>
	  	<div class="shop_title"><b>品名</b></div>
		<div class="shop_title"><b>單價</b></div>
   	 	<div class="shop_title"><b>數量</b></div>
  		<div class="shop_title" style="width: 180px;"><b>小計</b></div><br>
		  <?php 
	$bool=4;
				if(isset($_POST['del_car_com']))//刪除購物車商品
				{
					$bool=0;
					$DEL="'".$_POST['del_car_com']."'";
					$sql_DEL="SELECT commodity_number FROM `commodity` WHERE commodity_name = $DEL";//sql指令 尋找對應購買物
					$result_DEL=mysqli_query($db_link,$sql_DEL);//指定資料庫連結,打進去的指令
					
					while($row_result_DEL=mysqli_fetch_row($result_DEL))
					{
						foreach($row_result_DEL as $item_DEL => $DELID)
						{
							$u=$DELID;
							$sql_DELCH="DELETE FROM `shop_car` WHERE `shop_car`.`account` = $sql_member AND  `commodity_number` = $u";//sql指令 數量
							$result_DELCH=mysqli_query($db_link,$sql_DELCH);//指定資料庫連結,打進去的指令
							$bool=1;
						}
					}
				}
				
				if(isset($_POST['change_car_name']))//更改購物車商品
				{
					$bool=0;
					$ch_na="'".$_POST['change_car_name']."'";
					$ch_am="'".$_POST['change_car_among']."'";
					$sql_ch_na="SELECT commodity_number FROM `commodity` WHERE commodity_name = $ch_na";//sql指令 尋找對應購買物
					$result_ch_na=mysqli_query($db_link,$sql_ch_na);//指定資料庫連結,打進去的指令
					
					while($row_result_ch_na=mysqli_fetch_row($result_ch_na))
					{
						foreach($row_result_ch_na as $item_ch_na => $ch_na_id)
						{
							$u=$ch_na_id;
							$sql_ch_am="UPDATE `shop_car` SET `among` = $ch_am  WHERE `shop_car`.`account` = $sql_member AND  `commodity_number` = $u";//sql指令 數量
							$result_ch_am=mysqli_query($db_link,$sql_ch_am);//指定資料庫連結,打進去的指令
							$bool=2;
						}
						}
					}
		   
				if($bool==1)
				{
		  			echo  "<script>alert('刪除商品成功。')</script>";
				}
		   if($bool==2)
				{
		  			echo  "<script>alert('更改商品成功。')</script>";
				}
		    if($bool==0)
				{
		  			echo  "<script>alert('無法搜索到商品，更改/刪除商品失敗。')</script>";
				}
				
				?>
		  <?php 
	//SELECT commodity_number FROM `shop_car` WHERE `account` = $member
	$all_cost=0;
		  if($result_ID!="")
		{
	$sql_COM_ID="SELECT commodity_number FROM `shop_car` WHERE `account` = $sql_member";//sql指令 尋找對應帳號購買物
	$result_COM_ID=mysqli_query($db_link,$sql_COM_ID);//指定資料庫連結,打進去的指令
	 while($row_result_COM_ID=mysqli_fetch_row($result_COM_ID))
	 {
		 foreach($row_result_COM_ID as $item_COM_ID => $COM_ID)
		 {
			  $COM_ID;//商品號碼
		?>
	    <div class="shop_in" >
		
	      <?php
			  echo "<img src="."image/".$COM_ID.".jpg  width=80% height=80%/>" 
			  ?>
		  </div>
	<?PHP
				  //"style=". "'"."width: 180px;". "'".
			 $sql_NAME="SELECT commodity_name FROM `commodity` WHERE commodity_number = $COM_ID";//sql指令　名稱
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
			
			$sql_among="SELECT among FROM `shop_car` WHERE commodity_number = $COM_ID AND account = $sql_member";//sql指令 數量
			$result_among=mysqli_query($db_link,$sql_among);//指定資料庫連結,打進去的指令
	 
	 		while($row_result_among=mysqli_fetch_row($result_among))
				{
					foreach($row_result_among as $item_among => $among)
						{
							$am="'".$among."'";
							$sql_total="SELECT total_amount FROM `commodity` WHERE commodity_number = $COM_ID";//sql指令　總數	
			  				$result_total=mysqli_query($db_link,$sql_total);//指定資料庫連結,打進去的指令
			  				while($row_result_total=mysqli_fetch_row($result_total))
									{
										foreach($row_result_total as $item_total => $total)
												{
													if($am>$total)
															{
																echo  "<script>alert('此商品剩餘數量為".$total."，訂購商品超過剩餘商品數量，已將數量改為剩餘商品數量。')</script>";
																$among=$total;
															}
											}
							echo "<div class=". "'"."shop_in"."'" .">".$among.""."</div>";
						}
	 		}
			 ?>
		  <input type="hidden" <?php echo "value=".$COM_ID ?> name='del_ID' id="del_ID" >
		  <?php
			 
		 }
		 }
			 $cost=$price*$among;
			 
			 $all_cost=$all_cost+$cost;
			 echo "<div class=". "'"."shop_in"."'" ."style=". "'"."width: 180px;". "'".">".$cost.""."</div><br>";
		 	}
		  
		  $dis_cost=0;
			 $bool=0;
			 if(isset($_POST['discount']))
			 {
				 $discount="'".$_POST['discount']."'";
				 
				 $sql_discount="SELECT discount_cost FROM `discount` WHERE discount = $discount";//sql指令 折扣
				 $result_discount=mysqli_query($db_link,$sql_discount);//指定資料庫連結,打進去的指令
				 
				 while($row_result_discount=mysqli_fetch_row($result_discount))
				 {
					foreach($row_result_discount as $item_discount => $discount_ID)
					{
						$dis_cost=$discount_ID;
						$bool=1;
					}
				}
				 
				 if($bool==1)
				 {
					 echo "<script>alert('使用優惠券成功！已扣除金額！')</script>";
				 }
				 
				 if($bool==0)
				 {
					 echo "<script>alert('查無此優惠代碼，請重新確認優惠券是否填寫正確。')</script>";
				 }
				 
			 }
	 $all_cost=$all_cost-$dis_cost;
		  if($all_cost<=0)
		  {
			  $all_cost=0;
		  }
		  }
		  ?>
		  
	    <div class="shop_title" style="width: 475px;height: 50px; text-align: center;">
			 <form action="shop_car.php" method="post" id="form1" name="form1" >
		 <input type="text"   name='discount' required style="height:35px;"/>
		<input type="submit" value="使用優惠券"  name='use' style="width: 80px;height:35px;"/>
		</form>
		  </div>
		 <div class="shop_title" style="width: 475px;height: 50px;text-align: right;line-height:50px;">
			 <div class="shop_title" style="width: 300px;height: 45px;text-align: right;	border-width: 0px;line-height:45px;">
			 <?php
			 echo "商品價錢總計：".$all_cost;
			echo "　折扣：".$dis_cost;
			 ?>
				 </div>
		   <form action="shop_car_next.php" method="post" id="form1" name="form1" onSubmit="return IsEmail() ">
			   <input type="hidden" <?php echo "value=".$all_cost ?> name='all' id="all" >
			   <input type="hidden" name='bool'>
			   <input type="hidden" <?php echo "value=".$dis_cost ?> name='dis' id="dis" >
		    <input type="submit" value="下一步"  name='next step' style="width: 70px;height:35px; "/>
		</form>
		  
		  </div>
	    <div class="shop_no" style="width: 965px;text-align: center;"> 
		  <form action="shop_car.php" method="post" id="form1" name="form1" >
		 刪除商品全名：<input type="text" required name='del_car_com' style="height:35px;"/>
		<input type="submit" value="刪除購物車商品" style="width: 115px;height:35px;"/>
		</form>
			 </div>
			<div class="shop_no" style="width: 965px;text-align: center;"> 
			<form action="shop_car.php" method="post" id="form1" name="form1" >
		更換商品全名：<input type="text"  required name='change_car_name' style="height:35px;"/>
		 　更換商品數量：<input type="number" min="1" required name='change_car_among' style="height:35px;"/>
		<input type="submit" value="更換商品數量" style="width: 115px;height:35px;"/>
		</form>
		  </div>
      </div>
  </div>
</div>
	<script>
			function IsEmail() 
			{
				all=document.getElementById("all").value;
				if(all<=0)
				{
					alert('商品價錢總計低於或是等於0，無法進行交易。');
					return false;
				}
			}
		</script>
	
</body>
</html>