<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 21.08.18
 * Time: 14:13
 */

namespace Movavi\Exception;

/**
 * Class WrongClassException
 *
 * Throws when different from Movavi\Entity\Rate class given
 *
 * @package Movavi\Exception
 */
class WrongClassException extends \Exception
{
    public $message = 'Object must be an instance of Movavi\Entity\Rate';
}
