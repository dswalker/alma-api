<?php

/*
 * This file is part of the Alma API library
 *
 * (c) California State University <library@calstate.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alma\Tests;

use Alma\Courses;

class CoursesTest extends \PHPUnit_Framework_TestCase
{
    private $courses;

    protected function setUp()
    {
        $this->courses = new Courses($host, $api_key);
    }

    protected function tearDown()
    {
        $this->courses = null;
    }

    public function testAdd()
    {
        $this->assertEquals(3, 3);
    }
}