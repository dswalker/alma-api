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

use Alma\Bibs\Bib;

/**
 * Bibs
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Bibs extends Alma
{
    /**
     * Fetch multiple bib records
     *
     * @param array $mms_ids A list of Bib Record IDs from 1 to the limit of 100
     * @return Bib[]
     */
    public function getBibRecords(array $mms_ids)
    {
        $mms_ids = implode(',', $mss_ids);
    }

    /**
     * Fetch a single bib record
     *
     * @param string $mms_id Bib Record ID
     * @return Bib
     */
    public function getBibRecord($mms_id)
    {
        $xml = $this->client()->getUrl("bibs/$mms_id");
        
        $bib_record = new Bib();
        $bib_record->loadXml($xml);
        
        return $bib_record;
    }

    /**
     * Create or Update a Bib Record
     *
     * @param BibRecord $bib
     */
    public function updateBibRecord(Bib $record)
    {
    }
}
