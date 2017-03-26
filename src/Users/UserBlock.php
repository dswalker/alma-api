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
 * A specific user's block.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class UserBlock extends Record
{
    /**
     * The block type.
     * 
     * Possible codes are listed in the 'User Block Types' code table. Default is
     * 'GENERAL'.
     *
     * @return Alma\Utils\Value
     */
    public function getBlockType()
    {
        return $this->json()->block_type;
    }
    
    /**
     * The block type.
     * 
     * Possible codes are listed in the 'User Block Types' code table. Default is
     * 'GENERAL'.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setBlockType($value, $desc = "")
    {
        $this->setValueObject('block_type', $value, $desc);
    }

    /**
     * The block's description.
     * 
     * Mandatory. Possible codes are listed in the 'User Block Description' code
     * table.
     *
     * @return Alma\Utils\Value
     */
    public function getBlockDescription()
    {
        return $this->json()->block_description;
    }
    
    /**
     * The block's description.
     * 
     * Mandatory. Possible codes are listed in the 'User Block Description' code
     * table.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setBlockDescription($value, $desc = "")
    {
        $this->setValueObject('block_description', $value, $desc);
    }

    /**
     * The block's status.
     * 
     * Possible values: Active, Inactive. Default is Active.
     *
     * @return string
     */
    public function getBlockStatus()
    {
        return (string) $this->json()->block_status;
    }
    
    /**
     * The block's status.
     * 
     * Possible values: Active, Inactive. Default is Active.
     *
     * @param string $block_status
     */
    public function setBlockStatus($block_status)
    {
        $this->json()->block_status = $block_status;
    }

    /**
     * The block's related note.
     *
     * @return string
     */
    public function getBlockNote()
    {
        return (string) $this->json()->block_note;
    }
    
    /**
     * The block's related note.
     *
     * @param string $block_note
     */
    public function setBlockNote($block_note)
    {
        $this->json()->block_note = $block_note;
    }

    /**
     * Creator of the block
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return (string) $this->json()->created_by;
    }
    
    /**
     * Creator of the block
     *
     * @param string $created_by
     */
    public function setCreatedBy($created_by)
    {
        $this->json()->created_by = $created_by;
    }

    /**
     * Creation date of the block
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->stringToDate((string) $this->json()->created_date);
    }
    
    /**
     * Creation date of the block
     *
     * @param \DateTime|string $created_date
     */
    public function setCreatedDate($created_date)
    {
        $this->json()->created_date = $created_date;
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

    /**
     * Required fields
     *
     * @return array
     */
    protected function getRequiredFields()
    {
        return array(
            'block_description',
        );
    }
}