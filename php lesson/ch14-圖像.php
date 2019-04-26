
<?php

	header('Content-type: image/png');
	for($Tmpa=0;$Tmpa<4;$Tmpa++){
	$nmsg.=dechex(rand(0,15));
	}
	$im = imagecreatetruecolor(75,25);
	$blue = imagecolorallocate($im,0,102,255);
	$white = imagecolorallocate($im,255,255,255);
	imagefill($im,0,0,$blue);
	imagestring($im,5,20,4,$nmsg,$white);
	imagepng($im);
	imagedestroy($im);



?>
