<?php

/*
 * This file is part of the Alma API library
 *
 * (c) California State University <library@calstate.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alma;

use Alma\Utils\HttpClient;

/**
 * Alma
 *
 * @author David Walker <dwalker@calstate.edu>
 */
abstract class Alma
{
    /**
     * Alma host
     *
     * @var string
     */
    public static $host;
    
    /**
     * Alma API key
     *
     * @var string
     */
    public static $api_key;
    
    /**
     *
     * @var HttpClient
     */
    private $client;

    /**
     * New Alma Client
     *
     * @param unknown $host Alma host
     * @param unknown $api_key API key provided by your institution’s API administrator
     */
    public function __construct($host, $api_key)
    {
        self::$host = rtrim($host, '/');
        self::$api_key = $api_key;
        
        $this->client = new HttpClient();
    }

    /**
     * @return HttpClient
     */
    protected function client()
    {
        if (! $this->client instanceof HttpClient) {
            $this->client = new HttpClient();
        }
        
        return $this->client;
    }
}
