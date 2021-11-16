<?php

function movingShift($s, $shift)
{
    $arr = str_split($s);
    $len = strlen($s);
    $asciiSmallA = ord('a');
    $asciiBigA = ord('A');
    $resultArray = ['', '', '', '', ''];

    foreach ($arr as $index => $symbol) {
        if (in_array(ord($symbol), range(65, 90), true)
            || in_array(ord($symbol), range(97, 122), true)) {
            $type = ord($symbol) > 90 ? $asciiSmallA : $asciiBigA;
            $newCharIndex = $type + (ord($symbol) + $shift - $type) % 26;
            $arr[$index] = chr($newCharIndex);
        }
        $shift++;
    }
    $s = implode('', $arr);

    $countInParts = ceil($len / 5);
    $offset = 0;
    foreach ($resultArray as $indexPart => $partForSending) {
        $resultArray[$indexPart] = substr($s, $offset, $countInParts);
        $offset += $countInParts;
        if (($len - $offset - $countInParts) < 0) {
            $countInParts = $len - $offset;
        }
    }

    return $resultArray;
}

function demovingShift($arr, $shift)
{
    $s = implode('', $arr);
    $arr = str_split($s);

    $asciiSmallZ = ord('z');
    $asciiBigZ = ord('Z');

    foreach ($arr as $index => $symbol) {
        if (in_array(ord($symbol), range(65, 90), true)
            || in_array(ord($symbol), range(97, 122), true)) {
            $type = ord($symbol) > 90 ? $asciiSmallZ : $asciiBigZ;
            $newCharIndex = $type + (ord($symbol) - $shift - $type) % 26;
            $arr[$index] = chr($newCharIndex);
        }
        $shift++;
    }
    return implode('', $arr);
}