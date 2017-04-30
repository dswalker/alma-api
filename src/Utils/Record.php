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
 * Record
 *
 * A mapper class that translates the underlying JSON data to and from PHP objects
 *
 * @author David Walker <dwalker@calstate.edu>
 */
abstract class Record
{
    /**
     * @var Json
     */
    private $json;
    
    /**
     * @var HttpClient
     */
    private $client;
    
    /**
     * Whether object is partially loaded
     * @var bool
     */
    private $partial = false;

    /**
     * New Record
     *
     * @param string|Json $json [optional] JSON string or object
     * @param bool $partial     [optional] Whether the object is partially loaded, having been 
     *                          instantiated from a method that returns a 'brief' version of the data
     */
    public function __construct($json = "", $partial = false)
    {
        if ($json != "") {
            if ($json instanceof Json) {
                $this->json = $json;
            } else {
                $this->json = new Json($json);
            }
        }
        
        $this->partial = $partial;
    }

    /**
     * @return Json
     */
    public function json()
    {
        if (! $this->json instanceof Json) {
            $this->json = new Json();
        }
        
        return $this->json;
    }

    /**
     * Save the record
     */
    public function save()
    {
        $this->checkForLink();
        $this->json = $this->client()->putJson($this->getLink(), $this->json());
    }

    /**
     * Delete the record
     */
    public function delete()
    {
        $this->checkForLink();
        $this->client()->deleteUrl($this->getLink());
        unset($this->json);
    }
    
    /**
     * Get the full record, if only partial loaded
     */
    public function getFullRecord()
    {
        $this->checkForLink();
        $this->json = $this->client()->getUrl($this->getLink());
        $this->partial = false;
    }
    
    /**
     * Whether the record is partially loaded from a brief result set
     * 
     * @return boolean
     */
    public function isPartial()
    {
        return $this->_partial;
    }
    
    /**
     * Ensure there is a link, otherwise fail
     * 
     * @throws \Exception
     */
    protected function checkForLink()
    {
        if ($this->getLink() == "") {
            throw new \Exception('No record link defined');
        }
    }
    
    /**
     * Link for record
     * 
     * @return string
     */
    public function getLink()
    {
        return (string) $this->json()->link;
    }
    
    /**
     * Link for record
     *
     * @return string
     */
    public function setLink($link)
    {
        $this->json()->link = $link;
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

    /**
     * Convert Alma's internal date string to DateTime
     *
     * @param string $alma_date
     * @return \DateTime
     */
    protected function stringToDate($alma_date)
    {
        $date = new \DateTime($alma_date);
        $date->setTimezone($this->getTimezone());
        return $date;
    }

    /**
     * Convert and normalize Date to Alma's internal date string
     *
     * @param \DateTime|string|int $date  Date as object, string, or timestamp
     * @return string
     */
    protected function dateToString($date)
    {
        // not a Date, so convert it
        
        if (! $date instanceof \DateTime) {
            
            // supplied a timestamp
            if (is_int($date)) {
                $date = date('Y-m-d', $date);
            }
            
            $date = $this->stringToDate($date);
        }
        
        $date->setTimezone($this->getTimezone());
        return $date->format('Y-m-d') . 'Z';
    }
    
    protected function getValueObject($property)
    {
        // make sure the property is properly a Value object
        
        if ($this->json()->$property instanceof \stdClass) {
            $this->json()->$property = new Value($this->json()->$property);
        } elseif ($this->json()->$property == "") {
            $this->json()->$property = new Value();
        }
    
        return $this->json()->$property;
    }
    
    /**
     * Set a property that is a value/desc object
     * 
     * @param string $property
     * @param string $value
     * @param string $desc
     */
    protected function setValueObject($property, $value, $desc = "")
    {
        // make sure the property is properly a Value object
        
        if ($this->json()->$property == "") {
            $this->json()->$property = new Value($value, $desc);
        } else {
            if ($this->json()->$property instanceof \stdClass) {
                $this->json()->$property = new Value($this->json()->$property);
            }
            
            // assign values
            
            $this->json()->$property->value = $value;
            
            if ($desc != "") {
                $this->json()->$property->desc = $desc;
            }
        }
    }
    
    protected function getValueList($property)
    {
        // make sure the property is properly a ValueList object
        
        if (is_array($this->json()->$property)) {
            $this->json()->$property = new ValueList($this->json()->$property);
        } elseif ($this->json()->$property == "") {
            $this->json()->$property = new ValueList();
        }
        
        return $this->json()->$property;
    }

    /**
     * UTC timezone
     *
     * @return \DateTimeZone
     */
    protected function getTimezone()
    {
        return new \DateTimeZone("UTC");
    }

    /**
     * JSON encoded string
     * 
     * @return string
     */
    public function __toString()
    {
        return (string) $this->json();
    }
}