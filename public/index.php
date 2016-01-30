<style>

body{
    font-family:monospace;
    font-size: 24px;
}

</style>
<body>


<?php

$digits             = "_xo";
$sequence_length    = 3;
$bunch_length       = 3;

$pad_char           = $digits{0};
$bunch_quantity     = $sequence_length / $bunch_length;
$digits_length      = strlen($digits);
$max_size           = pow($digits_length, $sequence_length);

function stringify($number, $digits){

    $digits_length = strlen($digits);
    $str = "";

    while($number > 0){
        $index = $number % $digits_length;
        $digit = $digits{$index};
        $str = $digit . $str;
        $number = floor($number / $digits_length);
    }

    return $str;
}


for($i = 0; $i < $max_size; $i++){

    $number = stringify($i, $digits);

    $sequence = str_pad($number, $sequence_length, $pad_char, STR_PAD_LEFT);

    $path = trim(chunk_split($sequence, $bunch_length, '/'), '/') . ".html";


    echo $path . "<br>";

    touch(dirname(__FILE__) . '/boards/' . $path);
}



?>

</body>
