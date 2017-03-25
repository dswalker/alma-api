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
 * Role's specific parameter.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Parameter extends Record
{
    /**
     * The parameter's type.
     * 
     * Possible values: CirculationDesk, MetadataType, ServiceUnit.
     *
     * @return Alma\Utils\Value
     */
    public function getType()
    {
        return $this->json()->type;
    }

    /**
     * The parameter's type.
     * 
     * Possible values: CirculationDesk, MetadataType, ServiceUnit.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setType($value, $desc = "")
    {
        $this->setValueObject('type', $value, $desc);
    }

    /**
     * Parameter's related value.
     *
     * @return Alma\Utils\Value
     */
    public function getValue()
    {
        return $this->json()->value;
    }

    /**
     * Parameter's related value.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setValue($value, $desc = "")
    {
        $this->setValueObject('value', $value, $desc);
    }
}
