<?php
session_start();
include "includes/db_connect.php";

//定義常量，用來授權調用includes裡的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'\includes\common.inc.php';

$uni = sha1(uniqid(rand(),true)); //唯一標識符
$_SESSION['uniqid']=$uni;

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>GSX-R150 個人中心</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/member.css">
	<script type="text/javascript" src="js/register_rule.js"></script>
	<script type="text/javascript">
		window.onload=function(){
	document.getElementById("username").focus();
	};
	</script>
	<!-- -->

</head>
<body>
<?php require ROOT_PATH.'includes/header.inc.php';?>
	<form method="POST" action="includes/main.php" name="send">
	<div id="member">
		<div id="member_sidebar">
			<h2>中心導航</h2>
			<dl>
				<dt>帳號管理</dt>
				<dd><a href="#">個人訊息</a></dd>
				<dd><a href="#">修改資料</a></dd>
			</dl>

			<dl>
				<dt>其他管理</dt>
				<dd><a href="#">訊息查詢</a></dd>
				<dd><a href="#">好友設置</a></dd>
				<dd><a href="#">查詢花朵</a></dd>
				<dd><a href="#">個人相冊</a></dd>
			</dl>
		</div>
		<div id="member_main">
			<h2>會員管理中心</h2>
			<dl>
				<dd>使 用 者:<input id="username" type="text" name="username" class="text" style="margin-left:17px"></dd>
				<dd>性　　別:<input type="radio" name="sex" value="1" style="margin-left:30px"/>男<input type="radio" name="sex" value="0" style="margin-left:10px"/>女</dd>
				<dd>頭　　像:<input type="text" name="img" class="text"></dd>
				<dd>電子郵件:<input type="text" name="email" class="text"></dd>
				<dd>主　　頁:<input type="text" name="web_page" class="text"></dd>	
				<dd>L i n e:<input type="text" name="Line" class="text" style="margin-left:30px"></dd>
				<dd>註冊時間:<input type="text" name="gister_time" class="text" disabled="disabled"></dd> 
				<dd>身　　分:<input type="text" name="identity" class="text" disabled="disabled"></dd>
				<button type="submit" name="updat" style="width:45px;height:25px;float:right;margin-top:10px;">編輯</button>
			</dl>
		</div>
	</div>
</form>


<?php require ROOT_PATH.'/includes/footer.inc.php';?>

</body>
</html>