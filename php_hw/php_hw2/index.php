<?php

// 1. Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа, третий – операция. Обязательно использовать оператор return.

function calculate($num1, $num2, $operation)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            return $num2 != 0 ? $num1 / $num2 : 'Деление на ноль!';
        default:
            return 'Неизвестная операция';
    }
}

// 2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'add':
            return calculate($arg1, $arg2, '+');
        case 'subtract':
            return calculate($arg1, $arg2, '-');
        case 'multiply':
            return calculate($arg1, $arg2, '*');
        case 'divide':
            return calculate($arg1, $arg2, '/');
        default:
            return 'Неизвестная операция';
    }
}

// Пример вызова
echo mathOperation(10, 5, 'add'); // Выведет: 15

// 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким: Московская область: Москва, Зеленоград, Клин Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт Рязанская область … (названия городов можно найти на maps.yandex.ru).

$regions = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Скопин'],
];

foreach ($regions as $region => $cities) {
    echo $region . ': ' . implode(', ', $cities) . PHP_EOL;
}

// Результат:
// Московская область: Москва, Зеленоград, Клин
// Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт
// Рязанская область: Рязань, Касимов, Скопин

// 4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). Написать функцию транслитерации строк.

function transliterate($string) {
    $translit = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
        'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
        'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
        'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch',
        'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
    ];

    return strtr(mb_strtolower($string), $translit);
}

// Пример вызова
echo transliterate('Привет мир'); // Выведет: privet mir

// 5. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

function power($val, $pow) {
    if ($pow == 0) {
        return 1; // любое число в степени 0 равно 1
    }
    return $val * power($val, $pow - 1);
}

// Пример вызова
echo power(2, 3); // Выведет: 8

// 6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
// 22 часа 15 минут
// 21 час 43 минуты.

function getTimeWithDeclension() {
    $hours = date('H');
    $minutes = date('i');

    // Склонение для часов
    if ($hours >= 11 && $hours <= 14) {
        $hours_declension = 'часов';
    } else {
        switch ($hours % 10) {
            case 1:
                $hours_declension = 'час';
                break;
            case 2:
            case 3:
            case 4:
                $hours_declension = 'часа';
                break;
            default:
                $hours_declension = 'часов';
        }
    }

    // Склонение для минут
    if ($minutes >= 11 && $minutes <= 14) {
        $minutes_declension = 'минут';
    } else {
        switch ($minutes % 10) {
            case 1:
                $minutes_declension = 'минута';
                break;
            case 2:
            case 3:
            case 4:
                $minutes_declension = 'минуты';
                break;
            default:
                $minutes_declension = 'минут';
        }
    }

    return "$hours $hours_declension $minutes $minutes_declension";
}

// Пример вызова
echo getTimeWithDeclension(); // Например: 13 часов 25 минут
