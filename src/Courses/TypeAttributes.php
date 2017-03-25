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
 * The different attributes types. Mandatory.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class TypeAttributes extends Record
{
    /**
     * Attribute of the citation. Possible codes are listed in
     * 'CitationAttributes' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getAttribute()
    {
        return $this->json()->attribute;
    }

    /**
     * Attribute of the citation. Possible codes are listed in
     * 'CitationAttributes' code table.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setAttribute($value, $desc = "")
    {
        $this->setValueObject('attribute', $value, $desc);
    }

    /**
     * Attribute of the citation. Possible codes are listed in
     * 'CitationAttributesTypes' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getAttributeType()
    {
        return $this->json()->attribute_type;
    }

    /**
     * Attribute of the citation. Possible codes are listed in
     * 'CitationAttributesTypes' code table.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setAttributeType($value, $desc = "")
    {
        $this->setValueObject('attribute_type', $value, $desc);
    }

    /**
     * Required fields
     *
     * @return array
     */
    protected function getRequiredFields()
    {
        return array(
            'attribute',
        );
    }
}
