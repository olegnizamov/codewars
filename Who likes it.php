<?php

function likes($names)
{
    $count = count($names);
    $result = "";
    switch ($count) {
        case 0:
            $result = "no one likes this";
            break;
        case 1:
            $result = current($names) . " likes this";
            break;
        case 2:
            $result = implode(' and ', $names) . " like this";
            break;
        case 3:
            $result = $names[0] . ', ' . $names[1] . ' and ' . $names[2] . " like this";
            break;
        default:
            $result = $names[0] . ', ' . $names[1] . ' and ' . ($count - 2) . " others like this";
    }


    return $result;
}