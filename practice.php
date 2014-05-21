<?php

$array = ['hello','Hello','apple','Apple'];

asort($array, SORT_NATURAL | SORT_FLAG_CASE);

print_r($array);


?>