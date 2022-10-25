<?php


function phi(){
    return 3.14;
}

echo phi(); // 3.14

echo '<hr>';

function add($a, $b){
    return $a + $b;
}

echo add(4, 5); // 9

echo '<hr>';

function add_2($a = 2, $b = 3){
    return $a + $b;
}

echo '1 - '.add_2();   // 6
echo '<hr>';
echo '2 - '.add_2(4);  // 6
echo '<hr>';
echo '3 - '.add_2(b:2);  // 7