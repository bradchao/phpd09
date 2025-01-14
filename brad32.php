<?php
    $a = 10; $b = 7;

//    $c = $a;
//    $a = $b;
//    $b = $c;

    /*
    $a = $a + $b;   // $a = 13
    $b = $a - $b;   // $b = 10
    $a = $a - $b;   // $a = 3
    */

    $a = $a ^ $b;
    $b = $a ^ $b;
    $a = $a ^ $b;

    echo "a = {$a}; b = {$b}<br />";

    $c = 3; $d = 2;
    echo ($c & $d) . '<br />';
    echo ($c | $d) . '<br />';
    echo ($c ^ $d) . '<br />';


?>