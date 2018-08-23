<?php

namespace MovaviTest\Builder;

use Movavi\Builder\AverageRateBuilder;
use Movavi\Entity\Currency;
use Movavi\Entity\Rate;
use PHPUnit\Framework\TestCase;

class AverageRateBuilderTest extends TestCase
{
    /**
     * @expectedException \Movavi\Exception\EmptyRateListException
     */
    public function testShould_ThrowEmptyRateListException_When_RatesArrayIsEmpty()
    {
        $averageRateBuilder = new AverageRateBuilder();
        $averageRateBuilder->fromArray([]);
    }

    public function testShould_ReturnAverageRate()
    {
        $rate1 = new Rate(Currency::USD, Currency::RUB, new \DateTime(), 100);
        $rate2 = new Rate(Currency::USD, Currency::RUB, new \DateTime(), 200);

        $averageRateBuilder = new AverageRateBuilder();
        $averageRate = $averageRateBuilder->fromArray([$rate1, $rate2]);

        $this->assertEquals(150, $averageRate->getRate());
    }
}
