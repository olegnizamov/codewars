<?php


function kebabize($string)
{
    $resultString = "";
    $arrayOfName = str_split($string);
    foreach ($arrayOfName as $symbol) {
        if (is_numeric($symbol)) {
            continue;
        }
        if (ctype_upper($symbol) && !empty($resultString)) {
            $resultString .= '-' . strtolower($symbol);
        } else {

            $resultString .= strtolower($symbol);
        }
    }

    return $resultString;
}