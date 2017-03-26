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
 * Specific user's note.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class UserNote extends Record
{
    /**
     * The note's type.
     * 
     * Possible codes are listed in the 'Note Types' code table. Mandatory.
     *
     * @return Alma\Utils\Value
     */
    public function getNoteType()
    {
        return $this->json()->note_type;
    }
    
    /**
     * The note's type.
     * 
     * Possible codes are listed in the 'Note Types' code table. Mandatory.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setNoteType($value, $desc = "")
    {
        $this->setValueObject('note_type', $value, $desc);
    }

    /**
     * The note's text.
     * 
     * Mandatory.
     *
     * @return string
     */
    public function getNoteText()
    {
        return (string) $this->json()->note_text;
    }
    
    /**
     * The note's text.
     * 
     * Mandatory.
     *
     * @param string $note_text
     */
    public function setNoteText($note_text)
    {
        $this->json()->note_text = $note_text;
    }

    /**
     * Indication whether the user is able to view the note.
     * 
     * Default is false.
     *
     * @return bool
     */
    public function getUserViewable()
    {
        return (bool) $this->json()->user_viewable;
    }
    
    /**
     * Indication whether the user is able to view the note.
     * 
     * Default is false.
     *
     * @param bool $user_viewable
     */
    public function setUserViewable($user_viewable)
    {
        $this->json()->user_viewable = $user_viewable;
    }

    /**
     * Creator of the note.
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return (string) $this->json()->created_by;
    }
    
    /**
     * Creator of the note.
     *
     * @param string $created_by
     */
    public function setCreatedBy($created_by)
    {
        $this->json()->created_by = $created_by;
    }

    /**
     * Creation date of the note.
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->stringToDate((string) $this->json()->created_date);
    }
    
    /**
     * Creation date of the note.
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
            'note_type',
            'user_viewable',
        );
    }
}