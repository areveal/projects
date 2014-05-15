<?php

$purse = 1;

// get your deck

$deck = [
	'Spades' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'Hearts' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'Diamonds' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
	'Clubs' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace']
];

// loop within one deck shuffle (# of cards left in deck greater than 20)

while((count($deck['Spades']) + count($deck['Hearts']) + count($deck['Clubs']) +count($deck['Diamonds']))>20 && ($purse > 0)){

	$playertotal = 0;
	$dealertotal = 0;
	$playerhand = [];
	$playersuit = [];
	$dealerhand = [];
	$dealersuit = [];

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

		//assign the card to each hand and total up each hand.	
		
		if(count($playerhand)<2) {
			$playerhand[] = $card;
			$playersuit[] = $suit;
			
			// adding the card values to the hand.
			switch ($card) {
			case 'Jack':
				$playertotal += 10;
				break;
			case 'Queen':
				$playertotal += 10;
				break;
			case 'King':
				$playertotal += 10;
				break;
			case 'Ace':
				if($playertotal > 10) {
					$playertotal += 1;
				} else {
					$playertotal += 11;
				}
				break;
			default:
				$playertotal += ($card);
				break;
		}
		} else {
			$dealerhand[] = $card;
			$dealersuit[] = $suit;
			switch ($card) {
			case 'Jack':
				$dealertotal += 10;
				break;
			case 'Queen':
				$dealertotal += 10;
				break;
			case 'King':
				$dealertotal += 10;
				break;
			case 'Ace':
				if($dealertotal > 10) {
					$dealertotal += 1;
				} else {
					$dealertotal += 11;
				}
				break;
			default:
				$dealertotal += ($card);
				break;
		}
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
				unset($deck[$suit][$card]);
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


	// print_r($playerhand);
	// echo count($playerhand) . PHP_EOL;
	// print_r($dealerhand);
	// echo count($dealerhand) . PHP_EOL;
	

	// Player blackjack?

	if($playertotal == 21) {
		echo "Blackjack!! Winner Winner Chicken Dinner!\n";
		$purse += (2* $bet);
		break;
	}

	// Dealer blackjack?

	if($dealertotal == 21) {
		echo "Dealer has Blackjack. You lose.\n";
		$purse -= $bet;
		break;
	}

	// while PCT less than 21 and hit is true {

	// allow PLayer to hit or stay. Recalculate PCT. (stay sets hit to false)

	// if PCT greater than 21, Player loses bet and break

	//compare hands

	if($playertotal < $dealertotal) {
		echo "You win!\n";
		$purse += $bet;
	} elseif($dealertotal < $playertotal) {
		echo "You lose.\n";
		$purse -= $bet;
	}



	//echo $playertotal . PHP_EOL;
	//echo $dealertotal . PHP_EOL;

	$purse--;
}

echo "There are " . (count($deck['Spades']) + count($deck['Hearts']) + count($deck['Clubs']) +count($deck['Diamonds'])) . " cards left in the deck.\n";




echo "Done.\n";

?>