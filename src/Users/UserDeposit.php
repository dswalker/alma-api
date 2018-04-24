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
 * Deposit activity object.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class UserDeposit extends Record
{
    /**
     * The primary identifier of the requesting user. Output parameter.
     *
     * @return string
     */
    public function getUserPrimaryId()
    {
        return (string) $this->json()->user_primary_id;
    }

    /**
     * The identifier of the deposit in Alma. Should be used in subsequent queries
     * regarding the deposit. Output parameter.
     *
     * @return string
     */
    public function getDepositId()
    {
        return (string) $this->json()->deposit_id;
    }

    /**
     * The title of the requested deposit.
     *
     * @return string
     */
    public function getTitle()
    {
        return (string) $this->json()->title;
    }

    /**
     * The title of the requested deposit.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->json()->title = $title;
    }

    /**
     * The deposit profile that determines how the deposit activity is processed.
     * Mandatory. A list of available deposit profiles can be retrieved using the
     * /almaws/v1/conf/deposit-profiles API.
     *
     * @return string
     */
    public function getDepositProfile()
    {
        return (string) $this->json()->deposit_profile;
    }

    /**
     * The deposit profile that determines how the deposit activity is processed.
     * Mandatory. A list of available deposit profiles can be retrieved using the
     * /almaws/v1/conf/deposit-profiles API.
     *
     * @param string $deposit_profile
     */
    public function setDepositProfile($deposit_profile)
    {
        $this->json()->deposit_profile = $deposit_profile;
    }

    /**
     * Status of the deposit. Possible values are: PENDING, RETURNED, DECLINED,
     * WITHDRAWN, APPROVED.
     *
     * @return string
     */
    public function getStatus()
    {
        return (string) $this->json()->status;
    }

    /**
     * List of related notes. In the PUT action the incoming list will replace the
     * existing list.
     * 
     * If the incoming list is empty, the existing list will be deleted.
     *
     * @return Note[]
     */
    public function getNotes()
    {
        $final = array();

        foreach ((array) $this->json()->note as $note) {
            $final[] = new Note($note);
        }

        return $final;
    }

    /**
     * List of related notes. In the PUT action the incoming list will replace the
     * existing list.
     * 
     * If the incoming list is empty, the existing list will be deleted.
     *
     * @param Note[] $notes
     */
    public function setNotes(array $notes)
    {
        $this->json()->note = array();

        foreach ($notes as $note) {
            $this->json()->note[] = $note->json();
        } 
    }

    /**
     * MMS_ID of the record associated with the deposit. Mandatory. Record will be
     * suppressed.
     *
     * @return string
     */
    public function getMmsId()
    {
        return (string) $this->json()->mms_id;
    }

    /**
     * MMS_ID of the record associated with the deposit. Mandatory. Record will be
     * suppressed.
     *
     * @param string $mms_id
     */
    public function setMmsId($mms_id)
    {
        $this->json()->mms_id = $mms_id;
    }

    /**
     * PID of the representation associated with the deposit. Mandatory.
     *
     * @return string
     */
    public function getRepId()
    {
        return (string) $this->json()->rep_id;
    }

    /**
     * PID of the representation associated with the deposit. Mandatory.
     *
     * @param string $rep_id
     */
    public function setRepId($rep_id)
    {
        $this->json()->rep_id = $rep_id;
    }

    /**
     * Delivery URL of the representation associated with the deposit. Output
     * parameter.
     *
     * @return string
     */
    public function getDeliveryUrl()
    {
        return (string) $this->json()->delivery_url;
    }

    /**
     * The date the deposit activity was created. Output parameter.
     *
     * @return \DateTime
     */
    public function getSubmissionDate()
    {
        return $this->stringToDate((string) $this->json()->submission_date);
    }

    /**
     * The date the deposit activity was modified. Output parameter.
     *
     * @return \DateTime
     */
    public function getModificationDate()
    {
        return $this->stringToDate((string) $this->json()->modification_date);
    }

    /**
     * Link
     *
     * @return string
     */
    public function getLink()
    {
        return (string) $this->json()->link;
    }

    /**
     * Link
     *
     * @param string $link
     */
    public function setLink($link)
    {
        $this->json()->link = $link;
    }

    /**
     * Required fields
     *
     * @return array
     */
    protected function getRequiredFields()
    {
        return array(
            'user_primary_id',
            'deposit_id',
            'title',
            'deposit_profile',
            'status',
            'mms_id',
            'rep_id',
            'delivery_url',
            'submission_date',
        );
    }
}
