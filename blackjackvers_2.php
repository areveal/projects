<?php 

//***********************************
//***********************************
//         Function List
//***********************************
//***********************************

// Create the deck
$deck = [
    'Spades' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
    'Hearts' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
    'Diamonds' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace'],
    'Clubs' => [2,3,4,5,6,7,8,9,10,'Jack','Queen','King','Ace']
];


// Create a function that totals the value in our hand
function getTotal($hand)
{
    $total = 0;
    $hold = []; 
    foreach ($hand as $card) {
        
        $hold[] = explode('-', $card[0]);
       
    }
    foreach ($hold as $card) {
        
        switch($card[0]) {
            case 'Ace':
                break;
            case 'King':
            case 'Queen':
            case 'Jack':
                $total +=10;
                break;
            default:
                $total += (int)$card[0];
                break;
           }

    }
    foreach ($hold as $card) {

        if($card[0] == 'Ace') {
            if(($total + 11) <=  21) {
                $total += 11;
            } else {
                $total += 1;
            }

        }
    }


    return $total;
}

// Create a function that shows tha value of your hand after initial deal
function check_value_inital($total) {
    
    
    if($total == 21) {
        $value = "Winner Winner Chicken Dinner!! Black Jack!!\n";
    } else {
        $value = "The value of your hand is " . $total . ".\n";
    }

    return $value;
}

// Create a function that shows the value of our hand at any time.
function bust($total) {
    
    $bust = $total > 21 ? true : false;

    return $bust;
}

function initial_deal($deck,$number = 2) {
    // Create your hand
    $hand = [];
    
    //initiate counter
    $count = 0;
    // Fill your hand with cards from the deck.
    do{
        
        // Pick a suit from the deck
        $suit = array_rand($deck);
        
        // We need to check to see if the current suit has any cards left
        if(empty($deck["$suit"])) {
            continue;
        }

        // Pick a card
        $card = $deck["$suit"][array_rand($deck["$suit"])];
        echo "$card of $suit\n";
        $hand[] = [$card,$suit];

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

        $count++;

    }while($count < $number);

    return $hand;
}

function remove_cards($deck, $myhand, $dealhand) {
    
    $new_deck = $deck;

    foreach ($myhand as $card) {
        if(array_search($card[1], $new_deck[$card[0]]) !== false){
            unset($new_deck[$card[0]][$card[1]]);
        }
    }

    foreach ($dealhand as $card) {
        if(array_search($card[1], $new_deck[$card[0]]) !== false) {
            unset($new_deck[$card[0]][$card[1]]);
        }
    }

    return $new_deck;
}


//***********************************
//***********************************
//          Game Begin
//***********************************
//***********************************


$my_hand = initial_deal($deck);

print_r($my_hand);

$my_total = getTotal($my_hand);

echo 'My hand total is ' . $my_total . PHP_EOL;

$dealer_hand = initial_deal($deck);

print_r($dealer_hand);

$dealer_total = getTotal($dealer_hand);

echo 'The dealer\'s hand total is ' . $dealer_total . PHP_EOL;

$deck = remove_cards($deck,$my_hand,$dealer_hand);

print_r($deck);


 ?>