<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 20.08.18
 * Time: 12:24
 */

namespace Movavi;


use Movavi\Builder\AverageRateBuilder;
use Movavi\Exception\UnknownDateFormat;
use Movavi\Factory\CurrencyServiceFactory;
use Movavi\Service\CbrService;
use Movavi\Service\RbcService;

class Application
{

    /**
     * @throws Exception\UnknownServiceException
     */
    public function run($date = null)
    {

        $date = new \DateTime();

        $serviceFactory = new CurrencyServiceFactory();
        $averageRateBuilder = new AverageRateBuilder();

        $rbcService = $serviceFactory->createService(RbcService::NAME);
        $cbrService = $serviceFactory->createService(CbrService::NAME);


//        $usdRates = [];
//        $usdRates[] = $rbcService->getUsdToRubRate($date);
//        $usdRates[] = $cbrService->getUsdToRubRate($date);
//
//        $averageUsdRate = $averageRateBuilder->fromArray($usdRates);
//        printf("Average USD rate: %s<br>", $averageUsdRate->getRate());
//
//        $eurRates = [];
//        $eurRates[] = $rbcService->getEurToRubRate($date);
//        $eurRates[] = $cbrService->getEurToRubRate($date);
//
//        $averageUsdRate = $averageRateBuilder->fromArray($eurRates);
//        printf("Average EUR rate: %s<br>", $averageUsdRate->getRate());

        echo "<pre>";
        print_r($rbcService->getUsdToRubRate($date));
        print_r($rbcService->getEurToRubRate($date));

        print_r($cbrService->getUsdToRubRate($date));
        print_r($cbrService->getEurToRubRate($date));
    }

}

