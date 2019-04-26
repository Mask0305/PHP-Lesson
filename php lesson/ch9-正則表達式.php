<?php
	
/*
	$language = array('php','asp','jsp','python','ruby');

	$mode ='/p$/'; //結尾為p
	$mode ='/^p/'; //開頭為p
	print_r(preg_grep($mode,$language));
*/

/*
	//mail
	
	$mode = '/([\w]{2,255})@([\w\{3,5}).([a-z]{2,5})/';//(用戶名)@(網址).(域名);
	$mail ='a10070305@gmail.com';

	if(preg_match($mode,$mail)){
		echo 'Succes!';
	}else{
		echo 'Fail!';
	}
*/
	/*
	//全局比配
	//將字符串的所有匹配得到的結果放到一個數組變量裡
	echo preg_match_all('/php[1-6]/','php4pasphp5pdphp6d4php7564',$out);

	print_r($out);
	*/


	/*
	//定界正則
	//在每個對於正則表達式是特殊涵義的字符前標上反斜 -> \
	echo preg_quote('Gsx-R150的價格是：$12,8000'); //Gsx\-R150的價格是：\$12,8000
	*/

/*
	//替換
	//echo preg_replace('/php[1-6]/','python','I like php7,don\'t like php6');
	//結果-> I like python,don't like python
	

	$mode ='/(\[b\])(.*)(\[\/b\])/U'; //要找的，特殊符號前要標上'\'轉譯
	$replace ='<b>\2</b>'; //要換的

	$string = 'This is [b]GSX-R150[/b] , and this one is [b]Ninja 400[/b]';

	echo preg_replace($mode,$replace,$string);
	*/
?>