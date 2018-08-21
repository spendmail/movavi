<?php

namespace MovaviTest\Builder;

use Movavi\Builder\CbrRateBuilder;
use Movavi\Entity\Currency;
use Movavi\Entity\Rate;
use PHPUnit\Framework\TestCase;

class CbrRateBuilderTest extends TestCase
{
    /**
     * @expectedException \Movavi\Exception\NoneRateException
     */
    public function testShould_ThrowNoneRateException_When_XmlHasNoneRecords()
    {
        $averageRateBuilder = new CbrRateBuilder();
        $averageRateBuilder->fromXml(
            Currency::USD,
            Currency::RUB,
            new \DateTime(),
            ''
        );
    }

    public function testShould_ReturnValidRate_When_XmlHasOneRecord()
    {
        $xml = '
            <ValCurs ID="R01235" DateRange1="13.03.2001" DateRange2="14.03.2001" name="Foreign Currency Market Dynamic">
                <Record Date="14.03.2001" Id="R01235">
                    <Nominal>1</Nominal>
                    <Value>28,6200</Value>
                </Record>
            </ValCurs>
        ';

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', '2001-03-14 00:00:00');
        $averageRateBuilder = new CbrRateBuilder();
        $rate = $averageRateBuilder->fromXml(
            Currency::USD,
            Currency::RUB,
            $date,
            $xml
        );

        $this->assertEquals(
            $rate,
            new Rate(
                Currency::USD,
                Currency::RUB,
                $date,
                28.6200
            )
        );
    }

    public function testShould_ReturnValidRate_When_XmlHasMoreThanOneRecord()
    {
        $xml = '
            <ValCurs ID="R01235" DateRange1="13.03.2001" DateRange2="14.03.2001" name="Foreign Currency Market Dynamic">
                <Record Date="14.03.2001" Id="R01235">
                    <Nominal>1</Nominal>
                    <Value>28,6200</Value>
                </Record>
                <Record Date="14.03.2001" Id="R01235">
                    <Nominal>1</Nominal>
                    <Value>29,6200</Value>
                </Record>                
            </ValCurs>
        ';

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', '2001-03-14 00:00:00');
        $averageRateBuilder = new CbrRateBuilder();
        $rate = $averageRateBuilder->fromXml(
            Currency::USD,
            Currency::RUB,
            $date,
            $xml
        );

        $this->assertEquals(
            $rate,
            new Rate(
                Currency::USD,
                Currency::RUB,
                $date,
                28.6200
            )
        );
    }
}
