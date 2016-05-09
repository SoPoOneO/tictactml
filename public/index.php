<?php

$width = 3;
$height = 3;


function chooseMove($board, $player='x'){

    $move = findFirstNull($board);

    return $move;
}

function getAllPossibleRows(){

    $options = ['X', 'O', null];

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

    return implode($sections, '/') . '.html';
}

function findAllNulls($board){
    $nulls = [];
    foreach($board as $row => $cols){
        foreach($cols as $col => $val){
            if(is_null($val)){
                return $nulls[] = [$row, $col];
            }
        }
    }
    return $nulls;
}

function render($board){

    ob_start();
    include 'template.php';
    $html = ob_get_clean();

    $path = 'boards/' . getPath($board);

    $chunks = explode('/', $path);
    array_pop($chunks);

    $dir = '';
    foreach($chunks as $chunk){
        $dir .= $chunk . '/';
        if (!file_exists($dir)) {
            mkdir($dir);
        }
    }
    file_put_contents($path, $html);
}

function findFirstNull($board){

    $nulls = findAllNulls($board);

    if(count($nulls)){
        return $nulls[0];
    }
}

foreach(getAllPossibleBoards() as $i => $board){
    render($board);
}

echo "done";