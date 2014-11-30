<?php

define('ROOT', dirname(__FILE__) . '/');
ini_set('display_errors', true);
error_reporting(E_ALL);

require ROOT . 'components/AppHotelRes.class.php';
require ROOT . 'components/InputWrapper.class.php';
require ROOT . 'components/InputParser.class.php';
require ROOT . 'components/HotelFinder.class.php';
require ROOT . 'config.php';

if (!isset($argv[1]) || !is_file($argv[1])) {
    echo "Usage: php find.php [input_file_path]\n";
    exit(1);
}
$file = $argv['1'];

$wrapperOption = array(
    'method' => 'file',
    'param' => array('file' => $file),
);

$parser = new InputParser(new InputWrapper($wrapperOption));
if (!$customerType = $parser->getCustomerType()) {
    echo $parser->getError();
    exit(1);
}

if (!$customerDates = $parser->getCustomerDates()) {
    echo $parser->getError();
    exit(1);
}

$finder = new HotelFinder($config['hotel'], $customerType, $customerDates);

if (!$cheapestHotel = $finder->getCheapest()) {
    echo $finder->getError();
    exit(1);
}

echo $cheapestHotel;
exit(0);
