<?php

namespace Movavi\Factory;

use Movavi\Builder\CbrRateBuilder;
use Movavi\Builder\RbcRateBuilder;
use Movavi\Exception\UnknownServiceException;
use Movavi\Http\Client;
use Movavi\Service\CbrService;
use Movavi\Service\CurrencyServiceInterface;
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
     * @param string $name
     *
     * @return CurrencyServiceInterface
     *
     * @throws UnknownServiceException
     * @throws \Movavi\Exception\DisallowedUrlException
     */
    public function createService(string $name): CurrencyServiceInterface
    {
        switch (mb_strtoupper($name)) {

            case CbrService::NAME:
                return new CbrService(new Client(), new CbrRateBuilder());

            case RbcService::NAME:
                return new RbcService(new Client(), new RbcRateBuilder());

            default:
                throw new UnknownServiceException();
        }
    }
}
