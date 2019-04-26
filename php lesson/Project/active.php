<?php
//點擊連結激活帳戶
//
session_start();
include "includes/db_connect.php";


//定義常量，用來授權調用includes裡的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'\includes\common.inc.php';   //裡頭包含global.func.php

//判斷是否是非法進入
if($_GET['active']==""){echo"<script>alert('非法進入');parent.location.href=\"../Project/register.php\";</script>";};
//開始激活處理
$con = mysqli_connect('localhost','root','','motorcycle'); //配合function打得
if(isset($_GET['action'])&&($_GET['active'])&&$_GET['action']=='ok'){
	if(_fetch_array($con,"SELECT `uniqid` FROM `account` WHERE `uniqid`='".$_GET['active']."' ")){	//global.func.php裡的function
		$sql="UPDATE `account` SET `account`.`active`='ok' WHERE `uniqid`='".$_GET['active']."'";	//用途為判斷有無對應的識別碼
		$result=filterTable($sql);
		echo"<script>alert('激活成功');parent.location.href=\"../Project/login.php\";</script>";
	// $sql="SELECT `uniqid` FROM `account` WHERE `uniqid`='".$_GET['active']."'";
	// $result=filterTable($sql);
	// if(!$result=""){
	// 	$sql="UPDATE `account` SET `account`.`uniqid`=Null WHERE `uniqid`='".$_GET['active']."'";
	//  	$result=filterTable($sql);
	// }
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>GSX-R150 用戶驗證</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/active.css">
	<script type="text/javascript" src="js/rule.js"></script>
	<!-- -->

</head>
<body>
<?php require ROOT_PATH.'includes/header.inc.php';?>
	
	<div id='active'>
		<h2>激活帳戶</h2>
		<p><a href="active.php?action=ok&amp;active=<?php echo $_GET['active'] ?>"><?php echo 'http://'.$_SERVER["HTTP_HOST"].$_SERVER['PHP_SELF'];?>?action=ok&amp;active=<?php echo $_GET['active']; ?></a></p>
	</div>


<?php require ROOT_PATH.'/includes/footer.inc.php';?>

</body>
</html>