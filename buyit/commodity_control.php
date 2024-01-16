<!doctype html>
<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>商品管理</title>
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
	width: 300px;
	height: 20px;
	float: left;
	border-width: thin;
	border-style: solid;
	text-align: left;
	padding: 5px;
	font-style: normal;
	}
.name
	{
	width: 150px;
	height: 20px;
	float: left;
	border-width: thin;
	border-style: solid;
	text-align: left;
	padding: 5px;
	}
.id
	{
	width: 60px;
	height: 20px;
	float: left;
	border-width: thin;
	border-style: solid;
	text-align: left;
	padding: 5px;
	}
.new {
	font-family: "微軟正黑體", Arial;
	float: none;
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
 
<?php 
	
	  if(!isset($_COOKIE['root']))
	  {
		  echo  "<script>alert('系統已偵測到管理員尚未登入，將回到登入頁面進行登入。')</script>";
		  header('Refresh:0;url=./member_login.php');
		  return;
	  }
		?>
<div class="all_commodity">
	  <div class="detailed">
	    <form action="commodity_control.php" method="post" id="form1" name="form1">
		  <p><div class="del" style="float: none;border-style: none;">
			  刪除商品(輸入商品ID)：
			  <input type="text"  name='del_commodity' required/ >
				<input type="submit" value="刪除"  name='del'  style="width: 50px;height:30px;"/>
		</form>
		  <?php 
			  include("connect.php");
			  session_start();
			  $delch=0;
		if(isset($_POST['del_commodity']))
	{
		$acc=$_POST['del_commodity'];
		$sql_acc="'".$acc."'";
		$sql_query="SELECT `commodity_number` FROM `commodity`";//sql指令 帳號
		$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
		
		while($row_result=mysqli_fetch_row($result))//帳號確認
		{
			foreach($row_result as $item => $value)
			{
				if($value==$acc)
				{
					$delch=1;
				}
			}
		}
			
			if($delch=="1")
			{
				echo "　　刪除成功。";
			}
			
			if($delch=="0")
			{
				echo "　　刪除失敗或是未找到商品。";
			}
		$sql_del="DELETE FROM `commodity` WHERE `commodity`.`commodity_number` = $sql_acc";//sql指令
		$result_del=mysqli_query($db_link,$sql_del);//指定資料庫連結,打進去的指令
		unlink("image/".$acc.".jpg");
		unset($_POST['del_account']);
	}
	
			  ?>
    </div>
    <div class="new"> 		
				
		<form action="commodity_chaneg.php" method="post" id="form1" name="form1">
			  修改商品(輸入商品ID)：
			  	<input type="text"  name='change' required/ >
				<input type="submit" value="進入修改頁面"  name='go'  style="width: 100px;height:30px;"/>
		</form>	 <br>
				
	  <form action="commodity_new.php" method="post" id="form1" name="form1">
			  新增商品：
			<input type="submit" value="新增商品"  name='go_new'  style="width: 100px;height:30px;"/>
		</form>
    </div><p></p>
		  <div class="id"><b>商品ID</b></div>
		   <div class="account"><b>商品名稱</b></div>
    <div class="name"><b>剩餘數量</b></div>
  	<div class="name"><b>價格</b></div>
	<div class="name"><b>上下架</b></div><br>
<?php 
	  	$sql_query="SELECT commodity_number FROM `commodity`";//sql指令  ID
		$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
	  
		while($row_result=mysqli_fetch_row($result))
					{
						foreach($row_result as $item => $value)
						{
							echo "<div class=". "'"."id"."'"  .">".$value."</div>";//ID
							
							$sql_NAME="SELECT commodity_name FROM `commodity` WHERE commodity_number = $value";//sql指令　名稱
							$result_NAME=mysqli_query($db_link,$sql_NAME);//指定資料庫連結,打進去的指令
					
							while($row_result_NAME=mysqli_fetch_row($result_NAME))
								{
								foreach($row_result_NAME as $item_NAME => $NAME)
									{
									echo "<div class=".  "'"."account"."'"  .">".$NAME.""."</div>";
									}
								}
							
							$sql_total="SELECT total_amount FROM `commodity` WHERE commodity_number = $value";//sql指令　數量
							$result_total=mysqli_query($db_link,$sql_total);//指定資料庫連結,打進去的指令
					
							while($row_result_total=mysqli_fetch_row($result_total))
								{
								foreach($row_result_total as $item_total => $total)
									{
									echo "<div class=".  "'"."name"."'"  .">".$total."</div>";
									}
								}
							
							$sql_price="SELECT price FROM `commodity` WHERE commodity_number = $value";//sql指令　
							$result_price=mysqli_query($db_link,$sql_price);//指定資料庫連結,打進去的指令
					
							while($row_result_price=mysqli_fetch_row($result_price))
								{
								foreach($row_result_price as $item_price => $price)
									{
									echo "<div class=".  "'"."name"."'"  .">".$price."</div>";
									}
								}
							
							$sql_bool="SELECT bool FROM `commodity` WHERE commodity_number = $value";//sql指令　
							$result_bool=mysqli_query($db_link,$sql_bool);//指定資料庫連結,打進去的指令
					
							while($row_result_bool=mysqli_fetch_row($result_bool))
								{
								foreach($row_result_bool as $item_bool => $bool)
									{
									
									if($bool=="1")
									{
										$upload="<b>上架中</b>";
									}
									elseif($bool=="0")
									{
										$upload="<span style= ". "'"."color: #FF0004"."'"  .">"."下架中</span>"; 
										//$upload="下架中";
									}
									
									echo "<div class=".  "'"."name"."'"  .">".$upload."</div><br>";
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