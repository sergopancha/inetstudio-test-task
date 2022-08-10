<?
require "array-data.php";   // получаем массив с данными

/**
 * Способ 1.
 *
 * Делаем фильтрацию массива через callback-функцию.
 * Для фильтра используем значение ключа 'id'
 */

$uniqueArray =  [];
$uniqueArray = array_filter($inputArray, function ($value) use (&$used) {
    $key = $value['id'];
    if (isset($used[$key])) return false;
    return $used[$key] = true;
});

consoleLog("Method 1", $uniqueArray);

/**
 * Способ 2.
 *
 * Получаем результат за две итерации
 *
 * Как работает этот способ?
 *
 * array_column: получаем массив из значений указанного ключа (столбца) входного массива,
 *
 * array_unique: фильтруем по уникальным значениям
 *
 * array_intersect_key: получаем пересечения (общие элементы) ключей
 * между исходным и отфильтрованным массивами
 */


// *** В ОДНУ СТРОКУ КОДА
$uniqueArray = [];
$uniqueArray = array_intersect_key($inputArray, array_unique( array_column($inputArray, 'id') ) );
consoleLog("Method 2, inline style ",$uniqueArray);


// *** В ДВЕ СТРОКИ КОДА
$uniqueArray = [];

$tempArray = array_unique(array_column($inputArray, 'id' ));
$uniqueArray = array_intersect_key($inputArray, $tempArray );
consoleLog("Method 2, multiline style ", $uniqueArray);

/**
 * Способ 3
 *
 * Комбинированный в две итерации: уникальность и фильтрация
 *
 *
 */

$uniqueArray = [];

// *** почти в одну строку кода
$ids = array_unique( array_column($inputArray, 'id') );
$uniqueArray = array_filter($inputArray, function ($key, $value) use ( $ids ) {
    return in_array($value, array_keys($ids));
}, ARRAY_FILTER_USE_BOTH);

consoleLog("Method 3, inline style ",$uniqueArray);

$uniqueArray = [];


// *** подробно расписываем промежуточные операции
$ids = array_column($inputArray, 'id');
$ids = array_unique($ids);
$uniqueArray = array_filter($inputArray, function ($key, $value) use ($ids) {
    return in_array($value, array_keys($ids));
}, ARRAY_FILTER_USE_BOTH);

consoleLog("Method 3, multiline style ", $uniqueArray);


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
