<?php
//https://www.codewars.com/kata/54ba84be607a92aa900000f1

function isIsogram($string) {

    $result = [];


    for ($i = 0; $i <= strlen($string); $i++) {
        $result[strtolower($string[$i])]++;
    }

    return  $peremennaa= max($result)>1 ? false : true;
}