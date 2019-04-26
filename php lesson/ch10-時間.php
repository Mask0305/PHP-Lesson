<?php
	
	/*
		時間戳，一般來說指的是 UNIX 時間戳，Unix 紀元是西元1970年1月1日00:00:00，時間戳那一大串數字就是距離西元1970年1月1日00:00:00多少秒數。
		time()此函數可獲得時間戳。
		需要用date_default_timezone_set('Asia/Taipei')設置時區 
		
		echo date('c')  此行反映對應時區的時間


		echo date('Y-m-d H:i:sa'); //直接输入日期和时间
		echo '<br>';
		echo date('今天的日期和时间为：Y/m/d H:i:sa'); //可以插入無關的字符串
	*/
		/*
		$now = time();
		$taxday = mktime(0,0,0,7,17,2010); //生成給定日期時間的時間戳 mktime(秒,分,時,日,月,年)
		echo $now; //1552900403
		echo '<br>';
		echo $taxday;//1279317600
		echo round(($taxday - $now)/60/60); //-75995
	

	*/

		/*
		echo date('Y-m-d H:i:sa'); 
		echo '<br>';

		date_default_timezone_set('Asia/Taipei');
		echo time();
		echo '<br>';
		echo date('c')
		*/
		
		//計算程式執行時間
		print_r(microtime()); //返回時間戳 [0]是微秒的部分 [1]是秒的部分
		//假如返回0.09253500 1552902999  其實是1552902999.0925
		echo '<br>';
		print_r(microtime(true)); //在函數中加上true，可直接返回後者結果
			echo '<br>';


			/*function fntime(){
			list($msec,$sec) = explode(' ',microtime());
				return $msec+$sec;
				}
				$start_time = fntime();
				*/
				//這段可省略成以下
				$start_time=microtime(true);
				
				for($i=0;$i<1000000;$i++){
					//放欲計算的程式，這邊以for代替
				}
		
				$end_time = microtime(true);
				echo round($end_time-$start_time,4);

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
		

		
</html>