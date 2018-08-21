<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 20.08.18
 * Time: 12:59
 */

namespace Movavi\Factory;

use Movavi\Builder\CbrRateBuilder;
use Movavi\Builder\RbcRateBuilder;
use Movavi\Exception\UnknownServiceException;
use Movavi\Service\CbrService;
use Movavi\Service\RbcService;

/**
 * Class CurrencyServiceFactory
 *
 * Rate services factory method (GoF)
 *
 * @package Movavi\Factory
 */
class CurrencyServiceFactory
{

    /**
     * Returns an instance of suitable service
     *
     * @param $name
     * @return Service\CbrService|Service\RbcService
     * @throws UnknownServiceException
     */
    public function createService($name)
    {

        switch (mb_strtoupper($name)) {

            case CbrService::NAME:
                return new CbrService(new CbrRateBuilder());

            case RbcService::NAME:
                return new RbcService(new RbcRateBuilder());

            default:
                throw new UnknownServiceException();
        }
    }
}
