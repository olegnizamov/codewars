<?php
//https://www.codewars.com/kata/5ae62fcf252e66d44d00008e

function expressionMatter($a, $b, $c) {
    $result=[];
    $result[]=$a+$b+$c;
    $result[]=$a*$b*$c;
    $result[]=$a*($b+$c);
    $result[]=($a+$b)*$c;
    $result[]=$a*$b+$c;
    $result[]=$a+$b*$c;

    return max($result);
}