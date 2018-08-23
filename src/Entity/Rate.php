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
     * @param string $currencyFrom
     * @param string $currencyTo
     * @param \DateTime $date
     * @param float $rate
     */
    public function __construct(string $currencyFrom, string $currencyTo, \DateTime $date, float $rate)
    {
        $this->currencyFrom = $currencyFrom;
        $this->currencyTo = $currencyTo;
        $this->date = $date;
        $this->rate = $rate;
    }

    /**
     * Getter for currencyFrom
     *
     * @return string
     */
    public function getCurrencyFrom(): string
    {
        return $this->currencyFrom;
    }

    /**
     * Getter for currencyTo
     *
     * @return string
     */
    public function getCurrencyTo(): string
    {
        return $this->currencyTo;
    }

    /**
     * Getter for rate
     *
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * Getter for date
     *
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * toString magic method
     *
     * @return string
     */
    public function __toString(): string
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
