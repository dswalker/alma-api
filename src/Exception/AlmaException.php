<?php

/*
 * This file is part of the Alma API library
 *
 * (c) California State University <library@calstate.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alma\Exception;

use Alma\Utils\Json;

/**
 * Alma Exception
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class AlmaException extends \Exception
{

    /**
     * New Alma Exception
     *
     * @param string $response Alma response
     */
    public function __construct($response)
    {
        $message = "Alma returned no error response";
        $code = 0;
        $doc = null;
        
        // contains xml or json
        
        if (substr($response, 0, 14) == '<!DOCTYPE HTML') {
            $message = $response;
        } elseif (substr($response, 0, 1) == '<') {
            $doc = new \SimpleXMLElement($response);
        } elseif (substr($response, 0, 1) == '{') {
            $doc = new Json($response);
        }
        
        if ($doc != null) {
        	$errors = array();
        	
        	if ( $doc->web_service_result != null ) {
        		// most basic error
        		$errors[] = $doc->web_service_result->errorList->error;
        	} else {
        		// typical error
	        	foreach ($doc->errorList->error as $error) {
	        		$errors[] = $error;
	        	}
        	}
        	
            foreach ($errors as $error) {
                $message = (string) $error->errorMessage;
                
                if ($message == "") {
                    $message = (string) $error->errorCode;
                }
                
                $code = (int) $error->errorCode;
                $message .= " " . (string) $error->trackingId;
                break;
            }
        }
        
        return parent::__construct($message, $code);
    }
}
