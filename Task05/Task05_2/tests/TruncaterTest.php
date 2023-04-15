<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    public function testTruncate(): void
    {
        $title = 'Пименов Александр Вадимович';

        $truncater1 = new Truncater();

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Пименов Александр...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 17]));

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Пименов Александр***";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 17, 'separator' => '***']));

        $expected = "Пименов Александр...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => -10]));

        $truncater2 = new Truncater(['length' => 17, 'separator' => '!!!']);

        $expected = "Пименов Александр!!!";
        $this->assertSame($expected, $truncater2->truncate($title));
    }
}
