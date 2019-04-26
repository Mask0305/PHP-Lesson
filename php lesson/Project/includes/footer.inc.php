<?php
error_reporting(0);

if(!defined("IN_TG")){
	exit("Access Defined!");
};

define('ROOT_PATH',substr(dirname(__FILE__),0,-8));


$_end_time=_runtime();

?>


<div id="footer">
	<p>本系統耗時:<?php echo $_end_time - $_start_time; ?>秒</p>
	<p>版權所有 翻版必究</p>
	<!-- <p>本程序由<span></span>提供</p> -->