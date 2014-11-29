<?php

require_once ROOT . 'components/InputParser.class.php';
require_once ROOT . 'components/InputWrapper.class.php';
require_once ROOT . 'components/HotelFinder.class.php';

class TestOfHotelFinder extends UnitTestCase
{
    function testGetCheapest()
    {
        $hf = new HotelFinder('', 'Regular', array('mon', 'tues'));
        $hf->getCheapest();
    }
}
