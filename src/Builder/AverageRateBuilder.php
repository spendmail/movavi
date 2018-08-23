<?php

namespace Movavi\Builder;

use Movavi\Entity\Rate;
use Movavi\Exception\EmptyRateListException;
use Movavi\Exception\WrongClassException;

/**
 * Class AverageRateBuilder
 *
 * Builder for the Movavi\Entity\Rate
 * Implementation of Builder pattern (GoF)
 *
 * @package Movavi\Builder
 */
class AverageRateBuilder
{
    /**
     * Returns an instance of Movavi\Entity\Rate,
     * that contains average rate from given array
     *
     * @param array $rates
     *
     * @return Rate
     *
     * @throws EmptyRateListException
     */
    public function fromArray(array $rates): Rate
    {
        if (empty($rates)) {
            throw new EmptyRateListException();
        }

        $ratesSum = array_sum(
            array_map(
                function(Rate $rate): float
                {
                    return $rate->getRate();
                },
                $rates
            )
        );

        $averageRate = $ratesSum / count($rates);
        $firstRate = array_shift($rates);

        return new Rate(
            $firstRate->getCurrencyFrom(),
            $firstRate->getCurrencyTo(),
            $firstRate->getDate(),
            $averageRate
        );
    }
}
