<?php


session_start();
include "includes/db_connect.php";

//定義常量，用來授權調用includes裡的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'\includes\common.inc.php';

@$page=$_GET['page'];
if(!$page){
	$page=1;
}
$pagesize=10;
$pagenum=($page-1)*$pagesize;

$sql0="SELECT `Username` FROM `account` WHERE `Email`='".$_SESSION['user']."'";
$u_name=new_fetch_array($sql0);

$sql="SELECT * FROM `message` WHERE `recipient` = '".$u_name[0]."'";
$result=filterTable($sql);
$row=mysqli_num_rows($result);
$pageabsolute=$row / $pagesize;


$sql="SELECT * FROM `message` WHERE `recipient` = '".$u_name[0]."' LIMIT $pagenum,$pagesize ";
$result=filterTable($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>訊息盒子</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/member.css" />
	<link rel="stylesheet" type="text/css" href="css/member_message.css" />

	 <script type="text/javascript" src="js/message.js"></script>
<title>多用户留言系统--短信列表</title>
<?php 
	require ROOT_PATH.'includes/title.inc.php';
?>
</head>
<body>
<?php 
	require ROOT_PATH.'includes/header.inc.php';
?>

<div id="member">
<?php 
	require ROOT_PATH.'includes/member.inc.php';
?>
	<div id="member_main">
		<h2>訊息盒子</h2>
		<table cellspacing="1">
			<tr><th>發訊者</th><th>訊息内容</th><th>時間</th><th>管理</th></tr>
			<?php 
			while($roow = mysqli_fetch_array($result)){?>
			<tr><td><?php echo $roow['sender']?></td><td><?php echo '<a href="message_detail.php?num='.$roow['num'].'">'.mb_substr($roow['detail'],0,15).'</a>';if(strlen($roow['detail'])>45){echo '...';}?></td><td><?php echo $roow['time']?></td><td><input type="checkbox" /></td></tr>
			<?php }
			?>
		</table>
		<?php
		if($row == 0){echo '<font style="margin-left:170px;">還沒有人傳訊息給你,快去交些朋友吧!</font>';};  
		paging(1);?>
	</div>
</div>

<?php 
	require ROOT_PATH.'includes/footer.inc.php';
?>
</body>
</html>