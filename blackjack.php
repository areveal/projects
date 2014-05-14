<?php

$purse = 1;
$playerhand = [];
$playersuit = [];
$dealerhand = [];
$dealersuit = [];

// get your deck

$deck = [
	'Spades' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'Hearts' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'Diamonds' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'Clubs' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace']
];

// loop within one deck shuffle (# of cards left in deck greater than 20)

while((count($deck['Spades']) + count($deck['Hearts']) + count($deck['Clubs']) +count($deck['Diamonds']))>20 && ($purse > 0)){

	// player places bet

	echo "How much would you like to bet? ";
	$bet = trim(fgets(STDIN));
	if($bet<1){
		break;
	}

	// dealer deals 2 cards to both the Player and himself

	for($i=1;$i<=4;$i++) {

		//pick a card

		$suit = array_rand($deck);
		$card = $deck["$suit"][array_rand($deck["$suit"])];
		
		echo "$card of $suit\n";
		
		//assign the card to each hand		
		
		if(count($playerhand)<2) {
			$playerhand[] = $card;
			$playersuit[] = $suit;
		} else {
			$dealerhand[] = $card;
			$dealersuit[] = $suit;
		}
		
		// Remove the card from the deck using the value of its index
		switch ($card) {
			case 'Jack':
				unset($deck[$suit][9]);
				break;
			case 'Queen':
				unset($deck[$suit][10]);
				break;
			case 'King':
				unset($deck[$suit][11]);
				break;
			case 'Ace':
				unset($deck[$suit][12]);
				break;
			default:
				unset($deck[$suit][$card-2]);
				break;
		}
	}

	
	// show PLayer's cards
	echo "You have the ";
	for ($i=0; $i <count($playerhand); $i++) { 
		echo $playerhand[$i] . " of " . $playersuit[$i];
		if($i< count($playerhand)-1)
			echo " and ";
	}
	echo " in your hand.\n";

	//show Dealer's cards
	echo "The dealer has the ";
	for ($i=0; $i <count($dealerhand); $i++) { 
		echo $dealerhand[$i] . " of " . $dealersuit[$i];
		if($i< count($dealerhand)-1)
			echo " and ";
	}
	echo " in his hand.\n";


	// print_r($playerhand);
	// echo count($playerhand) . PHP_EOL;
	// print_r($dealerhand);
	// echo count($dealerhand) . PHP_EOL;
	// Player blackjack?

	// Dealer blackjack?

	// total up Player's card total

	// while PCT less than 21 and hit is true {

	// allow PLayer to hit or stay. Recalculate PCT. (stay sets hit to false)

	// if PCT greater than 21, Player loses bet and break

	// Discard both hands
	$playerhand = [];
	$dealerhand = [];



	$purse--;
}

echo "There are " . (count($deck['Spades']) + count($deck['Hearts']) + count($deck['Clubs']) +count($deck['Diamonds'])) . " cards left in the deck.\n";




echo "Done.\n";

?>