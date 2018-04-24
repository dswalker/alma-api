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
 * List of the user's contacts information.
 * 
 * SIS: In case of new user, these segments will be marked as "external". In
 * case of synchronization, this list will replace the existing external
 * contacts. Internal contacts will be kept. POST action: The segments will be
 * created as external or as internal according to the "segment_type"
 * attribute. PUT action: Incoming internal segments (based on the
 * "segment_type" attribute) will replace the existing internal segments.
 * Incoming external segments (based on the "segment_type" attribute) will
 * replace the existing external segments. If the incoming list is empty,
 * existing segments will be deleted.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class ContactInfo extends Record
{
    /**
     * List of user's addresses.
     *
     * @return Address[]
     */
    public function getAddresses()
    {
        $final = array();

        foreach ((array) $this->json()->address as $addresse) {
            $final[] = new Address($addresse);
        }

        return $final;
    }

    /**
     * List of user's addresses.
     *
     * @param Address[] $addresses
     */
    public function setAddresses(array $addresses)
    {
        $this->json()->address = array();

        foreach ($addresses as $addresse) {
            $this->json()->address[] = $addresse->json();
        } 
    }

    /**
     * List of user's email addresses.
     *
     * @return Email[]
     */
    public function getEmails()
    {
        $final = array();

        foreach ((array) $this->json()->email as $email) {
            $final[] = new Email($email);
        }

        return $final;
    }

    /**
     * List of user's email addresses.
     *
     * @param Email[] $emails
     */
    public function setEmails(array $emails)
    {
        $this->json()->email = array();

        foreach ($emails as $email) {
            $this->json()->email[] = $email->json();
        } 
    }

    /**
     * List of user's phone numbers.
     *
     * @return Phone[]
     */
    public function getPhones()
    {
        $final = array();

        foreach ((array) $this->json()->phone as $phone) {
            $final[] = new Phone($phone);
        }

        return $final;
    }

    /**
     * List of user's phone numbers.
     *
     * @param Phone[] $phones
     */
    public function setPhones(array $phones)
    {
        $this->json()->phone = array();

        foreach ($phones as $phone) {
            $this->json()->phone[] = $phone->json();
        } 
    }
}
