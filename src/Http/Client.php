<?php

namespace Movavi\Http;

use Movavi\Exception\DisallowedUrlException;
use Movavi\Exception\UnavailableServiceException;

/**
 * Class Client
 *
 * Simple Http-Client
 *
 * @package Movavi\Http
 */
class Client implements ClientInterface
{
    /**
     * Client constructor.
     *
     * @throws DisallowedUrlException
     */
    public function __construct()
    {
        if(!ini_get('allow_url_fopen')){
            throw new DisallowedUrlException();
        }
    }

    /**
     * Makes http-request and returns raw data
     *
     * @param string $url
     *
     * @return string
     *
     * @throws UnavailableServiceException
     */
    public function sendHttpRequest(string $url): string
    {
        if (!$content = file_get_contents($url)) {
            throw new UnavailableServiceException();
        }

        return $content;
    }
}
