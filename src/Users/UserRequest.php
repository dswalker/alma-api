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
 * Request object.
 *
 * @author David Walker <dwalker@calstate.edu>
 */
class UserRequest extends Record
{
    /**
     * The primary identifier of the requesting user. Output parameter.
     *
     * @return string
     */
    public function getUserPrimaryId()
    {
        return (string) $this->json()->user_primary_id;
    }

    /**
     * The identifier of the request in Alma. Output parameter.
     * 
     * Should be used in subsequent queries regarding the request.
     *
     * @return string
     */
    public function getRequestId()
    {
        return (string) $this->json()->request_id;
    }

    /**
     * The type of the request. Mandatory.
     * 
     * GET action: Possible values are: HOLD, DIGITIZATION, BOOKING, MOVE,
     * WORK_ORDER. POST action: Possible values are: HOLD, DIGITIZATION, BOOKING.
     * Note that it is currently NOT possible to create MOVE or WORK_ORDER
     * request. PUT action: This field cannot be updated.
     *
     * @return RequestTypes
     */
    public function getRequestType()
    {
        return new RequestTypes($this->json()->request_type);
    }

    /**
     * The type of the request. Mandatory.
     * 
     * GET action: Possible values are: HOLD, DIGITIZATION, BOOKING, MOVE,
     * WORK_ORDER. POST action: Possible values are: HOLD, DIGITIZATION, BOOKING.
     * Note that it is currently NOT possible to create MOVE or WORK_ORDER
     * request. PUT action: This field cannot be updated.
     *
     * @param RequestTypes $request_type
     */
    public function setRequestType($request_type)
    {
        $this->json()->request_type = $request_type->json();
    }

    /**
     * The sub type of the request. Output parameter.
     *
     * @return Alma\Utils\Value
     */
    public function getRequestSubType()
    {
        return $this->getValueObject('request_sub_type');
    }

    /**
     * Bibliographic record identifier. Output parameter.
     *
     * @return string
     */
    public function getMmsId()
    {
        return (string) $this->json()->mms_id;
    }

    /**
     * The title of the requested resource. Output parameter.
     *
     * @return string
     */
    public function getTitle()
    {
        return (string) $this->json()->title;
    }

    /**
     * The author of the requested resource. Output parameter.
     *
     * @return string
     */
    public function getAuthor()
    {
        return (string) $this->json()->author;
    }

    /**
     * The description of the requested resource when dealing with multi
     * volume/issue resource.
     * 
     * For item level requests this is an output parameter. When creating or
     * updating a request for a specific periodical resource, the request is title
     * level, but the specific volume/issue requested is input using this
     * description field (e.g. "v.30, #4 Dec, 1966"). Please note that this field
     * is sensitive to case and white spaces.
     *
     * @return string
     */
    public function getDescription()
    {
        return (string) $this->json()->description;
    }

    /**
     * The description of the requested resource when dealing with multi
     * volume/issue resource.
     * 
     * For item level requests this is an output parameter. When creating or
     * updating a request for a specific periodical resource, the request is title
     * level, but the specific volume/issue requested is input using this
     * description field (e.g. "v.30, #4 Dec, 1966"). Please note that this field
     * is sensitive to case and white spaces.
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->json()->description = $description;
    }

    /**
     * Description of the pickup location (library or circulation desk) where the
     * resource will be delivered.
     * 
     * Output parameter. Not relevant when request_type = DIGITIZATION.
     *
     * @return string
     */
    public function getPickupLocation()
    {
        return (string) $this->json()->pickup_location;
    }

    /**
     * The pickup location type.
     * 
     * Possible values are: LIBRARY, CIRCULATION_DESK. Relevant and mandatory when
     * request_type = HOLD or BOOKING.
     *
     * @return PickupLocationTypes
     */
    public function getPickupLocationType()
    {
        return new PickupLocationTypes($this->json()->pickup_location_type);
    }

