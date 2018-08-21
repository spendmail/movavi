<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 21.08.18
 * Time: 20:15
 */

namespace MovaviTest\Service;

use Movavi\Http\ClientInterface;

class HttpClientMock implements ClientInterface
{
    public function httpRequest($url): string
    {
        if(preg_match("@cbr.ru@ui", $url)){
            return '
                <ValCurs ID="R01235" DateRange1="13.03.2001" DateRange2="14.03.2001" name="Foreign Currency Market Dynamic">
                    <Record Date="14.03.2001" Id="R01235">
                        <Nominal>1</Nominal>
                        <Value>28,6200</Value>
                    </Record>
                </ValCurs>
            ';
        }
        elseif(preg_match("@rbc.ru@ui", $url)){
            return '{"status": 200, "meta": {"sum_deal": 1.0, "source": "cbrf", "currency_from": "USD", "date": null, "currency_to": "RUR"}, "data": {"date": "2018-08-21 15:37:38", "sum_result": 67.1807, "rate1": 67.1807, "rate2": 0.0149}}';
        }

        return '';
    }
}
