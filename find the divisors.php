<?php
//https://www.codewars.com/kata/544aed4c4a30184e960010f4

function divisors($integer) {

    $result = [];
    for($i=2;$i<$integer;$i++){
        if ($integer%$i==0){
            $result[]=$i;
        }
    }

    if(empty($result)){
        return "$integer is prime";
    }

    return $result;
}