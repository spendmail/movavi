<?php

namespace Movavi\Service;

/**
 * Class AbstractService
 *
 * @package Movavi\Service
 */
abstract class AbstractService
{
    /**
     * Returns an HTTP-response by URL given
     *
     * @param $url
     *
     * @return mixed
     */
    public function httpRequest($url)
    {
        return $this->client->httpRequest($url);
    }
}
