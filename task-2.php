<?php

require "lib.php";   // получаем массив с данными

$sortedArray = [];

// фильтруем массив, получаем элементы с уникальными id
$tempArray = array_unique(array_column($inputArray, 'id' ));
$uniqueArray = array_intersect_key($inputArray, $tempArray );
$sortedArray = $uniqueArray;

/**
 * получаем столбец по ключу «sort_order»,
 * и сортируем массив по этому столбцу
 */
$keys = array_column($sortedArray, 'sort_order');
array_multisort($keys, SORT_ASC, $sortedArray);

consoleLog('Sort multilevel array', $sortedArray);
