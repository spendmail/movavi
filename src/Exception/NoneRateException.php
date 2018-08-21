<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 21.08.18
 * Time: 14:13
 */

namespace Movavi\Exception;

/**
 * Class NoneRateException
 *
 * Throws when service hasn't sent any data
 *
 * @package Movavi\Exception
 */
class NoneRateException extends \Exception
{
    public $message = 'Service has not send any rate data';

}
