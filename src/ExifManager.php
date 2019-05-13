<?php

namespace ImgMeta;

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

        return array_key_exists($tag, $this->meta) ? $this->meta[$tag] : false;
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

}
