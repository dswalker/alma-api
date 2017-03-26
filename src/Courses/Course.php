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
 * Course Object.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Course extends Record
{
    /**
     * Identifier of the course in Alma. Output parameter.
     * 
     * Should be used in subsequent queries regarding the course.
     *
     * @return string
     */
    public function getId()
    {
        return (string) $this->json()->id;
    }

    /**
     * Identifier of the course in Alma. Output parameter.
     * 
     * Should be used in subsequent queries regarding the course.
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->json()->id = $id;
    }

    /**
     * Code of the course in Alma. Cannot be updated.
     * 
     * Multiple courses using the same code can exist if they are set to different
     * sections.
     *
     * @return string
     */
    public function getCode()
    {
        return (string) $this->json()->code;
    }

    /**
     * Code of the course in Alma. Cannot be updated.
     * 
     * Multiple courses using the same code can exist if they are set to different
     * sections.
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->json()->code = $code;
    }

    /**
     * The course name. Mandatory.
     *
     * @return string
     */
    public function getName()
    {
        return (string) $this->json()->name;
    }

    /**
     * The course name. Mandatory.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->json()->name = $name;
    }

    /**
     * The course section.
     * 
     * The combination of course code and course section must be unique.
     *
     * @return string
     */
    public function getSection()
    {
        return (string) $this->json()->section;
    }

    /**
     * The course section.
     * 
     * The combination of course code and course section must be unique.
     *
     * @param string $section
     */
    public function setSection($section)
    {
        $this->json()->section = $section;
    }

    /**
     * The course faculty.
     *
     * @return Alma\Utils\Value
     */
    public function getAcademicDepartment()
    {
        return $this->json()->academic_department;
    }

    /**
     * The course faculty.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setAcademicDepartment($value, $desc = "")
    {
        $this->setValueObject('academic_department', $value, $desc);
    }

    /**
     * The code and name of the department processing the course. Mandatory.
     *
     * @return Alma\Utils\Value
     */
    public function getProcessingDepartment()
    {
        return $this->json()->processing_department;
    }

    /**
     * The code and name of the department processing the course. Mandatory.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setProcessingDepartment($value, $desc = "")
    {
        $this->setValueObject('processing_department', $value, $desc);
    }

    /**
     * List of terms.
     *
     * @return Alma\Utils\ValueList
     */
    public function getTerms()
    {
        return $this->getValueList('terms');
    }

    /**
     * List of terms.
     *
     * @param Alma\Utils\ValueList $terms
     */
    public function setTerms(Alma\Utils\ValueList $terms)
    {
        $this->json()->term = array();

        foreach ($terms as $term) {
            $this->json()->term[] = $term;
        } 
    }

    /**
     * The status of the course: ACTIVE/INACTIVE.
     * 
     * Output parameter. When using XML for input, status will only be determined
     * by the start and end date.
     *
     * @return string
     */
    public function getStatus()
    {
        return (string) $this->json()->status;
    }

    /**
     * The status of the course: ACTIVE/INACTIVE.
     * 
     * Output parameter. When using XML for input, status will only be determined
     * by the start and end date.
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->json()->status = $status;
    }

    /**
     * The course start date.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->stringToDate((string) $this->json()->start_date);
    }

    /**
     * The course start date.
     *
     * @param \DateTime|string $start_date
     */
    public function setStartDate($start_date)
    {
        $this->json()->start_date = $this->dateToString($start_date);
    }

    /**
     * The course end date.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->stringToDate((string) $this->json()->end_date);
    }

    /**
     * The course end date.
     *
     * @param \DateTime|string $end_date
     */
    public function setEndDate($end_date)
    {
        $this->json()->end_date = $this->dateToString($end_date);
    }

    /**
     * The number of hours per week of the course.
     *
     * @return int
     */
    public function getWeeklyHours()
    {
        return (int) $this->json()->weekly_hours;
    }

    /**
     * The number of hours per week of the course.
     *
     * @param int $weekly_hours
     */
    public function setWeeklyHours($weekly_hours)
    {
        $this->json()->weekly_hours = $weekly_hours;
    }

    /**
     * The number of course participants.
     *
     * @return int
     */
    public function getParticipants()
    {
        return (int) $this->json()->participants;
    }

    /**
     * The number of course participants.
     *
     * @param int $participants
     */
    public function setParticipants($participants)
    {
        $this->json()->participants = $participants;
    }

    /**
     * The course year.
     *
     * @return string
     */
    public function getYear()
    {
        return (string) $this->json()->year;
    }

    /**
     * The course year.
     *
     * @param string $year
     */
    public function setYear($year)
    {
        $this->json()->year = $year;
    }

    /**
     * List of Instructors
     *
     * @return Instructor[]
     */
    public function getInstructors()
    {
        $final = array();

        foreach ((array) $this->json()->instructor as $instructor) {
            $final[] = new Instructor($instructor);
        }

        return $final;
    }

    /**
     * List of Instructors
     *
     * @param Instructor[] $instructors
     */
    public function setInstructors(array $instructors)
    {
        $this->json()->instructor = array();

        foreach ($instructors as $instructor) {
            $this->json()->instructor[] = $instructor->json();
        } 
    }

    /**
     * A list of searchable IDs
     *
     * @return array
     */
    public function getSearchableIds()
    {
        return (array) $this->json()->searchable_id;
    }

    /**
     * A list of searchable IDs
     *
     * @param array $searchable_ids
     */
    public function setSearchableIds(SearchableId $searchable_ids)
    {
        $this->json()->searchable_ids = $searchable_ids;
    }

    /**
     * The course's related notes.
     *
     * @return Note[]
     */
    public function getNotes()
    {
        $final = array();

        foreach ((array) $this->json()->notes->note as $note) {
            $final[] = new Note($note);
        }

        return $final;
    }

    /**
     * The course's related notes.
     *
     * @param Note[] $notes
     */
    public function setNotes(array $notes)
    {
        $this->json()->notes->note = array();

        foreach ($notes as $note) {
            $this->json()->notes->note[] = $note->json();
        } 
    }

    /**
     * A list of Reading Lists
     *
     * @return ReadingList[]
     */
    public function getReadingLists()
    {
        $final = array();

        foreach ((array) $this->json()->reading_lists->reading_list as $reading_list) {
            $final[] = new ReadingList($reading_list);
        }

        return $final;
    }

    /**
     * A list of Reading Lists
     *
     * @param ReadingList[] $reading_lists
     */
    public function setReadingLists(array $reading_lists)
    {
        $this->json()->reading_lists->reading_list = array();

        foreach ($reading_lists as $reading_list) {
            $this->json()->reading_lists->reading_list[] = $reading_list->json();
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
            'code',
            'name',
        );
    }
}
