<?php

namespace ImgMeta;

/**
 * Description of IptcManager
 *
 * @author fbrusciano
 */
class IptcManager extends AbstractManager {

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

    /**
     * 
     */
    const META_BY_KEY = 1;
    const META_BY_NAME = 2;

    protected $constToExclud = ['META_BY_KEY', 'META_BY_NAME'];

    public function getMetasByKey() {
        return $this->getAssocMetas(self::META_BY_KEY);
    }

    public function getMetasByName() {
        return $this->getAssocMetas(self::META_BY_NAME);
    }

    /**
     * Return the IPTC associative array
     *
     * @example $iptc->getAssocMetas();
     *
     * @access public
     * @return array|false
     */
    public function getAssocMetas($keyType) {
        if (!$this->hasMeta) {
            return false;
        }

        $class = new \ReflectionClass(__CLASS__);
        $constants = $class->getConstants();

        $metas = [];
        foreach ($constants as $name => $tag) {
            if (in_array($name, $this->constToExclud)) {
                continue;
            }

            $key = ($keyType == self::META_BY_KEY) ? $tag : $name;
            $metas[$key] = $this->fetchAll($tag);
        }

        return $metas;
    }

    /**
     * Set parameters you want to record in a particular tag "IPTC"
     *
     * @param Integer|const $tag  - Code or const of tag
     * @param array|mixed   $data - Value of tag
     *
     * @return Iptc object
     * @access public
     */
    public function set($tag, $data) {
        $data = $this->charsetDecode($data);
        $this->meta["2#{$tag}"] = [$data];
        $this->hasMeta = true;

        return $this;
    }

    /**
     * adds an item at the beginning of the array
     *
     * @param Integer|const $tag  - Code or const of tag
     * @param array|mixed   $data - Value of tag
     *
     * @return Iptc object
     * @access public
     */
    public function prepend($tag, $data) {
        $data = $this->charsetDecode($data);
        if (!empty($this->meta["2#{$tag}"])) {
            array_unshift($this->meta["2#{$tag}"], $data);
            $data = $this->meta["2#{$tag}"];
        }
        $this->meta["2#{$tag}"] = array($data);
        $this->hasMeta = true;
        return $this;
    }

    /**
     * adds an item at the end of the array
     *
     * @param Integer|const $tag  - Code or const of tag
     * @param array|mixed   $data - Value of tag
     *
     * @return Iptc object
     * @access public
     */
    public function append($tag, $data) {
        $data = $this->charsetDecode($data);
        if (!empty($this->meta["2#{$tag}"])) {
            array_push($this->meta["2#{$tag}"], $data);
            $data = $this->meta["2#{$tag}"];
        }
        $this->meta["2#{$tag}"] = array($data);
        $this->hasMeta = true;
        return $this;
    }

    /**
     * Return first IPTC tag by tag name
     *
     * @param Integer|const $tag - Name of tag
     *
     * @example $iptc->fetch(Iptc::KEYWORDS);
     *
     * @access public
     * @return mixed|false
     */
    public function fetch($tag) {
        if (isset($this->meta["2#{$tag}"])) {
            $result = $this->charsetEncode($this->meta["2#{$tag}"][0]);
            return (is_array($result)) ? array_shift($result) : $result;
        }
        return false;
    }

    /**
     * Return all IPTC tags by tag name
     *
     * @param Integer|const $tag - Name of tag
     *
     * @example $iptc->fetchAll(Iptc::KEYWORDS);
     *
     * @access public
     * @return mixed|false
     */
    public function fetchAll($tag) {
        if (isset($this->meta["2#{$tag}"])) {
            return $this->charsetEncode($this->meta["2#{$tag}"]);
        }
        return false;
    }

    /**
     * returns a string with the binary code
     *
     * @access public
     * @return string
     */
    public function binary() {
        $iptc = '';
        foreach (array_keys($this->meta) as $key) {
            $tag = str_replace("2#", "", $key);
            foreach ($this->meta[$key] as $value) {
                $iptc .= $this->iptcMakeTag(2, $tag, $value);
            }
        }
        return $iptc;
    }

    /**
     * Assemble the tags "IPTC" in character "ascii"
     *
     * @param Integer $rec - Type of tag ex. 2
     * @param Integer $dat - code of tag ex. 025 or 000 etc
     * @param mixed   $val - any caracterer
     *
     * @access public
     * @return binary source
     */
    public function iptcMakeTag($rec, $dat, $val) {
        //beginning of the binary string
        $iptcTag = chr(0x1c) . chr($rec) . chr($dat);
        if (is_array($val)) {
            $src = '';
            foreach ($val as $item) {
                $len = mb_strlen($item);
                $src .= $iptcTag . $this->_testBitSize($len) . $item;
            }
            return $src;
        }
        $len = mb_strlen($val);
        $src = $iptcTag . $this->_testBitSize($len) . $val;
        return $src;
    }

    /**
     * create the new image file already
     * with the new "IPTC" recorded
     *
     * @access public
     * @return boolean
     */
    public function write(ImgWriter $writer) {
        return $writer->write($this->binary());
    }

    /**
     * completely remove all tags "IPTC" image
     *
     * @access public
     * @return void
     */
    public function removeAllTags() {
        $this->hasMeta = false;
        $this->meta = [];
    }

    /**
     * It proper test to ensure that
     * the size of the values are supported within the
     *
     * @param Integer $len - size of the character
     *
     * @access public
     * @return boolean
     */
    private function _testBitSize($len) {
        if ($len < 0x8000) {
            return
                    chr($len >> 8) .
                    chr($len & 0xff);
        }
        return
                chr(0x1c) . chr(0x04) .
                chr(($len >> 24) & 0xff) .
                chr(($len >> 16) & 0xff) .
                chr(($len >> 8 ) & 0xff) .
                chr(($len ) & 0xff);
    }

    /**
     * Decode charset utf8 before being saved
     *
     * @param String $data
     * @access private
     * @return string decoded string
     */
    private function charsetDecode($data) {
        $result = [];
        if (is_array($data)) {
            foreach (new \RecursiveIteratorIterator(new \RecursiveArrayIterator($data)) as $value) {
                $result[] = (mb_detect_encoding($value, 'UTF-8', true)) ? $value : utf8_decode($value);
            }
        } else {
            return (mb_detect_encoding($data, 'UTF-8', true)) ? $data : utf8_decode($data);
        }
        return $result;
    }

    /**
     * Encode charset to utf8 before being saved
     *
     * @param String $data
     * @access private
     * @return string encoded string
     */
    private function charsetEncode($data) {
        $result = [];
        if (is_array($data)) {
            foreach (new \RecursiveIteratorIterator(new \RecursiveArrayIterator($data)) as $value) {
                $result[] = (mb_detect_encoding($value, 'UTF-8', true)) ? $value : utf8_encode($value);
            }
        } else {
            return (mb_detect_encoding($data, 'UTF-8', true)) ? $data : utf8_encode($data);
        }
        return $result;
    }

}
