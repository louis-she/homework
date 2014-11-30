<?php

interface HotelFinderInterface
{
    /* Get customer type, reward or normal*/
    public function getCheapest();
}

class HotelFinder extends AppHotelRes implements HotelFinderInterface
{
    /* The Hotel config, include rating, price etc */
    private $hotelConfig;

    /* type of the customer, Regular or Rewards */
    private $customerType;

    /* dates of the user to stay */
    private $customerDates;

    /* all the weekday str */
    private $weekday;

    /* all the weekend str */
    private $weekend;

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
    public function __construct($hotelConfig, $customerType, $customerDates)
    {
        parent::__construct();
        $this->hotelConfig   = $hotelConfig;
        $this->customerType  = $customerType;
        $this->customerDates = $customerDates;
        $this->weekday = array('mon', 'tues', 'wed', 'thur', 'fri');
        $this->weekend = array('sat', 'sun');
    }

    /**
     * Find the cheapest hotel
     *
     * @return  string  hotel name
     */
    public function getCheapest()
    {
        $cheapestHotel = '';
        $cheapestPrice = 0;
        $cheapestRating = 0;
        foreach ($this->hotelConfig as $hotel => $hotelConf) {
            $price = $this->computeOne($hotel);
            if (($cheapestHotel === '' || $price < $cheapestPrice)
            || ($price === $cheapestPrice && $hotelConf["rating"] > $cheapestRating)) {
                $cheapestHotel = $hotel;
                $cheapestPrice = $price;
                $cheapestRating = $hotelConf['rating'];
            }
        }

        return $cheapestHotel;
    }

    private function computeOne($whichHotel)
    {
        $hotelConfig = $this->hotelConfig["$whichHotel"];
        $price = $hotelConfig["{$this->customerType}"];
        $weekdayNum = 0;
        $weekendNum = 0;

        foreach ($this->customerDates as $cd) {
            $cd = strtolower($cd);
            if (in_array($cd, $this->weekday)) {
                $weekdayNum++;
            } else if (in_array($cd, $this->weekend)) {
                $weekendNum++;
            } else {
                continue;
            }
        }

        $weekdayPrice = $weekdayNum * $price['weekday'];
        $weekendPrice = $weekendNum * $price['weekend'];
        $totalPrice   = $weekdayPrice + $weekendPrice;
        return $weekdayPrice + $weekendPrice;
    }
}
