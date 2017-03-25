<?php

/*
 * This file is part of the Alma API library
 *
 * (c) California State University <library@calstate.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alma;

use Alma\Courses\Course;
use Alma\Courses\Results;

/**
 * Courses
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Courses extends Alma
{
    /**
     * Retrieves a list of courses.
     *
     * Number of results can be limited and offset using the query parameters. For example, to receive the
     * first 2 results send offset=0 and limit=2
     *
     * @param string $q          Search query. Optional. Searching for words from: code, section, name, notes, instructors, searchable_ids, year, academic_department & all (for searching in all the above fields). Examples (note the tilde between the code and text): q=name~Math , q=code~MATH_INTRO and section~2 (see [Brief Search|https://developers.exlibrisgroup.com/blog/How-we-re-building-APIs-at-Ex-Libris#BriefSearch])
     * @param string $limit      Limits the number of results. Optional. Valid values are 0-100. Default value: 10.
     * @param string $offset     Offset of the results returned. Optional. Default value: 0, which means that the first results will be returned.
     * @param string $order_by   A few sort options are available: id, name, code, section, start_date, end_date, participants, weekly_hours. A secondary sort key, id, is added when only one sort option is selected. Default sorting is by code and section.
     * @param string $direction  Sorting direction: ASC/DESC. Default: ASC.
     *       
     * @return Results
     */
    public function getCourses($q = "", $limit = 10, $offset = 0, $order_by = "", $direction = 'ASC')
    {
        $params = array(
            'q' => $q,
            'limit' => $limit,
            'offset' => $offset,
            'order_by' => $order_by,
            'direction' => $direction
        );
        
        $json = $this->client()->get('courses', $params);
        return new Results($json, $offset);
    }

    /**
     * Get a course
     *
     * @param string $id  The identifier of the Course.
     * 
     * @return Course
     */
    public function getCourse($id)
    {
    	$params = array('view' => 'full');
    	
        $json = $this->client()->get("courses/$id", $params);
        return new Course($json);
    }

    /**
     * Add a new course
     *
     * @param Course $course
     */
    public function addCourse(Course $course)
    {
        $this->client()->post("courses", (string) $course);
    }
}
