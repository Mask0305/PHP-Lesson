<?php

$uni = uniqid(123456,true);
$uni1 = uniqid(123456);

echo substr($uni,0,8);
echo'-';
echo substr($uni,8,4);
echo'-';
echo substr($uni,12,4);
echo'-';
echo substr($uni,16,4);
echo'-';
echo substr($uni,20);
echo '<br>';
echo uniqid();
echo '<br>';
echo $uni;
echo '<br>';
echo $uni1;
echo '<br>';
echo md5($uni1);
echo '<br>';
echo strlen($uni);
echo '<br>';
echo strlen(uniqid());



?>