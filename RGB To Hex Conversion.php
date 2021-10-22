<?php
//https://www.codewars.com/kata/513e08acc600c94f01000001

function correctData($data)
{
    if ($data > 255) {
        return 255;
    }

    if ($data < 0) {
        return 0;
    }
    return $data;
}

function rgb($r, $g, $b)
{

    $r = correctData($r);
    $g = correctData($g);
    $b = correctData($b);

    return strtoupper( (strlen(dechex($r)) > 1 ? dechex($r) : '0'.dechex($r)).
                       (strlen(dechex($g)) > 1 ? dechex($g) : '0'.dechex($g)).
                       (strlen(dechex($b)) > 1 ? dechex($b) : '0'.dechex($b)));
}