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
 * ItemLoan
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class ItemLoan extends Record
{
    /**
     * Identifier of the loan in Alma. Should be used in subsequent queries
     * regarding the loan.
     *
     * @return string
     */
    public function getLoanId()
    {
        return (string) $this->json()->loan_id;
    }

    /**
     * The circulation desk code that is responsible of the loan. Mandatory.
     *
     * @return Alma\Utils\Value
     */
    public function getCircDesk()
    {
        return $this->getValueObject('circ_desk');
    }

    /**
     * The circulation desk code that is responsible of the loan. Mandatory.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setCircDesk($value, $desc = "")
    {
        $this->setValueObject('circ_desk', $value, $desc);
    }

    /**
     * The library code that is responsible of the loan. Mandatory.
     *
     * @return Alma\Utils\Value
     */
    public function getLibrary()
    {
        return $this->getValueObject('library');
    }

    /**
     * The library code that is responsible of the loan. Mandatory.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setLibrary($value, $desc = "")
    {
        $this->setValueObject('library', $value, $desc);
    }

    /**
     * The loaning user identifier. Output parameter.
     *
     * @return string
     */
    public function getUserId()
    {
        return (string) $this->json()->user_id;
    }

    /**
     * The barcode of the loaned item. Output parameter.
     *
     * @return string
     */
    public function getItemBarcode()
    {
        return (string) $this->json()->item_barcode;
    }

    /**
     * The loan's due date. Can be modified using PUT or the renew API.
     *
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->stringToDate((string) $this->json()->due_date);
    }

    /**
     * The loan's due date. Can be modified using PUT or the renew API.
     *
     * @param \DateTime|string $due_date
     */
    public function setDueDate($due_date)
    {
        $this->json()->due_date = $this->dateToString($due_date);
    }

    /**
     * The loan's status. Output parameter. Possible values are: Active, Complete
     * (for loan that has been returned).
     *
     * @return string
     */
    public function getLoanStatus()
    {
        return (string) $this->json()->loan_status;
    }

    /**
     * The date in which the loan took place. Output parameter. In the POST loan
     * action, Alma populate this field with the
     * 
     * current date and time.
     *
     * @return \DateTime
     */
    public function getLoanDate()
    {
        return $this->stringToDate((string) $this->json()->loan_date);
    }

    /**
     * The loan's process status. Output parameter. Possible codes are listed in
     * 'Loan Process Status Search Column' code-table.
     *
     * @return string
     */
    public function getProcessStatus()
    {
        return (string) $this->json()->process_status;
    }

    /**
     * Bibliographic record identifier. Output parameter.
     *
     * @return string
     */
    public function getMmsId()
    {
        return (string) $this->json()->mms_id;
    }

    /**
     * The title of the loaned item. Output parameter.
     *
     * @return string
     */
    public function getTitle()
    {
        return (string) $this->json()->title;
    }

    /**
     * The author of the loaned item. Output parameter.
     *
     * @return string
     */
    public function getAuthor()
    {
        return (string) $this->json()->author;
    }

    /**
     * The description of the loaned item when dealing with multi volume/issue
     * item. Output parameter.
     *
     * @return string
     */
    public function getDescription()
    {
        return (string) $this->json()->description;
    }

    /**
     * The year of publication of the loaned item. Digits only. Output parameter.
     *
     * @return string
     */
    public function getPublicationYear()
    {
        return (string) $this->json()->publication_year;
    }

    /**
     * The current loacation of the item. Output parameter.
     *
     * @return string
     */
    public function getLocationCode()
    {
        return (string) $this->json()->location_code;
    }

    /**
     * The item's related policy. Output parameter. Possible codes are listed in
     * 'Item Policy' code-table.
     *
     * @return string
     */
    public function getItemPolicy()
    {
        return (string) $this->json()->item_policy;
    }

    /**
     * The call number of the loaned item. Output parameter.
     *
     * @return string
     */
    public function getCallNumber()
    {
        return (string) $this->json()->call_number;
    }

    /**
     * The amount that would be charged if the item would have been returned now
     * (for example, if the loan is overdue). Output
     * 
     * parameter.
     *
     * @return float
     */
    public function getLoanFine()
    {
        return (float) $this->json()->loan_fine;
    }

    /**
     * Flag that indicates if the loan is renewable.
     *
     * @return bool
     */
    public function getRenewable()
    {
        return (bool) $this->json()->renewable;
    }

    /**
     * Required fields
     *
     * @return array
     */
    protected function getRequiredFields()
    {
        return array(
            'circ_desk',
            'library',
        );
    }
}
