<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 21.08.18
 * Time: 14:13
 */

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
