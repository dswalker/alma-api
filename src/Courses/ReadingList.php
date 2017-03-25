<?php

/*
 * This file is part of the Alma API library
 *
 * (c) California State University <library@calstate.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alma\Courses;

use Alma\Utils\Record;

/**
 * Reading-List Object.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class ReadingList extends Record
{
    /**
     * Identifier of the Reading List in Alma. Output parameter.
     * 
     * Should be used in subsequent queries regarding the Reading List.
     *
     * @return string
     */
    public function getId()
    {
        return (string) $this->json()->id;
    }

    /**
     * Identifier of the Reading List in Alma. Output parameter.
     * 
     * Should be used in subsequent queries regarding the Reading List.
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->json()->id = $id;
    }

    /**
     * Code of the Reading List.
     * 
     * The Reading List code must be unique. Mandatory.
     *
     * @return string
     */
    public function getCode()
    {
        return (string) $this->json()->code;
    }

    /**
     * Code of the Reading List.
     * 
     * The Reading List code must be unique. Mandatory.
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->json()->code = $code;
    }

    /**
     * Name of the Reading List. Mandatory.
     *
     * @return string
     */
    public function getName()
    {
        return (string) $this->json()->name;
    }

    /**
     * Name of the Reading List. Mandatory.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->json()->name = $name;
    }

    /**
     * The Reading List due back date.
     *
     * @return \DateTime
     */
    public function getDueBackDate()
    {
        return $this->stringToDate((string) $this->json()->due_back_date);
    }

    /**
     * The Reading List due back date.
     *
     * @param \DateTime|string $due_back_date
     */
    public function setDueBackDate($due_back_date)
    {
        $this->json()->due_back_date = $this->dateToString($due_back_date);
    }

    /**
     * The status of the reading list, such as ReadyForProcessing=Ready For
     * Processing etc.
     * 
     * Possible values are listed in the 'ReadingListStatuses' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getStatus()
    {
        return $this->json()->status;
    }

    /**
     * The status of the reading list, such as ReadyForProcessing=Ready For
     * Processing etc.
     * 
     * Possible values are listed in the 'ReadingListStatuses' code table.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setStatus($value, $desc = "")
    {
        $this->setValueObject('status', $value, $desc);
    }

    /**
     * The reading list's related notes.
     *
     * @return Note[]
     */
    public function getNotes()
    {
        $final = array();

        foreach ((array) $this->json()->notes as $note) {
            $final[] = new Note($note);
        }

        return $final;
    }

    /**
     * The reading list's related notes.
     *
     * @param Note[] $notes
     */
    public function setNotes(array $notes)
    {
        $this->json()->notes = array();

        foreach ($notes as $note) {
            $this->json()->notes[] = $note->json();
        } 
    }

    /**
     * List of Citations
     *
     * @return Citation[]
     */
    public function getCitations()
    {
        $final = array();

        foreach ((array) $this->json()->citations as $citation) {
            $final[] = new Citation($citation);
        }

        return $final;
    }

    /**
     * List of Citations
     *
     * @param Citation[] $citations
     */
    public function setCitations(array $citations)
    {
        $this->json()->citations = array();

        foreach ($citations as $citation) {
            $this->json()->citations[] = $citation->json();
        } 
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
            'code',
            'name',
            'status',
        );
    }
}
