<?php

use execut\robotsTxt;

class GeneratorTest extends PHPUnit_Framework_TestCase
{
    private $model;



    public function setUp()
    {
        $this->model = new Generator();
    }

    public function testAdd()
    {
        $this->model->render();

    }

    protected function down()
    {
        $this->model = null;
    }


}