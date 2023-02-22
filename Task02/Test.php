<?php
  
    function run_test(){
        //Correct vector creation
        $v1 = new Vector(1.5,-2,3);
        $expectedResult = "(1.5; -2; 3)";

        echo PHP_EOL . "СОЗДАНИЕ ВЕКТОРА" . PHP_EOL . "Ожидается: {$expectedResult}" . PHP_EOL;
        echo "Получено: {$v1}" . PHP_EOL;
        if ($v1 == $expectedResult) {
            echo "Проверка прошла!" . PHP_EOL;
        } else {
            echo "Проверка НЕ прошла!" . PHP_EOL;
        }

        $v2 = new Vector(13,70,20.5);
        $v3 = new Vector(2,-10,20.5);
        $v4 = $v2->add($v3);
        $expectedResult = "(15; 60; 41)";

        echo PHP_EOL . "СЛОЖЕНИЕ ВЕКТОРОВ" . PHP_EOL . "Ожидается: {$expectedResult}" . PHP_EOL;
        echo "Получено: {$v4}" . PHP_EOL;
        if ($v4 == $expectedResult) {
            echo "Проверка прошла!" . PHP_EOL;
        } else {
            echo "Проверка НЕ прошла!" . PHP_EOL;
        }

        $v5 = $v2->sub($v3);
        $expectedResult = "(11; 80; 0)";

        echo PHP_EOL . "ВЫЧИТАНИЕ ВЕКТОРОВ" . PHP_EOL . "Ожидается: {$expectedResult}" . PHP_EOL;
        echo "Получено: {$v5}" . PHP_EOL;
        if ($v5 == $expectedResult) {
            echo "Проверка прошла!" . PHP_EOL;
        } else {
            echo "Проверка НЕ прошла!" . PHP_EOL;
        }

        $v6 = $v1->product(7);
        $expectedResult = "(10.5; -14; 21)";

        echo PHP_EOL . "УМНОЖЕНИЕ ВЕКТОРА НА ЧИСЛО" . PHP_EOL . "Ожидается: {$expectedResult}" . PHP_EOL;
        echo "Получено: {$v6}" . PHP_EOL;
        if ($v6 == $expectedResult) {
            echo "Проверка прошла!" . PHP_EOL;
        } else {
            echo "Проверка НЕ прошла!" . PHP_EOL;
        }

        $v7 = $v2->scalarProduct($v3);
        $expectedResult = "-253.75";

        echo PHP_EOL . "СКАЛЯРНОЕ УМНОЖЕНИЕ ВЕКТОРОВ" . PHP_EOL . "Ожидается: {$expectedResult}" . PHP_EOL;
        echo "Получено: {$v7}" . PHP_EOL;
        if ($v7 == $expectedResult) {
            echo "Проверка прошла!" . PHP_EOL;
        } else {
            echo "Проверка НЕ прошла!" . PHP_EOL;
        }

        $v8 = $v2->vectorProduct($v3);
        $expectedResult = "(1640; -225.5; -270)";

        echo PHP_EOL . "ВЕКТОРНОЕ УМНОЖЕНИЕ ВЕКТОРОВ" . PHP_EOL . "Ожидается: {$expectedResult}" . PHP_EOL;
        echo "Получено: {$v8}" . PHP_EOL;
        if ($v8 == $expectedResult) {
            echo "Проверка прошла!" . PHP_EOL;
        } else {
            echo "Проверка НЕ прошла!" . PHP_EOL;
        }
        

    }
