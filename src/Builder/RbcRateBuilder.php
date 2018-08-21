<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 21.08.18
 * Time: 14:24
 */

namespace Movavi\Builder;

use Movavi\Entity\Rate;

/**
 * Class RbcRateBuilder
 *
 * Builder for the Movavi\Entity\Rate
 * Implementation of Builder pattern (GoF)
 *
 * @package Movavi\Builder
 */
class RbcRateBuilder
{
    /**
     * Returns an instance of Movavi\Entity\Rate,
     * by string in json-format from cash.rbc.ru
     *
     * @param $currencyFrom
     * @param $currencyTo
     * @param \DateTime $date
     * @param $jsonString
     *
     * @return Rate
     */
    public function fromJson($currencyFrom, $currencyTo, \DateTime $date, $jsonString)
    {
        $dataObj = json_decode($jsonString);

        if(empty($dataObj->data->sum_result)){
            throw new NoneRateException('Service cash.rbc.ru has not send any rate data');
        }

        return new Rate($currencyFrom, $currencyTo, $date, $dataObj->data->sum_result);
    }
}
