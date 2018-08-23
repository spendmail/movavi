<?php

namespace Movavi\Exception;

/**
 * Class EmptyRateListException
 *
 * Throws when rates array is empty
 *
 * @package Movavi\Exception
 */
class EmptyRateListException extends MovaviException
{
    public $message = 'Rates array is empty';
}
