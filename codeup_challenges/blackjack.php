<?php

// complete all "todo"s to build a blackjack game

// create an array for suits
$suits = ['C', 'H', 'S', 'D'];

// create an array for cards
$cards = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

// build a deck (array) of cards
// card values should be "VALUE SUIT". ex: "7 H"
// make sure to shuffle the deck before returning it
function buildDeck($suits, $cards) {
  // todo
	$deck = [];
	foreach ($suits as $suit) {
		
		foreach ($cards as $card) {
			$deck[] = $card . ' ' . $suit;
		}

	}
	shuffle($deck);
	return $deck;
}

// determine if a card is an ace
// return true for ace, false for anything else
function cardIsAce($card) {
  // todo
	$acecount = 0;
	$pieces = explode(' ', $card);
	if($pieces[0] == 'A') {
		$acecount++;
	}
	return $acecount;
}

// determine the value of an individual card (string)
// aces are worth 11
// face cards are worth 10
// numeric cards are worth their value
function getCardValue($card) {
  // todo
	$pieces = explode(' ', $card);
	switch($pieces[0]) {
		case 'A':
			$value = 11;
			break;
		case 'K':
		case 'J':
		case 'Q':
		case '10':
			$value = 10;
			break;
		default:
			$value = (int)$card[0];
			break;
	}
	return $value;
}

// get total value for a hand of cards
// don't forget to factor in aces
// aces can be 1 or 11 (make them 1 if total value is over 21)
function getHandTotal($hand) {
  // todo
	$acecount = 0;
	$hand_value = 0;
	foreach ($hand as $card) {
		$hand_value += getCardValue($card);
		$acecount += cardIsAce($card);
	}
	while($hand_value > 21 && $acecount > 0) {
		$hand_value -=10;
		$acecount--;
	}
	return $hand_value;
}

// draw a card from the deck into a hand
// pass by reference (both hand and deck passed in are modified)
function drawCard(&$hand, &$deck) {
  // todo
	$hand[] = array_shift($deck);
	shuffle($deck);


}

// print out a hand of cards
// name is the name of the player
// hidden is to initially show only first card of hand (for dealer)
// output should look like this:
// Dealer: [4 C] [???] Total: ???
// or:
// Player: [J D] [2 D] Total: 12
function echoHand($hand, $name, $hidden = false) {
  // todo
	$cardstring = "";

	if($hidden) {
		
		foreach ($hand as $card) {
			if($card == $hand[0]){	
				$cardstring .= ' [' . $card . ']'; 
			} else {
				$cardstring .= ' [???]';
			}
		}
		
		echo $name . ':' . $cardstring . ' Total: ???' . PHP_EOL; 

	} else {
		
		foreach ($hand as $card) {
			$cardstring .= ' [' . $card . ']'; 	
		}
		
		echo $name . ':' . $cardstring . ' Total: ' . getHandTotal($hand) . PHP_EOL;

	}


}

// build the deck of cards
$deck = buildDeck($suits, $cards);

// initialize a dealer and player hand
$dealer = [];
$player = [];

// dealer and player each draw two cards
// todo
drawCard($dealer, $deck);
drawCard($dealer, $deck);
drawCard($player, $deck);
drawCard($player, $deck);

// echo the dealer hand, only showing the first card
// todo

echoHand($dealer, 'Dealer',true);

// echo the player hand
// todo
echoHand($player, 'Player');

// allow player to "(H)it or (S)tay?" till they bust (exceed 21) or stay
while($input != "H" && $input != "S" && getHandTotal($player) < 21){
	fwrite(STDOUT, "(H)it or (S)tay? ");
	$input = strtoupper(trim(fgets(STDIN)));
}

while (getHandTotal($player) < 21 && $input == 'H') {
  // todo
	drawCard($player, $deck);
	echoHand($player, 'Player');

	if(getHandTotal($player) < 21){
		do{
			fwrite(STDOUT, "(H)it or (S)tay? ");
			$input = strtoupper(trim(fgets(STDIN)));
		}while($input != "H" && $input != "S");
	}

}

// show the dealer's hand (all cards)
// todo
echoHand($dealer, 'Dealer');

// todo (all comments below)

// at this point, if the player has more than 21, tell them they busted
// otherwise, if they have 21, tell them they won (regardless of dealer hand)
if(getHandTotal($player) == 21){
	echo 'Winner Winner Chicken Dinner!' . PHP_EOL;
	exit(0);
} else if (getHandTotal($player) > 21) {
	echo 'BUST..... You lose...' . PHP_EOL;
	exit(0);
}

// if neither of the above are true, then the dealer needs to draw more cards
// dealer draws until their hand has a value of at least 17
// show the dealer hand each time they draw a card

while (getHandTotal($dealer) < 17) {
  // todo
	drawCard($dealer, $deck);
	echoHand($dealer, 'Dealer');
}

// finally, we can check and see who won
// by this point, if dealer has busted, then player automatically wins
// if player and dealer tie, it is a "push"
// if dealer has more than player, dealer wins, otherwise, player wins
if(getHandTotal($dealer) > 21) {
	echo 'Dealer busted! You win!' . PHP_EOL;
} else if(getHandTotal($dealer) == getHandTotal($player)) {
	echo 'You tied...' . PHP_EOL;
} else if(getHandTotal($dealer) > getHandTotal($player)) {
	echo 'Dealer wins...' . PHP_EOL;
} else {
	echo 'You win!!' . PHP_EOL;
}


?>