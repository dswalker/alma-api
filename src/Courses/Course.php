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

use Alma;
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
        return $this->getValueObject('academic_department');
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
        return $this->getValueObject('processing_department');
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
     * The course start date. Mandatory.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->stringToDate((string) $this->json()->start_date);
    }

    /**
     * The course start date. Mandatory.
     *
     * @param \DateTime|string $start_date
     */
    public function setStartDate($start_date)
    {
        $this->json()->start_date = $this->dateToString($start_date);
    }

    /**
     * The course end date. Mandatory.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->stringToDate((string) $this->json()->end_date);
    }

    /**
     * The course end date. Mandatory.
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
     * List of campuses
     *
     * @return Campus[]
     */
    public function getCampuses()
    {
        $final = array();

        foreach ((array) $this->json()->campus as $campuse) {
            $final[] = new Campus($campuse);
        }

        return $final;
    }

    /**
     * List of campuses
     *
     * @param Campus[] $campuses
     */
    public function setCampuses(array $campuses)
    {
        $this->json()->campus = array();

        foreach ($campuses as $campuse) {
            $this->json()->campus[] = $campuse->json();
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
    public function setSearchableIds($searchable_ids)
    {
        $this->json()->searchable_id = array();

        foreach ($searchable_ids as $searchable_id) {
            $this->json()->searchable_id[] = $searchable_id;
        } 
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
     * A list of Reading Lists.
     *
     * @return ReadingList[]
     */
    public function getReadingLists()
    {
        $final = array();

        foreach ((array) $this->json()->reading_lists()->reading_list as $reading_list) {
            $final[] = new ReadingList($reading_list);
        }

        return $final;
    }

    /**
     * A list of Reading Lists.
     *
     * @param ReadingList[] $reading_lists
     */
    public function setReadingLists(array $reading_lists)
    {
        $this->json()->reading_lists()->reading_list = array();

        foreach ($reading_lists as $reading_list) {
            $this->json()->reading_lists()->reading_list[] = $reading_list->json();
        } 
    }

    /**
     * Creator of the course. Output parameter.
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return (string) $this->json()->created_by;
    }

    /**
     * The course creation date. Output parameter.
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->stringToDate((string) $this->json()->created_date);
    }

    /**
     * Last user to modify the course. Output parameter.
     *
     * @return string
     */
    public function getLastModifiedBy()
    {
        return (string) $this->json()->last_modified_by;
    }

    /**
     * Date by which the last change to the course was made. Output parameter.
     *
     * @return \DateTime
     */
    public function getLastModifiedDate()
    {
        return $this->stringToDate((string) $this->json()->last_modified_date);
    }

    /**
     * ID of the course from which this course was duplicated or rolled over.
     * Output parameter.
     *
     * @return string
     */
    public function getRolledFrom()
    {
        return (string) $this->json()->rolled_from;
    }

    /**
     * Date by which the reading lists are to be submitted. Output parameter.
     *
     * @return \DateTime
     */
    public function getSubmitByDate()
    {
        return $this->stringToDate((string) $this->json()->submit_by_date);
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
            'code',
            'name',
        );
    }
}
