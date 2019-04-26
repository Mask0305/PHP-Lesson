<?php
session_start();
include "includes/db_connect.php";

//定義常量，用來授權調用includes裡的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'\includes\common.inc.php';

if(!isset($_COOKIE['username'])){
	_alert_close('尚未登入');
}

$sql = "SELECT `Username` FROM `account` WHERE `id` = '".$_GET['id']."'";
$row = new_fetch_array($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>傳訊息</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/message.css">
	 <script type="text/javascript" src="js/message.js"></script>
</head>
<body>

	<div id="message">
	<h3>傳訊息</h3>
	<form method="POST" action="includes/main.php">
		<dl>
			<input type="hidden" name="RecID" value="<?php echo $_GET['id']; ?>" />
			<dd><input name="oper" type="text" class="text" value="<?php echo $row[0];?>" readonly="readonly" style="border-style:none;"/></dd>
			<dd><textarea name="detail"></textarea></dd>
			<dd><input type="submit" class="submit" name="send" value="發送!"></dd>
		</dl>
	</form>
	</div>

	

</body>
</html>