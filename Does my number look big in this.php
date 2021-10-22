<?php
//https://www.codewars.com/kata/5287e858c6b5a9678200083c

function narcissistic(int $value): bool
{
    $result = 0;
    $pow = (int)strlen($value);
    $arr = str_split($value);
    foreach ($arr as $position) {
        $result += pow((int)$position, $pow);
    }

    return $result==$value;
}