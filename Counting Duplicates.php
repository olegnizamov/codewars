<?php

function duplicateCount($text)
{
    $length = strlen($text);
    $arrayResult = [];
    $result = 0;
    for ($i = 0; $i < $length; $i++) {
        $arrayResult[strtoupper($text[$i])]++;
    }
    foreach ($arrayResult as $element) {
        if ($element > 1) {
            $result++;
        }
    }
    return $result;
}