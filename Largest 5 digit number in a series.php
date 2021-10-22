<?php
//https://www.codewars.com/kata/51675d17e0c1bed195000001

function solution(string $s): int {

    $answer = 0;

    for($i = 0;$i< strlen($s)-4;$i++){
        $result = (int) substr($s,$i,5);
        $answer=$answer < $result ? $result : $answer;
    }

    return $answer;
}