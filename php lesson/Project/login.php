<?php
session_start();

//定義常量，用來授權調用includes裡的文件
define('IN_TG',true);

//引入公共文件
require dirname(__FILE__).'\includes\common.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>GSX-R150 用戶登錄</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="js/logins_rule.js"></script>
	<!-- -->

</head>
<body>
<?php require ROOT_PATH.'includes/header.inc.php';?>
	
	<div id='login'>
		<h2>登錄</h2>
				<dl>
					<form method="POST" name='send' onsubmit="return chk()" action="includes/main.php">
					<dd>E-mail :　</dd>
					<dd><input type="text" name="email" class="text"></dd>
					<dd>Password :</dd>
					<dd><input type="password" name="Pwd" class="text"></dd>
					<dd>Verification code :　</dd>		
					<dd style="margin-top:-8px;"><input type="text" name="Vcode" class="yzm"/>&nbsp;<img  src="checkCode.php" id="code"></dd>
					<dd>Remember :</dd>
					<dd>記住我<input type="radio" name="time" value="1" checked="checked">不要記住<input type="radio" name="time" value="0"></dd>
					<button type="submit" class="submit" name="login">登入</button>
					</form>
					<a href="register.php"><button type="submit" class="submit">註冊</button></a>	
				</dl>
		
		
	</div>


<?php require ROOT_PATH.'/includes/footer.inc.php';?>

</body>
</html>