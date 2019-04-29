<?php

include "db_connect.php";
require 'common.inc.php';
define('IN_TG',true);

$con = mysqli_connect('localhost','root','','motorcycle');
session_start();



if(isset($_POST['register'])){
	Register();
}

if(isset($_POST['login'])){
	Login();
}

if(isset($_POST['updat'])){
	updat();
}

if(isset($_POST['send'])){
	send();
}

if(isset($_POST['delmes'])){
	$mesId=$_POST['mesID'];
	$sql="DELETE FROM `message` WHERE `num` = '".$mesId."'";
	$result=filterTable($sql);
	_alert('刪除成功','message_box.php');
}


//--------------------------------------
function _affected_rows($sql){
	$con = mysqli_connect('localhost','root','','motorcycle');
	mysqli_query($con, "SET NAMES 'utf8'");
	mysqli_query($con, $sql);
	return mysqli_affected_rows($con);
}

//--------------------------------------


function Register(){
	$name=$_POST['username'];
	$email=$_POST['email'];
	$pwd=sha1($_POST['Pwd']);		//加密後儲存
	$pwdHint=$_POST['pwdHint'];
	$pwdAns=$_POST['pwdAns'];
	$Vcode=$_POST['Vcode'];
	$unicode=$_POST['uniqid'];

	$type=$_FILES['upfile']['type'];
	
	if($Vcode==$_SESSION['checkNum'] && $unicode == $_SESSION['uniqid'] ){
		$sql="INSERT INTO `account` (`Username`,`Email`,`Password`,`Hint`,`Answer`,`uniqid`) VALUES ('".$name."','".$email."','".$pwd."','".$pwdHint."','".$pwdAns."','".$unicode."')";
		$result=filterTable($sql);
		//大頭貼處理
		$i=0;
		while($i<count($_FILES['upfile']['name'])){

	 	$newname=$email.'.jpg';

	 	move_uploaded_file($_FILES['upfile']['tmp_name'][$i],"../face/".$newname.".jpg");

	 	$sql="INSERT INTO `img`(`Name`,`Image`) VALUES ('".$email."','".$newname."')";
	 	$result=filterTable($sql);
	 	$i++;
		}
		//要用GET,所以這裡要將uniqid(唯一標識符)一併傳去active
		echo"<script>alert('註冊成功');parent.location.href=\"../active.php?active=$unicode\";</script>";	
		//echo"alert('註冊成功');parent.location.href='../active.php?active='".$unicode;
	}else{
		echo "<script> alert('註冊失敗，請檢查各個欄位');parent.location.href='../register.php';</script>";
	}
}

function Login(){

	$email=$_POST['email'];
	$password=sha1($_POST['Pwd']);
	$vcode=$_POST['Vcode'];

	if($vcode==$_SESSION['checkNum']){
		global $con;	//呼叫function外的變數
		if((_fetch_array($con,"SELECT `Email` FROM `account` WHERE `Email`='".$email."'")) && (_fetch_array($con,"SELECT `Password` FROM `account` WHERE `Password`='".$password."'"))){
			$_SESSION['user']=$email;
			echo"<script>alert('登入成功');parent.location.href=\"../index.php\";</script>";
		}else{
			echo"<script>alert('登入失敗');parent.location.href=\"../login.php\";</script>";
		}
	echo"<script>alert('登入失敗');parent.location.href=\"../login.php\";</script>";
		}else{
		echo"<script>alert('驗證碼錯誤');parent.location.href=\"../login.php\";</script>";
	}
}

function updat(){
	$username=$_POST['username'];
	switch($_POST['sex']){
		case 0:
			$sex="女";
			break;
		case 1;
			$sex="男";
			break;
		}
	$email=$_POST['email'];
	$web=$_POST['web_page'];
	$Line=$_POST['Line'];
	$identity='普通會員';
	$time=date('Y-m-d H:i:s');

	$sql0="SELECT `Id` FROM `account` WHERE `Email`='".$_SESSION['user']."'";//抓account ID
	$a_id=new_fetch_array($sql0);	//account ID
	$sql1="SELECT `Id` FROM `user` WHERE `Id`='".$a_id[0]."'";//對比user裡有沒有
	$u_id=new_fetch_array($sql1);
	$sql2="INSERT INTO `user`(`Id`,`user`,`sex`,`mail`,`web`,`Line`,`identity`,`register_time`)VALUES('".$a_id[0]."','".$username."','".$sex."','".$email."','".$web."','".$Line."','".$identity."','".$time."')";
	$sql3="UPDATE `user` SET `user`.`username`='$username',
							 `user`.`sex`='$sex',
							 `user`.`email`='$email',
							 `user`.`web`='$web',
							 `user`.`Line`='$Line',
							 `user`.`register`='$time'
							 WHERE `Id`='".$u_id."'";
	
	

	if(!$u_id){
		$result=filterTable($sql2); 		//Insert
		_alert('設定成功','member.php');
	}elseif($u_id==$a_id){
		$result=filterTable($sql3);
		_alert('修改成功','member.php');		//Update
	}else{
		_alert('修改失敗!','member.php');
	}
}

function send(){
	$rec = $_POST['oper']; 		//接收者
	$detail=$_POST['detail'];	//訊息內容
	$recid = $_POST['RecID'];   //接收者id
	date_default_timezone_set('Asia/Taipei');
	$time=date('Y-m-d H:i:s');	//傳送時間

	$sql1="SELECT `Id` FROM `account` WHERE `Email`='".$_SESSION['user']."'";	//發送者ID
	$u_name=new_fetch_array($sql1);
	$sql2="INSERT INTO `message`(`sender_Id`,`sender`,`recipient_Id`,`recipient`,`detail`,`time`) VALUES('".$u_name[0]."','".$_SESSION['user']."','".$recid."','".$rec."','".$detail."','".$time."')";
	$result=filterTable($sql2);
	_alert_close('訊息已傳送');

}
?>


