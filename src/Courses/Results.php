<?php

/*
 * This file is part of the Alma API library
 *
 * (c) California State University <library@calstate.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alma\Courses;

use Alma\Utils\Json;
use Alma\Utils\ResultSet;

/**
 * Course Results
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Results extends ResultSet
{
    /**
     * New course results object
     * 
     * @param Json $json  Alma JSON response
     * @param int $start  Start number of result set
     */
    public function __construct(Json $json, $start)
    {
        $this->total = $json->total_record_count;
        $this->start = $start;
        $this->end = $start;
        
        foreach ($json->course as $json_course) {
            $this->results[] = new Course($json_course, true);
            $this->end++;
        }
    }
    
    /**
     * @return Course[]
     */
    public function getResults()
    {
        return parent::getResults();
    }
}
