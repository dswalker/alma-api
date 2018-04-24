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
 * Specific user's address.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Address extends Record
{
    /**
     * Line 1 of the address.
     * 
     * Mandatory.
     *
     * @return string
     */
    public function getLine1()
    {
        return (string) $this->json()->line1;
    }

    /**
     * Line 1 of the address.
     * 
     * Mandatory.
     *
     * @param string $line1
     */
    public function setLine1($line1)
    {
        $this->json()->line1 = $line1;
    }

    /**
     * Line 2 of the address.
     *
     * @return string
     */
    public function getLine2()
    {
        return (string) $this->json()->line2;
    }

    /**
     * Line 2 of the address.
     *
     * @param string $line2
     */
    public function setLine2($line2)
    {
        $this->json()->line2 = $line2;
    }

    /**
     * Line 3 of the address.
     *
     * @return string
     */
    public function getLine3()
    {
        return (string) $this->json()->line3;
    }

    /**
     * Line 3 of the address.
     *
     * @param string $line3
     */
    public function setLine3($line3)
    {
        $this->json()->line3 = $line3;
    }

    /**
     * Line 4 of the address.
     *
     * @return string
     */
    public function getLine4()
    {
        return (string) $this->json()->line4;
    }

    /**
     * Line 4 of the address.
     *
     * @param string $line4
     */
    public function setLine4($line4)
    {
        $this->json()->line4 = $line4;
    }

    /**
     * Line 5 of the address.
     *
     * @return string
     */
    public function getLine5()
    {
        return (string) $this->json()->line5;
    }

    /**
     * Line 5 of the address.
     *
     * @param string $line5
     */
    public function setLine5($line5)
    {
        $this->json()->line5 = $line5;
    }

    /**
     * The address' relevant city.
     * 
     * Mandatory.
     *
     * @return string
     */
    public function getCity()
    {
        return (string) $this->json()->city;
    }

    /**
     * The address' relevant city.
     * 
     * Mandatory.
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->json()->city = $city;
    }

    /**
     * The address' relevant state.
     *
     * @return string
     */
    public function getStateProvince()
    {
        return (string) $this->json()->state_province;
    }

    /**
     * The address' relevant state.
     *
     * @param string $state_province
     */
    public function setStateProvince($state_province)
    {
        $this->json()->state_province = $state_province;
    }

    /**
     * The address' relevant postal code.
     *
     * @return string
     */
    public function getPostalCode()
    {
        return (string) $this->json()->postal_code;
    }

    /**
     * The address' relevant postal code.
     *
     * @param string $postal_code
     */
    public function setPostalCode($postal_code)
    {
        $this->json()->postal_code = $postal_code;
    }

    /**
     * The address' relevant country.
     * 
     * Possible codes are listed in the 'Country Codes' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getCountry()
    {
        return $this->getValueObject('country');
    }

    /**
     * The address' relevant country.
     * 
     * Possible codes are listed in the 'Country Codes' code table.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setCountry($value, $desc = "")
    {
        $this->setValueObject('country', $value, $desc);
    }

    /**
     * The address' related note.
     *
     * @return string
     */
    public function getAddressNote()
    {
        return (string) $this->json()->address_note;
    }

    /**
     * The address' related note.
     *
     * @param string $address_note
     */
    public function setAddressNote($address_note)
    {
        $this->json()->address_note = $address_note;
    }

    /**
     * The date from which the address is deemed to be active.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->stringToDate((string) $this->json()->start_date);
    }

    /**
     * The date from which the address is deemed to be active.
     *
     * @param \DateTime|string $start_date
     */
    public function setStartDate($start_date)
    {
        $this->json()->start_date = $this->dateToString($start_date);
    }

    /**
     * The date after which the address is no longer active.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->stringToDate((string) $this->json()->end_date);
    }

    /**
     * The date after which the address is no longer active.
     *
     * @param \DateTime|string $end_date
     */
    public function setEndDate($end_date)
    {
        $this->json()->end_date = $this->dateToString($end_date);
    }

    /**
     * Address types.
     * 
     * Mandatory.
     *
     * @return Alma\Utils\ValueList
     */
    public function getAddressTypes()
    {
        return $this->getValueList('address_types');
    }

    /**
     * Address types.
     * 
     * Mandatory.
     *
     * @param Alma\Utils\ValueList $address_types
     */
    public function setAddressTypes(Alma\Utils\ValueList $address_types)
    {
        $this->json()->address_type = array();

        foreach ($address_types as $address_type) {
            $this->json()->address_type[] = $address_type;
        } 
    }

    /**
     * Indication whether the address is the preferred one.
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
     * Indication whether the address is the preferred one.
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
