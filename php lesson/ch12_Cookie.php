
<?php

	/* 有期限
	setcookie('Test','Mask',time()+(7*24*60*60));
	*/

	setcookie('User','Mask');
	//讀取本機cookie,使用一個超級全局變量$_COOKIE
	echo $_COOKIE['User'];
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
</body>
</html>