    /**
     * The pickup location type.
     * 
     * Possible values are: LIBRARY, CIRCULATION_DESK. Relevant and mandatory when
     * request_type = HOLD or BOOKING.
     *
     * @param PickupLocationTypes $pickup_location_type
     */
    public function setPickupLocationType($pickup_location_type)
    {
        $this->json()->pickup_location_type = $pickup_location_type->json();
    }

    /**
     * The pickup location library code.
     * 
     * Relevant and mandatory when request_type = HOLD or BOOKING. see Get
     * libraries API.
     *
     * @return string
     */
    public function getPickupLocationLibrary()
    {
        return (string) $this->json()->pickup_location_library;
    }

    /**
     * The pickup location library code.
     * 
     * Relevant and mandatory when request_type = HOLD or BOOKING. see Get
     * libraries API.
     *
     * @param string $pickup_location_library
     */
    public function setPickupLocationLibrary($pickup_location_library)
    {
        $this->json()->pickup_location_library = $pickup_location_library;
    }

    /**
     * The pickup location circulation desk code.
     * 
     * Relevant when request_type = HOLD or BOOKING, if pickup_location_type =
     * CIRCULATION_DESK.
     *
     * @return string
     */
    public function getPickupLocationCirculationDesk()
    {
        return (string) $this->json()->pickup_location_circulation_desk;
    }

    /**
     * The pickup location circulation desk code.
     * 
     * Relevant when request_type = HOLD or BOOKING, if pickup_location_type =
     * CIRCULATION_DESK.
     *
     * @param string $pickup_location_circulation_desk
     */
    public function setPickupLocationCirculationDesk($pickup_location_circulation_desk)
    {
        $this->json()->pickup_location_circulation_desk = $pickup_location_circulation_desk;
    }

    /**
     * The code of the department chosen to fulfill the digitization or work order
     * request.
     *
     * @return Alma\Utils\Value
     */
    public function getTargetDestination()
    {
        return $this->getValueObject('target_destination');
    }

    /**
     * The code of the department chosen to fulfill the digitization or work order
     * request.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setTargetDestination($value, $desc = "")
    {
        $this->setValueObject('target_destination', $value, $desc);
    }

    /**
     * The requested material type code. Optional.
     * 
     * Possible codes are listed in 'Physical Material Type' code table. This
     * field is output parameter when the request is in item level, and input
     * parameter when the request is in title level.
     *
     * @return Alma\Utils\Value
     */
    public function getMaterialType()
    {
        return $this->getValueObject('material_type');
    }

    /**
     * The requested material type code. Optional.
     * 
     * Possible codes are listed in 'Physical Material Type' code table. This
     * field is output parameter when the request is in item level, and input
     * parameter when the request is in title level.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setMaterialType($value, $desc = "")
    {
        $this->setValueObject('material_type', $value, $desc);
    }

    /**
     * The last date for which the request is needed. Optional.
     *
     * @return \DateTime
     */
    public function getLastInterestDate()
    {
        return $this->stringToDate((string) $this->json()->last_interest_date);
    }

    /**
     * The last date for which the request is needed. Optional.
     *
     * @param \DateTime|string $last_interest_date
     */
    public function setLastInterestDate($last_interest_date)
    {
        $this->json()->last_interest_date = $this->dateToString($last_interest_date);
    }

    /**
     * Indication whether the digitization is partial or full.
     * 
     * Relevant and mandatory when request_type = DIGITIZATION.
     *
     * @return bool
     */
    public function getPartialDigitization()
    {
        return (bool) $this->json()->partial_digitization;
    }

    /**
     * Indication whether the digitization is partial or full.
     * 
     * Relevant and mandatory when request_type = DIGITIZATION.
     *
     * @param bool $partial_digitization
     */
    public function setPartialDigitization($partial_digitization)
    {
        $this->json()->partial_digitization = $partial_digitization->json();
    }

