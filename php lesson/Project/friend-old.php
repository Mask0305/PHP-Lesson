<?php
session_start();
include "includes/db_connect.php";

//定義常量，用來授權調用includes裡的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'\includes\common.inc.php';

$page=$_GET['page'];
if(!$page){
	$page=1;
}
$pagesize=10;
$pagenum=($page-1)*$pagesize;
$uni = sha1(uniqid(rand(),true)); //唯一標識符
/*讀取圖片*/
$sql="SELECT `Image` From `img` LIMIT $pagenum,$pagesize";
$result=filterTable($sql);
$pic=array();
$i=0;
while($row=mysqli_fetch_array($result)){
	$pic[$i]=$row[0];
	$i++;
};

/*讀取名稱*/
$sql="SELECT `Username` From `account` LIMIT $pagenum,$pagesize";
$result=filterTable($sql);
$name=array();
$i=0;
while($row=mysqli_fetch_array($result)){
	$name[$i]=$row[0];
	$i++;
};


/*取得所有結果行數*/
$sql="SELECT * FROM `account`";
$result=filterTable($sql);
$row=mysqli_num_rows($result);
$pageabsolute=$row / $pagesize;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>好友</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/friend.css">
	<!-- <script type="text/javascript" src="js/register_rule.js"></script> -->
</head>
<body>
	<?php require ROOT_PATH.'includes/header.inc.php';?>

	<div id="friend">
		<h2>會員列表</h2>
		<?php for($i=0;$i<30;$i++){
			if($name[$i]==""){break;}
			?>
		<dl>
			<dd class="user"><?php echo $name[$i]; ?></dd>
			<dt><img src="face/<?php echo $pic[$i].'.jpg'; ?>"></dt>
			<dd class="message">發消息</dd>
			<dd class="add"> 加為好友</dd>
			<dd class="guest">寫留言</dd>
			<dd class="flower"> 給他送花</dd>
		</dl>
	<?php if($name[$i+1]==""){break;}};?>

		<div id="page_num">
			<ul>
				<?php for($i=1;$i<$pageabsolute+1;$i++){
					?>
				<li><a href='<?php echo 'friend.php?page='.$i;?>'<?php if($page==$i){echo 'class=\'selected\'';} ?>><?php echo $i;?></a></li>
					<?php }?>
			</ul>
	
		</div>
		<div id="page_text">
			<ul>
				<li><?php echo $_GET['page'].'/'.ceil($pageabsolute); ?>頁</li>
				<li>共有<strong><?php echo $row;?></strong>位會員</li>
				<?php
				
				if($_GET['page']==1){
					echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page=1">首頁 |</a></li>';
					echo "&nbsp";
					echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page='.($_GET['page']+1).'">下一頁 |</a></li>';
					echo "&nbsp";
					echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page='.(ceil($pageabsolute)).'">尾頁</a></li>';
				}else if($_GET['page']>1 && $_GET['page']<ceil($pageabsolute)){
					echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page=1">首頁 |</a></li>';
					echo "&nbsp";
					echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page='.($_GET['page']-1).'">上一頁 |</a></li>';
					echo "&nbsp";
					echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page='.($_GET['page']+1).'">下一頁 |</a></li>';
					echo "&nbsp";
					
					echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page='.(ceil($pageabsolute)).'">尾頁</a></li>';
				}else if($_GET['page']=ceil($pageabsolute)){
					echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page=1">首頁 |</a></li>';
					echo "&nbsp";
					echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page='.($_GET['page']-1).'">上一頁 |</a></li>';
					echo "&nbsp";
					echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page='.(ceil($pageabsolute)).'">尾頁</a></li>';
				}
				?>
			</ul>
		</div>
	</div>

<?php require ROOT_PATH.'/includes/footer.inc.php';?>

</body>
</html>


