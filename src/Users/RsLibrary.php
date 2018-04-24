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

use Alma;
use Alma\Utils\Record;

/**
 * Specific user's related resource sharing library.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class RsLibrary extends Record
{
    /**
     * The code of the resource sharing library.
     * 
     * Possible codes are libraries which are defined as "Resource Sharing".
     *
     * @return Alma\Utils\Value
     */
    public function getCode()
    {
        return $this->getValueObject('code');
    }

    /**
     * The code of the resource sharing library.
     * 
     * Possible codes are libraries which are defined as "Resource Sharing".
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setCode($value, $desc = "")
    {
        $this->setValueObject('code', $value, $desc);
    }
}
