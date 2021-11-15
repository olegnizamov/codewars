<?php

function arrayDiff($a, $b)
{
    $result = [];
    //array_values!!
    foreach(array_diff($a, $b) as $element){
        $result[] = $element;
    }

    return $result;
}