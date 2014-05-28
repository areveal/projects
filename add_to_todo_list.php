<?php

function get_input($upper = false) {

    $result = trim(fgets(STDIN));
    
    return $upper ? strtoupper($result) : $result;

}

$filename = '/vagrant/todo_list/data/list.txt';

$write = fopen($filename, 'a');

fwrite(STDOUT, 'What would you like to the list?: ');

$new_input = get_input();

fwrite($write, $new_input . PHP_EOL);

fclose($write);

$contents = file_get_contents($filename);

echo $contents;

?>