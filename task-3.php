<?php

/**
 * Задание 3:
 * вернуть из массива только элементы,
 * удовлетворяющие внешним условиям (например элементы с определенным id)
 */
require "lib.php";   // получаем массив с данными

$filteredArray = [];

// будем фильтровать, для примера, по двум
$filter = [
    ['name' => 'test1'],
    ['name' => 'test4'],
];

// формируем массив значений, по которым будем фильтровать

$ids = array_map(function($n) {
    return array_values($n)[0];
}, $filter);

// для фильтрации по заданным параметрам используем callback функцию
$filteredArray = array_filter($inputArray, function($n) use($ids) {
    return in_array($n['name'], $ids);
});


consoleLog('Filtered array by «name» values', $filteredArray);