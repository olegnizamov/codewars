<?php
//https://www.codewars.com/kata/5841f680c5c9b092950001ae

function generate_integers(int $m, int $n): array {
    $arr = [];

    for ($i=$m;$i<=$n;$i++){
        $arr[]=$i;
    }

    return $arr;
}