<?php
//https://www.codewars.com/kata/57cebe1dc6fdc20c57000ac9

function findShort($str)
{
    $arr = explode(" ", $str);

    $minLength = PHP_INT_MAX;
    foreach ($arr as $value) {
        if ($minLength > strlen($value)) {
            $minLength = strlen($value);
        }
    }

    return $minLength;
}