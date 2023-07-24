<?php
include "./conf/config.php";

function calculate($option, $answer){

    switch ($option) {
        case '1':
        case '3':
            $result = calculate_probability(CENTER_SQUARE_TIME, $answer);
            return ("The probability that the $answer is on the center square after ". CENTER_SQUARE_TIME . " seconds is " .  round($result[3][3], 3));
        
        case '2':
        case '4':
            $result = calculate_probability(OUTERMOST_SQUARE_TIME, $answer);
            return ("The probability that the $answer is on one of the outermost squares after " . OUTERMOST_SQUARE_TIME . " seconds is " . round($result[1][1] + $result[1][MATRIX_SIZE] + $result[MATRIX_SIZE][1] + $result[MATRIX_SIZE][MATRIX_SIZE], 3));
    }
}

function calculate_probability($time, $answer){

    $prev = array_fill(0, 7, array_fill(0, 7, 0));
    $now = array_fill(0, 7, array_fill(0, 7, 0));
    $size = ceil(MATRIX_SIZE / 2 );
    $prev[$size][$size] = 1;
    
    for ($i = 0; $i < $time; $i++) {
        for ($x = 1; $x <= MATRIX_SIZE; $x++) {
            for ($y = 1; $y <= MATRIX_SIZE; $y++) {

                if($answer == "ant"){
                    $now[$x][$y] = 0.2 * ($prev[$x - 1][$y] + $prev[$x + 1][$y] + $prev[$x][$y - 1] + $prev[$x][$y] + $prev[$x][$y + 1]);
                    
                }else if($answer == "beetle"){
                    $now[$x][$y] = 0;
                    // Move north two squares
                    if ($x >= 2) {
                        $now[$x][$y] += 0.2 * $prev[$x - 2][$y];
                    }
                    // Move south two squares
                    if ($x <= 4) {
                        $now[$x][$y] += 0.2 * $prev[$x + 2][$y];
                    }
                    // Move east two squares
                    if ($y <= 4) {
                        $now[$x][$y] += 0.2 * $prev[$x][$y + 2];
                    }
                    // Move west two squares
                    if ($y >= 2) {
                        $now[$x][$y] += 0.2 * $prev[$x][$y - 2];
                    }
                    // Stay in the same position
                    $now[$x][$y] += 0.2 * $prev[$x][$y];
                }
            }
        }
        for ($x = 1; $x <= MATRIX_SIZE; $x++) {
            $now[1][$x] += 0.2 * $prev[1][$x];
            $now[MATRIX_SIZE][$x] += 0.2 * $prev[MATRIX_SIZE][$x];
            $now[$x][1] += 0.2 * $prev[$x][1];
            $now[$x][MATRIX_SIZE] += 0.2 * $prev[$x][MATRIX_SIZE];
        }
        $some = $prev;
        $prev = $now;
    }

    return $now;
}