<?php

/**
 * This is the base class of the application.
 * All the other components should extend this class.
 * We can do some common stuff here like error handle or auth.
 */
abstract class AppHotelRes
{
    /*error message*/
    protected $error;

    /*error number*/
    protected $errno;

    /**
     * Constructor
     */
    protected function __construct()
    {
        $this->error = '';
        $this->errno = 0;
    }

    /**
     * get error message
     *
     * @return  string  error message
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * get error number
     */
    public function getErrno()
    {
        return $this->errno;
    }
}
