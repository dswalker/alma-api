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
 * Value
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Value
{
    /**
     * @var string
     */
    public $value;
    
    /**
     * @var string
     */
    public $desc;
    
    /**
     * New Value object
     * 
     * @param \stdClass|string $value  [optional] the value
     * @param string $desc             [optional] the description
     */
    public function __construct($value = "", $desc = "")
    {
        // value was a json object, taken from Alma itself
        
        if ( $value instanceof \stdClass ) {
            if ( isset($value->value) ) {
                $this->value = $value->value;
            }
            if ( isset($value->desc) ) {
                $this->desc = $value->desc;
            }
        } else {
        	$this->value = $value;
        	$this->desc = $desc;
        }
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
