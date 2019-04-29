<?php
	


// if(!defined("IN_TG")){
// 	exit("Access Defined!");
// };


function alert_back($_info) {
	echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
	exit();
}

function _runtime(){
	$_mtime=explode(' ',microtime());
	return $_mtime[1]+$_mtime[0];

}

function _check_code($_first_code,$_end_code){//輸入的驗證碼，產生的驗證碼
	if($_first_code!=$_end_code){
		_alert_bcak('驗證碼不正確');
	}

}

function _mysqli_string($_string) {
	//get_magic_quotes_gpc()如果开启状态，那么就不需要转义
		if (is_array($_string)) {
			foreach ($_string as $_key => $_value) {
				$_string[$_key] = _mysql_string($_value);   //这里采用了递归，如果不理解，那么还是用htmlspecialchars
			}
		} else {
			$con = mysqli_connect('localhost','root','','motorcycle');
			$_string = mysqli_real_escape_string($con,$_string);
		}
	return $_string;
}


function new_fetch_array($_sql) {
	return mysqli_fetch_array(filterTable($_sql));	
	}
	
function _fetch_array($con,$_sql) {
	return mysqli_fetch_array(_query($con,$_sql));	
	}

function _query($con,$_sql) {
	if (!$_result = mysqli_query($con,$_sql)){
		exit('SQL執行失败');
	}else{
		$rows=mysqli_query($con,$_sql);
		return $rows;
	}
}

function _setcookie($username,$uniqid){
	setcookie('username',$_SESSION['user']);
	setcookie('uniqid',$uniqid);
	/*
	switch($_time){
		case '0':
			setcookie('username',$_SESSION['user']);
			setcookie('uniqid',$uniqid);
			break;
		case'1':
			setcookie('username',$_SESSION['user'],time()+2592000);
			setcookie('uniqid',$uniqid,time()+86400);
			break;
	}*/
}

function _session_destroy(){
	session_destroy();
}

function _unsetcookies(){
	setcookie('username','');
	setcookie('uniqid','');
	_session_destroy();
	echo"<script>alert('成功登出');parent.location.href=\"index.php\";</script>";
}


function paging($type){

	global $pageabsolute,$page,$row;
	if($type==1){
		echo'<div id="page_num">';
			echo'<ul>';
			for($i=1;$i<$pageabsolute+1;$i++){
				echo'<li><a href="'.$_SERVER['SCRIPT_NAME'].'?page='.$i.'"';
				if($page==$i){echo 'class=\'selected\'';}
					echo '>'.$i.'</a></li>';
					 }
			echo'</ul>';
		echo'</div>';
	}elseif($type==2){
		
	echo '<div id="page_text">';
		echo'<ul>';
			echo'<li>'.$_GET['page'].'/'.ceil($pageabsolute).'頁 |</li>';
			echo"\n\n";
			echo'<li>共有<strong>'.$row.'</strong>位會員 |</li>';
			echo"\n\n";
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
			echo'</ul>';
		echo'</div>';
	}
}


	function _alert($str,$path){
		echo "<script> alert(\"$str\");parent.location.href='../$path';</script>";
	}

	function _alert_close($_info){
		echo "<script type='text/javascript'>alert('$_info');window.close();</script>";
	}
?>