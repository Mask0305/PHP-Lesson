
<?php

	// ob_start(); //打開緩衝區
	
	// echo "Hellon"; //輸出
	// header("location:ch10-時間.php"); //把瀏覽器重定向到index.php
	// ob_end_flush();//輸出全部內容到瀏覽器

	if(isset($_POST['go'])){
			
			$a=$_POST['email'];
			if(preg_match('/([\w\.]{2,255})@([\w\-]{1,255}).([a-z]{2,4})/',$a)) {
				echo '电子邮件合法';
			} elseif($a == "") {
				echo '电子邮件不能為空';
			} else{
				echo '電子郵件錯誤';
			}

	}
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
	<form method="POST">
		<input type="text" name="email" >
		<button type="submit" name="go">送出</button>
	</form>
	
</body>
</html>