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
 * Citation Tag Object.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class CitationTag extends Record
{
    /**
     * The type of the tag.
     * 
     * Possible codes are listed in 'TagTypes' code tables.
     *
     * @return Value
     */
    public function getType()
    {
        return $this->json()->type;
    }
     
    /**
     * The type of the tag.
     * 
     * Possible codes are listed in 'TagTypes' code tables.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setType($value, $desc = "")
    {
        $this->setValueObject('type', $value, $desc);
    }

    /**
     * The value of the tag.
     * 
     * Possible codes are listed in 'PublicTags' or 'LibraryTags' code tables.
     *
     * @return Value
     */
    public function getValue()
    {
        return $this->json()->value;
    }
     
    /**
     * The value of the tag.
     * 
     * Possible codes are listed in 'PublicTags' or 'LibraryTags' code tables.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setValue($value, $desc = "")
    {
        $this->setValueObject('value', $value, $desc);
    }
}
