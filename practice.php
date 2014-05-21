<?php

$filename = 'names.txt';

$filesize = filesize($filename);

$read = fopen($filename, 'r');

$nameString = trim(fread($read, $filesize));

$names = explode("\n", $nameString);

$person = array_rand($names);

$result =  "Coach Slade loves " . $names[$person] . PHP_EOL;

echo $result;

fclose($read);


?>