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
 
use Alma\Utils\Record;
use Alma\Utils\Value;
use Alma\Utils\ValueList;

/**
 * A course instructor.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Instructor extends Record
{
    /**
     * The primary identifier of the instructor.
     *
     * @return string
     */
    public function getPrimaryId()
    {
        return (string) $this->json()->primary_id;
    }
     
    /**
     * The primary identifier of the instructor.
     *
     * @param string $primary_id
     */
    public function setPrimaryId($primary_id)
    {
        $this->json()->primary_id = $primary_id;
    }

    /**
     * The instructor's first name. Output parameter.
     *
     * @return string
     */
    public function getFirstName()
    {
        return (string) $this->json()->first_name;
    }
     
    /**
     * The instructor's first name. Output parameter.
     *
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->json()->first_name = $first_name;
    }

    /**
     * The instructor's last name. Output parameter.
     *
     * @return string
     */
    public function getLastName()
    {
        return (string) $this->json()->last_name;
    }
     
    /**
     * The instructor's last name. Output parameter.
     *
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->json()->last_name = $last_name;
    }

    /**
     * Required fields
     *
     * @return array
     */
    protected function getRequiredFields()
    {
        return array(
            'primary_id',
        );
    }
}
