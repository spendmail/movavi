<?php

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
