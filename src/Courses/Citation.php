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
 * Citation Object.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Citation extends Record
{
    /**
     * Identifier of the citation in Alma. Output parameter. Should be used in
     * subsequent queries regarding the citation.
     *
     * @return string
     */
    public function getId()
    {
        return (string) $this->json()->id;
    }

    /**
     * The status of the citation. Possible codes are listed in
     * 'ReadingListCitationStatuses' code table and
     * 'AdditionalReadingListCitationStatuses' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getStatus()
    {
        return $this->getValueObject('status');
    }

    /**
     * The status of the citation. Possible codes are listed in
     * 'ReadingListCitationStatuses' code table and
     * 'AdditionalReadingListCitationStatuses' code table.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setStatus($value, $desc = "")
    {
        $this->setValueObject('status', $value, $desc);
    }

    /**
     * The copyright status of the citation. Possible codes are listed in
     * 'CitationCopyRights' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getCopyrightsStatus()
    {
        return $this->getValueObject('copyrights_status');
    }

    /**
     * The copyright status of the citation. Possible codes are listed in
     * 'CitationCopyRights' code table.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setCopyrightsStatus($value, $desc = "")
    {
        $this->setValueObject('copyrights_status', $value, $desc);
    }

    /**
     * The secondary Type status of the citation. Possible codes are listed in
     * 'ReadingListCitationSecondaryTypes' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getSecondaryType()
    {
        return $this->getValueObject('secondary_type');
    }

    /**
     * The type of the citation. Possible codes are listed in
     * 'ReadingListCitationTypes' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getType()
    {
        return $this->getValueObject('type');
    }

    /**
     * Metadata about the Citation.
     *
     * @return Metadata
     */
    public function getMetadata()
    {
        return new Metadata($this->json()->metadata);
    }

    /**
     * Metadata about the Citation.
     *
     * @param Metadata $metadata
     */
    public function setMetadata($metadata)
    {
        $this->json()->metadata = $metadata->json();
    }

    /**
     * An OpenURL link for the Citation.
     *
     * @return string
     */
    public function getOpenUrl()
    {
        return (string) $this->json()->open_url;
    }

    /**
     * An OpenURL link for the Citation.
     *
     * @param string $open_url
     */
    public function setOpenUrl($open_url)
    {
        $this->json()->open_url = $open_url;
    }

    /**
     * A link to the Citation in Leganto UI.
     * 
     * If the link is intended for users who login to Leganto using SAML or CAS,
     * change the auth parameter accordingly.
     *
     * @return string
     */
    public function getLegantoPermalink()
    {
        return (string) $this->json()->leganto_permalink;
    }

    /**
     * A link to the Citation's file, when available.
     *
     * @return string
     */
    public function getFileLink()
    {
        return (string) $this->json()->file_link;
    }

    /**
     * Public Note. Relevant for Leganto and only as an output.
     *
     * @return string
     */
    public function getPublicNote()
    {
        return (string) $this->json()->public_note;
    }

    /**
     * Types and Attributes configured in CitationAttributes, CitationTypes,
     * CitationsTypesAttributes.
     *
     * @return DefinedFields
     */
    public function getDefinedFields()
    {
        return new DefinedFields($this->json()->defined_fields);
    }

    /**
     * Types and Attributes configured in CitationAttributes, CitationTypes,
     * CitationsTypesAttributes.
     *
     * @param DefinedFields $defined_fields
     */
    public function setDefinedFields($defined_fields)
    {
        $this->json()->defined_fields = $defined_fields->json();
    }

    /**
     * Information regarding the related Section.
     *
     * @return SectionInfo
     */
    public function getSectionInfo()
    {
        return new SectionInfo($this->json()->section_info);
    }

    /**
     * A list of Citation tags.
     *
     * @return CitationTag[]
     */
    public function getCitationTags()
    {
        $final = array();

        foreach ((array) $this->json()->citation_tags()->citation_tag as $citation_tag) {
            $final[] = new CitationTag($citation_tag);
        }

        return $final;
    }

    /**
     * A list of Citation tags.
     *
     * @param CitationTag[] $citation_tags
     */
    public function setCitationTags(array $citation_tags)
    {
        $this->json()->citation_tags()->citation_tag = array();

        foreach ($citation_tags as $citation_tag) {
            $this->json()->citation_tags()->citation_tag[] = $citation_tag->json();
        } 
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
            'status',
            'metadata',
        );
    }
}
