<?php


session_start();
include "includes/db_connect.php";

//定義常量，用來授權調用includes裡的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'\includes\common.inc.php';

/*分頁使用的變量*/
@$page=$_GET['page'];
if(!$page){
	$page=1;
}
$pagesize=10;
$pagenum=($page-1)*$pagesize;

/*選出與登入email相對應的使用者名稱*/
$sql0="SELECT `Username` FROM `account` WHERE `Email`='".$_SESSION['user']."'";
$u_name=new_fetch_array($sql0);

/*只選出是寄給使用者的訊息*/
$sql="SELECT * FROM `message` WHERE `recipient` = '".$u_name[0]."'";
$result=filterTable($sql);
$row=mysqli_num_rows($result);
$pageabsolute=$row / $pagesize;

/*列出訊息*/
$sql="SELECT * FROM `message` WHERE `recipient` = '".$u_name[0]."' LIMIT $pagenum,$pagesize ";
$result=filterTable($sql);

/*把sender顯示的Email換成username*/
function change($sender){
$sql="SELECT `Username` FROM `account` WHERE `Email`='".$sender."'";
$result=new_fetch_array($sql);
return $result[0];
}

/*批量刪除訊息*/
if(@$_GET['action']=='delete' && isset($_POST['ids'])){
	$_clean=array();
	$_clean['ids'] = _mysqli_string(implode(',',$_POST['ids']));

	print_r($_clean['ids']);
	 $sql = "DELETE FROM `message` WHERE `num` IN ({$_clean['ids']})";
	 $result=filterTable($sql);
	 _alert('刪除成功!','Project/message_box.php?page=1');
}

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

	 <script type="text/javascript" src="js/message_box.js"></script>
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
		<form method="POST" action="?action=delete">
			<table cellspacing="1">
				<tr><th>發訊者</th><th>訊息内容</th><th>狀態</th><th>時間</th><th>管理</th></tr>
				<?php 
				while($roow = mysqli_fetch_array($result)){?>
				<tr>
					<td><?php echo change($roow['sender']);?></td>
					<td><?php 
							if($roow['state']==0){echo '<strong>';}
							echo '<a href="message_detail.php?num='.$roow['num'].'">'.mb_substr($roow['detail'],0,15).'</a>';
							if(strlen($roow['detail'])>45){echo '...';}
							if($roow['state']==0){echo '</strong>';}?>
					</td>
					<td><?php if($roow['state']==1){echo '<img src="images/noread.gif">';}else{echo '<img src="images/read.gif">';}?></td>
					<td><?php echo $roow['time']?></td>
					<td><input type="checkbox" name="ids[]" value="<?php echo $roow['num'];?>" /></td>
				</tr>
				<?php }
				?>
				<tr><td colspan="4"><label for="all" >全選<input type="checkbox" name="chkall" id="all" /></label><input type="submit" value="批量刪除" /></td></tr>
			</table>
		</form>
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