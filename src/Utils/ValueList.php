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
 * ValueList Iterator
 *
 * An array of Value objects
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class ValueList implements \Iterator
{
    /**
     * @var array
     */
    protected $elements = array();

    /**
     * @var int
     */
    protected $cursor = 0;
    
    /**
     * New ValueList
     */
    public function __construct(array $list = array())
    {
        foreach ( $list as $object ) {
            if ($object instanceof \stdClass) {
                $value = new Value($object);
                $this->add($value);
            } elseif ($object instanceof Value) {
                $this->add($object);
            }
        }
    }

    public function current()
    {
        return $this->elements[$this->cursor];
    }

    public function next()
    {
        $this->cursor++;
    }

    public function key()
    {
        return $this->cursor;
    }

    public function valid()
    {
        return isset($this->elements[$this->cursor]);
    }

    public function rewind()
    {
        $this->cursor = 0;
    }

    /**
     * Add a Value object
     *
     * @param Value $value
     */
    public function add(Value $value)
    {
        $this->elements[] = $value;
    }
    
    /**
     * Get just the string values from the Value objects in this list
     * 
     * @return array
     */
    public function getValues()
    {
        $final = array();
        
        foreach ($this->elements as $object) {
            $final[] = $object->value;
        }
        
        return $final;
    }
    
    /**
     * Get just the descriptions from the Value objects in this list
     *
     * @return array
     */
    public function getDescriptions()
    {
        $final = array();
    
        foreach ($this->elements as $object) {
            $final[] = $object->desc;
        }
    
        return $final;
    }
}
