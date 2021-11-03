<?php

function duplicate_encode($word)
{

    $resultString = '';
    $strToArray = str_split(strtoupper($word));
    $arrayOfCount = array_count_values($strToArray);

    foreach ($strToArray as $char) {
        if ($arrayOfCount[$char] > 1) {
            $resultString .= ')';
        } else {
            $resultString .= '(';
        }

    }
    return $resultString;
}

