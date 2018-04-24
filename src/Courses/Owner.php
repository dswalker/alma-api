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

use Alma;
use Alma\Utils\Record;

/**
 * A specific owner.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Owner extends Record
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
     * Owner hierarchy.
     * 
     * Possible codes are listed in the 'OwnerHierarchy' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getHierarchy()
    {
        return $this->getValueObject('hierarchy');
    }

    /**
     * Owner hierarchy.
     * 
     * Possible codes are listed in the 'OwnerHierarchy' code table.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setHierarchy($value, $desc = "")
    {
        $this->setValueObject('hierarchy', $value, $desc);
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
     * Link
     *
     * @return string
     */
    public function getLink()
    {
        return (string) $this->json()->link;
    }

    /**
     * Link
     *
     * @param string $link
     */
    public function setLink($link)
    {
        $this->json()->link = $link;
    }
}
