<?php

namespace tests;

use PHPUnit\Framework\TestCase;

use execut\robotsTxt\Generator;


/**
 * Class OutputTest
 */
class OutputTest extends TestCase
{
    /**
     * Проверяет на не пустое значение
     */
    public function testOutputIsNotEmpty()
    {
        $generator = new Generator();

        $this->assertNotEmpty($generator->render());
    }
}