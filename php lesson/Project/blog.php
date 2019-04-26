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

$sql="SELECT `Id` From `account`";
$result=filterTable($sql);
$uid=array();
$i=0;
while($row=mysqli_fetch_array($result)){
	$uid[$i]=$row[0];
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
	 <script type="text/javascript" src="js/blog.js"></script>
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
			<dd class="message"><a href="###" name="message" title="<?php echo $uid[$i];?>">發消息</a></dd>
			<dd class="add"> 加為好友</dd>
			<dd class="guest">寫留言</dd>
			<dd class="flower"> 給他送花</dd>
		</dl>
	<?php if($name[$i+1]==""){break;}};
		paging(1);
		paging(2);
	?>

	</div>

<?php require ROOT_PATH.'/includes/footer.inc.php';?>

</body>
</html>


