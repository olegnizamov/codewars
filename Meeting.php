<?php

function meeting($s)
{
    $arrUsers = explode(";", $s);
    $arResult = [];

    $accum = 0;
    foreach ($arrUsers as $user) {
        list($name, $surname) = explode(":", $user);
        $name = strtoupper($name);
        $surname = strtoupper($surname);
        if (!array_key_exists($surname .'-'. $name, $arResult)) {
            $arResult[$surname .'-'. $name] = '(' . $surname . ', ' . $name . ')';
        } else {
            $arResult[$surname .'-'. $name .'-'. $accum] = '(' . $surname . ', ' . $name . ')';
            $accum++;
        }
    }
    ksort($arResult);
    return implode('', $arResult);
}