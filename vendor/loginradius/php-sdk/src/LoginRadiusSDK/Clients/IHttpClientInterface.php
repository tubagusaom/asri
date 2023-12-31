<?php

/**
 * @link : http://www.loginradius.com
 * @category : Clients
 * @package : IHttpClientInterface
 * @author : LoginRadius Team
 * @license : https://opensource.org/licenses/MIT
 */

namespace LoginRadiusSDK\Clients;

/**
 * Interface IHttpClientInterface
 *
 * Used for Custom Client Library.
 *
 * @package LoginRadiusSDK\Clients
 */
interface IHttpClientInterface
{
    public function request($path, $queryArray = array(), $options = array());
}