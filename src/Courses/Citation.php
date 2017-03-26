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
     * Identifier of the citation in Alma. Output parameter. Should be used in
     * subsequent queries regarding the citation.
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->json()->id = $id;
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
        return $this->json()->status;
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
        return $this->json()->copyrights_status;
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
        return $this->json()->secondary_type;
    }

    /**
     * The secondary Type status of the citation. Possible codes are listed in
     * 'ReadingListCitationSecondaryTypes' code table.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setSecondaryType($value, $desc = "")
    {
        $this->setValueObject('secondary_type', $value, $desc);
    }

    /**
     * The type of the citation. Possible codes are listed in
     * 'ReadingListCitationTypes' code table.
     *
     * @return Alma\Utils\Value
     */
    public function getType()
    {
        return $this->json()->type;
    }

    /**
     * The type of the citation. Possible codes are listed in
     * 'ReadingListCitationTypes' code table.
     *
     * @param string $value  value
     * @param string $desc   [optional] description
     */
    public function setType($value, $desc = "")
    {
        $this->setValueObject('type', $value, $desc);
    }

    /**
     * Metadata for the Citation.
     *
     * @return Metadata
     */
    public function getMetadata()
    {
        return $this->json()->metadata;
    }

    /**
     * Metadata for the Citation.
     *
     * @param Metadata $metadata
     */
    public function setMetadata(Metadata $metadata)
    {
        $this->json()->metadata = $metadata;
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
     * A link to the Citation in Leganto UI.
     * 
     * If the link is intended for users who login to Leganto using SAML or CAS,
     * change the auth parameter accordingly.
     *
     * @param string $leganto_permalink
     */
    public function setLegantoPermalink($leganto_permalink)
    {
        $this->json()->leganto_permalink = $leganto_permalink;
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
     * A link to the Citation's file, when available.
     *
     * @param string $file_link
     */
    public function setFileLink($file_link)
    {
        $this->json()->file_link = $file_link;
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
     * Public Note. Relevant for Leganto and only as an output.
     *
     * @param string $public_note
     */
    public function setPublicNote($public_note)
    {
        $this->json()->public_note = $public_note;
    }

    /**
     * Types and Attributes configured in CitationAttributes, CitationTypes,
     * CitationsTypesAttributes.
     *
     * @return DefinedField[]
     */
    public function getDefinedFields()
    {
        $final = array();

        foreach ((array) $this->json()->defined_fields->defined_field as $defined_field) {
            $final[] = new DefinedField($defined_field);
        }

        return $final;
    }

    /**
     * Types and Attributes configured in CitationAttributes, CitationTypes,
     * CitationsTypesAttributes.
     *
     * @param DefinedField[] $defined_fields
     */
    public function setDefinedFields(array $defined_fields)
    {
        $this->json()->defined_fields->defined_field = array();

        foreach ($defined_fields as $defined_field) {
            $this->json()->defined_fields->defined_field[] = $defined_field->json();
        } 
    }

    /**
     * Information regarding the Section to which the citation belongs.
     *
     * @return SectionInfo
     */
    public function getSectionInfo()
    {
        return $this->json()->section_info;
    }

    /**
     * Information regarding the Section to which the citation belongs.
     *
     * @param SectionInfo $section_info
     */
    public function setSectionInfo(SectionInfo $section_info)
    {
        $this->json()->section_info = $section_info;
    }

    /**
     * Tags of the Citation.
     *
     * @return CitationTag[]
     */
    public function getCitationTags()
    {
        $final = array();

        foreach ((array) $this->json()->citation_tags->citation_tag as $citation_tag) {
            $final[] = new CitationTag($citation_tag);
        }

        return $final;
    }

    /**
     * Tags of the Citation.
     *
     * @param CitationTag[] $citation_tags
     */
    public function setCitationTags(array $citation_tags)
    {
        $this->json()->citation_tags->citation_tag = array();

        foreach ($citation_tags as $citation_tag) {
            $this->json()->citation_tags->citation_tag[] = $citation_tag->json();
        } 
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
