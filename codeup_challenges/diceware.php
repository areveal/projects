<?php

function get_input() {
	
	fwrite(STDOUT, 'How many words do you want for your passphrase? ');
	$input = trim(fgets(STDIN));

	while(!is_numeric($input)) {
		fwrite(STDOUT, 'Input must be a number: ');
		$input = trim(fgets(STDIN));
	}

	return $input;

}

function read_file($filename) {

	$filesize = filesize($filename);
	$read = fopen($filename, 'r');
	$long_list = trim(fread($read, $filesize));
	fclose($read);

	//explode it into pieces
	$pieces = explode("\n", $long_list);
	return $pieces;
}

function get_pass($int, $array) {
	
	$passphrase = "";
	for ($i=0; $i < $int; $i++) { 
		//this will ultimately be our passphrase
		//we're going to get our key here.
		$code = "";
		$code_array = [];

		for ($j=0; $j <5 ; $j++) { 
			$code_array[] = rand(1,6);
		}
		//here is our number
		$code .= implode($code_array);
		//add our word to the passphrase
		foreach ($array as $key => $part) {
			if($part[0] == $code) {
				$passphrase .= $part[1];
			}
		}

		
	}
	return $passphrase;

} 

function diceware($num) {
	//read the file
	$pieces = read_file('diceware.txt');
	//break the pieces into two parts
	$parts = [];
	foreach ($pieces as $piece) {
		$parts[] = explode("\t", $piece);
	}
	
	//assign password into passphrase $num times
	$passphrase = get_pass($num, $parts);
	//give back the completed passphrase
	return $passphrase;

}

//actually do it!!
$input = get_input();

$passphrase = diceware($input);

fwrite(STDOUT, $passphrase . PHP_EOL);

?>