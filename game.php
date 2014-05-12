<?php

$totalplays = 0;
$howmany = 200;
$bigpurse = 200;
$highpurse =200;
$lowpurse = 200;

do{

	if ($bigpurse > 0) {
	
		// Setting the beginning variables for each game.
		$purse = 20;
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
			} else {
				$purse -= $bet;
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

			
		if($purse >= (2 * $beginpurse)) {
			$bigpurse += ($purse - $beginpurse);
			if($bigpurse > $highpurse) {
				$highpurse = $bigpurse;
			}
		} else {
			$bigpurse -= $beginpurse;
			if($bigpurse < $lowpurse) {
				$lowpurse = $bigpurse;
			}
		}

		$totalplays++;

	} else {
		echo "You have no more money to bet.\n";
	}

}while($totalplays < $howmany);

echo "Your final purse is {$bigpurse}\n";
echo "The lowest your purse got was {$lowpurse}\n";
echo "The highest your purse got was {$highpurse}\n";
	
?>