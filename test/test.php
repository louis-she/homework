<?php

define('TEST_ROOT', dirname(__FILE__).'/');
define('ROOT', TEST_ROOT . '../');

require 'simpletest/autorun.php';
require ROOT . 'components/AppHotelRes.class.php';

$ts = new TestSuite();

$ts->addFile('test_suites/InputWrapper.test.php');
$ts->addFile('test_suites/InputParser.test.php');
