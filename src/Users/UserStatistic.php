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
 * Specific user statistic.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class UserStatistic extends Record
{
    /**
     * The statistic's Categories.
     * 
     * Possible codes are listed in 'User Statistical Categories' code table.
     *
     * @return Value
     */
    public function getStatisticCategory()
    {
        return $this->json()->statistic_category;
    }
     
    /**
     * The statistic's Categories.
     * 
     * Possible codes are listed in 'User Statistical Categories' code table.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setStatisticCategory($value, $desc = "")
    {
        $this->setValueObject('statistic_category', $value, $desc);
    }

    /**
     * The statistic's type.
     * 
     * Possible codes are listed in 'User Category Types' code table. Output
     * parameter.
     *
     * @return Value
     */
    public function getCategoryType()
    {
        return $this->json()->category_type;
    }
     
    /**
     * The statistic's type.
     * 
     * Possible codes are listed in 'User Category Types' code table. Output
     * parameter.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setCategoryType($value, $desc = "")
    {
        $this->setValueObject('category_type', $value, $desc);
    }

    /**
     * The statistic's related note.
     *
     * @return string
     */
    public function getStatisticNote()
    {
        return (string) $this->json()->statistic_note;
    }
     
    /**
     * The statistic's related note.
     *
     * @param string $statistic_note
     */
    public function setStatisticNote($statistic_note)
    {
        $this->json()->statistic_note = $statistic_note;
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
            'statistic_category',
        );
    }
}
