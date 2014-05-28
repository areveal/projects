<?php

function palindrome($string) {

	//convert string to lower case
	$string = strtolower($string);
	//take out white spaces and punctuation
	$string_parts = str_split($string);
	for ($i=0; $i < strlen($string) ; $i++) { 
		if(ctype_punct($string_parts[$i]) || ctype_space($string_parts[$i])){
			unset($string_parts[$i]);
		}
	}
	//reindex array
	$string_parts = array_values($string_parts);
	//we'll use these to find the middle of the palindrome string.
	$max = count($string_parts);	
	$num = (($max-1)/ 2);
	
	if(is_float($num)) {
		//the number of characters was even
		for ($i = floor($num) , $j = ceil($num) ; $i>=0 , $j <= $max-1 ; $i-- , $j++) { 
			if($string_parts[$i] !== $string_parts[$j]) {
				return false;
			}
		}
	} else {
		//the number of characters was odd
		for ($i = $num, $j = $num ; $i>=0 , $j <= $max-1 ; $i-- , $j++) { 
			if($string_parts[$i] !== $string_parts[$j]) {
				return false;
			}
		}
	}

	return true;
	
}



fwrite(STDOUT, 'What word would you like to check? ');
$input = trim(fgets(STDIN));

// $blah = palindrome($input);
// var_dump($blah);



if(palindrome($input)) {
	echo 'The input is a palindrome!' . PHP_EOL;
} else {
	echo 'The input is not a palindrome.' . PHP_EOL;
}


?>