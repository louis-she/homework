<?php

require ROOT . 'components/InputWrapper.class.php';

class TestOfInputWrapper extends UnitTestCase
{
    function testGetInputFromFile()
    {
        $opt = array(
            'method' => 'file',
            'param' => array('file' => TEST_ROOT.'resource/test_file.log'),
        );

        $iw = new InputWrapper($opt);
        $content = $iw->getInput();
        $this->assertPattern('/This is for InputWrapper test/', $content, $iw->getError());
    }

    /*
    function testGetInputFromStdin()
    {
        $content = file_get_contents('php://stdin');
        $opt = array(
            'method' => 'stdin',
        );
        $iw = new InputWrapper($opt);
        $this->assertPattern('/This is for InputWrapper test/', $content);
    }
    */
}
