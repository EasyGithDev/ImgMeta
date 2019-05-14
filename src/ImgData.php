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

    public function __construct() {
        $this->exif = static::createExifManager();
        $this->iptc = static::createIptcManager();
    }

    public function getMetas() {

        return [
            'EXIF' => ($this->exif) ? $this->exif->getMetas() : false,
            'IPTC' => ($this->iptc) ? $this->iptc->getMetasByName() : false
        ];
    }

    public function read($stream) {

        $this->exif->read(ExifReader::getReader($stream));
        $this->iptc->read(IptcReader::getReader($stream));

        return $this;
    }

    public function getExif() {
        return $this->exif;
    }

    public function getIptc() {
        return $this->iptc;
    }

    public static function createExifManager() {
        return FactoryManager::getManager(FactoryManager::EXIF);
    }

    public static function createIptcManager() {
        return FactoryManager::getManager(FactoryManager::IPTC);
    }

}
