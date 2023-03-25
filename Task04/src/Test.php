<?php

use App\Stack;

function runTest()
{
    echo "Проверка создания СТЕКа:" . PHP_EOL;
    $stack = new Stack(1, 2, 3, 4, 5);
    $isChecked = "НЕ ПРОШЛА";

    $expectedResult = "[5->4->3->2->1]";
    $result = $stack->__toString();

    if ($expectedResult === $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    //push
    echo "Проверка метода push:" . PHP_EOL;
    $isChecked = "НЕ ПРОШЛА";

    $stack->push(6, 'f');

    $expectedResult = "[f->6->5->4->3->2->1]";
    $result = $stack->__toString();

    if ($expectedResult == $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    //pop
    echo "Проверка метода pop:" . PHP_EOL;
    $isChecked = "НЕ ПРОШЛА";
    $outputStack = $stack->__toString();

    $expectedResult = 'f';
    $result = $stack->pop();

    if ($expectedResult === $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Было: {$outputStack}" . PHP_EOL . "Стало: {$stack}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    //top
    echo "Проверка метода top:" . PHP_EOL;
    $isChecked = "НЕ ПРОШЛА";
    $outputStack = $stack->__toString();

    $expectedResult = 6;
    $result = $stack->top();

    if ($expectedResult === $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Было: {$outputStack}" . PHP_EOL . "Стало: {$stack}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    //isEmpty
    echo "Проверка метода isEmpty:" . PHP_EOL;
    $isChecked = "НЕ ПРОШЛА";

    $stackSecond = new Stack();

    $expectedResult = "[]";
    $result = $stackSecond->__toString();

    if ($expectedResult === $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    //copy
    echo "Проверка метода copy:" . PHP_EOL;
    $isChecked = "НЕ ПРОШЛА";

    $expectedResult = $stack;
    $stackSecond = $stack->copy();
    $result = $stackSecond;

    if ($expectedResult == $result) {
        $isChecked = "ПРОШЛА";
    }

    echo "Ожидали: {$expectedResult}" . PHP_EOL . "Получили: {$result}" . PHP_EOL;
    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;

    //compareStrings

    echo "Проверка функции compareStrings:" . PHP_EOL;
    $isChecked = "НЕ ПРОШЛА";

    $checkedStrings = ["ab#c", "ade##c"];

    if (compareStrings($checkedStrings[0], $checkedStrings[1])) {
        $isChecked = "Прошла";
    }

    echo "Проверка: {$isChecked}" . PHP_EOL . PHP_EOL;
}
