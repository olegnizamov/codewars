<?php

function mix($s1, $s2)
{
    $arrSymbols1 = array_count_values(str_split(preg_replace('/[^a-z]/', '', $s1)));
    $arrSymbols2 = array_count_values(str_split(preg_replace('/[^a-z]/', '', $s2)));
    arsort($arrSymbols1);
    arsort($arrSymbols2);

    $result = [];
    foreach ($arrSymbols1 as $symbol => $count) {
        if (array_key_exists($symbol, $arrSymbols2)) {
            $resultsSymbol = ($arrSymbols2[$symbol] > $count) ? '2:' . str_repeat(
                    $symbol,
                    $arrSymbols2[$symbol]
                ) : (($arrSymbols2[$symbol] < $count) ? '1:' . str_repeat($symbol, $count) : '=:' . str_repeat(
                    $symbol,
                    $count
                ));
            $resultCount = ($arrSymbols2[$symbol] > $count) ? $arrSymbols2[$symbol] : $count;
            if ($resultCount > 1) {
                $result[$resultCount][$resultsSymbol] = $resultsSymbol;
            }
            unset($arrSymbols2[$symbol]);
        } else {
            if ($count > 1) {
                $result[$count]['1:' . str_repeat($symbol, $count)] = '1:' . str_repeat($symbol, $count);
            }
        }
    }

    foreach ($arrSymbols2 as $symbol => $count) {
        if ($count > 1) {
            $result[$count]['2:' . str_repeat($symbol, $count)] = '2:' . str_repeat($symbol, $count);
        }
    }

    krsort($result);

    $array = [];
    foreach ($result as $counts) {
        ksort($counts);
        foreach (array_values($counts) as $count) {
            $array[] = $count;
        }
    }
    return implode('/', $array);
}