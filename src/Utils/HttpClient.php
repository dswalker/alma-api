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
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

/**
 * HTTP Client
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class HttpClient extends Client
{
    public $url;
    
    /**
     * Get request
     *
     * @param string $uri
     * @param array $params
     *
     * @throws AlmaException
     * @return Json
     */
    public function getUrl($uri, $params = array())
    {
        try {
        	$this->url = $this->constructUrl($uri, $params);
        	$response = $this->get($this->url);
        	return $this->processResponse($response);
        } catch (RequestException $e) {
        	$this->processException($e);
        }
    }

    /**
     * Put JSON request
     *
     * @param string $uri
     * @param Json|array $json
     * @param array $params
     *
     * @throws AlmaException
     * @return Json
     */
    public function putJson($uri, $json, $params = array())
    {
    	try {
    	    $this->url = $this->constructUrl($uri, $params);
    	    $response = $this->put($this->url,['json' => $json]);
	    	return $this->processResponse($response);
    	} catch (RequestException $e) {
	       	$this->processException($e);
    	}
    }

    /**
     * Post JSON request
     *
     * @param string $uri
     * @param Json|array $body
     * @param array $params
     *
     * @throws AlmaException
     * @return Json
     */
    public function postJson($uri, $json, $params = array())
    {
    	try {
    	    $this->url = $this->constructUrl($uri, $params);
    	    $response = $this->post($this->url, ['json' => $json]);
	        return $this->processResponse($response);
    	} catch (RequestException $e) {
    		$this->processException($e);
    	}
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
    public function deleteUrl($uri, $params = array())
    {
        $this->url = $this->constructUrl($uri, $params);
        $this->delete($this->url);
        return true;
    }

    /**
     * Check the response for errors, otherwise return as JSON
     *
     * @param ResponseInterface $response
     * @throws AlmaException
     * @return \Alma\Utils\Json
     */
    protected function processResponse($response)
    {
    	// convert to json
    	
    	$body = (string) $response->getBody();
        $json = new Json($body);
        
        if ($json->errorsExist != "") {
            throw new AlmaException($response);
        }
        
        return $json;
    }
    
    /**
     * Get a clean server error message
     * 
     * @param RequestException $e
     * @throws AlmaException|RequestException
     */
    
    protected function processException(RequestException $e)
    {
    	$body = "";
        $response = $e->getResponse();
    	
    	if ($response == null) {
    	    throw $e;
    	} else {
    	    $body = (string) $response->getBody();
            throw new AlmaException($body);
    	}
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
            $url .= '&' . $key . '=' . urlencode($value);
        }
        
        $url .= '&apikey=' . Alma::$api_key;
        $url .= '&format=json';
        
        return $url;
    }
}