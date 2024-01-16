<!doctype html>

<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>優惠券管理</title>
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
	height: 100%;
	text-align: center;
}

.detailed {
	font-family: "微軟正黑體", Arial;
	margin: auto;
	height: 100%;
	width: 910px;
	top: auto;
	left: auto;
	right: auto;
	padding: auto;
	float: none;
}
.del
	{
	width: 420px;
	height: 100%;
	border-width: thin;
	border-style: solid;
	margin: auto;
	padding: 5px;
	float: left;
	border-style: none;
	}
	
.account
	{
	width: 200px;
	height: 20px;
	float: left;
	border-width: thin;
	border-style: solid;
	text-align: left;
	padding: 5px;
	}
.discount {
	font-family: "微軟正黑體", Arial;
	height: 100%;
	margin: auto;
	width: 430px;
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
		  <h3>優惠券列表</h3>
		  <h4>優惠券代碼請輸入小寫英文或數字</h4>
		  <br>
		  <?php 
			  include("connect.php");
			  session_start();
			  $delch;
		if(isset($_POST['del_discount']))//如果要刪除
	{
		$delch=0;
		$acc=$_POST['del_discount'];
		$del_dis="'".$_POST['del_discount']."'";
		
		$sql_query="SELECT `discount` FROM `discount`";//sql指令 確認有沒有優惠券
		$result=mysqli_query($db_link,$sql_query);//
		
		while($row_result=mysqli_fetch_row($result))//確認如果有
		{
			foreach($row_result as $item => $value)
			{
				if($value==$acc)
				{
					$delch="1";
				}
			}
		}
			
			if($delch=="1")
			{
				echo "　　刪除優惠券：刪除成功。";
				$sql_del="DELETE FROM `discount` WHERE `discount`.`discount` =$del_dis";//刪除動作
				$result_del=mysqli_query($db_link,$sql_del);//指定資料庫連結,打進去的指令
			}
			
			if($delch=="0")
			{
				echo "　　刪除優惠券：刪除失敗或是未找到優惠券。";
			}
			
		
	}
		  
		  if(isset($_POST['new_discount']))//如果要新增優惠券
		  {
			  $delch=0;
			  $newcount=$_POST['new_discount'];
			  $sql_query="SELECT `discount` FROM `discount`";//sql指令 確認有沒有優惠券
			  $result=mysqli_query($db_link,$sql_query);//
		
			while($row_result=mysqli_fetch_row($result))//確認如果有布林轉為1 代表錯誤
			{
				foreach($row_result as $item => $value)
				{
					if($value==$newcount)
					{
						$delch=1;
					}
				}
			}
			  if($delch=="1")
			{
				echo "　　新增優惠券：新增失敗，重複代碼。";
				  
			}
			
			if($delch=="0")
			{
				echo "　　新增優惠券：新增成功。";
				$new=$_POST['new_discount'];
			  $cost=$_POST['cost_discount'];
				$sql_new="'".$new."'";
			  $sql_cost="'".$cost."'";
			  $sql_query="INSERT INTO `discount` (`discount`, `discount_cost`) VALUES ($sql_new, $sql_cost);";//sql指令 確認有沒有優惠券
			$result=mysqli_query($db_link,$sql_query);//
			}
			  
			  
		  }
			  ?>
	    <form action="discount.php" method="post" id="form1" name="form1">
	    <div class="del" >
		    <br>刪除優惠券：<br>
			代碼：<input type="text"  name='del_discount' id='del_discount' required pattern="[a-z0-9]+"/><br><br><br>
			  <input type="submit" value="刪除" style="width: 50px;height:30px;"/>
		</form>
		  </div>
		  
		  <form action="discount.php" method="post" id="form1" name="form1">
		    <div class="del">
		    <br>新增優惠券：<br>
				代碼：<input type="text"  name='new_discount' id='new_discount' required pattern="[a-z0-9]+"/><br>
				金額：<input type="number" min='1' name='cost_discount' id='cost_discount'   required pattern="[0-9]+"/><br><br>
				<input type="submit" value="建立"  style="width: 50px;height:30px;"/>
		</form>
			 
		  </div>
	
</div>
	  <div class="discount">  
		  <br><br><br><br><br><br>
		  <div class="del"></div>
		  <div class="account">優惠券</div>
		  <div class="account">扣除金額</div><br>
<?php 
	  	$sql_query="SELECT discount FROM `discount`";//sql指令
		$result=mysqli_query($db_link,$sql_query);//指定資料庫連結,打進去的指令
	  
		while($row_result=mysqli_fetch_row($result))
					{
						foreach($row_result as $item => $value)
						{
							echo "<div class=".  "'"."account"."'"  .">".$value."</div>";
							$NC="'".$value."'";
							$sql_discount_cost="SELECT discount_cost FROM `discount` WHERE `discount` = $NC";//sql指令
							$result_discount_cost=mysqli_query($db_link,$sql_discount_cost);//指定資料庫連結,打進去的指令
					
							while($row_result_discount_cost=mysqli_fetch_row($result_discount_cost))
								{
								foreach($row_result_discount_cost as $item_discount_cost => $discount_cost)
									{
									echo "<div class=".  "'"."account"."'"  .">".$discount_cost.""."</div><br>";
									}
								}
						}
					}
	  
	  ?>
		   	<br>
	<br>
	<br>
	<br>
	<br>
<a href="#top"><span style="text-align: center">
	    <input type="button" value="回到頂端"  name='out account'  style="width: 100px;height:50px;"/>
		  </span></a>
	
	</div>

	
<div class="del"></div>


	
	<p></p>
</body>
</html>