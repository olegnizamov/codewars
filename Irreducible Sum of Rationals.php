<?php
//https://www.codewars.com/kata/5517fcb0236c8826940003c9

function gcd($a, $b) {
    while ($a != $b)
        if ($a>$b)
            $a -= $b;
        else
            $b -= $a;
    return $a;
}


function sumFracts($l)
{
    // your code
    $answer = null;

    $nod = 1;
    $numeratorSum = 0;
    $denominator = 1;

    foreach ($l as $value) {
        $denominator *= $value[1];
    }

    foreach ($l as $value) {
        $numeratorSum += $value[0] * ($denominator / $value[1]);
    }

    if ($numeratorSum > 0) {
        $nod = gcd($numeratorSum, $denominator);
        $numeratorSum=$numeratorSum / $nod;
        $denominator= $denominator/$nod;

        if($numeratorSum%$denominator==0){
            $answer=$numeratorSum/$denominator;
        }else{
            $answer=[$numeratorSum,$denominator];
        }

    }

    return $answer;
}