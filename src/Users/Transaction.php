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
 * Transaction object
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Transaction extends Record
{
    /**
     * The fine / fee transaction type.
     *
     * @return Alma\Utils\Value
     */
    public function getType()
    {
        return $this->getValueObject('type');
    }

    /**
     * The fine / fee transaction type.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setType($value, $desc = "")
    {
        $this->setValueObject('type', $value, $desc);
    }

    /**
     * Amount
     *
     * @return Amount
     */
    public function getAmount()
    {
        return new Amount($this->json()->amount);
    }

    /**
     * Amount
     *
     * @param Amount $amount
     */
    public function setAmount($amount)
    {
        $this->json()->amount = $amount->json();
    }

    /**
     * The reason for the transaction.
     *
     * @return string
     */
    public function getReason()
    {
        return (string) $this->json()->reason;
    }

    /**
     * A note attached to the transaction.
     *
     * @return string
     */
    public function getComment()
    {
        return (string) $this->json()->comment;
    }

    /**
     * The operator who last updated the transaction.
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return (string) $this->json()->created_by;
    }

    /**
     * Date and time of the transaction.
     *
     * @return \DateTime
     */
    public function getTransactionTime()
    {
        return $this->stringToDate((string) $this->json()->transaction_time);
    }

    /**
     * Date and time of the transaction.
     *
     * @param \DateTime|string $transaction_time
     */
    public function setTransactionTime($transaction_time)
    {
        $this->json()->transaction_time = $this->dateToString($transaction_time);
    }
}