    /**
     * The related comment of the request.
     * 
     * Mandatory when request_type = DIGITIZATION and partial_digitization is
     * true.
     *
     * @return string
     */
    public function getComment()
    {
        return (string) $this->json()->comment;
    }

    /**
     * The related comment of the request.
     * 
     * Mandatory when request_type = DIGITIZATION and partial_digitization is
     * true.
     *
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->json()->comment = $comment;
    }

    /**
     * The status of the request.
     * 
     * Possible values are: In Process, On Hold Shelf, Not Started. Output
     * parameter.
     *
     * @return RequestStatus
     */
    public function getRequestStatus()
    {
        return new RequestStatus($this->json()->request_status);
    }

    /**
     * The place in queue of the request.
     * 
     * Output parameter.
     *
     * @return int
     */
    public function getPlaceInQueue()
    {
        return (int) $this->json()->place_in_queue;
    }

    /**
     * The creation date of the request.
     * 
     * Output parameter.
     *
     * @return \DateTime
     */
    public function getRequestDate()
    {
        return $this->stringToDate((string) $this->json()->request_date);
    }

    /**
     * The task name.
     * 
     * Output parameter.
     *
     * @return string
     */
    public function getTaskName()
    {
        return (string) $this->json()->task_name;
    }

    /**
     * The expiry date of the request.
     * 
     * Output parameter.
     *
     * @return \DateTime
     */
    public function getExpiryDate()
    {
        return $this->stringToDate((string) $this->json()->expiry_date);
    }

    /**
     * The start date in which the request is needed.
     * 
     * Relevant and mandatory when request_type = BOOKING.
     *
     * @return \DateTime
     */
    public function getBookingStartDate()
    {
        return $this->stringToDate((string) $this->json()->booking_start_date);
    }

    /**
     * The start date in which the request is needed.
     * 
     * Relevant and mandatory when request_type = BOOKING.
     *
     * @param \DateTime|string $booking_start_date
     */
    public function setBookingStartDate($booking_start_date)
    {
        $this->json()->booking_start_date = $this->dateToString($booking_start_date);
    }

    /**
     * The end date in which the request is needed.
     * 
     * Relevant and mandatory when request_type = BOOKING.
     *
     * @return \DateTime
     */
    public function getBookingEndDate()
    {
        return $this->stringToDate((string) $this->json()->booking_end_date);
    }

    /**
     * The end date in which the request is needed.
     * 
     * Relevant and mandatory when request_type = BOOKING.
     *
     * @param \DateTime|string $booking_end_date
     */
    public function setBookingEndDate($booking_end_date)
    {
        $this->json()->booking_end_date = $this->dateToString($booking_end_date);
    }

    /**
     * The actual start date of the request, as calculated by the system.
     * 
     * Relevant when request_type = BOOKING. Output parameter.
     *
     * @return \DateTime
     */
    public function getAdjustedBookingStartDate()
    {
        return $this->stringToDate((string) $this->json()->adjusted_booking_start_date);
    }

    /**
     * The actual end date of the request, as calculated by the system.
     * 
     * Relevant when request_type = BOOKING. Output parameter.
     *
     * @return \DateTime
     */
    public function getAdjustedBookingEndDate()
    {
        return $this->stringToDate((string) $this->json()->adjusted_booking_end_date);
    }

    /**
     * The location in the library to which the item is to be moved.
     * 
     * Relevant when request_type = MOVE.
     *
     * @return Alma\Utils\Value
     */
    public function getDestinationLocation()
    {
        return $this->getValueObject('destination_location');
    }

    /**
     * The location in the library to which the item is to be moved.
     * 
     * Relevant when request_type = MOVE.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setDestinationLocation($value, $desc = "")
    {
        $this->setValueObject('destination_location', $value, $desc);
    }

    /**
     * The call number type of the holding to which the item is to be moved.
     * 
     * Relevant when request_type = MOVE.
     *
     * @return Alma\Utils\Value
     */
    public function getCallNumberType()
    {
        return $this->getValueObject('call_number_type');
    }

