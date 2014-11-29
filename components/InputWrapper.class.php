<?php

class InputWrapper
{
    /* The option to set for InputWrapper*/
    private $opt;

    /**
     * Constructor
     *
     * @param   $opt    array   the options to set for the InputWrapper
     */
    function __construct($opt)
    {
        $this->opt = $opt;
    }

    function getInput()
    {
        $method = isset($this->opt['method']);
    }
}
