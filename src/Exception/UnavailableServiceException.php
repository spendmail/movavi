<?php

namespace Movavi\Exception;

/**
 * Class UnavailableServiceException
 *
 * Throws when service is not responding
 *
 * @package Movavi\Exception
 */
class UnavailableServiceException extends MovaviException
{
    public $message = 'Service is temporary unavailable';
}
