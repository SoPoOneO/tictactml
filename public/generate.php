<?php

$width = 3;
$height = 3;

function l($val){

    echo "<pre font-color='red'>";
    echo "-------\n";
    print_r($val);
    echo "</pre>";
}

function k($val){
    l($val);
    exit;
}

function chooseMove($board, $player='o'){

    $nulls = findAllNulls($board);

    if(count($nulls)){

        $key = array_rand($nulls);
        return $nulls[$key];
    }

}

function getAllPossibleRows(){

    $options = ['x', 'o', null];

    $rows = [];

    foreach($options as $option_0){
        foreach($options as $option_1){
            foreach($options as $option_2){
                $rows[] = [$option_0, $option_1, $option_2];
            }
        }
    }
    return $rows;
}

function getAllPossibleBoards(){

    $options = getAllPossibleRows();

    $boards = [];

    foreach($options as $option_0){
        foreach($options as $option_1){
            foreach($options as $option_2){
                $boards[] = [$option_0, $option_1, $option_2];
            }
        }
    }
    return $boards;
}

function getPath($board){
    $sections = [];
    foreach($board as $row => $cols){
        $section = '';
        foreach($cols as $col => $val){
            $section .= $val ? $val : '-';
        }
        $sections[] = $section;
    }

    return implode($sections, '/');
}

function findAllNulls($board){
    $nulls = [];
    foreach($board as $row => $cols){
        foreach($cols as $col => $val){
            if(is_null($val)){
                $nulls[] = [$row, $col];
            }
        }
    }
    return $nulls;
}

function render($board, $moves){

    ob_start();
    include 'template.php';
    $html = ob_get_clean();

    $path = getPath($board);

    $chunks = explode('/', $path);
    array_pop($chunks);

    $dir = 'boards/';
    foreach($chunks as $chunk){
        $dir .= $chunk . '/';
        if (!file_exists($dir)) {
            mkdir($dir);
        }
    }
    file_put_contents('boards/' . $path . '.html', $html);
}

function findFirstNull($board){

    $nulls = findAllNulls($board);

    if(count($nulls)){
        return $nulls[0];
    }
}

function getMoves($board){
    $moves = [];
    foreach(findAllNulls($board) as $x_move){
        $new_board = $board;
        $new_board[$x_move[0]][$x_move[1]] = 'x';
        if($o_move = chooseMove($new_board, 'o')){
            $new_board[$o_move[0]][$o_move[1]] = 'o';
        }
        $moves[$x_move[0]][$x_move[1]] = getPath($new_board);
    }
    return $moves;
}

foreach(getAllPossibleBoards() as $i => $board){
    $moves = getMoves($board);
    render($board, $moves);
}

echo "done";