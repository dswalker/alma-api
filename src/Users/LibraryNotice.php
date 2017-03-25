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

/**
 * Specific user's library notice.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class LibraryNotice extends Record
{
    /**
     * The code of the library notice.
     * 
     * Possible codes are listed in 'Library Notices Opt In Display' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getCode()
    {
        return $this->json()->code;
    }

    /**
     * The code of the library notice.
     * 
     * Possible codes are listed in 'Library Notices Opt In Display' code table.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setCode($value, $desc = "")
    {
        $this->setValueObject('code', $value, $desc);
    }

    /**
     * Value
     *
     * @return bool
     */
    public function getValue()
    {
        return (bool) $this->json()->value;
    }

    /**
     * Value
     *
     * @param bool $value
     */
    public function setValue($value)
    {
        $this->json()->value = $value;
    }
}
