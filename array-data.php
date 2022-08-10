<?php

/**
 * Эти тестовые данные будем использовать во всех заданиях
 */
$inputArray = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
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
