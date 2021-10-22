<?php
//https://www.codewars.com/kata/5679aa472b8f57fb8c000047

function find_even_index($arr)
{

    $leftSum = 0;
    $rightSum = array_sum($arr);

    foreach ($arr as $index => $value) {
        $rightSum -= $value;

        if ($leftSum === $rightSum) {
            return $index;
        }
        $leftSum += $value;

    }

    return -1;
}