<?php

/**
 * Эти тестовые данные будем использовать во всех заданиях
 */
$inputArray = [
    ['id' => 1, 'date' => "12.01.2020 100", 'name' => "test1", 'sort_order' => 100],
    ['id' => 2, 'date' => "02.05.2020 1", 'name' => "test2", 'sort_order' => 1],
    ['id' => 4, 'date' => "08.03.2020 12", 'name' => "test4", 'sort_order' => 12],
    ['id' => 1, 'date' => "22.01.2020 73", 'name' => "test1", 'sort_order' => 73],
    ['id' => 2, 'date' => "11.11.2020 91", 'name' => "test4", 'sort_order' => 91],
    ['id' => 3, 'date' => "06.06.2020 56", 'name' => "test3", 'sort_order' => 56],
];


/**
 * @param $note
 * @param $data
 * @return void
 *
 * Имя функции согласно PSR-1, и в стиле javaScript
 */
function consoleLog($note, $data)
{
    echo PHP_EOL, $note, PHP_EOL, print_r($data), '--', PHP_EOL;
}
