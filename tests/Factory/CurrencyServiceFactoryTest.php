<?php

namespace MovaviTest\Factory;

use Movavi\Builder\CbrRateBuilder;
use Movavi\Builder\RbcRateBuilder;
use Movavi\Exception\UnknownServiceException;
use Movavi\Factory\CurrencyServiceFactory;
use Movavi\Http\Client;
use Movavi\Service\CbrService;
use Movavi\Service\RbcService;
use PHPUnit\Framework\TestCase;

class CurrencyServiceFactoryTest extends TestCase
{

    public function testShould_ReturnValidServices()
    {
        $currencyServiceFactory = new CurrencyServiceFactory();

        $cbrService = $currencyServiceFactory->createService(CbrService::NAME);
        $this->assertEquals($cbrService, new CbrService(new Client(), new CbrRateBuilder()));

        $rbcService = $currencyServiceFactory->createService(RbcService::NAME);
        $this->assertEquals($rbcService, new RbcService(new Client(), new RbcRateBuilder()));
    }

    /**
     * @expectedException \Movavi\Exception\UnknownServiceException
     */
    public function testShould_ThrowUnknownServiceException()
    {
        $currencyServiceFactory = new CurrencyServiceFactory();
        $currencyServiceFactory->createService('Heil Hitler!');
    }
}
