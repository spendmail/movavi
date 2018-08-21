<?php

namespace MovaviTest\Service;

use Movavi\Builder\RbcRateBuilder;
use Movavi\Entity\Currency;
use Movavi\Service\RbcService;
use PHPUnit\Framework\TestCase;

class RbcServiceTest extends TestCase
{
    public function testShould_ReturnValidUsdToRubRate()
    {
        $rbcService = new RbcService(new HttpClientMock(), new RbcRateBuilder());

        $date = new \DateTime();

        $rate = $rbcService->getUsdToRubRate($date);

        $this->assertObjectHasAttribute('currencyFrom', $rate);
        $this->assertObjectHasAttribute('currencyTo', $rate);
        $this->assertObjectHasAttribute('rate', $rate);
        $this->assertObjectHasAttribute('date', $rate);

        $this->assertEquals(Currency::USD, $rate->getCurrencyFrom());
        $this->assertEquals(Currency::RUB, $rate->getCurrencyTo());
        $this->assertEquals($date, $rate->getDate());
    }

    public function testShould_ReturnValidEurToRubRate()
    {
        $rbcService = new RbcService(new HttpClientMock(), new RbcRateBuilder());

        $date = new \DateTime();

        $rate = $rbcService->getEurToRubRate($date);

        $this->assertObjectHasAttribute('currencyFrom', $rate);
        $this->assertObjectHasAttribute('currencyTo', $rate);
        $this->assertObjectHasAttribute('rate', $rate);
        $this->assertObjectHasAttribute('date', $rate);

        $this->assertEquals(Currency::EUR, $rate->getCurrencyFrom());
        $this->assertEquals(Currency::RUB, $rate->getCurrencyTo());
        $this->assertEquals($date, $rate->getDate());
    }
}
