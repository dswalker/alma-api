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
 * Specific user's email address.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Email extends Record
{
    /**
     * The email address. Mandatory.
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return (string) $this->json()->email_address;
    }

    /**
     * The email address. Mandatory.
     *
     * @param string $email_address
     */
    public function setEmailAddress($email_address)
    {
        $this->json()->email_address = $email_address;
    }

    /**
     * The email address' related description.
     *
     * @return string
     */
    public function getDescription()
    {
        return (string) $this->json()->description;
    }

    /**
     * The email address' related description.
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->json()->description = $description;
    }

    /**
     * Email types
     *
     * @return Alma\Utils\ValueList
     */
    public function getEmailTypes()
    {
        return $this->getValueList('email_types');
    }

    /**
     * Email types
     *
     * @param Alma\Utils\ValueList $email_types
     */
    public function setEmailTypes(Alma\Utils\ValueList $email_types)
    {
        $this->json()->email_type = array();

        foreach ($email_types as $email_type) {
            $this->json()->email_type[] = $email_type;
        } 
    }

    /**
     * Indication whether the email address is the preferred one.
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
     * Indication whether the email address is the preferred one.
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
