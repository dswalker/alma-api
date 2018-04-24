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
 * Information regarding the related Section.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class SectionInfo extends Record
{
    /**
     * Identifier of the Section. Output parameter.
     *
     * @return string
     */
    public function getId()
    {
        return (string) $this->json()->id;
    }

    /**
     * Name of the Section. Output parameter.
     *
     * @return string
     */
    public function getName()
    {
        return (string) $this->json()->name;
    }

    /**
     * Description of the Section. Output parameter.
     *
     * @return string
     */
    public function getDescription()
    {
        return (string) $this->json()->description;
    }
}
