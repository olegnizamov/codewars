<?php
//https://www.codewars.com/kata/5276c18121e20900c0000235

function find_number(array $a): int {
    sort($a);

    $findZooElement=1;

    foreach($a as $zooElement){
        if($zooElement!==$findZooElement){
            return $findZooElement;
        }
        $findZooElement++;
    }

    return $findZooElement;
}