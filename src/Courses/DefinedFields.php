<?php

/*
 * This file is part of the Alma API library
 *
 * (c) California State University <library@calstate.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Alma\Utils\Record;

/**
 * Types and Attributes configured in CitationAttributes, CitationTypes, CitationsTypesAttributes.
 *
 * @author David Walker <dwalker@calstate.edu>
 */

class DefinedFields extends Record
{
	/**
	 * 
	 *
	 * @return TypeAttributes
	 */
	public function getTypeAttributes()
	{
		$type_attributes = new TypeAttributes();
		$type_attributes->loadXml($this->xml()->type_attributes);
		return $type_attributes;
	}
	 
	/**
	 * 
	 *
	 * @param TypeAttributes $type_attributes
	 */
	public function setTypeAttributes(TypeAttributes $type_attributes)
	{
		$this->xml()->type_attributes = $type_attributes->xml();
	}
}