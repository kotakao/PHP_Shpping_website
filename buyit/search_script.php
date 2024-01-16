<?php
include("connect.php");
if(isset($_POST["searchgo"])&&$_POST["searchgo"]!=""){
	include("connect.php");
	$search=$_POST["searchgo"];
	$sql_ID="SELECT commodity_name FROM `commodity` WHERE `commodity_name` LIKE '%$search%' AND `bool` = 1";//sql指令　	
	$result_ID=mysqli_query($db_link,$sql_ID);//指定資料庫連結,打進去的指令
	$search_ok=array();
	
	while($row_result_ID=mysqli_fetch_row($result_ID))
	{
	  foreach($row_result_ID as $item_ID => $ID)
	  {
		  array_push($search_ok,$ID);
		  //$search_ok = $ID;	
	  }
	}
	if(isset($search_ok)&&$search_ok!=[]){
	echo json_encode($search_ok);
}}

?>