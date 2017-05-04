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
 * Fee object
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Fee extends Record
{
    /**
     * Identifier of the fee in Alma. Should be used in subsequent queries
     * regarding the fee.
     *
     * @return string
     */
    public function getId()
    {
        return (string) $this->json()->id;
    }

    /**
     * The fine / fee type.
     *
     * @return Alma\Utils\Value
     */
    public function getType()
    {
        return $this->getValueObject('type');
    }

    /**
     * The fine / fee type.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setType($value, $desc = "")
    {
        $this->setValueObject('type', $value, $desc);
    }

    /**
     * The fine / fee status.
     *
     * @return Alma\Utils\Value
     */
    public function getStatus()
    {
        return $this->getValueObject('status');
    }

    /**
     * The fine / fee status.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setStatus($value, $desc = "")
    {
        $this->setValueObject('status', $value, $desc);
    }

    /**
     * The fine / fee balance.
     *
     * @return float
     */
    public function getBalance()
    {
        return (float) $this->json()->balance;
    }

    /**
     * The fine / fee original amount.
     *
     * @return float
     */
    public function getOriginalAmount()
    {
        return (float) $this->json()->original_amount;
    }

    /**
     * Date the fine / fee was created.
     *
     * @return \DateTime
     */
    public function getCreationTime()
    {
        return $this->stringToDate((string) $this->json()->creation_time);
    }

    /**
     * Date the fine / fee was created.
     *
     * @param \DateTime|string $creation_time
     */
    public function setCreationTime($creation_time)
    {
        $this->json()->creation_time = $this->dateToString($creation_time);
    }

    /**
     * Date the fine / fee was last changed.
     *
     * @return \DateTime
     */
    public function getStatusTime()
    {
        return $this->stringToDate((string) $this->json()->status_time);
    }

    /**
     * Fine / fee comment.
     *
     * @return string
     */
    public function getComment()
    {
        return (string) $this->json()->comment;
    }

    /**
     * Fine / fee comment.
     *
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->json()->comment = $comment;
    }

    /**
     * The fine / fee owner.
     *
     * @return Alma\Utils\Value
     */
    public function getOwner()
    {
        return $this->getValueObject('owner');
    }

    /**
     * The fine / fee owner.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setOwner($value, $desc = "")
    {
        $this->setValueObject('owner', $value, $desc);
    }

    /**
     * The item title.
     *
     * @return string
     */
    public function getTitle()
    {
        return (string) $this->json()->title;
    }

    /**
     * The item title.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->json()->title = $title;
    }

    /**
     * The item barcode.
     *
     * @return string
     */
    public function getBarcode()
    {
        return (string) $this->json()->barcode;
    }

    /**
     * The item barcode.
     *
     * @param string $barcode
     */
    public function setBarcode($barcode)
    {
        $this->json()->barcode = $barcode;
    }

    /**
     * A list of transactions.
     *
     * @return Transaction[]
     */
    public function getTransactions()
    {
        $final = array();

        foreach ((array) $this->json()->transaction as $transaction) {
            $final[] = new Transaction($transaction);
        }

        return $final;
    }

    /**
     * A list of transactions.
     *
     * @param Transaction[] $transactions
     */
    public function setTransactions(array $transactions)
    {
        $this->json()->transaction = array();

        foreach ($transactions as $transaction) {
            $this->json()->transaction[] = $transaction->json();
        } 
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
}
