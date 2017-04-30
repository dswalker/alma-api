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

/**
 * JSON
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Json
{
    /**
     * New JSON object
     *
     * @param string $json|stdClass [optional] JSON as object or string
     * @throws \OutOfBoundsException
     */
    public function __construct($json = "")
    {
        if ($json != "" && $json != null) {
            if (! is_string($json) && ! $json instanceof \stdClass) {
                throw new \OutOfBoundsException('param must be of type string or json, supplied ' . gettype($json));
            }
            
            if (! $json instanceof \stdClass) {
                $json = json_decode($json);
            }
            
            foreach ($json as $property => $value) {
                $this->$property = $value;
            }
        }
    }

    /**
     * When basic property (string, number, date) doesn't exist, return null
     */
    public function __get($name)
    {
        return null;
    }

    /**
     * Properties that contain an object (usually as value/desc) need to be called as functions.
     * When it doesn't exist, create a new object and return it
     */
    public function __call($name, $arguments)
    {
        if (isset($this->$name)) {
            if ($this->$name instanceof \stdClass) {
            	$this->$name = new Json($this->$name);
            }
            
        	return $this->$name;
        } else {
            $this->$name = new Json();
            return $this->$name;
        }
    }

    /**
     * Json-encoded string
     * 
     * @return string
     */
    public function __toString()
    {
        return json_encode($this);
    }
}