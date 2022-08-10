<?php

/**
 * Задание 2:
 * отсортировать многомерный массив по ключу (любому)
 *
 */
require "lib.php";   // получаем массив с данными

$sortedArray = [];

/**
 * Соритруем уникализированый массив
 */
// фильтруем массив, получаем элементы с уникальными id
$tempArray = array_unique(array_column($inputArray, 'id' ));
$uniqueArray = array_intersect_key($inputArray, $tempArray );
$sortedArray = $uniqueArray;

/**
 * ...получаем столбец по ключу «sort_order»,
 * и сортируем массив по этому столбцу
 */
$keys = array_column($sortedArray, 'sort_order');
array_multisort($keys, SORT_ASC, $sortedArray);

consoleLog('Unique data: sort multilevel array', $sortedArray);

/**
 * Сортируем сырой массив
 */
$keys = array_column($inputArray, 'sort_order');
array_multisort($keys, SORT_ASC, $inputArray);

consoleLog('Raw data: sort multilevel array', $inputArray);