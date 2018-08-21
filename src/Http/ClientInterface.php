<?php

namespace Movavi\Http;

/**
 * Interface ClientInterface
 *
 * @package Movavi\Http
 */
interface ClientInterface
{
    public function httpRequest($url): string;
}
