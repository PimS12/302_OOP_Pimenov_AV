<?php

namespace App;

use App\Book;
use App\BooksList;

include "Book.php";
include "BooksList.php";

function runTest()
{

    /*
     * Проверка работы методов класса Book
    */
    $bookFirst = new Book();
    $bookSecond = new Book();
    $bookThird = new Book();

    $bookFirst->setTitle("Побег от реальности")->setAuthors(["Николаев Д.", "Гаврилова М."])->setPublisher("Читай-Город")->setYear(2005);
    $bookSecond->setTitle("Пролитый чай")->setAuthors(["Панфилов К.", "Шапошников А.", "Журавлева Я."])->setPublisher("АСТ")->setYear(2018);
    $bookThird->setTitle("Далёкий путь")->setAuthors(["Степанова М."])->setPublisher("ЭБС Лань")->setYear(2022);

    //Проверка id
    $isCheck = "Не прошла";

    echo "Проверка класса Book" . PHP_EOL . PHP_EOL;
    echo "Автоинкремент id:" . PHP_EOL;

    if ($bookThird->getId() === 3) {
        echo "Ожидалось: 3" . PHP_EOL . "Получили: {$bookThird->getId()}" . PHP_EOL;
        $isCheck = "Прошла";
    } else {
        echo "Ожидалось: 3" . PHP_EOL . "Получили: {$bookThird->getId()}" . PHP_EOL;
    }

    echo "Проверка: {$isCheck}" . PHP_EOL;
    $isCheck = "Не прошла";

    //Проверка Get
    echo PHP_EOL . "Метод Get:" . PHP_EOL;

    $info = "Id: {$bookSecond->getId()}" . PHP_EOL . "Название: {$bookSecond->getTitle()}" . PHP_EOL;

    for ($i = 0; $i < count($bookSecond->getAuthors()); $i++) {
        $index = $i + 1;
        $info .= "Автор{$index}: {$bookSecond->getAuthors()[$i]}" . PHP_EOL;
    }

    $info .= "Издательство: {$bookSecond->getPublisher()}" . PHP_EOL . "Год: {$bookSecond->getYear()}" . PHP_EOL;

    $expected = $bookSecond->__toString();

    if ($info === $expected) {
        echo "Ожидалось: {$expected}" . PHP_EOL . "Получили: {$info}";
        $isCheck = "Прошла";
    } else {
        echo "Ожидалось: {$expected}" . PHP_EOL . "Получили: {$info}";
    }

    echo "Проверка: {$isCheck}" . PHP_EOL;
    $isCheck = "Не прошла";

    /*
     * Проверка работы методов класса BooksList
    */
    $booksList = new BooksList();

    // Проверка метода add()
    $isCheck = "Не прошла";

    $booksList->add($bookFirst);
    $booksList->add($bookSecond);
    $booksList->add($bookThird);

    echo PHP_EOL . "Проверка класса BooksList" . PHP_EOL . PHP_EOL;
    echo PHP_EOL . "Метод add и count:" . PHP_EOL;

    if ($booksList->count() === 3) {
        echo "Ожидалось: 3" . PHP_EOL . "Получили: {$booksList->count()}" . PHP_EOL;
        $isCheck = "Прошла";
    } else {
        echo "Ожидалось: 3" . PHP_EOL . "Получили: {$booksList->count()}" . PHP_EOL;
    }

    echo "Проверка: {$isCheck}" . PHP_EOL;
    $isCheck = "Не прошла";

    echo PHP_EOL . "Метод Get:" . PHP_EOL;

    $expected = $bookFirst->__toString();
    $info = $booksList->get(0)->__toString();

    if ($bookFirst === $booksList->get(0)) {
        echo "Ожидалось: {$expected}" . PHP_EOL . "Получили: {$info}";
        $isCheck = "Прошла";
    } else {
        echo "Ожидалось: {$expected}" . PHP_EOL . "Получили: {$info}";
    }

    echo "Проверка: {$isCheck}" . PHP_EOL;

    //Проверка метода store
    echo PHP_EOL . "Метод store:" . PHP_EOL;

    $fileName = "books";
    if ($booksList->store($fileName)) {
        $isCheck = "Прошла";
    }

    echo "Проверка: {$isCheck}" . PHP_EOL;
    $isCheck = "Не прошла";

    // Проверка метода load
    $booksListFirst = new BooksList();
    echo PHP_EOL . "Метод load:" . PHP_EOL;

    if ($booksListFirst->load($fileName) && $booksListFirst->count() === 3) {
        $isCheck = "Прошла";
    }

    echo "Проверка: {$isCheck}" . PHP_EOL;
}
