<?php
include 'src/challenge.php';

$option = $argv[1];
$answer = $argv[2];

if($option === '5'){
    $response = calculate(1, "ant") . "\n" . calculate(2, "ant") . "\n" . calculate(1, "beetle") . "\n" . calculate(2, "beetle");
}else{
    $response = calculate($option, $answer);   
}

echo $response . "\n";