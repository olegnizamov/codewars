<?php
//https://www.codewars.com/kata/5b358a1e228d316283001892

function get_strings($city) {

    $arr1 = str_split(strtolower(str_replace(" ", "", $city)));
    $arrResult=[];

    foreach($arr1 as $letter){
        $arrResult[$letter]++;
    }

    $result="";
    foreach($arrResult as $key=>$value){
        $result.=(empty($result)? '' : ',').$key.':'.str_repeat("*", $value);
    }

    return $result;
}