<?php

require_once ROOT . 'components/InputParser.class.php';
require_once ROOT . 'components/InputWrapper.class.php';

Mock::generate('InputWrapper');

class TestOfInputParser extends UnitTestCase
{
    function testGetCustomerType()
    {
        $opt = array('method' => 'stdin');
        $miw = new MockInputWrapper($opt);
        $miw->returns('getInput', 'Regular: 16Mar2009(mon), 17Mar2009(tues), 18Mar2009(wed)');

        $ip = new InputParser($miw);
        $customerType = $ip->getCustomerType();
        $this->assertEqual($customerType, 'Regular');
    }

    function testGetCustomerDates()
    {
        $opt = array('method' => 'stdin');
        $miw = new MockInputWrapper($opt);
        $miw->returns('getInput', 'Regular: 16Mar2009(mon), 17Mar2009(tues), 18Mar2009(wed)');

        $ip = new InputParser($miw);
        $customerDates = $ip->getCustomerDates();
        $this->assertEqual($customerDates, array('mon', 'tues', 'wed'));
    }
}
