<?php

define('TEST_ROOT', dirname(__FILE__).'/');
define('ROOT', TEST_ROOT . '../');

require 'simpletest/autorun.php';

$st = new SimpleTest();

$st->addFile('test_suites/');
