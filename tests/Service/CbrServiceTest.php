<?php

namespace MovaviTest\Service;

use Movavi\Builder\CbrRateBuilder;
use Movavi\Entity\Currency;
use Movavi\Service\CbrService;
use PHPUnit\Framework\TestCase;

class CbrServiceTest extends TestCase
{
    public function testShould_ReturnValidUsdToRubRate()
    {

        $cbrService = new CbrService(new HttpClientMock(), new CbrRateBuilder());

        $date = new \DateTime();

        $rate = $cbrService->getUsdToRubRate($date);

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

        $cbrService = new CbrService(new HttpClientMock(), new CbrRateBuilder());

        $date = new \DateTime();

        $rate = $cbrService->getEurToRubRate($date);

        $this->assertObjectHasAttribute('currencyFrom', $rate);
        $this->assertObjectHasAttribute('currencyTo', $rate);
        $this->assertObjectHasAttribute('rate', $rate);
        $this->assertObjectHasAttribute('date', $rate);

        $this->assertEquals(Currency::USD, $rate->getCurrencyFrom());
        $this->assertEquals(Currency::RUB, $rate->getCurrencyTo());
        $this->assertEquals($date, $rate->getDate());
    }
}
