<!doctype html>
<html>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/dawning-of-a-new-day:n4:default.js" type="text/javascript"></script>

<head>
<meta charset="utf-8">
<title>會員註冊</title>
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
.div4 {
	font-family: "微軟正黑體", Arial;
	font-size: 18px;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: auto;
	padding: auto;
	text-align: center;
	width: 300px;
	}
</style>
</head>

<body>
		<?php
	session_start();
	if(isset($_COOKIE['member']))
	{
			echo "<script>alert('您已登入，將回到商品總覽頁面。')</script>";
			header('Refresh:0;url=./home.php');
			return;
	}
	
	if(isset($_COOKIE['root']))
	  {
		  echo  "<script>alert('系統已偵測到管理員已登入，如要進行測試請退出帳號。')</script>";
		  header('Refresh:0;url=./member_login.php');
		  return;
	  }
	
	if(isset($_SESSION['name']))
	{
		$name=$_SESSION['name'];
		$account=$_SESSION['account'];
		$phone=$_SESSION['phone'];
		$email=$_SESSION['email'];
	}
	else
	{
		$name="";
		$account="";
		$phone="";
		$email="";
	}
	?>
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
	  
   <form action="member_register_complete.php" method="post" id="form1" name="form1"  onSubmit="return IsEmail() ">
   <h1>註冊帳號</h1><br>
	<div class="div3">
	  姓名：<input type='text' name="name"  id="name"  placeholder='註冊中文姓名' value="<?php echo $name ?>" required><br><br>	
	</div>
	<div class="div3">
	  手機號碼：<input type="text" name="phone" placeholder="手機號碼" pattern="09\d{8}"/ id="phone" value="<?php echo $phone ?>"    required  ><br><br>
	</div>
	<div class="div3">
	  E-mail：<input type="email" name="Email" required placeholder="Email"  id="Email" value="<?php echo $email ?>"  pattern=" ^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$" ><br><br>
	</div>
	<div class="div3">
	  帳號：<input type="text" name="account" required placeholder="帳號(小寫英文及數字)" minlength="6" maxlength="20" id="account" value="<?php echo $account ?>" pattern="[a-z0-9]+" ><br><br>
	</div>
	<div class="div3">
	   密碼：<input type="password"  name="password" minlength="6" required  maxlength="20"  placeholder="密碼"  id="password"  pattern="[a-zA-Z0-9]+"  ><br><br>
	</div>
	<div class="div3">
	   確認密碼：<input type="password"  name="password2" required maxlength="20"  placeholder="確認密碼"  id="password2" minlength="6"  pattern="[a-zA-Z0-9]+"  ><br><br>
	</div>
	<div class="div4" align="center">
	  性別：<input id="male" name="gender" type="radio" value="male" checked/>
          男
          <input id="female" name="gender" type="radio" value="female"/>
          女
	</div>
		<script>
			
			function IsEmail() 
			{
				email=document.getElementById("Email").value;
				var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if(!regex.test(email)) 
				{
					alert('請輸入正確、正常的電子信箱，EX：email1234@gmail.com');
					return false;
				}else
				{
					return true;
				}
				
				pass1=document.getElementById("password").value;
				pass2=document.getElementById("password2").value;
				
				if(pass1!=pass2)
				{
					alert('密碼不相同，請重新檢查。');
					return false;
				}else
				{
					return true;
				}
			}
			
			function illustrate()//說明
			{
				alert('「手機號碼」限定使用09開頭之手機號碼，\n「E-mail」請包含＠以及前後的字元 EX：email1234@gmail.com，\n「帳號、密碼」限定使用大小寫英文以及數字，長度皆限定最少使用6字元，最多為20字元。\n');			
			}
			
		</script>
	
		<div class="div4">
			<br>
	  <input type="submit" value="註冊" align="center"  name='go'/>
	</div>
	  </form>
  </div>

</div>
	
</body>
</html>