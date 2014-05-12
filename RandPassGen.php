<?php

$array = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9'];
$count = 0;

while($count <= 8) {
	$tempass[] =($array[mt_rand(0,34)]);
	$count++;
}

for ($i=0; $i<=$count; $i++){
	echo $tempass[$i];
}

echo PHP_EOL;

//receiving an undefined offset error.... not sure what it is??

?>