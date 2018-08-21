<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 20.08.18
 * Time: 12:51
 */

namespace Movavi\Service;

use Movavi\Builder\CbrRateBuilder;
use Movavi\Entity\Rate;
use Movavi\Entity\Currency;

/**
 * Class CbrService
 *
 * Service providing rate data from www.cbr.ru
 *
 * @package Movavi\Service
 */
class CbrService extends AbstractService implements CurrencyServiceInterface
{
    /**
     * Service name
     */
    const NAME = 'CBR';

    /**
     * Service url pattern
     */
    const URL = 'http://www.cbr.ru/scripts/XML_dynamic.asp?date_req1=%s&date_req2=%s&VAL_NM_RQ=%s';

    /**
     * Service USD alias that substituting into url
     */
    const URL_USD = 'R01235';

    /**
     * Service EUR alias that substituting into url
     */
    const URL_EUR = 'R01239';

    /**
     * Service date format that substituting into url
     */
    const URL_DATE_FORMAT = 'd/m/Y';

    /**
     * Builder for the Rate instances
     *
     * @var CbrRateBuilder|null
     */
    public $builder = null;

    /**
     * CbrService constructor.
     *
     * @param CbrRateBuilder $builder
     */
    public function __construct(CbrRateBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Returns prepared URL-address
     *
     * @param $currencyFrom
     * @param \DateTime $date
     *
     * @return string
     */
    protected function getUrl($currencyFrom, \DateTime $date)
    {

        $strDateTo = $date->format(static::URL_DATE_FORMAT);
        $strDateFrom = $date->sub(\DateInterval::createFromDateString('1 day'))->format(static::URL_DATE_FORMAT);

        return sprintf(
            static::URL,
            $strDateFrom,
            $strDateTo,
            $currencyFrom
        );
    }

    /**
     * Returns dollar to ruble rate by specified date
     * Implements CurrencyServiceInterface::getUsdToRubRate
     *
     * @param \DateTime $date
     *
     * @return Rate
     *
     * @throws \Movavi\Exception\NoneRateException
     * @throws \Movavi\Exception\UnavailableServiceException
     */
    public function getUsdToRubRate(\DateTime $date): Rate
    {
        $url = $this->getUrl(static::URL_USD, $date);
        $content = $this->httpRequest($url);

        return $this->builder->fromXml(Currency::USD, Currency::RUB, $date, $content);
    }

    /**
     * Returns euro to ruble rate by specified date
     * Implements CurrencyServiceInterface::getUsdToRubRate
     *
     * @param \DateTime $date
     *
     * @return Rate
     *
     * @throws \Movavi\Exception\NoneRateException
     * @throws \Movavi\Exception\UnavailableServiceException
     */
    public function getEurToRubRate(\DateTime $date): Rate
    {
        $url = $this->getUrl(static::URL_EUR, $date);
        $content = $this->httpRequest($url);

        return $this->builder->fromXml(Currency::USD, Currency::RUB, $date, $content);
    }
}
