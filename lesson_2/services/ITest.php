<?php


interface ITest
{
    const TEST_ERROR = 123;
    public function testFindAll($sql);
}