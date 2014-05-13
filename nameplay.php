<?php

echo "Let's play the name game!!\n";

// Prompt the User for their name.
echo "What is your name? ";

$name = (trim(fgets(STDIN)));

// Make sure they gave you a word and not a number.
if(is_numeric($name)) {
	echo "Play Fair!!!\n";
	exit(1);
}
if(empty($name)) {
	echo "You must enter a name!\n";
	exit(1);
}


$vowels = ['a','e','i','o','u'];

// Here is the name game!
if(is_int(array_search(strtolower($name[0]), $vowels))) {
	echo "{$name}!" . PHP_EOL . 
	"{$name}, {$name} bo B" . strtolower($name) . PHP_EOL . 
	"Bonana fanna fo F" . strtolower($name) . PHP_EOL . 
	"Fee fy mo M" . strtolower($name) . "," . PHP_EOL . 
	"{$name}! ";
} else {
	echo "{$name}!" . PHP_EOL . 
	"{$name}, {$name} bo B" . substr($name, 1) . PHP_EOL . 
	"Bonana fanna fo F" . substr($name, 1) . PHP_EOL . 
	"Fee fy mo M" . substr($name, 1) . "," . PHP_EOL . 
	"{$name}! ";
}

 echo PHP_EOL;
?>