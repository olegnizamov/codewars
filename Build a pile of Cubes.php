<?php

function findNb($m)
{
    $resultN = (int) ((sqrt(1 + 8 * sqrt($m)) - 1) / 2);
    return ($resultN*($resultN+1)/2==sqrt($m)) ? $resultN : -1;
}

echo findNb(4183059834009);