    /**
     * The call number type of the holding to which the item is to be moved.
     * 
     * Relevant when request_type = MOVE.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setCallNumberType($value, $desc = "")
    {
        $this->setValueObject('call_number_type', $value, $desc);
    }

    /**
     * The call number of the holding to which the item is to be moved.
     * 
     * Relevant when request_type = MOVE.
     *
     * @return string
     */
    public function getCallNumber()
    {
        return (string) $this->json()->call_number;
    }

    /**
     * The call number of the holding to which the item is to be moved.
     * 
     * Relevant when request_type = MOVE.
     *
     * @param string $call_number
     */
    public function setCallNumber($call_number)
    {
        $this->json()->call_number = $call_number;
    }

    /**
     * The item policy to be applied in the new location.
     * 
     * Relevant when request_type = MOVE.
     *
     * @return Alma\Utils\Value
     */
    public function getItemPolicy()
    {
        return $this->getValueObject('item_policy');
    }

    /**
     * The item policy to be applied in the new location.
     * 
     * Relevant when request_type = MOVE.
     *
     * @param string $value  value 
     * @param string $desc   [optional] description
     */
    public function setItemPolicy($value, $desc = "")
    {
        $this->setValueObject('item_policy', $value, $desc);
    }

    /**
     * The date the item is due back.
     * 
     * Relevant when request_type = MOVE and request_sub_type = MOVE_TO_TEMPORARY.
     *
     * @return \DateTime
     */
    public function getDueBackDate()
    {
        return $this->stringToDate((string) $this->json()->due_back_date);
    }

    /**
     * The date the item is due back.
     * 
     * Relevant when request_type = MOVE and request_sub_type = MOVE_TO_TEMPORARY.
     *
     * @param \DateTime|string $due_back_date
     */
    public function setDueBackDate($due_back_date)
    {
        $this->json()->due_back_date = $this->dateToString($due_back_date);
    }

    /**
     * Item pid of the request's related item.
     * 
     * Output parameter. Relevant only when the request is in item level or is
     * bound to a single item.
     *
     * @return string
     */
    public function getItemId()
    {
        return (string) $this->json()->item_id;
    }

    /**
     * Barcode of the request's related item.
     * 
     * Output parameter. Relevant only when the request is in item level or is
     * bound to a single item.
     *
     * @return string
     */
    public function getBarcode()
    {
        return (string) $this->json()->barcode;
    }

    /**
     * The resource sharing request information.
     *
     * @return ResourceSharing
     */
    public function getResourceSharing()
    {
        return new ResourceSharing($this->json()->resource_sharing);
    }

    /**
     * The resource sharing request information.
     *
     * @param ResourceSharing $resource_sharing
     */
    public function setResourceSharing($resource_sharing)
    {
        $this->json()->resource_sharing = $resource_sharing->json();
    }

    /**
     * An indication whether copyrights declaration was signed by patron.
     * 
     * Relevant for patron digitization requests only.
     *
     * @return bool
     */
    public function getCopyrightsDeclarationSignedByPatron()
    {
        return (bool) $this->json()->copyrights_declaration_signed_by_patron;
    }

    /**
     * An indication whether copyrights declaration was signed by patron.
     * 
     * Relevant for patron digitization requests only.
     *
     * @param bool $copyrights_declaration_signed_by_patron
     */
    public function setCopyrightsDeclarationSignedByPatron($copyrights_declaration_signed_by_patron)
    {
        $this->json()->copyrights_declaration_signed_by_patron = $copyrights_declaration_signed_by_patron->json();
    }

    /**
     * Required fields
     *
     * @return array
     */
    protected function getRequiredFields()
    {
        return array(
            'request_type',
        );
    }
}
