<?php

$players            = [1 => 'X', 2 => 'O'];
$computer_player    = 2;
$board_width        = 3;
$board_height       = 3;

$number_of_boards   = pow(count($players) + 1, $board_width * $board_height);

for($i = 0; $i < $number_of_boards; $i++){

    $board      = getBoard($i);
    $moves      = getMoves($board);
    $winners    = getWinners($board);

    renderBoard($board, $moves, $winners);

    if($i > 1000){exit;}
}

function l($var){
    echo "<pre style='color: red'>";
    print_r($var);
    echo "</pre>";
}

function getBoard($number){

    global $board_width, $board_height;

    $three_base = base_convert($number, 10, 3);

    $three_base = str_pad($three_base, $board_width * $board_height, '0', STR_PAD_LEFT);

    $board = [];
    for($i = 0; $i < $board_height; $i++){
        $row = [];
        for($j = 0; $j < $board_width; $j++){
            $char = $i * $board_height + $j;
            $row[] = $three_base{$char};
        }
        $board[] = $row;
    }

    return $board;

}


function renderBoard($board, $moves, $winners){

    global $players;

    // show x or 0 put in place as defined by $board values
    // have move links put in each blank space
    // write winners at the bottom
    // save board to file

    include 'board_template.php';

}

function getMoves($board){

}


// returns a two value array of coords computer picks
function getComputerMove($board, $player = 2){

    // stub it out by returning first free space
    return getFirstFreeSpace($board);

}

// given a board, decide how good it is
function calculateScore($board, $player = 2){

    // stub it out by returning 10

}

function getFreeSpaces($board){

    $free_spaces = [];

    for($i = 0; $i < $board_width; $i++){
        for($j = 0; $j < $board_height; $j++){
            if(is_null($board[$i][$j])){
                $free_spaces[] = [$i, $j];
            }
        }
    }

    return $free_spaces;
}


function getFirstFreeSpace($board){
    
    $free_spaces = getFreeSpaces($board);

    if(isset($free_spaces[0])){
        return $free_spaces[0];
    }
}
    

function getWinners($board){

    // return a list of how many times each board piece won

    $stub = array(
        0 => 0,
        1 => 2
    );

    return $stub;
}