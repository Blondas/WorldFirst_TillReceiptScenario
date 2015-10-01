<?php
use tillReceiptScenario\TillItem;

class TillItemTest extends PHPUnit_Framework_TestCase {

    public function testSetPriceNonNumericThrowsException()
    {
        $name = 'adfadsf';
        $price = 'asdf';

        $this->setExpectedException('Exception');
        try {
            $tillItem = new TillItem($name, $price);
        } catch (InvalidArgumentException $e) {

            throw $e;
        }
    }

    public function testSetPriceNegativeThrowsException()
    {
        $name = 'adfadsf';
        $price = '-12';

        $this->setExpectedException('Exception');
        try {
            $tillItem = new TillItem($name, $price);
        } catch (InvalidArgumentException $e) {

            throw $e;
        }
    }
}
