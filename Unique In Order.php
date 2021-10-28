<?php

function uniqueInOrder($iterable){
    $ret=[];

    if(!is_array($iterable)){
        $iterable = str_split($iterable);
    }
    $lastElement = '';

    foreach($iterable as $element){
        if($element !==$lastElement){
            $lastElement = $ret[]=$element;
        }
    }

    return $ret;
}