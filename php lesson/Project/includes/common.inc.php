<?php
//防止惡意調用
// if(!defined("IN_TG")){
// 	exit("Access Defined!");
// };

//轉換硬路徑
define('ROOT_PATH',substr(dirname(__FILE__),0,-8));

//拒絕PHP低版本
if(PHP_VERSION<'4.1.0'){
	exit('Version too low');
}


//引入函數庫
require ROOT_PATH.'includes\global.func.php';
//執行耗時

$_start_time=_runtime();




?>