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
 * Amount
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Amount extends Record
{
    /**
     * The total sum.
     *
     * @return int
     */
    public function getSum()
    {
        return (int) $this->json()->sum;
    }

    /**
     * The total sum.
     *
     * @param int $sum
     */
    public function setSum($sum)
    {
        $this->json()->sum = $sum;
    }

    /**
     * The currency.
     * 
     * Possible values are listed in 'Currency_CT' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getCurrency()
    {
        return $this->getValueObject('currency');
    }

    /**
     * The currency.
     * 
     * Possible values are listed in 'Currency_CT' code table.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setCurrency($value, $desc = "")
    {
        $this->setValueObject('currency', $value, $desc);
    }

    /**
     * Required fields
     *
     * @return array
     */
    protected function getRequiredFields()
    {
        return array(
            'sum',
            'currency',
        );
    }
}
