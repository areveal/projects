<?php

// Create the deck
$deck = [
	'Spades' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'Hearts' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'Diamonds' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'Clubs' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace']
];

// This will run as long as the deck has cards remaining
do {

	// Pick a suit from the deck
	$suit = array_rand($deck);
	
	// We need to check to see if the current suit has any cards left
	if(empty($deck["$suit"])) {
		continue;
	}

	// Pick a card
	$card = $deck["$suit"][array_rand($deck["$suit"])];
	 echo "$card of $suit\n";
	// Remove the card from the deck using the value of its index
//Let's turn this into a switch!!
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
	echo "There are " . (count($deck['Spades']) + count($deck['Hearts']) + count($deck['Clubs']) +count($deck['Diamonds'])) . " cards left in the deck.\n";



}while(!empty($deck['Spades'])||!empty($deck['Hearts'])||!empty($deck['Clubs'])||!empty($deck['Diamonds']));

?>