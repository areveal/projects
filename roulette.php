<?php

// This project is designed to simulate the odds of winning black in European style roulette with the double bet strategy.
// Winning is defined as doubling your original purse.
// After every loss, the stratedy is to double your former bet in order to win back all losses from the previous bet.
// We will play until we lose all our money or double the beginning purse.
// The odds of winning a single bet on black is 18/37 = 0.48648648648649.
// This project will play multiple games in order to get a large sample size in order to more accurately portray 
// the odds of winning in roulette with this strategy.

$totalwins = 0;
$totallosses = 0;
$totalplays = 0;
$blackhit = 0;
$bigblack = 0;
$redhit = 0;
$bigred = 0;

do{
	$beginning = 1000;
	$purse = 1000;
	$win = 48649;
	$bet = 1;

	do {
		$spin = mt_rand(0,100000);
		if($spin <= $win) {
			$purse += $bet;
			$bet = 1;
			$blackhit++;
			$redhit = 0;
			if ($blackhit > $bigblack) {
				$bigblack = $blackhit;
			}
		} else {
			$purse -= $bet;
			$redhit++;
			$blackhit = 0;
			if ($redhit > $bigred) {
				$bigred = $redhit;
			}
			if($bet <75) {
				$bet *= 2;
				if($bet > 75) {
					$bet = 75;
				}
			}
		}


	}while($purse >= 0 && $purse <= (2 * $beginning));

	//this is the code from the first project used to test the program's functionability
	/*
	if($purse >= (2 * $beginning)) {
		echo "You doubled your original purse!\n";
	} else {
		echo "You lost all your money! Sorry!\n";
	}
	echo "Your longest black hit streak was {$bigblack}!!\n";
	echo "Your longest non black streak was {$bigred}!!\n";
	*/


	if($purse >= (2 * $beginning)) {
		$totalwins++;
	} else {
		$totallosses++;
	}
	
	$totalplays++;

}while($totalplays<1000);
echo "You doubled your money $totalwins times and lost your money $totallosses times!\n";
echo "Your longest black hit streak was {$bigblack}!!\n";
echo "Your longest non black streak was {$bigred}!!\n";
?>
