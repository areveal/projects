<?php


function diceware($num) {
	//read the file
	$filename = 'diceware.txt';
	$filesize = filesize($filename);
	$read = fopen($filename, 'r');
	$long_list = trim(fread($read, $filesize));
	fclose($read);

	//explode it into pieces
	$pieces = explode("\n", $long_list);

	//break the pieces into two parts
	$parts = [];
	foreach ($pieces as $piece) {
		$parts[] = explode("\t", $piece);
	}
	
	$passphrase = "";
	//assign password into passphrase $num times
	for ($i=0; $i < $num; $i++) { 
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
		foreach ($parts as $key => $part) {
			if($part[0] == $code) {
				$passphrase .= $part[1];
			}
		}

		
	}
	
	//give back the completed passphrase
	return $passphrase;

}

// $what_is_it = diceware(strval(5));
// echo "$what_is_it\n";




fwrite(STDOUT, 'How many words do you want for your passphrase? ');
$input = trim(fgets(STDIN));

while(!is_numeric($input)) {
	fwrite(STDOUT, 'Input must be a number: ');
	$input = trim(fgets(STDIN));
}

echo diceware($input) . PHP_EOL;

?>