<?php

namespace Movavi\Builder;

use Movavi\Entity\Rate;
use Movavi\Exception\NoneRateException;

/**
 * Class AverageRateBuilder
 *
 * Builder for the Movavi\Entity\Rate
 * Implementation of Builder pattern (GoF)
 *
 * @package Movavi\Builder
 */
class CbrRateBuilder
{
    /**
     * Returns an instance of Movavi\Entity\Rate,
     * by string in xml-format from cbr.ru
     *
     * @param $currencyFrom
     * @param $currencyTo
     * @param \DateTime $date
     * @param $xmlString
     *
     * @return Rate
     *
     * @throws NoneRateException
     */
    public function fromXml($currencyFrom, $currencyTo, \DateTime $date, $xmlString)
    {
        $xml = simplexml_load_string($xmlString);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);

        if(empty($array['Record'])){
            throw new NoneRateException('Service cbr.ru has not send any rate data');
        }

        if(isset($array['Record']['Value'])){

            $rate = $array['Record']['Value'];
        } else {

            $record = array_shift($array['Record']);
            $rate = $record['Value'];
        }

        $rate = floatval(str_replace(',', '.', $rate));

        return new Rate($currencyFrom, $currencyTo, $date, $rate);
    }
}
