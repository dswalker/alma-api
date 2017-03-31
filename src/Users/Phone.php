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
 * Specific user's phone number.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Phone extends Record
{
    /**
     * The phone number.
     * 
     * Mandatory.
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return (string) $this->json()->phone_number;
    }

    /**
     * The phone number.
     * 
     * Mandatory.
     *
     * @param string $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->json()->phone_number = $phone_number;
    }

    /**
     * The different Phone types.
     * 
     * Mandatory.
     *
     * @return Alma\Utils\ValueList
     */
    public function getPhoneTypes()
    {
        return $this->getValueList('phone_types');
    }

    /**
     * The different Phone types.
     * 
     * Mandatory.
     *
     * @param Alma\Utils\ValueList $phone_types
     */
    public function setPhoneTypes(Alma\Utils\ValueList $phone_types)
    {
        $this->json()->phone_type = array();

        foreach ($phone_types as $phone_type) {
            $this->json()->phone_type[] = $phone_type;
        } 
    }

    /**
     * Indication whether the phone number is the preferred one.
     * 
     * Only one address can be defined as preferred.
     *
     * @return bool
     */
    public function getPreferred()
    {
        return (bool) $this->json()->preferred;
    }

    /**
     * Indication whether the phone number is the preferred one.
     * 
     * Only one address can be defined as preferred.
     *
     * @param bool $preferred
     */
    public function setPreferred($preferred)
    {
        $this->json()->preferred = $preferred->json();
    }

    /**
     * Indication whether the phone number is the preferred one for SMS sending.
     * 
     * Only one phone number can be defined as preferred.
     *
     * @return bool
     */
    public function getPreferredSms()
    {
        return (bool) $this->json()->preferred_sms;
    }

    /**
     * Indication whether the phone number is the preferred one for SMS sending.
     * 
     * Only one phone number can be defined as preferred.
     *
     * @param bool $preferred_sms
     */
    public function setPreferredSms($preferred_sms)
    {
        $this->json()->preferred_sms = $preferred_sms->json();
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
}
