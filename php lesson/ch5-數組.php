<?php
	//$ages=array('小明->10','小美->12','拉拉->15');
	

	$ages['R150']='150cc';
	$ages['Ninja 400']='400cc';
	$ages['R3']='300cc';

	
	/*while (!!$element=each($ages)) {
		echo $element["key"];
		echo "=>";
		echo $element["value"];
		echo "<br />";
		}
	*/
		each($ages);  //'150cc' 指針指向該陣列第一個，並瞄準下一個
		$a=each($ages);
		echo $a['value']; //400cc

		

			foreach($ages as $car => $cc)
			{
				//echo $ages;
				echo $car."=>".$cc.'<br>';

			};
		
		
?>