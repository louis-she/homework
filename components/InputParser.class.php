<?php

interface InputParserInterface
{
    /* Get customer type, reward or normal*/
    public function getCustomerType();

    /* Get all of the customer input date*/
    public function getCustomerDates();
}

class InputParser extends AppHotelRes implements InputParserInterface 
{
    /* The InputWrapper object */
    private $iw;

    /* The content get from the InputWrapper */
    private $content;

    const ERR_INPUT_CUSTOMERTYPE = 'Can\'t get custom type, fixed your input';
    const ERR_INPUT_CUSTOMERTYPE_NO = '200001';

    const ERR_INPUT_CUSTOMERDATES = 'Can\'t get custom dates, fixed your input';
    const ERR_INPUT_CUSTOMERDATES_NO = '200001';

    /**
     * InputParser Constructor 
     *
     * @param   $inputWrapper   InputWrapper    the InputWrapper object
     */
    public function __construct($inputWrapper)
    {
        parent::__construct();
        $this->iw = $inputWrapper;
        $this->content = '';
    }

    /**
     * get the type of the customer
     *
     * @return  $type   string  [regular|rewards]
     */
    public function getCustomerType()
    {
        if (!$content = $this->getContent()) {
            return false;
        }

        if (!preg_match('/\s*(Regular|Rewards):/', $content, $matches)
            || !isset($matches[1])) {
            $this->error = self::ERR_INPUT_CUSTOMERTYPE;
            $this->errno = self::ERR_INPUT_CUSTOMERTYPE_NO;
            return false;
        }

        return $matches[1];
    }

    /**
     * get all the date user input 
     *
     * @return  $rdate  array  the input dates
     */
    public function getCustomerDates()
    {
        if (!$content = $this->getContent()) {
            return false;
        }

        if (!preg_match_all('/\((\w+)\)/', $content, $matches) 
            || !isset($matches[1]) || !is_array($matches[1])) {
            $this->error = self::ERR_INPUT_CUSTOMERDATES;
            $this->errno = self::ERR_INPUT_CUSTOMERDATES_NO;
            return false;
        }

        return $matches[1];
    }

    /**
     * get input content from input wrapper
     *
     * @return  string  the input content
     */
    protected function getContent()
    {
        if ($this->content) {
            return $this->content;
        }
        if (!$this->content = $this->iw->getInput()) {
            $this->error = $this->iw->getError();
            $this->errno = $this->iw->getErrno();
            return false;
        }
        return $this->content;
    }
}
