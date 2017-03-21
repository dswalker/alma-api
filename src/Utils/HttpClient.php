<?php

/*
 * This file is part of the Alma API library
 *
 * (c) California State University <library@calstate.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alma\Utils;

use Alma\Alma;
use Alma\Exception\AlmaException;

/**
 * HTTP Client
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class HttpClient
{
    /**
     * Get request
     *
     * @param string $uri
     * @param array $params
     *
     * @throws AlmaException
     * @return Json
     */
    public function get($uri, $params = array())
    {
        $url = $this->constructUrl($uri, $params);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $response = curl_exec($ch);
        
        return $this->processResponse($response);
    }

    /**
     * Put request
     *
     * @param string $uri
     * @param string $body
     * @param array $params
     *
     * @throws AlmaException
     * @return Json
     */
    public function put($uri, $body, $params = array())
    {
        $url = $this->constructUrl($uri, $params);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $this->processResponse($response);
    }

    /**
     * Post request
     *
     * @param string $uri
     * @param string $body
     * @param array $params
     *
     * @throws AlmaException
     * @return Json
     */
    public function post($uri, $body, $params = array())
    {
        $url = $this->constructUrl($uri, $params);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $this->processResponse($response);
    }

    /**
     * Delete request
     *
     * @param string $uri
     * @param string $body
     * @param array $params
     *
     * @throws AlmaException
     * @return bool true on success, exception on error
     */
    public function delete($uri, $params = array())
    {
        $url = $this->constructUrl($uri, $params);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $response = curl_exec($ch);
        curl_close($ch);
        
        return true;
    }

    /**
     * Check the response for errors, otherwise return as JSON
     *
     * @param string $response
     * @throws AlmaException
     * @return \Alma\Utils\Json
     */
    protected function processResponse($response)
    {
        $json = new Json($response);
        
        if ($json->errorsExist != "") {
            throw new AlmaException($response);
        }
        
        return $json;
    }

    /**
     * Generate the full URL
     *
     * @param string $uri
     * @param array $params
     *
     * @return string
     */
    protected function constructUrl($uri, array $params)
    {
        if ($uri == "") {
            throw new \OutOfBoundsException("No link supplied");
        }
        
        // construct base url
        if (substr($uri, 0, 4) == 'http') {
            $url = $uri; // already a full url
        } else {
            // add base url
            $url = Alma::$host . '/almaws/v1/' . ltrim($uri, '/');
        }
        
        $url .= '?';
        
        // add locally defined params
        
        foreach ($params as $key => $value) {
            if ( $value == "") {
                continue;
            }
            $url .= '&' . $key . urlencode($value);
        }
        
        $url .= '&apikey=' . Alma::$api_key;
        $url .= '&format=json';
        
        return $url;
    }
}