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
 * A campus.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Campus extends Record
{
    /**
     * Campuses as defined in CampusListSearchableColumns.
     *
     * @return Alma\Utils\Value
     */
    public function getCampusCode()
    {
        return $this->getValueObject('campus_code');
    }

    /**
     * Campuses as defined in CampusListSearchableColumns.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setCampusCode($value, $desc = "")
    {
        $this->setValueObject('campus_code', $value, $desc);
    }

    /**
     * The number of the campus participants.
     *
     * @return int
     */
    public function getCampusParticipants()
    {
        return (int) $this->json()->campusParticipants;
    }

    /**
     * The number of the campus participants.
     *
     * @param int $campusParticipants
     */
    public function setCampusParticipants($campusParticipants)
    {
        $this->json()->campusParticipants = $campusParticipants;
    }

    /**
     * Required fields
     *
     * @return array
     */
    protected function getRequiredFields()
    {
        return array(
            'campus_code',
        );
    }
}
