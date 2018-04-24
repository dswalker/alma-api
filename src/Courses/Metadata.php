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
 * Metadata about the Citation.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class Metadata extends Record
{
    /**
     * A name given to the resource.
     *
     * @return string
     */
    public function getTitle()
    {
        return (string) $this->json()->title;
    }

    /**
     * A name given to the resource.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->json()->title = $title;
    }

    /**
     * An entity primarily responsible for making the resource.
     *
     * @return string
     */
    public function getAuthor()
    {
        return (string) $this->json()->author;
    }

    /**
     * An entity primarily responsible for making the resource.
     *
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->json()->author = $author;
    }

    /**
     * An entity responsible for making the resource available.
     *
     * @return string
     */
    public function getPublisher()
    {
        return (string) $this->json()->publisher;
    }

    /**
     * An entity responsible for making the resource available.
     *
     * @param string $publisher
     */
    public function setPublisher($publisher)
    {
        $this->json()->publisher = $publisher;
    }

    /**
     * A point or period of time associated with an event in the lifecycle of the
     * resource.
     *
     * @return string
     */
    public function getPublicationDate()
    {
        return (string) $this->json()->publication_date;
    }

    /**
     * A point or period of time associated with an event in the lifecycle of the
     * resource.
     *
     * @param string $publication_date
     */
    public function setPublicationDate($publication_date)
    {
        $this->json()->publication_date = $publication_date;
    }

    /**
     * Edition
     *
     * @return string
     */
    public function getEdition()
    {
        return (string) $this->json()->edition;
    }

    /**
     * Edition
     *
     * @param string $edition
     */
    public function setEdition($edition)
    {
        $this->json()->edition = $edition;
    }

    /**
     * ISBN
     *
     * @return string
     */
    public function getIsbn()
    {
        return (string) $this->json()->isbn;
    }

    /**
     * ISBN
     *
     * @param string $isbn
     */
    public function setIsbn($isbn)
    {
        $this->json()->isbn = $isbn;
    }

    /**
     * ISSN
     *
     * @return string
     */
    public function getIssn()
    {
        return (string) $this->json()->issn;
    }

    /**
     * ISSN
     *
     * @param string $issn
     */
    public function setIssn($issn)
    {
        $this->json()->issn = $issn;
    }

    /**
     * MMS id. Used in order to add citation from repository.
     *
     * @param string $mms_id
     */
    public function setMmsId($mms_id)
    {
        $this->json()->mms_id = $mms_id;
    }

    /**
     * Additional person name.
     *
     * @return string
     */
    public function getAdditionalPersonName()
    {
        return (string) $this->json()->additional_person_name;
    }

    /**
     * Additional person name.
     *
     * @param string $additional_person_name
     */
    public function setAdditionalPersonName($additional_person_name)
    {
        $this->json()->additional_person_name = $additional_person_name;
    }

    /**
     * Place of publication.
     *
     * @return string
     */
    public function getPlaceOfPublication()
    {
        return (string) $this->json()->place_of_publication;
    }

    /**
     * Place of publication.
     *
     * @param string $place_of_publication
     */
    public function setPlaceOfPublication($place_of_publication)
    {
        $this->json()->place_of_publication = $place_of_publication;
    }

    /**
     * Call number.
     *
     * @return string
     */
    public function getCallNumber()
    {
        return (string) $this->json()->call_number;
    }

    /**
     * Call number.
     *
     * @param string $call_number
     */
    public function setCallNumber($call_number)
    {
        $this->json()->call_number = $call_number;
    }

    /**
     * Note.
     *
     * @return string
     */
    public function getNote()
    {
        return (string) $this->json()->note;
    }

    /**
     * Note.
     *
     * @param string $note
     */
    public function setNote($note)
    {
        $this->json()->note = $note;
    }

    /**
     * Journal title.
     *
     * @return string
     */
    public function getJournalTitle()
    {
        return (string) $this->json()->journal_title;
    }

    /**
     * Journal title.
     *
     * @param string $journal_title
     */
    public function setJournalTitle($journal_title)
    {
        $this->json()->journal_title = $journal_title;
    }

    /**
     * Article title. See Dublin Core title.
     *
     * @return string
     */
    public function getArticleTitle()
    {
        return (string) $this->json()->article_title;
    }

    /**
     * Article title. See Dublin Core title.
     *
     * @param string $article_title
     */
    public function setArticleTitle($article_title)
    {
        $this->json()->article_title = $article_title;
    }

    /**
     * Issue.
     *
     * @return string
     */
    public function getIssue()
    {
        return (string) $this->json()->issue;
    }

    /**
     * Issue.
     *
     * @param string $issue
     */
    public function setIssue($issue)
    {
        $this->json()->issue = $issue;
    }

    /**
     * Chapter.
     *
     * @return string
     */
    public function getChapter()
    {
        return (string) $this->json()->chapter;
    }

    /**
     * Chapter.
     *
     * @param string $chapter
     */
    public function setChapter($chapter)
    {
        $this->json()->chapter = $chapter;
    }

    /**
     * Year.
     *
     * @return string
     */
    public function getYear()
    {
        return (string) $this->json()->year;
    }

    /**
     * Year.
     *
     * @param string $year
     */
    public function setYear($year)
    {
        $this->json()->year = $year;
    }

    /**
     * Pages.
     *
     * @return string
     */
    public function getPages()
    {
        return (string) $this->json()->pages;
    }

    /**
     * Pages.
     *
     * @param string $pages
     */
    public function setPages($pages)
    {
        $this->json()->pages = $pages;
    }

    /**
     * Source.
     *
     * @return string
     */
    public function getSource()
    {
        return (string) $this->json()->source;
    }

    /**
     * Source.
     *
     * @param string $source
     */
    public function setSource($source)
    {
        $this->json()->source = $source;
    }

    /**
     * Series title number
     *
     * @return string
     */
    public function getSeriesTitleNumber()
    {
        return (string) $this->json()->series_title_number;
    }

    /**
     * Series title number
     *
     * @param string $series_title_number
     */
    public function setSeriesTitleNumber($series_title_number)
    {
        $this->json()->series_title_number = $series_title_number;
    }

    /**
     * PMID
     *
     * @return string
     */
    public function getPmid()
    {
        return (string) $this->json()->pmid;
    }

    /**
     * PMID
     *
     * @param string $pmid
     */
    public function setPmid($pmid)
    {
        $this->json()->pmid = $pmid;
    }

    /**
     * DOI
     *
     * @return string
     */
    public function getDoi()
    {
        return (string) $this->json()->doi;
    }

    /**
     * DOI
     *
     * @param string $doi
     */
    public function setDoi($doi)
    {
        $this->json()->doi = $doi;
    }

    /**
     * Volume.
     *
     * @return string
     */
    public function getVolume()
    {
        return (string) $this->json()->volume;
    }

    /**
     * Volume.
     *
     * @param string $volume
     */
    public function setVolume($volume)
    {
        $this->json()->volume = $volume;
    }

    /**
     * Start page.
     *
     * @return string
     */
    public function getStartPage()
    {
        return (string) $this->json()->start_page;
    }

    /**
     * Start page.
     *
     * @param string $start_page
     */
    public function setStartPage($start_page)
    {
        $this->json()->start_page = $start_page;
    }

    /**
     * End page.
     *
     * @return string
     */
    public function getEndPage()
    {
        return (string) $this->json()->end_page;
    }

    /**
     * End page.
     *
     * @param string $end_page
     */
    public function setEndPage($end_page)
    {
        $this->json()->end_page = $end_page;
    }

    /**
     * Author initials
     *
     * @return string
     */
    public function getAuthorInitials()
    {
        return (string) $this->json()->author_initials;
    }

    /**
     * Author initials
     *
     * @param string $author_initials
     */
    public function setAuthorInitials($author_initials)
    {
        $this->json()->author_initials = $author_initials;
    }

    /**
     * Part.
     *
     * @return string
     */
    public function getPart()
    {
        return (string) $this->json()->part;
    }

    /**
     * Part.
     *
     * @param string $part
     */
    public function setPart($part)
    {
        $this->json()->part = $part;
    }

    /**
     * Required fields
     *
     * @return array
     */
    protected function getRequiredFields()
    {
        return array(
            'title',
        );
    }
}
