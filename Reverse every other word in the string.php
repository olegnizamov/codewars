<?php

function reverse($str)
{
    $str = trim($str);
    $newStr = str_replace("  ", ' ', $str);
    $array = explode(" ", $newStr);
    if (empty($array)) {
        return '';
    }

    foreach ($array as $index => $elementOfText) {
        if ($index % 2 === 1) {
            $array[$index] = strrev($elementOfText);
        }
    }

    return implode(' ', $array);
}