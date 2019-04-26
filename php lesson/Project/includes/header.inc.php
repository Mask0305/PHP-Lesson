<?php
error_reporting(0);

if(!defined("IN_TG")){
	exit("Access Defined!");
};
?>


<div id="header">
	<h1><a href="index.php">GSX-R150 論壇</a></h1>
		<ul>
			<li><a href="index.php">首頁</a></li>
			
			
			<?php
			if(isset($_COOKIE['username'])){
				echo "<li><a href=\"member.php\">個人中心</a></li>";
			}else{
				echo"<li><a href=\"register.php\">註冊</a></li>";
				echo"\n";
				echo"<li><a href=\"login.php\">登錄</a></li>";
			}
			?>
			<li><a href="blog.php?page=1">網友</a></li>
			<li>風格</li>
			<li>管理</li>
			<li><a href="logout.php">退出</a></li>
		</ul>
</div>