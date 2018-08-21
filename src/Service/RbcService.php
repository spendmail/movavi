<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 20.08.18
 * Time: 12:51
 */

namespace Movavi\Service;

use Movavi\Builder\RbcRateBuilder;
use Movavi\Entity\Currency;
use Movavi\Entity\Rate;
use Movavi\Entity\Currency\Usd;
use Movavi\Entity\Currency\Eur;
use Movavi\Entity\Currency\Rub;

/**
 * Class RbcService
 *
 * Service providing rate data from cash.rbc.ru
 *
 * @package Movavi\Service
 */
class RbcService extends AbstractService implements CurrencyServiceInterface
{
    /**
     * Service name
     */
    const NAME = 'RBC';

    /**
     * Service url pattern
     */
    const URL = 'https://cash.rbc.ru/cash/json/converter_currency_rate/?currency_from=%s&currency_to=%s&source=cbrf&sum=1&date=%s';

    /**
     * Service USD alias that substituting into url
     */
    const URL_USD = 'USD';

    /**
     * Service RUB alias that substituting into url
     */
    const URL_RUB = 'RUR';

    /**
     * Service EUR alias that substituting into url
     */
    const URL_EUR = 'EUR';

    /**
     * Service date format that substituting into url
     */
    const URL_DATE_FORMAT = 'Y-m-d';

    /**
     * Builder for the Rate instances
     *
     * @var RbcRateBuilder|null
     */
    protected $builder = null;

    /**
     * RbcService constructor.
     *
     * @param RbcRateBuilder $builder
     */
    public function __construct(RbcRateBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Returns prepared URL-address
     *
     * @param $currencyFrom
     * @param $currencyTo
     * @param \DateTime $date
     *
     * @return string
     */
    protected function getUrl($currencyFrom, $currencyTo, \DateTime $date)
    {
        return sprintf(static::URL, $currencyFrom, $currencyTo, $date->format(static::URL_DATE_FORMAT));
    }

    /**
     * Returns dollar to ruble rate by specified date
     * Implements CurrencyServiceInterface::getUsdToRubRate
     *
     * @param \DateTime $date
     *
     * @return Rate
     *
     * @throws \Movavi\Exception\UnavailableServiceException
     */
    public function getUsdToRubRate(\DateTime $date): Rate
    {

        $content = $this->httpRequest($this->getUrl(static::URL_USD, static::URL_RUB, $date));

        return $this->builder->fromJson(Currency::USD, Currency::RUB, $date, $content);
    }

    /**
     * Returns euro to ruble rate by specified date
     * Implements CurrencyServiceInterface::getUsdToRubRate
     *
     * @param \DateTime $date
     *
     * @return Rate
     *
     * @throws \Movavi\Exception\UnavailableServiceException
     */
    public function getEurToRubRate(\DateTime $date): Rate
    {
        $content = $this->httpRequest($this->getUrl(static::URL_EUR, static::URL_RUB, $date));

        return $this->builder->fromJson(Currency::EUR, Currency::RUB, $date, $content);
    }
}