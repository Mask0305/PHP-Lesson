<?php
session_start();

define("IN_TG",true);

include "includes/db_connect.php";
require dirname(__FILE__).'/includes/common.inc.php';//轉換成硬路徑


if(@$_SESSION['user']!=""){
		$sql="SELECT `uniqid` FROM `account` WHERE `Email`='".$_SESSION['user']."'";
		$result=filterTable($sql);
		$rows=mysqli_fetch_array($result);
		_setcookie($_SESSION['user'],$rows['uniqid']);
};
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="shortcut icon" href="Ahri Popstar.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background:;">

<?php require ROOT_PATH.'includes/header.inc.php';?>

<div id="list">
	<h2>帖子列表</h2>
</div>

<div id="user">
	<h2>我的資料</h2>
	<p><?php 

	if(!isset($_COOKIE['username'])){
		echo "您還沒登入!";	
		
	}else{
		echo $_SESSION['user'];
	}  
	?></p>
</div>

<div id="pics">
	<h2>最新圖片</h2>
</div>

<?php require ROOT_PATH.'/includes/footer.inc.php';?>
</div>
</body>
</html>