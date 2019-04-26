<?php
session_start();
include "includes/db_connect.php";

//定義常量，用來授權調用includes裡的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'\includes\common.inc.php';


$sql="SELECT * FROM `user` WHERE `mail`='".$_SESSION['user']."'";
$result=filterTable($sql);
$row=mysqli_fetch_array($result);
$sql0="SELECT `Image` From `img` WHERE `Name` = '".$_SESSION['user']."'";
$pic=new_fetch_array($sql0);


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
	<!-- -->

</head>
<body>
<?php require ROOT_PATH.'includes/header.inc.php';?>
	<form method="POST" action="member-fix.php">
	<div id="member">
		<div id="member_sidebar">
			<h2>個人中心</h2>
			<dl>
				<dt>帳號管理</dt>
				<dd><a href="member.php">個人訊息</a></dd>
				<dd><a href="#">修改資料</a></dd>
			</dl>

			<dl>
				<dt>其他管理</dt>
				<dd><a href="message_box.php">訊息查詢</a></dd>
				<dd><a href="#">好友設置</a></dd>
				<dd><a href="#">查詢花朵</a></dd>
				<dd><a href="#">個人相冊</a></dd>
			</dl>
		</div>
		<div id="member_main">
			<h2>會員管理中心</h2>
			<dl>
				<dd class='text'>使 用 者:<?php echo '<font class="put" style="margin-left:70px;">'.$_SESSION['user'].'</font>';?></dd>
				<dd>性　　別:<?php echo '<font class="put">'.$row['sex'].'</font>';?></dd>
				<dd>頭　　像:<img  src= <?php echo 'face/'.$pic[0].'.jpg>';?></dd>
				<dd>電子郵件:<?php echo '<font class="put">'.$row['mail'].'</font>';?></dd>
				<dd>主　　頁:<?php echo "<font class='put'>".$row['web'].'</font>';?></dd>
				<dd>L i n e:<?php echo '<font class="put" style="margin-left:80px;">'.$row['Line'].'</font>';?></dd>	
				<dd>註冊時間:<?php echo '<font class="put">'.$row['register_time'].'</font>';?></dd>
				<dd>身　　分:<?php echo '<font class="put">'.$row['identity'].'</font>';?></dd>
				<button type="submit" style="width:45px;height:25px;float:right;margin-top:10px;">編輯</button>
			</dl>
		</div>
	</div>
</form>


<?php require ROOT_PATH.'/includes/footer.inc.php';?>

</body>
</html>