<?php

function persistence(int $num): int {
    $count = 0;

    while(intdiv($num,10)>0) {
        $multiplication = 1;
        $arrDigit = str_split((string)$num);
        foreach ($arrDigit as $digit) {
            $multiplication *= (int)$digit;
        }
        $num = $multiplication;
        $count ++;
    }

    return $count;
}