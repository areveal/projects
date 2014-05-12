<?php

// This project is designed to simulate the odds of winning black in European style roulette with the double bet strategy.
// Winning is defined as doubling your original purse.
// After every loss, the stratedy is to double your former bet in order to win back all losses from the previous bet.
// We will play until we lose all our money or double the beginning purse.
// The odds of winning a single bet on black is 18/37 = 0.48649.
// This project will play multiple games in order to get a large sample size in order to more accurately portray 
// the odds of winning in roulette with this strategy.


// Setting the counters.
$totalwins = 0;
$totallosses = 0;
$totalplays = 0;
$blackhit = 0;
$bigblack = 0;
$redhit = 0;
$bigred = 0;
$howmany = 1000;

// Runs the test {$howmany} times.
do{
	
	// Setting the beginning variables for each game.
	$purse = 1000;
	$beginpurse = $purse;
	$win = 0.48649;
	$bet = 1;

	// Plays the game. Runs until we lose all our money, or we double our originial purse.
	do {
		// $spin gives us a random decimal value back between 0 and 1.
		$spin = ((mt_rand(0,100000))/100000);
		// If the spin is black (between 0 and .48649), we win. We add our bet to the purse. 
		// Else, we lose. We subtract our bet from the purse.
		if($spin <= $win) {
			$purse += $bet;
			$bet = 1;
			$blackhit++;
			$redhit = 0;
			// We are tracking the largest streak of black hits in a row.
			if ($blackhit > $bigblack) {
				$bigblack = $blackhit;
			}
		} else {
			$purse -= $bet;
			$redhit++;
			$blackhit = 0;
			// We are tracking the longest streak of non-black hits in a row.
			if ($redhit > $bigred) {
				$bigred = $redhit;
			}
			// Doubles the bet if we lose.
			if($bet <75) {
				$bet *= 2;
				// Set to reflect common $75 max bid on most roulette tables
				if($bet > 75) {
					$bet = 75;
				}		
			}
		}

	}while($purse >= 0 && $purse <= (2 * $beginpurse));

	// The game will reset and repeat {$howmany} times and track the total wins and losses

	

	//this is the code from the first project used to test the program's functionability
	/*
	if($purse >= (2 * $beginpurse)) {
		echo "You doubled your original purse!\n";
	} else {
		echo "You lost all your money! Sorry!\n";
	}
	echo "Your longest black hit streak was {$bigblack}!!\n";
	echo "Your longest non black streak was {$bigred}!!\n";
	*/


	


	// Did we win or lose?
	if($purse >= (2 * $beginpurse)) {
		$totalwins++;
	} else {
		$totallosses++;
	}
	
	$totalplays++;

}while($totalplays < $howmany);

echo "You doubled your money $totalwins times and lost your money $totallosses times!\n";
echo "Your longest black hit streak was {$bigblack}!!\n";
echo "Your longest non black streak was {$bigred}!!\n";
?>
