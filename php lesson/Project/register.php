<?php
session_start();

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
	<title>GSX-R150 用戶註冊</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<script type="text/javascript" src="js/register_rule.js"></script>
	<!-- -->

</head>
<body>
<?php require ROOT_PATH.'includes/header.inc.php';?>
	
<div id="register">
	

<h2>會員註冊</h2>

<form method="POST" name='send' onsubmit="return chk()" action="includes/main.php" enctype="multipart/form-data">
	<input type="hidden" name="uniqid" value="<?php echo $uni;  ?>" />
	<dl>
		<dt>請輸入內容</dt>
		<dd>User Name :</dd>
		<dd><input type="text" name="username" class="text"></dd>	 
		<dd>E-mail :　</dd>
		<dd><input type="text" name="email" class="text"></dd>	</dd>
		<dd>Password :　</dd>
		<dd><input type="password" name="Pwd" class="text"></dd>
		<dd>Re-Password:　</dd>
		<dd><input type="password" name="Repwd" class="text"></dd>
		<dd>Password Hint :　</dd>
		<dd><input type="text" name="pwdHint" class="text"></dd>
		<dd>Password Answer :　</dd>
		<dd><input type="text" name="pwdAns" class="text"></dd>
		<dd>Verification code :　</dd>		
		<dd style="margin-top:-8px;"><input type="text" name="Vcode" class="yzm"/>&nbsp;<img  src="checkCode.php" id="code"></dd>
		<dd>上傳大頭貼：　</dd>
		<dd><input type="file" name="upfile[]" multiple="multiple"></dd>
		<button type="submit" class="submit" name="register">註冊</button>
	</dl>
		
		



</form>

</div>


<?php require ROOT_PATH.'/includes/footer.inc.php';?>

</body>
</html>