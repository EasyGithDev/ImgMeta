<?php

namespace ImgMeta;

/**
 * Description of ImgData
 *
 * @author fbrusciano
 */
class ImgData {

    protected $exif = null;
    protected $iptc = null;

    public function __construct($stream) {
        $this->exif = static::getExifFromStream($stream);
        $this->iptc = static::getIptcFromStream($stream);
    }

    public function getMetas() {

        return [
            'EXIF' => ($this->exif) ? $this->exif->getMetas() : false,
            'IPTC' => ($this->iptc) ? $this->iptc->getMetas() : false
        ];
    }

    public function read() {

        $this->exif->read();
        $this->iptc->read();

        return $this;
    }

    public function getExif() {
        return $this->exif;
    }

    public function getIptc() {
        return $this->iptc;
    }

    public static function getExifFromStream($stream) {
        return FactoryManager::getManager(ExifReader::getReader($stream), FactoryManager::EXIF);
    }

    public static function getIptcFromStream($stream) {
        return FactoryManager::getManager(IptcReader::getReader($stream), FactoryManager::IPTC);
    }

}
