<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首頁</title>
<style type="text/css">
.home {
	font-family: "微軟正黑體", Arial;
	margin-left: auto;
	margin-right: auto;
	margin-top: auto;
	height: 910px;
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
	height: 910px;
	font-family: "微軟正黑體", Arial;
	padding: 20px;
	margin: auto;
}
.commodity_box {
	font-family: "微軟正黑體", Arial;
	margin-top: auto;
	margin-left: auto;
	margin-right: auto;
	height: 300px;
	width: 210px;
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
	font-size: 25px;
		
	}.text_commodity2
	{
	color: #000000;
	font-family: "微軟正黑體", Arial;
	text-align:center;
	font-size: 22px;
	}
</style>
</head>

<body>
	 <?php 
	  include("connect.php");
	  session_start();
	$i=0;
	$sql_ID="SELECT commodity_number FROM `commodity` WHERE bool = 1";//sql指令　有上架
	  $result_ID=mysqli_query($db_link,$sql_ID);//指定資料庫連結,打進去的指令
					
	  while($row_result_ID=mysqli_fetch_row($result_ID))
	  {
		  foreach($row_result_ID as $item_ID => $ID)
		  {
			  $i=$i+1;
		  }
	  }
	$i=$i/4;
	$i=ceil($i)*400;
	if($i==0)
	{
		$i=400;
	}
	
	
	?>
<div class="head_home" ></div>
	
<div class="home" <?php echo "style=height:".$i."px;"?> >
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
  <div class="all_commodity" <?php echo "style=height:".$i."px;"?>>
	  
	 <?php
	 $sql_ID="SELECT commodity_number FROM `commodity` WHERE bool = 1 AND `total_amount` >= 1";//sql指令　有上架
	 $result_ID=mysqli_query($db_link,$sql_ID);//指定資料庫連結,打進去的指令
	 
	  while($row_result_ID=mysqli_fetch_row($result_ID))
	  {
		  foreach($row_result_ID as $item_ID => $ID)
		  {
			  echo "<form action=".  "'"."commodity.php"."'"  ." method=".  "'"."post"."'"  ." id=".  "'"."form1"."'"  ." name=".  "'"."form1"."'"  .">";
			  echo "<div class=".  "'"."commodity_box"."'"  .">";
			  ?>
		<input type="image" <?php echo "img src=image/".$ID.".jpg";?> width='200px' height='200px'/><br>
	  <?php
			  $sql_NAME="SELECT commodity_name FROM `commodity` WHERE  commodity_number = $ID";//sql指令　
			  $result_NAME=mysqli_query($db_link,$sql_NAME);//指定資料庫連結,打進去的指令
					
			  while($row_result_NAME=mysqli_fetch_row($result_NAME))
			  {
				  foreach($row_result_NAME as $item_NAME => $NAME)
				  {
				?>
	  		<input type="hidden" <?php echo "value=".$ID;?> name="commodity_ID"/>
	 		<input type="button"  class="text_commodity" <?php echo "value=".$NAME;?> style="border:0;cursor:pointer" /><br>
	  <?php
				  }
			  }
			  
			  $sql_price="SELECT price FROM `commodity` WHERE  commodity_number = $ID";//sql指令　
			  $result_price=mysqli_query($db_link,$sql_price);//指定資料庫連結,打進去的指令
					
			  while($row_result_price=mysqli_fetch_row($result_price))
			  {
				  foreach($row_result_price as $item_price => $price)
				  {
				?>
	 		<input type="button"  class="text_commodity2" <?php echo "value=NT$".$price;?> style="border:0;cursor:pointer" /><br>
	  <?php
				  }
			  }
			  
			  echo "</div>";
			  echo "</form>";
			  //echo "<div class=".  "'"."account"."'"  .">".$NAME.""."</div>";
		  }
	  }
	  ?>
	   <div style="float: none;width: 1000px;">展列商品如有缺失<br>
即代表商品已下架/商品售完，<br>
我們將會努力盡快補上新商品！。</div>
  </div>

	</div>
	
</body>
</html>