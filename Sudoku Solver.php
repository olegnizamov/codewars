<?php

function sudoku(array $puzzle): array
{
    [$queue, $resultQueue] = getEmptyFields($puzzle);

    $keysQueue = array_keys($queue);
    $test = 0;
    while (!empty($resultQueue)) {
        foreach ($resultQueue as $index => $positionInMatrix) {
            //Увеличиваем элемент и проверяем его
            [$x, $y] = explode(':', $positionInMatrix);
            $flagIncorrectValue = false;
            do {
                $queue[$positionInMatrix]++;
                if ($queue[$positionInMatrix] <= 9) {
                    $flagExist = false;
                    for ($i = 0; $i < 9; $i++) {
                        if (($puzzle[$x][$i] === $queue[$positionInMatrix]) || ($puzzle[$i][$y] === $queue[$positionInMatrix])) {
                            $flagExist = true;
                            break;
                        }
                    }
                    if (!$flagExist) {
                        for ($i = 3 * ((int) floor($x / 3)); $i < 3 * ((int) (floor($x / 3) + 1)); $i++) {
                            for ($j = 3 * ((int) floor($y / 3)); $j < 3 * ((int) (floor($y / 3) + 1)); $j++) {
                                if ($puzzle[$i][$j] === $queue[$positionInMatrix]) {
                                    $flagExist = true;
                                    break;
                                }
                            }
                        }
                    }
                }

                if ($queue[$positionInMatrix] > 9) {
                    $flagIncorrectValue = true;
                }
            } while ($flagExist && !$flagIncorrectValue);

            if (!$flagIncorrectValue) {
                //Устанавливаем значения в матрице, устанавливаем последний элемент и удаляем элемент из очереди, т.к он больше не пустой.
                $puzzle[$x][$y] = $queue[$positionInMatrix];
                unset($resultQueue[$index]);
            } else {
                $lastIndex = $keysQueue[array_search($positionInMatrix, $keysQueue, true) - 1];
                if (!empty($lastIndex)) {
                    $queue[$positionInMatrix] = 0;
                    [$x, $y] = explode(':', $lastIndex);
                    $puzzle[$x][$y] = 0;
                    array_unshift($resultQueue, $lastIndex);
                }
                break;
            }
        }
    }

    return $puzzle;
    // Return the solved puzzle as a 9 × 9 grid
}

/**
 * @param array $puzzle
 * @return array
 */
function getEmptyFields(array $puzzle): array
{
//Вытаскиваем все пустые элементы и ставим их в очередь
    $queue = []; // здесь храним очередь для перебора
    $resultQueue = []; //здесь храним индексы пустые значения, равные 0
    foreach ($puzzle as $indexRow => $row) {
        foreach ($row as $indexColumn => $element) {
            if ($element === 0) {
                $queue[$indexRow . ':' . $indexColumn] = 0;
                $resultQueue[] = $indexRow . ':' . $indexColumn;
            }
        }
    }
    return [$queue, $resultQueue];
}


$array = [
    [5, 3, 0, 0, 7, 0, 0, 0, 0],
    [6, 0, 0, 1, 9, 5, 0, 0, 0],
    [0, 9, 8, 0, 0, 0, 0, 6, 0],
    [8, 0, 0, 0, 6, 0, 0, 0, 3],
    [4, 0, 0, 8, 0, 3, 0, 0, 1],
    [7, 0, 0, 0, 2, 0, 0, 0, 6],
    [0, 6, 0, 0, 0, 0, 2, 8, 0],
    [0, 0, 0, 4, 1, 9, 0, 0, 5],
    [0, 0, 0, 0, 8, 0, 0, 7, 9],
];

$result = [
    [5, 3, 4, 6, 7, 8, 9, 1, 2],
    [6, 7, 2, 1, 9, 5, 3, 4, 8],
    [1, 9, 8, 3, 4, 2, 5, 6, 7],
    [8, 5, 9, 7, 6, 1, 4, 2, 3],
    [4, 2, 6, 8, 5, 3, 7, 9, 1],
    [7, 1, 3, 9, 2, 4, 8, 5, 6],
    [9, 6, 1, 5, 3, 7, 2, 8, 4],
    [2, 8, 7, 4, 1, 9, 6, 3, 5],
    [3, 4, 5, 2, 8, 6, 1, 7, 9],
];


foreach ($array as $indexRow => $row) {
    echo implode(' ', $row) . "<br>";
}
echo '<hr>';

foreach ($result as $indexRow => $row) {
    echo implode(' ', $row) . "<br>";
}
echo '<hr>';


$puzzle = sudoku($array);

foreach ($puzzle as $indexRow => $row) {
    echo implode(' ', $row) . "<br>";
}