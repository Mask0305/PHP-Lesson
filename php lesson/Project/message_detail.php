<?php


session_start();
include "includes/db_connect.php";

//定義常量，用來授權調用includes裡的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'\includes\common.inc.php';

$sql="SELECT * FROM `message` WHERE `num` = '".$_GET['num']."'";
$row = new_fetch_array($sql);

function change($sender){
$sql="SELECT `Username` FROM `account` WHERE `Email`='".$sender."'";
$result=new_fetch_array($sql);
return $result[0];
}

/*更改狀態 未讀->已讀*/
$sql="UPDATE `message` SET `message`.`state` = '1' WHERE `num`='".$_GET['num']."'";
$result = filterTable($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>訊息盒子</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/member.css" />

	<link rel="stylesheet" type="text/css" href="css/member_message_detail.css" />

	 <script type="text/javascript" src="js/message.js"></script>
<title>多用户留言系统--短信列表</title>

</head>
<body>
<?php 
	require ROOT_PATH.'includes/header.inc.php';
?>

<div id="member">
<?php 
	require ROOT_PATH.'includes/member.inc.php';
?>
	<form method="POST" action="includes/main.php">
		<div id="member_main">
			<h2>訊息內容</h2>
			<dl>
				<input type="hidden" name="mesID" value="<?php echo $_GET['num']; ?>" />
				<dd>發 訊 人：<?php echo change($row['sender']).' ( '.$row['sender'].' )'; ?></dd>
				<dd>内　　容：<?php echo '<br>'.$row['detail']; ?></dd>
				<dd>發訊時間：<?php echo $row['time']; ?></dd>
				<input class="btn" style="width:70px;height:30px; margin-left:5px; background:#888888; color:white;" type="button"  value="返回盒子" onclick="javascript:history.back();" />
				<input class="btn" style="width:70px;height:30px; background:#888888; color:white;" type="submit" name="delmes"  value="刪除訊息" />
			</dl>
		</div>
	</form>	
</div>

<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>