<!doctype html>
<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>建立新商品</title>
<style type="text/css">
.home {
	font-family: "微軟正黑體", Arial;
	margin-left: auto;
	margin-right: auto;
	margin-top: auto;
	height: 100%;
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
	text-align: center;
	width: 350px;
}
.div4 {
	font-family: "微軟正黑體", Arial;
	font-size: 18px;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: auto;
	padding: auto;

	width: 300px;
	}
</style>
</head>

<body>
	<?php 
	 include("connect.php");
	session_start();
	 ob_start();
	
	  if(!isset($_COOKIE['root']))
	  {
		  echo  "<script>alert('系統已偵測到管理員尚未登入，將回到登入頁面進行登入。')</script>";
		  header('Refresh:0;url=./member_login.php');
		  return;
	  }
	
		if(isset($_POST['change']))
	{
		echo $_SESSION['change']=$_POST['change'];
		echo $change="'".$_POST['change']."'";
		echo $ID=$_POST['change'];
	}
	elseif(isset($_SESSION['change']))
	{
		$change="'".$_SESSION['change']."'";
		$ID=$_SESSION['change'];
	}
	else
	{
		$change="查無資料，請重新選擇商品。";
		$ID="";
	}
	

		if($ID!="")
	{
		$sql_NAME="SELECT commodity_name FROM `commodity` WHERE commodity_number = $change";//sql指令　品名
		$result_NAME=mysqli_query($db_link,$sql_NAME);//指定資料庫連結,打進去的指令
					
		while($row_result_NAME=mysqli_fetch_row($result_NAME))
		{
			foreach($row_result_NAME as $item_NAME => $NAME)
			{
				$NAME;
				$se_name=$NAME;
			}
		}
		
		$sql_total="SELECT total_amount FROM `commodity` WHERE commodity_number = $change";//sql指令　數量
		$result_total=mysqli_query($db_link,$sql_total);//指定資料庫連結,打進去的指令
					
		while($row_result_total=mysqli_fetch_row($result_total))
			{
				foreach($row_result_total as $item_total => $total)
				{
					$se_among=$total;
				}
			}
		
		$sql_price="SELECT price FROM `commodity` WHERE commodity_number =  $change";//sql指令　
		$result_price=mysqli_query($db_link,$sql_price);//指定資料庫連結,打進去的指令
					
		while($row_result_price=mysqli_fetch_row($result_price))
			{
			foreach($row_result_price as $item_price => $price)
				{
					$se_price=$price;
				}
		}

		$sql_commodity_introduce="SELECT commodity_introduce FROM `commodity` WHERE commodity_number =  $change";//sql指令　
		$result_commodity_introduce=mysqli_query($db_link,$sql_commodity_introduce);//指定資料庫連結,打進去的指令
		
		while($row_result_commodity_introduce=mysqli_fetch_row($result_commodity_introduce))
			{
			foreach($row_result_commodity_introduce as $item_commodity_introduce => $commodity_introduce)
				{
					$se_intro=$commodity_introduce;
				}
		}
	}
	else
	{
		$se_name="";
		$se_among="";
		$se_price="";
		$se_intro="";
	}
	?>
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
	  
   <form action="commodity_chaneg.php" method="post" id="form1" name="form1" enctype="multipart/form-data" onSubmit="return IsEmail() ">
   <h1>商品修改</h1><br>
	   <div class="div3">
	  商品號碼：<?php echo $change ?><br><br>	
	</div>
	<div class="div3">
	  商品名稱：<input type='text' name="name" value="<?php echo $se_name ?>" id="name" required><br><br>	
	</div>
	<div class="div3">
	  商品數量：<input type="text" name="among"id="among" value="<?php echo $se_among ?>" required min=0 pattern="[0-9]+" ><br><br>
	</div>
	<div class="div3">
	  商品價格：<input type="text" name="price" required id="price" value="<?php echo $se_price ?>" min=1 pattern="[0-9]+" ><br><br>
	</div>
	   <div class="div3">
	  上架：
	    <input id="male" name="bool" type="radio"  value="1" checked/>
          是
          <input id="female" name="bool" type="radio" value="0"/>
          否
		   <br><br>
	</div>
	<div class="div4">
	  商品敘述：<br><textarea class="div03"  name="intro" id="intro" rows="20"cols="40" ><?php echo $se_intro ?></textarea><br><br>
	</div>
	 <div class="div3">
	檔案上傳：<input type="file" accept='.jpg,.png,.jpeg' name='file' /><br>
		 (png,jpg)
	
	</div>
		<div class="div4">
			<br>
	  <input type="submit" value="修改" align="center"  name='go'/>
	</div><br>
	  </form>
	  <form action="commodity_control.php" method="post" id="form1" name="form1">
			<input type="submit" value="回到商品列表"  name='go'/>
		</form><br><br>
	  
	<?php  
		
	
	if($ID!=""and isset($_POST['name']))
	{	
		$name=$_POST['name'];
		$among=$_POST['among'];
		$price=$_POST['price'];
		$bool=$_POST['bool'];
		$intro=$_POST['intro'];
		
		$sql_name="'".$name."'";
		$sql_among="'".$among."'";
		$sql_price="'".$price."'";
		$sql_bool="'".$bool."'";
		$sql_intro="'".$intro."'";
		
		
		$sql_new="UPDATE `commodity` SET `commodity_name` = $sql_name, `commodity_introduce` = $sql_intro, `total_amount` = $sql_among, `price` = $sql_price, `bool` = $sql_bool WHERE `commodity`.`commodity_number` = $change;";
		$result2=mysqli_query($db_link,$sql_new);//指定資料庫連結,打進去的指令
		
		$Dir="image/";//路徑

	if(isset($_FILES["file"]['name']))
		{
		echo $_FILES["file"]['name'];
	 		$extension = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);//取出副檔名
			 if($extension!="jpg"&&
				$extension!="jpeg"&&
				$extension!="png"&&
			   $extension!="JPG"&&
			   $extension!="JPEG"&&
			   $extension!="PNG")
				{
					echo "<script>alert('提示：上傳檔案為非圖片檔案，圖片並未修改。')</script>";
				}
		else
		{
			echo "<script>alert('提示：上傳圖片成功。')</script>";
			$_FILES["file"]['name']=$ID.".jpg";
			move_uploaded_file($_FILES["file"]["tmp_name"],"image/".$_FILES["file"]["name"]);
		}
		
			
		}
		echo "<script>alert('商品修改成功。')</script>";
		unset($_SESSION['name']);
		unset($_SESSION['among']);
		unset($_SESSION['price']);
		unset($_SESSION['intro']);
	}
		  
	if($ID!=""and isset($_POST['name']))
	{	
	header('Refresh:0;url=./commodity_control.php');
	}
		   ob_end_flush();
	echo "<br><br>";
	?>
	


</div>
	
</body>
</html>