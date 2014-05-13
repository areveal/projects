<?php

$array = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9'];
$count = 0;

do {
	$pass[] =($array[mt_rand(0,count($array)-1)]);
	$count++;
} while($count <= 8);


echo "Your new password is ";
for ($i=0; $i<$count; $i++){
	echo $pass[$i];

}

echo PHP_EOL;

?>