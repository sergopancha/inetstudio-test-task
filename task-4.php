<?php

/**
 * Задание 4:
 * изменить в массиве значения и ключи
 * (использовать name => id в качестве пары ключ => значение)
 */
require "lib.php";   // получаем массив с данными

/**
 * НЕ УДАЛОСЬ разработать код БЕЗ использования foreach.
 * Часть решения реализована через фццнкции php, вторая часть через перебор массива
 */

// уникализируем массив
$ids = array_unique( array_column($inputArray, 'id') );
$uniqueArray = array_filter($inputArray, function ($key, $value) use ( $ids ) {
    return in_array($value, array_keys($ids));
}, ARRAY_FILTER_USE_BOTH);

// собираем пары id-name
$reverseArray = array_map(function($tag) {

    return array(
        'name' => $tag['id'],
        'id' => $tag['name']

    ); }, $uniqueArray);


// создаём новый массив с заменой местами id-name
foreach ($reverseArray as $key=>$value) {
    $finalArray[ $value['id'] ] = $value['name'];
}

consoleLog('Reverse keys and values: «id» and «name»', $finalArray);