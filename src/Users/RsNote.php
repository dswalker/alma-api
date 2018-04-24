<?php

/*
 * This file is part of the Alma API library
 *
 * (c) California State University <library@calstate.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alma\Users;

use Alma;
use Alma\Utils\Record;

/**
 * Specific related note.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class RsNote extends Record
{
    /**
     * The note's text. Mandatory.
     *
     * @return string
     */
    public function getContent()
    {
        return (string) $this->json()->content;
    }

    /**
     * The note's text. Mandatory.
     *
     * @param string $content
     */
    public function setContent($content)
    {
        $this->json()->content = $content;
    }

    /**
     * The creation date of the note. Default is the current date.
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->stringToDate((string) $this->json()->created_date);
    }

    /**
     * The creation date of the note. Default is the current date.
     *
     * @param \DateTime|string $created_date
     */
    public function setCreatedDate($created_date)
    {
        $this->json()->created_date = $this->dateToString($created_date);
    }

    /**
     * The creator of the note.
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return (string) $this->json()->created_by;
    }

    /**
     * The creator of the note.
     *
     * @param string $created_by
     */
    public function setCreatedBy($created_by)
    {
        $this->json()->created_by = $created_by;
    }
}
