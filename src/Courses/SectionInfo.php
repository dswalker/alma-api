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
use Alma\Utils\Value;
use Alma\Utils\ValueList;

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
     * Identifier of the Section. Output parameter.
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->json()->id = $id;
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
     * Name of the Section. Output parameter.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->json()->name = $name;
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
     
    /**
     * Description of the Section. Output parameter.
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->json()->description = $description;
    }
}
