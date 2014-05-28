<?php

function alphabet_soup($str) {

	$str = strtolower($str);
	$words = explode(' ', $str);
	$new_words = [];

	foreach ($words as $word) {
		$new_word = str_split($word);
		sort($new_word);
		$new_words[] = $new_word;

	}

	$new_new_words = [];
	
	foreach ($new_words as $new_word) {
		$new_new_word = implode($new_word);
		$new_new_words[] = $new_new_word;
	}

	$soup = implode(' ', $new_new_words);
	return $soup;

}

fwrite(STDIN, "What are you putting into the alphabet soup? ");
$input = trim(fgets(STDIN));

$blah = alphabet_soup($input);

echo $blah . PHP_EOL;


?>