<?php

$hourly = 14.5;
$com = .025;
$spw = 10000;
$current = 18.75;

echo PHP_EOL;

echo "Brandon's pay for the year is currenlty " . $current * 2088 . ".\n";

echo "Brandon's pay will be " . (($hourly * 2088) + ($spw * $com * 26)) . ".\n\n\n\n";


echo "Brandon made " . $current *2088 . " in hourly salary last year.\n";  

echo "Brandon will make " . $hourly *2088 . " in hourly salary this year.\n";  

echo "Brandon will make " . ($spw * $com * 26) . " in commision salary this year.\n";  

echo $spw / 8 . PHP_EOL;


?>