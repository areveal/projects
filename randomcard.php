<?php

// Create the deck
$deck = [
	'spades' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'hearts' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'diamonds' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'clubs' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace']
];

// This will run as long as the deck has cards remaining.
do {

	// Pick a suit from the deck
	$suit = array_rand($deck);
	
	// We need to check to see if the current suit has any cards left
	if(!empty($deck["$suit"])) {
		$card = $deck["$suit"][array_rand($deck["$suit"])];
		 echo "$card of $suit\n";

		// Remove the card from the deck
		if($card == 'Jack') {
			unset($deck[$suit][9]);
		} elseif($card == 'Queen') {
			unset($deck[$suit][10]);
		} elseif($card == 'King') {
			unset($deck[$suit][11]);
		} elseif($card == 'Ace') {
			unset($deck[$suit][12]);
		} else {
			unset($deck[$suit][$card-2]);
		}


		// Show the remaining cards in the deck
		print_r($deck);
	}


}while(!empty($deck['spades'])||!empty($deck['hearts'])||!empty($deck['clubs'])||!empty($deck['diamonds']));

?>