<?php

define('TEST_ROOT', dirname(__FILE__).'/');
define('ROOT', TEST_ROOT . '../');

require TEST_ROOT . 'simpletest/autorun.php';
require ROOT . 'components/AppHotelRes.class.php';

$ts = new TestSuite();

$ts->addFile(TEST_ROOT . 'test_suites/InputWrapper.test.php');
$ts->addFile(TEST_ROOT . 'test_suites/InputParser.test.php');
$ts->addFile(TEST_ROOT . 'test_suites/HotelFinder.test.php');
