<?php

namespace MovaviTest\Builder;

use Movavi\Builder\CbrRateBuilder;
use Movavi\Builder\RbcRateBuilder;
use Movavi\Entity\Currency;
use Movavi\Entity\Rate;
use PHPUnit\Framework\TestCase;

class RbcRateBuilderTest extends TestCase
{
    /**
     * @expectedException \Movavi\Exception\NoneRateException
     */
    public function testShould_ThrowNoneRateException_When_JsonHasNoneRecords()
    {
        $averageRateBuilder = new RbcRateBuilder();
        $averageRateBuilder->fromJson(
            Currency::USD,
            Currency::RUB,
            new \DateTime(),
            ''
        );
    }

    public function testShould_ReturnValidRate()
    {
        $json = '{"status": 200, "meta": {"sum_deal": 1.0, "source": "cbrf", "currency_from": "USD", "date": null, "currency_to": "RUR"}, "data": {"date": "2018-08-21 15:37:38", "sum_result": 67.1807, "rate1": 67.1807, "rate2": 0.0149}}';

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', '2018-08-21 15:37:38');
        $averageRateBuilder = new RbcRateBuilder();
        $rate = $averageRateBuilder->fromJson(
            Currency::USD,
            Currency::RUB,
            $date,
            $json
        );

        $this->assertEquals(
            $rate,
            new Rate(
                Currency::USD,
                Currency::RUB,
                $date,
                67.1807
            )
        );
    }
}
