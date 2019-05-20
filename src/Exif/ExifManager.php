<?php

namespace ImgMeta\Exif;

use ImgMeta\AbstractManager;
use ImgMeta\Exif\ExifTags;
use ImgMeta\ImgWriter;

/**
 * Description of ExifManager
 *
 * @author fbrusciano
 */
class ExifManager extends AbstractManager {

    public function fetch($tag) {
        if (!$this->hasMeta) {
            return false;
        }

        // check if $tag is hexa
        if (ctype_xdigit($tag)) {
            $tagName = exif_tagname(hexdec($tag));
        } else {
            $tagName = $tag;
        }
        
        return array_key_exists($tagName, $this->meta) ? $this->meta[$tagName] : false;
    }

    /**
     * Not implemented
     * 
     * PEL(PHP Exif Library). A library for reading and writing Exif headers in JPEG and TIFF images using PHP.
     * The PHP JPEG Metadata Toolkit. Allows reading, writing and display of the following JPEG metadata formats: EXIF 2.2, XMP / RDF, IPTC-NAA IIM 4.1 ect
     * 
     * 
     * @param \ImgMeta\ImgWriter $writer
     * @return boolean
     */
    public function write(ImgWriter $writer) {
        return false;
    }

    /**
     * Return the Exif associative array
     *
     * @example $iptc->getAssocMetas();
     *
     * @access public
     * @return array|false
     */
    public function getAssocMetas() {
        if (!$this->hasMeta) {
            return false;
        }

        return $this->array_flatten($this->meta);
    }

    public function getPosition() {
        if (!$this->hasMeta) {
            return false;
        }

        if (($latitude = $this->fetch('GPSLatitude')) !== false && ($longitude = $this->fetch('GPSLongitude')) !== false) {
            return [
                'GPSLatitude' => $latitude,
                'GPSLongitude' => $longitude,
            ];
        }

        return false;
    }

    protected function array_flatten($array, $k = '') {
        $return = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $return = $return + $this->array_flatten($value, $key);
            } else {
                $finalKey = ($k) ? $k . '.' . $key : $key;
                $return[$finalKey] = $value;
            }
        }
        return $return;
    }

}
