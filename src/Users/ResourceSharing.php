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
 * The resource sharing request information.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class ResourceSharing extends Record
{
    /**
     * The identifier of the resource sharing request in Alma.
     *
     * @return string
     */
    public function getId()
    {
        return (string) $this->json()->id;
    }

    /**
     * The code of the resource sharing request status.
     * 
     * Comes from the MandatoryBorrowingWorkflowSteps or
     * OptionalBorrowingWorkflowSteps code tables.
     *
     * @return Alma\Utils\Value
     */
    public function getStatus()
    {
        return $this->getValueObject('status');
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
            'id',
        );
    }
}
