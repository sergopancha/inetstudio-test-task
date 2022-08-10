<?
$inputArray = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];


/**
 * Способ 1.
 *
 * Делаем фильтрацию массива через callback-функцию.
 * Для фильтра используем ключа 'id'
 */

$uniqueArray =  [];
$uniqueArray = array_filter($inputArray, function ($value) use (&$used) {
    $key = $value['id'];
    if (isset($used[$key])) return false;
    return $used[$key] = true;
});

echo "Method 1",PHP_EOL, print_r($uniqueArray), '--',PHP_EOL;

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

echo "Method 2, inline style ",PHP_EOL, print_r($uniqueArray), '--',PHP_EOL;
print_r($uniqueArray);



// *** В ДВЕ СТРОКИ КОДА
$uniqueArray = [];

$tempArray = array_unique(array_column($inputArray, 'id' ));
$uniqueArray = array_intersect_key($inputArray, $tempArray );

echo "Method 2, multiline style ",PHP_EOL, print_r($uniqueArray), '--',PHP_EOL;

/**
 * Способ 3
 *
 * Комбинированный в две итерации: уникальность и фильтрация
 *
 *
 */

$uniqueArray = [];

$ids = array_column($inputArray, 'id');
$ids = array_unique($ids);
$uniqueArray = array_filter($inputArray, function ($key, $value) use ($ids) {
    return in_array($value, array_keys($ids));
}, ARRAY_FILTER_USE_BOTH);

echo "Method 3, inline style ",PHP_EOL, print_r($uniqueArray), '--',PHP_EOL;

$uniqueArray = [];

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
