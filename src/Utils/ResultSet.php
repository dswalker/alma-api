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
 * ResultSet
 *
 * @author David Walker <dwalker@calstate.edu>
 */
abstract class ResultSet
{
    /**
     * @var integer
     */
    public $total = 0;
    
    /**
     * @var integer
     */
    public $start = 0;
    
    /**
     * @var integer
     */
    public $end = 0;
    
    /**
     * @var array
     */
    protected $results = array();
    
    /**
     * Return current set of results
     * 
     * @return array
     */
    public function getResults()
    {
        return $this->results;        
    }
}
