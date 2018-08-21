<?php

namespace Movavi\Exception;

/**
 * Class UnknownDateFormat
 *
 * Throws when different from DateTime class given
 *
 * @package Movavi\Exception
 */
class UnknownDateFormat extends \Exception
{
    public $message = 'Date must be an instance of DateTime';

}
