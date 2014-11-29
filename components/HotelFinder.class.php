<?php

interface HotelFinderInterface
{
    /* Get customer type, reward or normal*/
    public function run();
}

class HotelFinder extends AppHotelRes implements InputParserInterface 
{
    /* The Hotel config, include rating, price etc */
    private $hotelConfig;

    /* type of the customer, Regular or Rewards */
    private $costomerType;

    /* dates of the user to stay */
    private $costomerDates;

    const ERR_INPUT_CUSTOMERTYPE = 'Can\'t get custom type, fixed your input';
    const ERR_INPUT_CUSTOMERTYPE_NO = '200001';

    const ERR_INPUT_CUSTOMERDATES = 'Can\'t get custom dates, fixed your input';
    const ERR_INPUT_CUSTOMERDATES_NO = '200001';

    /**
     * Constructor 
     *
     * @param   $hotelConfig    array
     * @param   $customerType   string
     * @param   $customerDates  array
     */
    public function __construct($hotelConfig, $customerType, $cunstomerDates)
    {
        parent::__construct();
        $this->hotelConfig   = $inputWrapper;
        $this->customerType  = $customerType;
        $this->customerDates = $customerDates;
    }

    /**
     * Find the cheapest hotel
     *
     * @return  string  hotel name
     */
    public function getCheapest()
    {
        $this->hotelConfig = array(
            'Lakewood' => array(
                'rating' => 3,
                'Regular' => array(
                    'weekday' => 110,
                    'weekend' => 90,
                ),
                'Rewards' => array(
                    'weekday' => 80,
                    'weekend' => 80,
                ),
            ),
            'Bridgewood' => array(
                'rating' => 4,
                'Regular' => array(
                    'weekday' => 160,
                    'weekend' => 60,
                ),
                'Rewards' => array(
                    'weekday' => 110,
                    'weekend' => 50,
                )
            ),
            'Ridgewood' => array(
                'rating' => 5,
                'Regular' => array(
                    'weekday' => 220,
                    'weekend' => 150,
                ),
                'Rewards' => array(
                    'weekday' => 100,
                    'weekend' => 40,
                ),
            ),
        );
    }
}
