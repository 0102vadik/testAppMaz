<?php

namespace controllers;

use Exception;

class BaseController
{
    /**
     * @throws Exception
     */
    public function __set($name, $value)
    {
        throw new Exception("Параметр не существует или недоступен");
    }

    /**
     * @throws Exception
     */
    public function __get($name)
    {
        throw new Exception("Параметр не существует или недоступен");
    }

    public function __call($name, $arguments)
    {
        throw new Exception("Метод не существует или недоступен");
    }
}