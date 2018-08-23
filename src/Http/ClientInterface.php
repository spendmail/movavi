<?php

namespace Movavi\Http;

/**
 * Interface ClientInterface
 *
 * @package Movavi\Http
 */
interface ClientInterface
{
    public function sendHttpRequest(string $url): string;
}
