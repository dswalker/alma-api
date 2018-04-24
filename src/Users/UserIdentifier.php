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
 * Specific user's identifier.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class UserIdentifier extends Record
{
    /**
     * The identifier type.
     * 
     * Possible codes are listed in 'User Identifier Type' code table. Mandatory.
     *
     * @return Alma\Utils\Value
     */
    public function getIdType()
    {
        return $this->getValueObject('id_type');
    }

    /**
     * The identifier type.
     * 
     * Possible codes are listed in 'User Identifier Type' code table. Mandatory.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setIdType($value, $desc = "")
    {
        $this->setValueObject('id_type', $value, $desc);
    }

    /**
     * The identifier value.
     * 
     * Mandatory. Note that additional identifiers are case sensitive.
     *
     * @return string
     */
    public function getValue()
    {
        return (string) $this->json()->value;
    }

    /**
     * The identifier value.
     * 
     * Mandatory. Note that additional identifiers are case sensitive.
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->json()->value = $value;
    }

    /**
     * identifier's note.
     *
     * @return string
     */
    public function getNote()
    {
        return (string) $this->json()->note;
    }

    /**
     * identifier's note.
     *
     * @param string $note
     */
    public function setNote($note)
    {
        $this->json()->note = $note;
    }

    /**
     * identifier's status.
     *
     * @return string
     */
    public function getStatus()
    {
        return (string) $this->json()->status;
    }

    /**
     * identifier's status.
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->json()->status = $status;
    }

    /**
     * The type of the segment ("Internal" or "External").
     * 
     * Relevant only for User API (and not for SIS). For internal users, all the
     * segments are considered internal. External users might have internal or
     * external segments. Empty or illegal segment_type for external user will be
     * considered as external.
     *
     * @return string
     */
    public function getSegmentType()
    {
        return (string) $this->json()->segment_type;
    }

    /**
     * The type of the segment ("Internal" or "External").
     * 
     * Relevant only for User API (and not for SIS). For internal users, all the
     * segments are considered internal. External users might have internal or
     * external segments. Empty or illegal segment_type for external user will be
     * considered as external.
     *
     * @param string $segment_type
     */
    public function setSegmentType($segment_type)
    {
        $this->json()->segment_type = $segment_type;
    }

    /**
     * Required fields
     *
     * @return array
     */
    protected function getRequiredFields()
    {
        return array(
            'id_type',
            'value',
        );
    }
}
