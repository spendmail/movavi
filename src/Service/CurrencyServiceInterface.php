<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 20.08.18
 * Time: 12:50
 */

namespace Movavi\Service;

use Movavi\Entity\Rate;

/**
 * Interface CurrencyServiceInterface
 *
 * Rate service interface
 *
 * @package Movavi\Service
 */
interface CurrencyServiceInterface
{
    public function getUsdToRubRate(\DateTime $date): Rate;

    public function getEurToRubRate(\DateTime $date): Rate;

}
