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
        return $this->getValueObject('status');
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
     * Visibility defines who is entitled to view the reading list, such as
     * OPEN_TO_WORLD.
     *
     * @return Alma\Utils\Value
     */
    public function getVisibility()
    {
        return $this->getValueObject('visibility');
    }

    /**
     * Visibility defines who is entitled to view the reading list, such as
     * OPEN_TO_WORLD.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setVisibility($value, $desc = "")
    {
        $this->setValueObject('visibility', $value, $desc);
    }

    /**
     * Publishing status defines whether a reading list is published, still in
     * draft, or archived.
     *
     * @return Alma\Utils\Value
     */
    public function getPublishingStatus()
    {
        return $this->getValueObject('publishingStatus');
    }

    /**
     * Publishing status defines whether a reading list is published, still in
     * draft, or archived.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setPublishingStatus($value, $desc = "")
    {
        $this->setValueObject('publishingStatus', $value, $desc);
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
     * A list of Citations.
     *
     * @return Citation[]
     */
    public function getCitations()
    {
        $final = array();

        foreach ((array) $this->json()->citations()->citation as $citation) {
            $final[] = new Citation($citation);
        }

        return $final;
    }

    /**
     * A list of Citations.
     *
     * @param Citation[] $citations
     */
    public function setCitations(array $citations)
    {
        $this->json()->citations()->citation = array();

        foreach ($citations as $citation) {
            $this->json()->citations()->citation[] = $citation->json();
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
            'visibility',
            'publishingStatus',
        );
    }
}
