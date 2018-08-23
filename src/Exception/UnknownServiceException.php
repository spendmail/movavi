<?php

namespace Movavi\Exception;

/**
 * Class UnknownServiceException
 *
 * Throws when passed unknown service name to service factory
 *
 * @package Movavi\Exception
 */
class UnknownServiceException extends MovaviException
{
    public $message = 'Unknown service name';
}
