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
 * A range of pages.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class PageRange extends Record
{
    /**
     * From page
     *
     * @return string
     */
    public function getFromPage()
    {
        return (string) $this->json()->from_page;
    }

    /**
     * From page
     *
     * @param string $from_page
     */
    public function setFromPage($from_page)
    {
        $this->json()->from_page = $from_page;
    }

    /**
     * To page
     *
     * @return string
     */
    public function getToPage()
    {
        return (string) $this->json()->to_page;
    }

    /**
     * To page
     *
     * @param string $to_page
     */
    public function setToPage($to_page)
    {
        $this->json()->to_page = $to_page;
    }
}
