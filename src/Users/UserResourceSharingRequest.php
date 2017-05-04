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

use Alma\Utils\Record;

/**
 * Resource sharing request Object.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class UserResourceSharingRequest extends Record
{
    /**
     * Internal identifier of the resource sharing request in Alma.
     * 
     * Should be used in subsequent queries regarding the request. Relevant for
     * borrowing requests. Not relevant for lending requests.
     *
     * @return string
     */
    public function getRequestId()
    {
        return (string) $this->json()->request_id;
    }

    /**
     * External identifier of the resource sharing request.
     *
     * @return string
     */
    public function getExternalId()
    {
        return (string) $this->json()->external_id;
    }

    /**
     * The request creation date.
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->stringToDate((string) $this->json()->created_date);
    }

    /**
     * Date by which the last change to the request was made.
     *
     * @return \DateTime
     */
    public function getLastModifiedDate()
    {
        return $this->stringToDate((string) $this->json()->last_modified_date);
    }

    /**
     * The request creation time.
     *
     * @return \DateTime
     */
    public function getCreatedTime()
    {
        return $this->stringToDate((string) $this->json()->created_time);
    }

    /**
     * The request creation time.
     *
     * @param \DateTime|string $created_time
     */
    public function setCreatedTime($created_time)
    {
        $this->json()->created_time = $this->dateToString($created_time);
    }

    /**
     * Time by which the last change to the request was made.
     *
     * @return \DateTime
     */
    public function getLastModifiedTime()
    {
        return $this->stringToDate((string) $this->json()->last_modified_time);
    }

    /**
     * Time by which the last change to the request was made.
     *
     * @param \DateTime|string $last_modified_time
     */
    public function setLastModifiedTime($last_modified_time)
    {
        $this->json()->last_modified_time = $this->dateToString($last_modified_time);
    }

    /**
     * The resource sharing request status.
     * 
     * Borrowing request: Possible codes are listed in
     * MandatoryBorrowingWorkflowSteps or OptionalBorrowingWorkflowSteps code
     * tables. Lending request: Possible codes are listed in
     * MandatoryLendingWorkflowSteps or OptionalLendingWorkflowSteps code tables.
     *
     * @return Alma\Utils\Value
     */
    public function getStatus()
    {
        return $this->getValueObject('status');
    }

    /**
     * The resource sharing library code.
     * 
     * See Get libraries API. Borrowing request: Optional. Used only when there
     * are more than one resource sharing library defined for the user. Lending
     * library: Mandatory.
     *
     * @return string
     */
    public function getOwner()
    {
        return (string) $this->json()->owner;
    }

    /**
     * The resource sharing library code.
     * 
     * See Get libraries API. Borrowing request: Optional. Used only when there
     * are more than one resource sharing library defined for the user. Lending
     * library: Mandatory.
     *
     * @param string $owner
     */
    public function setOwner($owner)
    {
        $this->json()->owner = $owner;
    }

    /**
     * The code of the partner related to this request.
     * 
     * See Get partners API.
     *
     * @return Alma\Utils\Value
     */
    public function getPartner()
    {
        return $this->getValueObject('partner');
    }

    /**
     * Request object.
     *
     * @return UserRequest
     */
    public function getUserRequest()
    {
        return new UserRequest($this->json()->user_request);
    }

    /**
     * Request object.
     *
     * @param UserRequest $user_request
     */
    public function setUserRequest($user_request)
    {
        $this->json()->user_request = $user_request->json();
    }

    /**
     * The primary identifier and full name of the requesting user.
     * 
     * Relevant for borrowing requests. Not relevant for lending requests.
     *
     * @return Alma\Utils\Value
     */
    public function getRequester()
    {
        return $this->getValueObject('requester');
    }

    /**
     * The primary identifier and full name of the requesting user.
     * 
     * Relevant for borrowing requests. Not relevant for lending requests.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setRequester($value, $desc = "")
    {
        $this->setValueObject('requester', $value, $desc);
    }

    /**
     * A description of the requested media.
     * 
     * possible values are 1-7 (codes from Basic Requested Media code table), and
     * the codes from 'AdditionalRequestedMedia' code table. The valid values are
     * according to the "Requested media definition" mapping table.
     *
     * @return string
     */
    public function getRequestedMedia()
    {
        return (string) $this->json()->requested_media;
    }

    /**
     * A description of the requested media.
     * 
     * possible values are 1-7 (codes from Basic Requested Media code table), and
     * the codes from 'AdditionalRequestedMedia' code table. The valid values are
     * according to the "Requested media definition" mapping table.
     *
     * @param string $requested_media
     */
    public function setRequestedMedia($requested_media)
    {
        $this->json()->requested_media = $requested_media;
    }

    /**
     * Format of the resource requested. For example, physical or digital.
     * Mandatory. Possible codes are listed in RequestFormats code tables.
     *
     * @return Alma\Utils\Value
     */
    public function getFormat()
    {
        return $this->getValueObject('format');
    }

    /**
     * Format of the resource requested. For example, physical or digital.
     * Mandatory. Possible codes are listed in RequestFormats code tables.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setFormat($value, $desc = "")
    {
        $this->setValueObject('format', $value, $desc);
    }

    /**
     * Indication whether other formats besides the above are acceptable.
     *
     * @return bool
     */
    public function getAllowOtherFormats()
    {
        return (bool) $this->json()->allow_other_formats;
    }

    /**
     * Indication whether other formats besides the above are acceptable.
     *
     * @param bool $allow_other_formats
     */
    public function setAllowOtherFormats($allow_other_formats)
    {
        $this->json()->allow_other_formats = $allow_other_formats->json();
    }

    /**
     * Format of the supplied item. For example, physical or digital.
     * 
     * Possible codes are listed in RequestFormats code table.
     *
     * @return Alma\Utils\Value
     */
    public function getSuppliedFormat()
    {
        return $this->getValueObject('supplied_format');
    }

    /**
     * Preferred send method.
     * 
     * Possible options are listed in 'ResourceSharingRequestSendMethod' code
     * table. Currently not relevant for lending requests.
     *
     * @return Alma\Utils\Value
     */
    public function getPreferredSendMethod()
    {
        return $this->getValueObject('preferred_send_method');
    }

    /**
     * Preferred send method.
     * 
     * Possible options are listed in 'ResourceSharingRequestSendMethod' code
     * table. Currently not relevant for lending requests.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setPreferredSendMethod($value, $desc = "")
    {
        $this->setValueObject('preferred_send_method', $value, $desc);
    }

    /**
     * The requested language for the resource sharing request.
     * 
     * Possible codes are the enabled fields in ResourceSharingLanguages code
     * table. Default is null.
     *
     * @return Alma\Utils\Value
     */
    public function getRequestedLanguage()
    {
        return $this->getValueObject('requested_language');
    }

    /**
     * The requested language for the resource sharing request.
     * 
     * Possible codes are the enabled fields in ResourceSharingLanguages code
     * table. Default is null.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setRequestedLanguage($value, $desc = "")
    {
        $this->setValueObject('requested_language', $value, $desc);
    }

    /**
     * The pickup library code where the resource will be delivered.
     * 
     * Relevant and mandatory for physical format delivery Borrowing request.
     * Optional for digital format. Not relevant for lending requests.
     *
     * @return Alma\Utils\Value
     */
    public function getPickupLocation()
    {
        return $this->getValueObject('pickup_location');
    }

    /**
     * The pickup library code where the resource will be delivered.
     * 
     * Relevant and mandatory for physical format delivery Borrowing request.
     * Optional for digital format. Not relevant for lending requests.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setPickupLocation($value, $desc = "")
    {
        $this->setValueObject('pickup_location', $value, $desc);
    }

    /**
     * The code of the reading room where the item will be picked up.
     * 
     * Mandatory when for_reading_room_only is true. Not relevant for lending
     * requests.
     *
     * @return Alma\Utils\Value
     */
    public function getReadingRoom()
    {
        return $this->getValueObject('reading_room');
    }

    /**
     * The code of the reading room where the item will be picked up.
     * 
     * Mandatory when for_reading_room_only is true. Not relevant for lending
     * requests.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setReadingRoom($value, $desc = "")
    {
        $this->setValueObject('reading_room', $value, $desc);
    }

    /**
     * Last date the request is needed.
     * 
     * Optional parameter.
     *
     * @return \DateTime
     */
    public function getLastInterestDate()
    {
        return $this->stringToDate((string) $this->json()->last_interest_date);
    }

    /**
     * Last date the request is needed.
     * 
     * Optional parameter.
     *
     * @param \DateTime|string $last_interest_date
     */
    public function setLastInterestDate($last_interest_date)
    {
        $this->json()->last_interest_date = $this->dateToString($last_interest_date);
    }

    /**
     * An indication of whether the delivery should be to an alternative address.
     * Default is false.
     * 
     * Not relevant for lending requests.
     *
     * @return bool
     */
    public function getUseAlternativeAddress()
    {
        return (bool) $this->json()->use_alternative_address;
    }

    /**
     * An indication of whether the delivery should be to an alternative address.
     * Default is false.
     * 
     * Not relevant for lending requests.
     *
     * @param bool $use_alternative_address
     */
    public function setUseAlternativeAddress($use_alternative_address)
    {
        $this->json()->use_alternative_address = $use_alternative_address->json();
    }

    /**
     * Borrowing request: In use with alternative_address only. In use when
     * sending in digital format.
     * 
     * Lending request: Requester's Email.
     *
     * @return string
     */
    public function getTextEmail()
    {
        return (string) $this->json()->text_email;
    }

    /**
     * Borrowing request: In use with alternative_address only. In use when
     * sending in digital format.
     * 
     * Lending request: Requester's Email.
     *
     * @param string $text_email
     */
    public function setTextEmail($text_email)
    {
        $this->json()->text_email = $text_email;
    }

    /**
     * In use with alternative_address only.
     * 
     * Not relevant for lending requests.
     *
     * @return string
     */
    public function getTextPostal1()
    {
        return (string) $this->json()->text_postal_1;
    }

    /**
     * In use with alternative_address only.
     * 
     * Not relevant for lending requests.
     *
     * @param string $text_postal_1
     */
    public function setTextPostal1($text_postal_1)
    {
        $this->json()->text_postal_1 = $text_postal_1;
    }

    /**
     * In use with alternative_address only.
     * 
     * Not relevant for lending requests.
     *
     * @return string
     */
    public function getTextPostal2()
    {
        return (string) $this->json()->text_postal_2;
    }

    /**
     * In use with alternative_address only.
     * 
     * Not relevant for lending requests.
     *
     * @param string $text_postal_2
     */
    public function setTextPostal2($text_postal_2)
    {
        $this->json()->text_postal_2 = $text_postal_2;
    }

    /**
     * In use with alternative_address only.
     * 
     * Not relevant for lending requests.
     *
     * @return string
     */
    public function getTextPostal3()
    {
        return (string) $this->json()->text_postal_3;
    }

    /**
     * In use with alternative_address only.
     * 
     * Not relevant for lending requests.
     *
     * @param string $text_postal_3
     */
    public function setTextPostal3($text_postal_3)
    {
        $this->json()->text_postal_3 = $text_postal_3;
    }

    /**
     * In use with alternative_address only.
     * 
     * Not relevant for lending requests.
     *
     * @return string
     */
    public function getTextPostal4()
    {
        return (string) $this->json()->text_postal_4;
    }

    /**
     * In use with alternative_address only.
     * 
     * Not relevant for lending requests.
     *
     * @param string $text_postal_4
     */
    public function setTextPostal4($text_postal_4)
    {
        $this->json()->text_postal_4 = $text_postal_4;
    }

    /**
     * The shipping cost.
     *
     * @return Amount
     */
    public function getShippingCost()
    {
        return new Amount($this->json()->shipping_cost);
    }

    /**
     * The copyright status of the request. Relevant if requested format is
     * Digital, and 'rs_borrower_copyright_management' in customer parameters is
     * true. Possible options are listed in 'ResourceSharingCopyrightsStatus' code
     * table, default is generated per request. Relevant for GET, POST and PUT of
     * borrowing requests, and GET of lending requests.
     *
     * @return Alma\Utils\Value
     */
    public function getCopyrightStatus()
    {
        return $this->getValueObject('copyright_status');
    }

    /**
     * The copyright status of the request. Relevant if requested format is
     * Digital, and 'rs_borrower_copyright_management' in customer parameters is
     * true. Possible options are listed in 'ResourceSharingCopyrightsStatus' code
     * table, default is generated per request. Relevant for GET, POST and PUT of
     * borrowing requests, and GET of lending requests.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setCopyrightStatus($value, $desc = "")
    {
        $this->setValueObject('copyright_status', $value, $desc);
    }

    /**
     * Indication whether the requester has agreed to the copyright terms.
     * 
     * Mandatory for borrowing requests. Not relevant for lending requests.
     *
     * @return bool
     */
    public function getAgreeToCopyrightTerms()
    {
        return (bool) $this->json()->agree_to_copyright_terms;
    }

    /**
     * Indication whether the requester has agreed to the copyright terms.
     * 
     * Mandatory for borrowing requests. Not relevant for lending requests.
     *
     * @param bool $agree_to_copyright_terms
     */
    public function setAgreeToCopyrightTerms($agree_to_copyright_terms)
    {
        $this->json()->agree_to_copyright_terms = $agree_to_copyright_terms->json();
    }

    /**
     * Indication whether patron information is needed.
     * 
     * Not relevant for lending requests.
     *
     * @return bool
     */
    public function getNeedPatronInfo()
    {
        return (bool) $this->json()->need_patron_info;
    }

    /**
     * Indication whether patron is willing to pay.
     *
     * @return bool
     */
    public function getWillingToPay()
    {
        return (bool) $this->json()->willing_to_pay;
    }

    /**
     * Indication whether patron is willing to pay.
     *
     * @param bool $willing_to_pay
     */
    public function setWillingToPay($willing_to_pay)
    {
        $this->json()->willing_to_pay = $willing_to_pay->json();
    }

    /**
     * Type of the requested resource. For example, book or article.
     * 
     * Mandatory for borrowing requests. Not relevant for lending requests.
     * Possible options are listed in 'PhysicalReadingListCitationTypes' code
     * table, default is generated per request.
     *
     * @return Alma\Utils\Value
     */
    public function getCitationType()
    {
        return $this->getValueObject('citation_type');
    }

    /**
     * Type of the requested resource. For example, book or article.
     * 
     * Mandatory for borrowing requests. Not relevant for lending requests.
     * Possible options are listed in 'PhysicalReadingListCitationTypes' code
     * table, default is generated per request.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setCitationType($value, $desc = "")
    {
        $this->setValueObject('citation_type', $value, $desc);
    }

    /**
     * Specific related note.
     *
     * @return Note
     */
    public function getNote()
    {
        return new Note($this->json()->note);
    }

    /**
     * Specific related note.
     *
     * @param Note $note
     */
    public function setNote($note)
    {
        $this->json()->note = $note->json();
    }

    /**
     * Maximum fee the user is willing to pay for the request.
     * 
     * Currently not relevant for lending requests.
     *
     * @return float
     */
    public function getMaximumFee()
    {
        return (float) $this->json()->maximum_fee;
    }

    /**
     * Maximum fee the user is willing to pay for the request.
     * 
     * Currently not relevant for lending requests.
     *
     * @param float $maximum_fee
     */
    public function setMaximumFee($maximum_fee)
    {
        $this->json()->maximum_fee = $maximum_fee;
    }

    /**
     * Indication whether the request has active notes.
     *
     * @return bool
     */
    public function getHasActiveNotes()
    {
        return (bool) $this->json()->has_active_notes;
    }

    /**
     * List of related notes that appear in the Notes tab in the UI..
     *
     * @return RsNote[]
     */
    public function getRsNotes()
    {
        $final = array();

        foreach ((array) $this->json()->rs_note as $rs_note) {
            $final[] = new RsNote($rs_note);
        }

        return $final;
    }

    /**
     * List of related notes that appear in the Notes tab in the UI..
     *
     * @param RsNote[] $rs_notes
     */
    public function setRsNotes(array $rs_notes)
    {
        $this->json()->rs_note = array();

        foreach ($rs_notes as $rs_note) {
            $this->json()->rs_note[] = $rs_note->json();
        } 
    }

    /**
     * Indication whether the request is printed.
     * 
     * Relevant for lending requests.
     *
     * @return bool
     */
    public function getPrinted()
    {
        return (bool) $this->json()->printed;
    }

    /**
     * Indication whether the request is reported.
     * 
     * Relevant for lending requests.
     *
     * @return bool
     */
    public function getReported()
    {
        return (bool) $this->json()->reported;
    }

    /**
     * The code of the resource sharing request Level of Service.
     * 
     * Possible options are listed in 'LevelOfService' code table, default is
     * generated per request.
     *
     * @return Alma\Utils\Value
     */
    public function getLevelOfService()
    {
        return $this->getValueObject('level_of_service');
    }

    /**
     * The code of the resource sharing request Level of Service.
     * 
     * Possible options are listed in 'LevelOfService' code table, default is
     * generated per request.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setLevelOfService($value, $desc = "")
    {
        $this->setValueObject('level_of_service', $value, $desc);
    }

    /**
     * MMS ID of the requested resource. Output parameter.
     * 
     * Not relevant for lending requests. See GET BIB API.
     *
     * @return string
     */
    public function getMmsId()
    {
        return (string) $this->json()->mms_id;
    }

    /**
     * MMS ID of the requested resource. Output parameter.
     * 
     * Not relevant for lending requests. See GET BIB API.
     *
     * @param string $mms_id
     */
    public function setMmsId($mms_id)
    {
        $this->json()->mms_id = $mms_id;
    }

    /**
     * Barcode of the supplied item. Output parameter.
     * 
     * Relevant only for supplied lending requests.
     *
     * @return string
     */
    public function getBarcode()
    {
        return (string) $this->json()->barcode;
    }

    /**
     * List of additional barcodes. Note that the first one appears in the main
     * barcode field.
     *
     * @return AdditionalBarcode[]
     */
    public function getAdditionalBarcodes()
    {
        $final = array();

        foreach ((array) $this->json()->additional_barcode as $additional_barcode) {
            $final[] = new AdditionalBarcode($additional_barcode);
        }

        return $final;
    }

    /**
     * Title of the requested resource. Mandatory parameter.
     *
     * @return string
     */
    public function getTitle()
    {
        return (string) $this->json()->title;
    }

    /**
     * Title of the requested resource. Mandatory parameter.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->json()->title = $title;
    }

    /**
     * ISSN of the requested resource.
     *
     * @return string
     */
    public function getIssn()
    {
        return (string) $this->json()->issn;
    }

    /**
     * ISSN of the requested resource.
     *
     * @param string $issn
     */
    public function setIssn($issn)
    {
        $this->json()->issn = $issn;
    }

    /**
     * ISBN of the requested resource.
     *
     * @return string
     */
    public function getIsbn()
    {
        return (string) $this->json()->isbn;
    }

    /**
     * ISBN of the requested resource.
     *
     * @param string $isbn
     */
    public function setIsbn($isbn)
    {
        $this->json()->isbn = $isbn;
    }

    /**
     * Author of the requested resource.
     *
     * @return string
     */
    public function getAuthor()
    {
        return (string) $this->json()->author;
    }

    /**
     * Author of the requested resource.
     *
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->json()->author = $author;
    }

    /**
     * Author initials of the requested resource.
     *
     * @return string
     */
    public function getAuthorInitials()
    {
        return (string) $this->json()->author_initials;
    }

    /**
     * Author initials of the requested resource.
     *
     * @param string $author_initials
     */
    public function setAuthorInitials($author_initials)
    {
        $this->json()->author_initials = $author_initials;
    }

    /**
     * Year of publication of the requested resource.
     *
     * @return string
     */
    public function getYear()
    {
        return (string) $this->json()->year;
    }

    /**
     * Year of publication of the requested resource.
     *
     * @param string $year
     */
    public function setYear($year)
    {
        $this->json()->year = $year;
    }

    /**
     * Publisher of the requested resource.
     *
     * @return string
     */
    public function getPublisher()
    {
        return (string) $this->json()->publisher;
    }

    /**
     * Publisher of the requested resource.
     *
     * @param string $publisher
     */
    public function setPublisher($publisher)
    {
        $this->json()->publisher = $publisher;
    }

    /**
     * The publication place of the requested resource.
     *
     * @return string
     */
    public function getPlaceOfPublication()
    {
        return (string) $this->json()->place_of_publication;
    }

    /**
     * The publication place of the requested resource.
     *
     * @param string $place_of_publication
     */
    public function setPlaceOfPublication($place_of_publication)
    {
        $this->json()->place_of_publication = $place_of_publication;
    }

    /**
     * The edition of the requested resource.
     *
     * @return string
     */
    public function getEdition()
    {
        return (string) $this->json()->edition;
    }

    /**
     * The edition of the requested resource.
     *
     * @param string $edition
     */
    public function setEdition($edition)
    {
        $this->json()->edition = $edition;
    }

    /**
     * Indication whether edition is used in ISO Protocol and in Locate process.
     * Default is true. Relevant when a book is requested.
     *
     * @return bool
     */
    public function getSpecificEdition()
    {
        return (bool) $this->json()->specific_edition;
    }

    /**
     * Indication whether edition is used in ISO Protocol and in Locate process.
     * Default is true. Relevant when a book is requested.
     *
     * @param bool $specific_edition
     */
    public function setSpecificEdition($specific_edition)
    {
        $this->json()->specific_edition = $specific_edition->json();
    }

    /**
     * The volume number of the journal that contains the article.
     *
     * @return string
     */
    public function getVolume()
    {
        return (string) $this->json()->volume;
    }

    /**
     * The volume number of the journal that contains the article.
     *
     * @param string $volume
     */
    public function setVolume($volume)
    {
        $this->json()->volume = $volume;
    }

    /**
     * The title of the journal. Relevant when an article is requested.
     *
     * @return string
     */
    public function getJournalTitle()
    {
        return (string) $this->json()->journal_title;
    }

    /**
     * The title of the journal. Relevant when an article is requested.
     *
     * @param string $journal_title
     */
    public function setJournalTitle($journal_title)
    {
        $this->json()->journal_title = $journal_title;
    }

    /**
     * The issue of the requested resource.
     *
     * @return string
     */
    public function getIssue()
    {
        return (string) $this->json()->issue;
    }

    /**
     * The issue of the requested resource.
     *
     * @param string $issue
     */
    public function setIssue($issue)
    {
        $this->json()->issue = $issue;
    }

    /**
     * The chapter number in the journal that contains the article.
     *
     * @return string
     */
    public function getChapter()
    {
        return (string) $this->json()->chapter;
    }

    /**
     * The chapter number in the journal that contains the article.
     *
     * @param string $chapter
     */
    public function setChapter($chapter)
    {
        $this->json()->chapter = $chapter;
    }

    /**
     * The relevant pages of the requested resource.
     *
     * @return string
     */
    public function getPages()
    {
        return (string) $this->json()->pages;
    }

    /**
     * The relevant pages of the requested resource.
     *
     * @param string $pages
     */
    public function setPages($pages)
    {
        $this->json()->pages = $pages;
    }

    /**
     * The relevant start page of the requested resource.
     *
     * @return string
     */
    public function getStartPage()
    {
        return (string) $this->json()->start_page;
    }

    /**
     * The relevant start page of the requested resource.
     *
     * @param string $start_page
     */
    public function setStartPage($start_page)
    {
        $this->json()->start_page = $start_page;
    }

    /**
     * The end page of the requested resource.
     *
     * @return string
     */
    public function getEndPage()
    {
        return (string) $this->json()->end_page;
    }

    /**
     * The end page of the requested resource.
     *
     * @param string $end_page
     */
    public function setEndPage($end_page)
    {
        $this->json()->end_page = $end_page;
    }

    /**
     * The part of the requested resource.
     *
     * @return string
     */
    public function getPart()
    {
        return (string) $this->json()->part;
    }

    /**
     * The part of the requested resource.
     *
     * @param string $part
     */
    public function setPart($part)
    {
        $this->json()->part = $part;
    }

    /**
     * The source of the requested resource.
     *
     * @return string
     */
    public function getSource()
    {
        return (string) $this->json()->source;
    }

    /**
     * The source of the requested resource.
     *
     * @param string $source
     */
    public function setSource($source)
    {
        $this->json()->source = $source;
    }

    /**
     * The series title number of the requested resource.
     *
     * @return string
     */
    public function getSeriesTitleNumber()
    {
        return (string) $this->json()->series_title_number;
    }

    /**
     * The series title number of the requested resource.
     *
     * @param string $series_title_number
     */
    public function setSeriesTitleNumber($series_title_number)
    {
        $this->json()->series_title_number = $series_title_number;
    }

    /**
     * The doi of the requested resource.
     *
     * @return string
     */
    public function getDoi()
    {
        return (string) $this->json()->doi;
    }

    /**
     * The doi of the requested resource.
     *
     * @param string $doi
     */
    public function setDoi($doi)
    {
        $this->json()->doi = $doi;
    }

    /**
     * The pmid of the requested resource.
     *
     * @return string
     */
    public function getPmid()
    {
        return (string) $this->json()->pmid;
    }

    /**
     * The pmid of the requested resource.
     *
     * @param string $pmid
     */
    public function setPmid($pmid)
    {
        $this->json()->pmid = $pmid;
    }

    /**
     * The name of an additional contact.
     *
     * @return string
     */
    public function getAdditionalPersonName()
    {
        return (string) $this->json()->additional_person_name;
    }

    /**
     * The name of an additional contact.
     *
     * @param string $additional_person_name
     */
    public function setAdditionalPersonName($additional_person_name)
    {
        $this->json()->additional_person_name = $additional_person_name;
    }

    /**
     * The call number of the book. Indicates the library shelf on which the books
     * are located.
     *
     * @return string
     */
    public function getCallNumber()
    {
        return (string) $this->json()->call_number;
    }

    /**
     * The call number of the book. Indicates the library shelf on which the books
     * are located.
     *
     * @param string $call_number
     */
    public function setCallNumber($call_number)
    {
        $this->json()->call_number = $call_number;
    }

    /**
     * The note of the bibliographic record.
     *
     * @return string
     */
    public function getBibNote()
    {
        return (string) $this->json()->bib_note;
    }

    /**
     * The note of the bibliographic record.
     *
     * @param string $bib_note
     */
    public function setBibNote($bib_note)
    {
        $this->json()->bib_note = $bib_note;
    }

    /**
     * The library of congress number of the book.
     *
     * @return string
     */
    public function getLccNumber()
    {
        return (string) $this->json()->lcc_number;
    }

    /**
     * The library of congress number of the book.
     *
     * @param string $lcc_number
     */
    public function setLccNumber($lcc_number)
    {
        $this->json()->lcc_number = $lcc_number;
    }

    /**
     * The oclc number of the book.
     *
     * @return string
     */
    public function getOclcNumber()
    {
        return (string) $this->json()->oclc_number;
    }

    /**
     * The oclc number of the book.
     *
     * @param string $oclc_number
     */
    public function setOclcNumber($oclc_number)
    {
        $this->json()->oclc_number = $oclc_number;
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
