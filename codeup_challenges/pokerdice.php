<?php

// function to take user input on STDIN
// performing stringtoupper if $upper is true
function getInput($upper = false) {
	$input = trim(fgets(STDIN));
    return $upper ? strtoupper($input) : $input;
}

// generate an array of 5 dice
// each die should have a random roll between 1 and 6
// sort the dice before returning
function rollDice() {
	$dice = [];
	// todo
	for($i = 0; $i < 5; $i++) {
		$dice [] = mt_rand(1,6);
	}
	sort($dice);
	return $dice;
}

// show the dice array
// output should be in the format...
// Dice: 1 2 3 4 5
function showDice($dice) {
	// todo
	$dice_string = "";
	foreach ($dice as $die) {
		$dice_string .= "$die ";
	}
	echo "Dice: " . $dice_string . PHP_EOL;
}

// determine the type of roll, the base score, and the bonus
// for a given array of dice
function scoreRoll($dice) {

	// generate a result in the following data structure
	$result = ['type' => '', 'base_score' => 0, 'bonus' => 0];

	// base score is a sum of all dice
	$base_score = 0; 
	foreach ($dice as $die) {
		$base_score += $die;
	}
	$small_dice = array_values(array_unique($dice));
	// hand type and bonus point system
	switch ($dice) {
		case (count($small_dice) == 1):
			$result = ['five of a kind', $base_score, 100];
			break;
		// four of a kind = 75
		case (count($small_dice) == 2) && (($dice[1] == $dice[2]) && ($dice[2] == $dice[3])):
			$result = ['four of a kind', $base_score, 75];
			break;
		// a full house = 50
		case (count($small_dice) == 2) && (($dice[1] != $dice[2]) || ($dice[2] != $dice[3])):
			$result = ['full house', $base_score, 50];
			break;
		// a straight = 40
		case ($dice[0]+1 == $dice[1]) && ($dice[1]+1 == $dice[2]) && ($dice[2]+1 == $dice[3]) && ($dice[3]+1 == $dice[4]):
			$result = ['straight', $base_score, 40];
			break;
		// two pair = 15
		case (count($small_dice) == 3) && (($dice[0] == $dice[1]) && ($dice[2] == $dice[3])) || (($dice[0] == $dice[1]) && ($dice[3] == $dice[4])) || (($dice[1] == $dice[2]) && ($dice[3] == $dice[4])):
			$result = ['two pair', $base_score, 15];
			break;
		// three of a kind = 25
		case (count($small_dice) == 3):
			$result = ['three of a kind', $base_score, 25];
			break;
		// a pair = 5
		case (count($small_dice) == 4):
			$result = ['pair', $base_score, 5];
			break;
		// nada = 0
		default:
			$result = ['nada', $base_score, 0];
			break;
	}


	// return the result
	return $result;
}

// add an entry to the history log to keep track
// of how many rolls there have been of a given type
// sort history with highest occurring type first
function logHistory(&$history, $type) {
	// todo
	$history[] = $type;

	return($history);
}

// display stats from history log based on number of rolls
// desired display format:
// >> STATS ------------
// a pair: 47.47 %
// two pair: 23.67 %
// three of a kind: 15.43 %
// a straight: 7.42 %
// a full house: 3.77 %
// four of a kind: 2.24 %
// << STATS -------------
function showStats($history, $totalRolls) {
	
	$history = array_count_values($history);

	arsort($history);

	echo ">> STATS ------------\n";

	foreach ($history as $key => $value) {
		
		echo $key . ": " . ($value/$totalRolls*100) . " %\n";

	}

	echo "<< STATS -------------\n";
}

// track the total score
$score = 0;

// track the total rolls
$rolls = 0;

// track the roll type history
$history = [];

// welcome the user
echo "Welcome to Poker Dice!\n";
echo "Press enter to get started with your first roll...\n";

$input = getInput(true);

while ($input != 'Q') {

	// roll the dice
	// todo

	$roll = rollDice();
	$rolls++;

	// score the result
	// todo: use scoreRoll function

	$result = scoreRoll($roll);

	// add the current roll to the total score
	// todo

	$score += ($result[1] + $result[2]);

	// log the roll type history
	// todo: use logHistory function

	logHistory($history, $result[0]);

	// show the dice
	// todo: use showDice function

	showDice($roll);

	// display roll type, base score, and bonus
	// ex: You rolled a straight for a base score of 20 and a bonus of 40.
	// todo

	echo "You rolled a " . $result[0] . " for a base score of " . $result[1] . " and a bonus of " . $result[2] . ".\n";

	// display total score
	// ex: Total Score: 32306, in 849 rolls.
	// todo

	echo "Total Score: " . $score . ", in " . $rolls . " rolls.\n";

	// show roll type statistics
	// todo: use showStats function

	showStats($history,$rolls);

	// prompt use to roll again or quit
	echo "Press enter to roll again, or Q to quit.\n";
	$input = getInput(true);
}

?>