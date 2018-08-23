<?php

namespace Movavi\Exception;

/**
 * Class DisallowedUrlException
 *
 * Throws when allow_url_fopen set to false in php.ini
 *
 * @package Movavi\Exception
 */
class DisallowedUrlException extends MovaviException
{
    public $message = 'Request to external URL is disallowed';
}
