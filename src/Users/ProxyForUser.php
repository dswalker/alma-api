<?php

/*
 * This file is part of the Alma API library
 *
 * (c) California State University <library@calstate.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alma\Users;
 
use Alma\Utils\Record;
use Alma\Utils\Value;
use Alma\Utils\ValueList;

/**
 * A particular proxy for a user.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class ProxyForUser extends Record
{
    /**
     * The primary identifier.
     *
     * @return string
     */
    public function getPrimaryId()
    {
        return (string) $this->json()->primary_id;
    }
     
    /**
     * The primary identifier.
     *
     * @param string $primary_id
     */
    public function setPrimaryId($primary_id)
    {
        $this->json()->primary_id = $primary_id;
    }

    /**
     * The user's first and last name.
     *
     * @return string
     */
    public function getFullName()
    {
        return (string) $this->json()->full_name;
    }
     
    /**
     * The user's first and last name.
     *
     * @param string $full_name
     */
    public function setFullName($full_name)
    {
        $this->json()->full_name = $full_name;
    }
}
