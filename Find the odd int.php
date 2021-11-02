<?php

function findIt(array $seq) : int
{
   $result = [];
   foreach($seq as $element){
       $result[$element]++;
   }

    foreach($result as $elementIndex => $elementCount){
        if($elementCount%2==1) return $elementIndex;
    }

    return 0;
}