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
	  $i=1;
	  if(isset($_COOKIE['member']))
		{
			$member=$_COOKIE['member'];
		  $sql_member="'".$member."'";
	  	}
	  elseif(!isset($_COOKIE['member']))
	  {
		   echo "<div class=". "'"."shop_no". "'".">";
		  echo "請先登入會員再使用購物車服務。"; 
		  echo "</div>";
		  return;
	  }
	  
	  if(isset($_POST['bool2']))
	  {
	  
	  if(isset($_POST['cost']))
	{
		$all_cost=$_POST['cost'];
		  $map=$_POST['map'];
	  }
	  
	  	$sql_ID="SELECT order_id FROM `order_form`";//sql指令 給予訂單號碼
		$result_ID=mysqli_query($db_link,$sql_ID);//指定資料庫連結,打進去的指令
					
		while($row_result_ID=mysqli_fetch_row($result_ID))
		{
		  foreach($row_result_ID as $item_ID => $ID)
		  {
			  $i=$i+1;
		  }
		}
	  
		$sql_COM_ID="SELECT commodity_number FROM `shop_car` WHERE `account` = $sql_member";//sql指令 尋找對應帳號購買物
	$result_COM_ID=mysqli_query($db_link,$sql_COM_ID);//指定資料庫連結,打進去的指令
	 while($row_result_COM_ID=mysqli_fetch_row($result_COM_ID))
	 {
		 foreach($row_result_COM_ID as $item_COM_ID => $COM_ID)
		 {
			 echo $de_comid=$COM_ID;//商品號碼
				  //"style=". "'"."width: 180px;". "'".
			 $sql_NAME="SELECT commodity_name FROM `commodity` WHERE commodity_number = $COM_ID";//sql指令　名稱
			 $result_NAME=mysqli_query($db_link,$sql_NAME);//指定資料庫連結,打進去的指令
					
			 while($row_result_NAME=mysqli_fetch_row($result_NAME))
			 {
				 foreach($row_result_NAME as $item_NAME => $NAME)
				 {
						$de_name=$NAME;
				 }
	 		}
			 
			 $sql_price="SELECT price FROM `commodity` WHERE commodity_number = $COM_ID";//sql指令　
			 $result_price=mysqli_query($db_link,$sql_price);//指定資料庫連結,打進去的指令
					
			 while($row_result_price=mysqli_fetch_row($result_price))
			 {
				 foreach($row_result_price as $item_price => $price)
				 {
						$de_price=$price;
				 }
	 		}
			 
			$sql_among="SELECT among FROM `shop_car` WHERE commodity_number = $COM_ID AND `account` = $sql_member";//sql指令 數量
			$result_among=mysqli_query($db_link,$sql_among);//指定資料庫連結,打進去的指令
	 
	 		while($row_result_among=mysqli_fetch_row($result_among))
				{
					foreach($row_result_among as $item_among => $among)
						{
							$de_among=$among;
						}
	 		}
			 
			 $total=$de_price*$de_among;
			 $sql_de_member="'".$member."'";
			  $sql_map="'".$map."'";
			 $sql_i="'".$i."'";
			 $sql_all_cost="'".$all_cost."'";
			  $sql_comid="'".$de_comid."'";
			  $sql_de_price="'".$de_price."'";
			  $sql_de_name="'".$de_name."'";
			  $sql_de_among="'".$de_among."'";
			 $sql_de_total="'".$total."'";
			 
			 
			$sql_SEL_COM_AM="SELECT total_amount FROM `commodity` WHERE commodity_number = $sql_comid ";//sql指令 確認商品剩餘數量
			$result_SEL_COM_AM=mysqli_query($db_link,$sql_SEL_COM_AM);//指定資料庫連結,打進去的指令
			 
			 while($row_result_SEL_COM_AM=mysqli_fetch_row($result_SEL_COM_AM))
			{
				foreach($row_result_SEL_COM_AM as $item_SEL_COM_AM => $SEL_COM_AM)
				{
					$new_among=$SEL_COM_AM-$de_among;
					$sql_new_among="'".$new_among."'";
					if($new_among<0)
					{
						echo "<script>alert('出現了錯誤，".$de_name."已售完，會將此商品扣除後送出訂單，十分抱歉。')</script>"; 
						$all_cost=$all_cost-$total;
						$sql_all_cost="'".$all_cost."'";
					}
					elseif($new_among>=0)
					{
						$sql_DEL_COM_AM="UPDATE `commodity` SET `total_amount` = $sql_new_among WHERE `commodity`.`commodity_number` = $sql_comid ";//sql指令 確認商品剩餘數量
						$result_DEL_COM_AM=mysqli_query($db_link,$sql_DEL_COM_AM);//指定資料庫連結,打進去的指令
					}
					
				}
			}
			  
			$sql_de="INSERT INTO `order_detail` (`ID`,`order_id`, `commodity`, `commodity_number`, `amoug`, `price`, `total`) VALUES (NULL, $sql_i, $sql_de_name, $sql_comid, $sql_de_among, $sql_de_price, $sql_de_total)";//登入訂單詳細商品
			 $result_de=mysqli_query($db_link,$sql_de);//指定資料庫連結,打進去的指令
		 }
			
		 	}
	  
		if(isset($_COOKIE['member']))//刪除帳戶購物車內所有商品
			{
				$sql_DELCH="DELETE FROM `shop_car` WHERE `shop_car`.`account` =  $sql_member";//sql指令 數量
				$result_DELCH=mysqli_query($db_link,$sql_DELCH);//指定資料庫連結,打進去的指令
			}
	  
	  if($all_cost<=0)
	  {
		  echo "<script>alert('偵測到訂購商品價格等於小於0，訂單無法成立。')</script>";
		  return;
	  }
	  elseif($all_cost>0)
	  {
		   $sql=" INSERT INTO `order_form` (`ID`, `order_account`, `order_id`, `order_cash`,`map`) VALUES (NULL, $sql_de_member, $sql_i, $sql_all_cost,$sql_map)";
		  	$result_among=mysqli_query($db_link,$sql);//指定資料庫連結,打進去的指令
	  
		  echo "<script>alert('結帳完畢，您的總結帳金額為NT$".$all_cost."，謝謝您的消費，將回到首頁。')</script>";
		  header('Refresh:0;url=./home.php');
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
  </div>

</div>
	
</body>
</html>