<?php

require_once ROOT . 'components/InputParser.class.php';
require_once ROOT . 'components/InputWrapper.class.php';
require_once ROOT . 'components/HotelFinder.class.php';
require_once ROOT . 'config.php';

class TestOfHotelFinder extends UnitTestCase
{
    function testGetCheapest()
    {
        global $config;
        $hf = new HotelFinder($config['hotel'], 'Regular', array('mon', 'tues', 'wed'));
        $res = $hf->getCheapest();
        $this->assertEqual($res, 'Lakewood');
    }

    function testGetCheapest2()
    {
        global $config;
        $hf = new HotelFinder($config['hotel'], 'Regular', array('fri', 'sat', 'sun'));
        $res = $hf->getCheapest();
        $this->assertEqual($res, 'Bridgewood');
    }

    function testGetCheapest3()
    {
        global $config;
        $hf = new HotelFinder($config['hotel'], 'Rewards', array('thur', 'fri', 'sat'));
        $res = $hf->getCheapest();
        $this->assertEqual($res, 'Ridgewood');
    }
}
