<?php

class InputParser extends App implements InputParserInterface 
{
    private $iw;

    private $content;

    const ERR_INPUT_CUSTOMTYPE = "Can't get custom type, fixed your input";

    /**
     * InputParser Constructor 
     *
     * @param   $InputWrapper   InputWrapper    the InputWrapper object
     */
    function __construct($InputWrapper)
    {
        $this->iw = $iw;
        $this->content = '';
    }

    /**
     * get the type of the customer
     *
     * @return  $type   string  [regular|rewards]
     */
    function getCustomerType()
    {
        $content = $this->getContent();
        if (!preg_match('/\s*(Regular|Bridgewood):/', $content, $matches)
            && isset($matches[1])) {
            $error = self::ERR_INPUT_CUSTOMTYPE;
            return false;
        }

        return $matches[1];
    }

    /**
     * get all the date user input 
     *
     * @return  $rdate  array  the input dates
     */
    function getCustomerDates()
    {
        $content = $this->getContent();
        if () {
            
        }
    }

    /**
     * get input content from input wrapper
     *
     * @return  string  the input content
     */
    private function getContent()
    {
        if ($this->content) {
            return $this->content;
        }

        return $this->iw->getContent();
    }
}
