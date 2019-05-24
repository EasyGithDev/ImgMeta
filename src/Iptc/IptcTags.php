<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta\Iptc;

/**
 * Description of IptcTags
 *
 * @author fbrusciano
 */
class IptcTags {

    /**
     * https://iptc.org/std/photometadata/specification/IPTC-PhotoMetadata
     * https://iptc.org/std/photometadata/documentation/userguide/#!Documents/fieldreferencetable.htm
     * https://sno.phy.queensu.ca/~phil/exiftool/TagNames/IPTC.html
     */
    const ApplicationRecordVersion = '000';
    const ObjectTypeReference = '003';
    const ObjectAttributeReference = '004';
    const ObjectName = '005';
    const EditStatus = '007';
    const EditorialUpdate = '008';
    const Urgency = '010';
    const SubjectReference = '012';
    const Category = '015';
    const SupplementalCategories = '020';
    const FixtureIdentifier = '022';
    const Keywords = '025';
    const ContentLocationCode = '026';
    const ContentLocationName = '027';
    const ReleaseDate = '030';
    const ReleaseTime = '035';
    const ExpirationDate = '037';
    const ExpirationTime = '038';
    const SpecialInstructions = '040';
    const ActionAdvised = '042';
    const ReferenceService = '045';
    const ReferenceDate = '047';
    const ReferenceNumber = '050';
    const DateCreated = '055';
    const TimeCreated = '060';
    const DigitalCreationDate = '062';
    const DigitalCreationTime = '063';
    const OriginatingProgram = '065';
    const ProgramVersion = '070';
    const ObjectCycle = '075';
    const By_line = '080';
    const By_lineTitle = '085';
    const City = '090';
    const Sub_location = '092';
    const Province_State = '095';
    const Country_PrimaryLocationCode = '100';
    const Country_PrimaryLocationName = '101';
    const OriginalTransmissionReference = '103';
    const Headline = '105';
    const Credit = '110';
    const Source = '115';
    const CopyrightNotice = '116';
    const Contact = '118';
    const Caption_Abstract = '120';
    const LocalCaption = '121';
    const Writer_Editor = '122';
    const RasterizedCaption = '125';
    const ImageType = '130';
    const ImageOrientation = '131';
    const LanguageIdentifier = '135';
    const AudioType = '150';
    const AudioSamplingRate = '151';
    const AudioSamplingResolution = '152';
    const AudioDuration = '153';
    const AudioOutcue = '154';
    const JobID = '184';
    const MasterDocumentID = '185';
    const ShortDocumentID = '186';
    const UniqueDocumentID = '187';
    const OwnerID = '188';
    const ObjectPreviewFileFormat = '200';
    const ObjectPreviewFileVersion = '201';
    const ObjectPreviewData = '202';
    const Prefs = '221';
    const ClassifyState = '225';
    const SimilarityIndex = '228';
    const DocumentNotes = '230';
    const DocumentHistory = '231';
    const ExifCameraInfo = '232';
    const CatalogSets = '255';

}
