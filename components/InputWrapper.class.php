<?php

interface InputWrapperInterface
{
    /* Get the input from any source */
    public function getInput();
}

class InputWrapper extends AppHotelRes implements InputWrapperInterface
{

    const ERR_NO_SUCH_METHOD = 'InputWrapper does not support the method you set';
    const ERR_NO_SUCH_METHOD_NO = 100001;

    const ERR_FILE_NOT_EXISTS = 'File not exists';
    const ERR_FILE_NOT_EXISTS_NO = 100002;

    /* The option to set for InputWrapper*/
    private $method;

    /* The params to pass to the Wrapper function*/
    private $param;

    /**
     * Constructor
     *
     * @param   $opt    array   the options to set for the InputWrapper
     */
    public function __construct($opt)
    {
        parent::__construct();
        $this->method = isset($opt['method']) ? $opt['method'] : 'file';
        $this->param  = isset($opt['param'])  ? $opt['param']  : array();
    }

    /**
     * get input from any resource, depends on the $opt
     *
     * @return  string  the input
     */
    public function getInput()
    {
        if (!method_exists($this, $this->method)) {
            $this->error = self::ERR_NO_SUCH_METHOD;
            $this->errno = self::ERR_NO_SUCH_METHOD_NO;
            return false;
        }

        return call_user_func(array($this, $this->method), $this->param);
    }

    /**
     * Get input from a file
     *
     * @param   $param['file']   string  file path
     * @return  string  content of the file
     */
    private function file($param)
    {
        if (!isset($param['file']) || !file_exists($param['file'])) {
            $this->error = self::ERR_FILE_NOT_EXISTS;
            $this->errno = self::ERR_FILE_NOT_EXISTS_NO;
            return false;
        }

        return file_get_contents($param['file']);
    }

    /**
     * Get input from stdin
     *
     * @return  string  standard input
     */
    private function stdin()
    {
        return file_get_contents('php://stdin');
    }
}
