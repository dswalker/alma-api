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
     * @return Alma\Utils\Value
     */
    public function getType()
    {
        return $this->getValueObject('type');
    }

    /**
     * The value of the tag.
     * 
     * Possible codes are listed in 'PublicTags' or 'LibraryTags' code tables.
     *
     * @return Alma\Utils\Value
     */
    public function getValue()
    {
        return $this->getValueObject('value');
    }
}
