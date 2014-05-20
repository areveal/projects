<?php

//************************************************************
//************************************************************
//                     The Functions
//************************************************************
//************************************************************



// Create the name game function
function name_game($name) {

	//define vowels
	$vowels = ['a','e','i','o','u'];

	$song = '';

	if(array_search(strtolower($name[0]), $vowels) !== false) {
		$song .= "{$name}!" . PHP_EOL . 
		"{$name}, {$name} bo B" . strtolower($name) . PHP_EOL . 
		"Bonana fanna fo F" . strtolower($name) . PHP_EOL . 
		"Fee fy mo M" . strtolower($name) . "," . PHP_EOL . 
		"{$name}! ";
	} else {
		$song .= "{$name}!" . PHP_EOL . 
		"{$name}, {$name} bo B" . substr($name, 1) . PHP_EOL . 
		"Bonana fanna fo F" . substr($name, 1) . PHP_EOL . 
		"Fee fy mo M" . substr($name, 1) . "," . PHP_EOL . 
		"{$name}! ";
	}

	return $song;
}

//grab user's name
function get_name() {
	
	echo "What is your name? ";

	$name = (trim(fgets(STDIN)));

	return $name;
}

// function to make sure name is a name.
function check_name($name) {
	if(is_numeric($name)) {
		echo "Play Fair!!!\n";
		exit(1);
	}
	if(empty($name)) {
		echo "You must enter a name!\n";
		exit(1);
	}
}

//************************************************************
//************************************************************
//                  Here is the actual game!!
//************************************************************
//************************************************************


echo "Let's play the name game!!\n";

// Prompt the User for their name.
$name = get_name();

// Make sure they gave you a word with which the name game is possible.
check_name($name);


// Here is the name game!!
echo name_game($name);

echo PHP_EOL;
exit(0);


?>