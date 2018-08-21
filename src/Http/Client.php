<?php

namespace Movavi\Http;

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
     * Makes http-request and returns raw data
     *
     * @param $url
     *
     * @return string
     *
     * @throws UnavailableServiceException
     */
    public function httpRequest($url): string
    {
        if(!$content = file_get_contents($url)){
            throw new UnavailableServiceException();
        }

        return $content;
    }
}
