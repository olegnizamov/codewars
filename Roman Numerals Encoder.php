<?php
//https://www.codewars.com/kata/51b62bf6a9c58071c600001b

function solution($value)
{
    if (!$value) return "0";

    $thousands = (int)($value / 1000);
    $value -= $thousands * 1000;
    $result = str_repeat("M", $thousands);

    $table = [
        900 => "CM", 500 => "D", 400 => "CD", 100 => "C",
        90  => "XC", 50 => "L", 40 => "XL", 10 => "X",
        9   => "IX", 5 => "V", 4 => "IV", 1 => "I"];

    foreach ($table as $part => $fragment){
        $amount = (int)($value / $part);
        $value -= $part * $amount;
        $result .= str_repeat($fragment, $amount);
    }

    return $result;
}