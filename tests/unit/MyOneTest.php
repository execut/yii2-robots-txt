<?php

use execut\robotsTxt;

class MyOneTest extends PHPUnit_Framework_TestCase
{
    public function testGenerator()
    {
        $model = New Generator();
        $model->render();
    }
}