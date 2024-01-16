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
	
	  if(!isset($_COOKIE['root']))
	  {
		  echo  "<script>alert('系統已偵測到管理員尚未登入，將回到登入頁面進行登入。')</script>";
		  header('Refresh:0;url=./member_login.php');
		  return;
	  }
	
		if(isset($_SESSION['name']))
	{
		$se_name=$_SESSION['name'];
		$se_among=$_SESSION['among'];
		$se_price=$_SESSION['price'];
		$se_intro=$_SESSION['intro'];
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
	  
   <form action="commodity_new.php" method="post" id="form1" name="form1" enctype="multipart/form-data" onSubmit="return IsEmail() ">
   <h1>建立商品</h1><br>
	<div class="div3">
	  商品名稱：<input type='text' name="name" value="<?php echo $se_name ?>" id="name" required><br><br>	
	</div>
	<div class="div3">
	  商品數量：<input type="number" name="among"id="among" value="<?php echo $se_among ?>" required min=0 pattern="[0-9]+" ><br><br>
	</div>
	<div class="div3">
	  商品價格：<input type="number" name="price" required id="price" value="<?php echo $se_price ?>" min=1 pattern="[0-9]+" ><br><br>
	</div>
	   <div class="div3">
	  是否直接上架：<input id="male" name="bool" type="radio"  value="1" checked/>
          是
          <input id="female" name="bool" type="radio" value="0"/>
          否
		   <br><br>
	</div>
	<div class="div4">
	  商品敘述：<br><textarea class="div03"  name="intro" id="intro" rows="20"cols="40" ><?php echo $se_intro ?></textarea><br><br>
	</div>
	 <div class="div3">
	檔案上傳：<input type="file" accept='.jpg,.png,.jpeg' name='file' required/><br>
		 (png,jpg)
	
	</div>
		<div class="div4">
			<br>
	  <input type="submit" value="建立" align="center"  name='go'/>
	</div>
	  </form><br>
	<?php  
		if(isset($_POST['name']))
	{
		$_SESSION['name']=$_POST['name'];
		$_SESSION['among']=$_POST['among'];
		$_SESSION['price']=$_POST['price'];
		$_SESSION['intro']=$_POST['intro'];
		
		$name=$_POST['name'];
		$among=$_POST['among'];
		$price=$_POST['price'];
		$intro=$_POST['intro'];
		$bool=$_POST['bool'];
	}
	else
	{
		echo "無填寫資料。";
		return;
	}
	
	$Dir="image/";//路徑

	  if(!isset($_FILES["file"]["name"]))
				{
					echo "圖片不存在。";
					return;
				}
	
	 $extension = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);//取出副檔名
				 
			 if($extension!="jpg"&&
				$extension!="jpeg"&&
				$extension!="png"&&
			   $extension!="JPG"&&
			   $extension!="JPEG"&&
			   $extension!="PNG")
				{
					echo "上傳檔案為非圖片檔案，無法上傳。";
					return;
				}
	

	if(isset($_POST['name']))
	{	
		$sql_query2="SELECT `commodity_name` FROM `commodity`";//sql指令 確認姓名
		$result2=mysqli_query($db_link,$sql_query2);//指定資料庫連結,打進去的指令
		
		while($row_result2=mysqli_fetch_row($result2))//姓名確認
		{
			foreach($row_result2 as $item2 => $value2)
			{
				if($value2==$name)
				{
					echo "已有此商品名稱，請替換名稱。";
					return;
				}
			}
		}
	
		$sql_name="'".$name."'";
		$sql_among="'".$among."'";
		$sql_price="'".$price."'";
		$sql_bool="'".$bool."'";
		$sql_intro="'".$intro."'";
		$sql_new="INSERT INTO `commodity` (`commodity_number`, `commodity_name`, `commodity_introduce`, `total_amount`, `price`, `bool`) VALUES (NULL, $sql_name, $sql_intro, $sql_among, $sql_price, $sql_bool)";
		$result2=mysqli_query($db_link,$sql_new);//指定資料庫連結,打進去的指令
		

		$sql_ID="SELECT commodity_number FROM `commodity` WHERE commodity_name = $sql_name";//sql指令　ID
		$result_ID=mysqli_query($db_link,$sql_ID);//指定資料庫連結,打進去的指令
		
		while($row_result_ID=mysqli_fetch_row($result_ID))//姓名確認
		{
			foreach($row_result_ID as $item_ID => $value_ID)
			{
				$_FILES["file"]['name']=$value_ID."."."jpg";
			}
		}
	move_uploaded_file($_FILES["file"]["tmp_name"],"image/".$_FILES["file"]["name"]);
		unset($_SESSION['name']);
		unset($_SESSION['among']);
		unset($_SESSION['price']);
		unset($_SESSION['intro']);
		echo "商品建立成功。";
		
	}
	?>
	


</div>
	
</body>
</html>