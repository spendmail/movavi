<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 21.08.18
 * Time: 14:24
 */

namespace Movavi\Builder;

use Movavi\Entity\Rate;
use Movavi\Exception\EmptyRateListException;
use Movavi\Exception\NoneRateException;

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
     * @return Rate
     * @throws EmptyRateListException
     */
    public function fromArray(array $rates)
    {
        if(empty($rates)){
            throw new EmptyRateListException();
        }

        $ratesSum = 0;

        foreach ($rates as $rate){

            if(!$rate instanceof Rate){
                throw new WrongClassException();
            }

            $ratesSum += $rate->rate;
        }

        $averageRate = $ratesSum/count($rates);

        return new Rate(
            $rate->getCurrencyFrom(),
            $rate->getCurrencyTo(),
            $rate->getDate(),
            $averageRate
        );
    }
}