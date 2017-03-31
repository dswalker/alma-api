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
 * Specific user's role.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class UserRole extends Record
{
    /**
     * The user's role status.
     * 
     * Possible codes are listed in 'User Roles Status Codes' code table. If
     * empty, default value is Active, if an illegal value is given, default is
     * Inactive.
     *
     * @return Alma\Utils\Value
     */
    public function getStatus()
    {
        return $this->getValueObject('status');
    }

    /**
     * The user's role status.
     * 
     * Possible codes are listed in 'User Roles Status Codes' code table. If
     * empty, default value is Active, if an illegal value is given, default is
     * Inactive.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setStatus($value, $desc = "")
    {
        $this->setValueObject('status', $value, $desc);
    }

    /**
     * The campus/library to which the role applies.
     *
     * @return Alma\Utils\Value
     */
    public function getScope()
    {
        return $this->getValueObject('scope');
    }

    /**
     * The campus/library to which the role applies.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setScope($value, $desc = "")
    {
        $this->setValueObject('scope', $value, $desc);
    }

    /**
     * The user's role.
     * 
     * Possible codes are listed in 'User Roles' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getRoleType()
    {
        return $this->getValueObject('role_type');
    }

    /**
     * The user's role.
     * 
     * Possible codes are listed in 'User Roles' code table.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setRoleType($value, $desc = "")
    {
        $this->setValueObject('role_type', $value, $desc);
    }

    /**
     * The date after which the user no longer has the role.
     *
     * @return \DateTime
     */
    public function getExpiryDate()
    {
        return $this->stringToDate((string) $this->json()->expiry_date);
    }

    /**
     * The date after which the user no longer has the role.
     *
     * @param \DateTime|string $expiry_date
     */
    public function setExpiryDate($expiry_date)
    {
        $this->json()->expiry_date = $this->dateToString($expiry_date);
    }

    /**
     * Role's related parameters.
     *
     * @return Parameter[]
     */
    public function getParameters()
    {
        $final = array();

        foreach ((array) $this->json()->parameter as $parameter) {
            $final[] = new Parameter($parameter);
        }

        return $final;
    }

    /**
     * Role's related parameters.
     *
     * @param Parameter[] $parameters
     */
    public function setParameters(array $parameters)
    {
        $this->json()->parameter = array();

        foreach ($parameters as $parameter) {
            $this->json()->parameter[] = $parameter->json();
        } 
    }
}
