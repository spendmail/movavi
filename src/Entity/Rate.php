<?php

namespace Movavi\Entity;

/**
 * Class Rate
 *
 * Class-entity for currency rate
 *
 * @package Movavi\Entity
 */
class Rate
{
    /**
     * Field, contains convertible currency alias
     *
     * @var string
     */
    public $currencyFrom;

    /**
     * Field, contains reference currency alias
     *
     * @var string
     */
    public $currencyTo;

    /**
     * Rate value
     *
     * @var float
     */
    public $rate;

    /**
     * Date of rate
     *
     * @var \DateTime
     */
    public $date;

    /**
     * Rate constructor.
     *
     * @param $currencyFrom
     * @param $currencyTo
     * @param \DateTime $date
     * @param $rate
     */
    public function __construct($currencyFrom, $currencyTo, \DateTime $date, $rate)
    {
        $this->currencyFrom = $currencyFrom;
        $this->currencyTo = $currencyTo;
        $this->date = $date;
        $this->rate = (float)$rate;
    }

    /**
     * Getter for currencyFrom
     *
     * @return string
     */
    public function getCurrencyFrom()
    {
        return $this->currencyFrom;
    }

    /**
     * Getter for currencyTo
     *
     * @return string
     */
    public function getCurrencyTo()
    {
        return $this->currencyTo;
    }

    /**
     * Getter for rate
     *
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Getter for date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * toString magic method
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            "%s to %s rate is %s on %s.",
            ucfirst($this->currencyFrom),
            $this->currencyTo,
            $this->rate,
            $this->date->format('Y-m-d')
        );
    }
}
