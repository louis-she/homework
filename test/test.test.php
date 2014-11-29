<?php

$str = "Regular: 16Mar2009(mon), 17Mar2009(tues), 18Mar2009(wed)";

preg_match_all('/\((\w+)\)/', $str, $matches);
var_dump($matches);
