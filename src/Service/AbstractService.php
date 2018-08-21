<?php
/**
 * Created by PhpStorm.
 * User: spendlively
 * Date: 20.08.18
 * Time: 13:42
 */

namespace Movavi\Service;

use Movavi\Exception\UnavailableServiceException;

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
     * @return bool|string
     *
     * @throws UnavailableServiceException
     */
    public function httpRequest($url)
    {
        if(!$content = file_get_contents($url)){
            throw new UnavailableServiceException();
        }

        return $content;
    }
}
